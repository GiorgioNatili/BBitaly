<?php

class UsersController extends Controller
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
				//'users'=>array('*'),
                                'roles' => array('admin')
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
                        array('allow',
                                'actions' => array('join'),
                                'users' => array('*')),
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
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
            
            // No bullshits. You can only update your profile.
            if ( !Yii::app()->user->checkAccess('admin')) {
                // Not a admin.
                if ( $id !== Yii::app()->user->id ) {
                    throw new IllegalProfileUpdateException;
                }
            }
            $model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            
            $destination = $this->getRequest()->getParam('destination');

            if(isset($_POST['Users']))
            {
                    $model->attributes=$_POST['Users'];
                    if($model->save()) {
                        $this->setFlash('success', 'Your Profile information has been updated successfully!');
                        $this->redirect(isset($destination) ? $destination : array('view','id'=>$model->id));
                    }
                            
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
        
        
        public function actionJoin() {
            
            $this->layout = '//layouts/clean';
            
            /*********************************************************
             *          Custom Authentication
             **********************************************************/
            $type = $this->getRequest()->getParam('_t');
            if ( isset ($type) ) {
                // Good. Custom signup. Check for role.
                
                if ( $type == Users::ROLE_OWNER || $type == Users::ROLE_TRAVELER ) {
                    // Roles are OK. Lets create.
                    $transaction = Yii::app()->db->beginTransaction();
                    try {
                        $user = new Users;
                        $time = time();
                        $password = $_POST['Users']['password'];
                        $user->attributes = $_POST['Users'];
                        $user->password = sha1($password);
                        $user->source = Users::SOURCE_BBITALY;
                        $user->created_on = $time;
                        $user->updated_on = $time;
                        
                        if ( ! $user->save() )
                            throw new Exception ("Unable to create a new user!", 002);
                        
                        // Ok, now time to assign role.
                        Yii::app()->authManager->assign($type, $user->id);
                        
                        // Im Good. Log me in.
                        $identity = new \UserIdentity($user->email, $password);
                        $identity->authenticate();
                        if ( $identity->errorCode === UserIdentity::ERROR_NONE ) {
                            Yii::app()->user->login($identity);
                        } else {
                            throw new Exception("Unable to Login after Signup!", 004);
                        }
                        
                        
                        if ( isset($_POST['Property'])) {
                            // Lets Insert Property and redirect to property/:id
                            $rooms = $_POST['total_rooms'] >= 0 ? $_POST['total_rooms'] : 1;
                            $property = new Property;
                            $property->attributes = $_POST['Property'];
                            $property->available_rooms = $rooms;
                            $property->created_on = $time;
                            $property->uid = $user->id;
                            $property->validate();
                            // property.type needs to be implemented.
                            if ( ! $property->save() ) {
                                $transaction->rollback();
                                throw new Exception ("Unable to create a new property!", 003);
                            }
                            
                            for ($k = 1; $k <= $rooms; $k++) {
                                $room = new Room;
                                $room->property_id = $property->id;
                                $room->title = $property->title.' - Room # '. $k;
                                $room->people_min = $property->people_min;
                                $room->people_max = $property->people_max;
                                $room->price = $property->base_price;
                                $room->policy = 1;
                                $room->created_on = $time;
                                $room->updated_on = $time;
                                $room->host_ip = $_SERVER['REMOTE_ADDR'];
                                $room->validate();
                                if ( !$room->save())
                                    throw new Exception ("Unable to create room # ". $k, 004);
                                
                            }
                            
                            $pdesc = new Descriptions();
                            $pdesc->type = Entity::ENTITY_PROPERTY;
                            $pdesc->property_id = $property->id;
                            $pdesc->lang_italian = 'Test di descrizione della proprietà';
                            $pdesc->lang_english = 'Test property description';
                            $pdesc->created_on = time();
                            $pdesc->save();
                            
                            $rdesc = new Descriptions();
                            $rdesc->type = Entity::ENTITY_ROOM;
                            $rdesc->room_id = $property->rooms[0]->id;
                            $rdesc->lang_italian = 'Test di descrizione delle camere';
                            $rdesc->lang_english = 'Test room description';
                            $rdesc->created_on = time();
                            $rdesc->save();
                            
                            $transaction->commit();
                            $this->setFlash('success', 'Welcome Abroad! Please modify your property information.');
                            $this->redirect('/property/update/'.$property->id);
                        }
                        
                        $transaction->commit();
                        $this->setFlash('success', 'Welcome Abroad! You are now surfing experience of BBitaly!');                        
                        $this->redirect('/');
                        
                    } catch (Exception $ex) {
                        $transaction->rollBack();
                        throw $ex;
                    }
                } else {
                    // Invalid Activity.
                    throw new InvalidActivityException;
                }
                
            }
            
            /*********************************************************
             *          Facebook Authentication
             *********************************************************/
            $error = $this->getRequest()->getParam('error');
            $error_code = $this->getRequest()->getParam('error_code');
            if ( isset($error)
                    && isset($error_code)) {
                
                if ( $error_code == 200)
                    $this->setFlash ('error', 'To continue with BBitaly, we need you to join us via Facebook.');
            }
            
            $code = $this->getRequest()->getParam('code');
            if ( isset($code)) {
                $fb = Yii::app()->facebook;
                $token = $fb->getAccessToken();
                $fb->setAccessToken($token);
                $fbid = $fb->getUser();
                if ( $fbid > 0 ) {
                    $user = Users::model()->findByAttributes(array(
                        'extra' => $fbid,
                        'source' => Users::SOURCE_FACEBOOK
                    ));
                    $transaction = Yii::app()->db->beginTransaction();
                    if ( is_null($user)) {
                        // Signup.
                        $info = $fb->api('/me?fields=email,first_name,last_name,location');
                        if ( !empty($info)) {
                            // Lets insert.
                            
                            $time = time();
                            $user = new \Users;
                            $user->first_name = $info['first_name'];
                            $user->last_name = $info['last_name'];
                            $user->email = $info['email'];
                            $user->source = Users::SOURCE_FACEBOOK;
                            $user->extra = $fbid;
                            $user->status = 1;
                            $user->created_on = $time;
                            $user->updated_on = $time;
                            
                            $user->validate();
                            //echo '<pre>'; print_r($user); exit;
                            
                            if ( !$user->save()) {
                                // Raise error.
                                echo 'unable to insert'; exit;
                                $this->redirect('/');
                            }
                            
                            // Saved. Lets assign him a role.
                            Yii::app()->authManager->assign(Users::ROLE_TRAVELER, $user->id);
                            
                            $fb->api('/me/feed', 'POST',
                                array(
                                  'link' => 'www.bbitaly.com',
                                  'message' => 'Hey! Im now using BBItaly. Its your turn to try now!'
                             ));
                            
                            $transaction->commit();
                        } else {
                            // Failed to get info from facebook.
                            $transaction->rollback();
                            $this->setFlash('error', 'We are unable to connect your facebook profile at the moment. Please try later.');
                            $this->redirect('/');
                        }
                    }
                    
                    $identity = new FacebookUserIdentity($user->extra, Users::SOURCE_FACEBOOK);
                    $identity->authenticate();

                    if ( $identity->errorCode === UserIdentity::ERROR_NONE ) {
                        Yii::app()->user->login($identity);
                        $this->setFlash('success', 'Welcome Abroad! You are now surfing experience of BBitaly!');
                        $this->redirect('/');
                    }
                } else {
                    $this->redirect(Yii::app()->facebook->getLoginUrl(array(
                        'scopes' => 'email, publish_actions, publish_stream, share_item, status_update, user_location'
                    )));
                }
            }

            if ( !Yii::app()->user->isGuest )
                $this->redirect('/');
            
            $property_types = array();
            foreach (Yii::app()->db->createCommand('SELECT * FROM property_types')->queryAll() as $row) {
                $property_types[$row['id']] = $row['name'];
            }
            
            $this->render('join', array(
                'model' => new \Users,
                'property' => new Property,
                'property_types' => $property_types
            ));
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
