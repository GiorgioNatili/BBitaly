<?php

class PropertyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'roles' => array(Users::ROLE_OWNER),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array(Users::ROLE_ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                    array('allow',
                        'roles' => array(Users::ROLE_ADMIN))
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Property;
                $policies = Policies::model()->findAllByAttributes(array('status' => 1));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
                //echo '<pre>'; print_r($_POST); exit;

		if(isset($_POST['Property']))
		{
                    // Lets insert
                    $transaction = Yii::app()->db->beginTransaction();
                    $time = time();
                    try {
                        $model->attributes=$_POST['Property'];
                        $model->created_on = $time;
                        $model->uid = $this->getUser()->id;
                        // Property
                        if ( $model->validate() === true 
                                && $model->save() ) {
                            
                            $pdesc = new Descriptions();
                            $pdesc->attributes = $_POST['Descriptions'];
                            $pdesc->type = Entity::ENTITY_PROPERTY;
                            $pdesc->property_id = $model->id;
                            $pdesc->created_on = $time;
                            // Property Description
                            if ( $pdesc->validate() === true
                                    && $pdesc->save() ) {
                                
                                // Lets Insert room.
                                // See, how many rooms are there
                                $total_rooms = $_POST['total_rooms'];
                                $total_rooms = $total_rooms > 0 ? $total_rooms : 1;
                                for ($j = 1; $j <= $total_rooms; $j++) {
                                    $rdesc = new Descriptions;
                                    $room = new Room;
                                    $rdesc->attributes = $_POST['Room']['Description'];
                                    //unset($_POST['Room']['Description']);
                                    //echo '<pre>'; print_r($_POST); exit;
                                    $room->attributes = $_POST['Room'];
                                    $room->title = $model->title.' - Room # '. $j;
                                    $room->property_id = $model->id;
                                    $room->created_on = $time;
                                    $room->updated_on = $time;
                                    $room->host_ip = $_SERVER['REMOTE_ADDR'];
                                    $room->validate();
                                    if ( $room->validate()
                                            && $room->save() ) {
                                        
                                        $rdesc->type = Entity::ENTITY_ROOM;
                                        $rdesc->room_id = $room->id;
                                        $rdesc->created_on = $time;
                                        
                                        if ( $rdesc->validate() ) {
                                            $rdesc->save();
                                        }
                                    }
                                }
                                $billing = new Billing();
                                $billing->attributes = $_POST['Billing'];
                                $billing->user_id = $this->getUser()->id;
                                $billing->property_id = $model->id;
                                $billing->created_on = $time;
                                if ( $billing->validate()
                                        && $billing->save() ) {
                                    
                                    $this->setFlash('success', 'Congratulations! Your property has been created successfully!');
                                    $transaction->commit();
                                    $this->redirect('/property');
                                }
                                
                            }
                        }
                    } catch (Exception $ex) {
                        $transaction->rollback();
                        throw $ex;
                    }
			
		}

		$this->render('create',array(
                    'model'=>$model,
                    'policies' => $policies,
                    'property_description' => new Descriptions,
                    'room_description'  => new Descriptions,
                    'room'  => new Room,
                    'billing' => new Billing
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $policies = Policies::model()->findAllByAttributes(array('status' => 1));
            $model=$this->loadModel($id);
            
            //echo "<pre>";            print_r($model->descRelations); exit;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Property']))
            {
                    $model->attributes=$_POST['Property'];
                    if($model->save())
                            $this->redirect(array('view','id'=>$model->id));
            }
            
            $billing = Billing::model()->findByAttributes(array(
                    'user_id'   => $model->uid
                ));
            
            if ( empty ($billing) )
                $billing = new Billing;

            $this->render('update',array(
                'model'=>$model,
                'policies' => $policies,
                'property_description' => Descriptions::model()->getDescription(array(
                    'type'  => Entity::ENTITY_PROPERTY,
                    'property_id'   => $model->id
                )),
                'room_description' => Descriptions::model()->getDescription(array(
                    'type'  => Entity::ENTITY_ROOM,
                    'room_id'   => $model->id
                )),
                'room'  => Room::model()->findByAttributes(array(
                    'property_id'   => $model->id
                )),
                'billing' => $billing
            ));
                    
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Property');
            if ( Yii::app()->user->checkAccess('admin')) {
                $dataProvider=new CActiveDataProvider('Property');
            } else if ( Yii::app()->user->checkAccess('owner')) {
                $dataProvider=new CActiveDataProvider('Property', array(
                    'criteria' => new CDbCriteria(array(
                        'condition' => 'uid = '.$this->getUser()->id
                    ))
                ));
            }
            
            $this->render('index',array(
                'dataProvider'  =>  $dataProvider,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Property('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Property']))
			$model->attributes=$_GET['Property'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Property the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Property::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Property $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='property-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
