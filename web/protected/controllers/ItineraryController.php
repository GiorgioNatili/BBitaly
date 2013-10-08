<?php

class ItineraryController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new Itinerary;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
<<<<<<< HEAD

		if(isset($_POST['Itinerary']))
		{
			$model->attributes=$_POST['Itinerary'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

=======
                
                /*
                 * create new entity type in db bamed "Itinerary"
                 */
		if(isset($_POST['Itinerary']))
		{
                    $time = time();
                    $model->attributes=$_POST['Itinerary'];
                    $coverImage = CUploadedFile::getInstance($model,'cover_image');
                    unset($_POST['Itinerary']['cover_image']);
                    $model->attributes = $_POST['Itinerary'];
                    $image = new Images;
                    $transaction = Yii::app()->db->beginTransaction();
                    if ($_FILES['Itinerary']['error']['cover_image'] == 0) {
                        // Lets Upload.
                        $bucket = new Bucket($coverImage);
                        // Before Setting cover, insert image first.
                        $image->type = Entity::ENTITY_ITINERARY;
                        $image->itinerary_id = $model->id;
                        $image->is_cover = 1;
                        $image->img_mime = $coverImage->type;
                        $image->img_name = $bucket->getFileName();
                        $image->img_size = $coverImage->size;
                        $image->status = 1;
                        $image->uploaded_on = time();
                        $image->save();
                        $coverImage->saveAs($bucket->getMovePath());
                        $model->cover_image = $image->id;
                    }
                    
                    // convert string to *nix timestamp
                    $model->date_from = strtotime($model->date_from);
                    $model->date_to = strtotime($model->date_to);
                    $model->uid = $this->getUser()->id;
                    $model->created_on = $time;
                    $model->updated_on = $time;
                    $model->host_ip = $_SERVER['REMOTE_ADDR'];
                    if($model->save()) {
                        $image->itinerary_id = $model->id;
                        $image->save();
                        /**
                         * @todo Implement single query multiple insert.
                         */
                        if ( !empty($_POST['Location'])) {
                            foreach ($_POST['Location'] as $loc) {
                                $location = new ItineraryLocations;
                                $location->itinerary_id = $model->id;
                                $location->name = $loc['name'];
                                $location->date_from = strtotime($loc['from']);
                                $location->date_to = strtotime($loc['to']);
                                $location->persons = $loc['people'];
                                $location->status = 1;
                                $location->created_on = $time;
                                if ( !$location->save()) {
                                    $transaction->rollback();
                                    echo 'cannot insert location';
                                    echo "<pre>"; print_r($location); exit;
                                }
                                
                            }
                        }
                        
                        $transaction->commit();
                        $this->setFlash('success','Your itinerary has been created successfully!');
                        $this->redirect('/itinerary');
                    } else {
                        $transaction->rollback();
                    }
		}
                
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Itinerary']))
		{
			$model->attributes=$_POST['Itinerary'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Itinerary');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Itinerary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Itinerary']))
			$model->attributes=$_GET['Itinerary'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Itinerary the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Itinerary::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Itinerary $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='itinerary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
