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
                'actions'=>array('index','view','ajaxFeatured','ajaxPopular'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','uploadFile','tempuploaddel'),
                'roles' => array(Users::ROLE_OWNER),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','update'),
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
            //echo "<pre>"; print_r($_POST); exit;
            // Lets insert
            $transaction = Yii::app()->db->beginTransaction();
            $time = time();
            try {
                $model->attributes=$_POST['Property'];
                $cover_image = CUploadedFile::getInstance($model,'cover_image');
                unset($_POST['Property']['cover_image']);
                $model->attributes=$_POST['Property'];
                if ( ($_FILES['Property']['error']['cover_image']) === 0) {
                    $bucket = new Bucket($cover_image);
                    // Before Setting cover, insert image first.
                    $image = new Images;
                    $image->type = Entity::ENTITY_PROPERTY;
                    $image->property_id = $model->id;
                    $image->is_cover = 1;
                    $image->img_mime = $cover_image->type;
                    $image->img_name = $bucket->getFileName();
                    $image->img_size = $cover_image->size;
                    $image->status = 1;
                    $image->uploaded_on = time();
                    $image->save();
                    $cover_image->saveAs($bucket->getMovePath());
                    $model->cover_image = $image->id;

                }

                $model->created_on = $time;
                $model->uid = $this->getUser()->id;

                // Property
                if ( $model->validate()
                    && $model->save() ) {

                    if(isset($_POST['Property']['images'])){
                        foreach($_POST['Property']['images'] as $imgArr){
                            $bucket = new Bucket($imgArr,'javascriptfile');
                            $image = new Images;
                            $image->type = Entity::ENTITY_PROPERTY;
                            $image->property_id = $model->id;
                            $image->is_cover = 0;
                            $image->img_mime = $imgArr['type'];
                            $image->img_name = $bucket->getFileName();
                            $image->img_size = $imgArr['size'];
                            $image->status = 1;
                            $image->uploaded_on = $time;
                            $image->save();
                            file_put_contents($bucket->getMovePath(),fopen(urldecode($imgArr['path']),'r'), FILE_APPEND);
                        }
                    }
                    if(isset($_POST['Room']['images'])){
                        foreach($_POST['Room']['images'] as $imgArr){
                            $bucket = new Bucket($imgArr,'javascriptfile');
                            $image = new Images;
                            $image->type = Entity::ENTITY_PROPERTY;
                            $image->room_id = $model->rooms[0]->id;
                            $image->is_cover = 0;
                            $image->img_mime = $imgArr['type'];
                            $image->img_name = $bucket->getFileName();
                            $image->img_size = $imgArr['size'];
                            $image->status = 1;
                            $image->uploaded_on = time();
                            $image->save();
                            file_put_contents($bucket->getMovePath(),fopen(urldecode($imgArr['path']),'r'), FILE_APPEND);
                        }
                    }

                    // We got a property Id. Bind it on image cover.
                    $image->property_id = $model->id;
                    $image->save();
                    $pdesc = new Descriptions();
                    $pdesc->attributes = $_POST['Descriptions'];
                    $pdesc->type = Entity::ENTITY_PROPERTY;
                    $pdesc->property_id = $model->id;
                    $pdesc->created_on = $time;

                    // Property Description
                    if ( $pdesc->validate()
                        && $pdesc->save() ) {

                        // Lets Insert room.
                        // See, how many rooms are there
                        $availableRooms = $_POST['Property']['available_rooms'] > 0 ? $_POST['Property']['available_rooms'] : 1;
                        for ($j = 1; $j <= $availableRooms; $j++) {
                            $rdesc = new Descriptions;
                            $room = new Room;
                            $rdesc->attributes = $_POST['Room']['Description'];
                            $room->attributes = $_POST['Room'];
                            $room->title = $model->title.' - Room # '. $j;
                            $room->property_id = $model->id;
                            $room->created_on = $time;
                            $room->updated_on = $time;
                            $room->host_ip = $_SERVER['REMOTE_ADDR'];
                            if ( $room->validate()
                                && $room->save() ) {

                                $rdesc->type = Entity::ENTITY_ROOM;
                                $rdesc->room_id = $room->id;
                                $rdesc->created_on = $time;

                                if ( $rdesc->validate() ) {
                                    $rdesc->save();
                                } else {
                                    $transaction->rollback();
                                    echo 'room desc failed';
                                }
                            } else {
                                $transaction->rollback();
                                echo 'room failed';
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
                        } else {
                            $transaction->rollback();
                            echo 'billing failed';
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
            'room_desc'  => new Descriptions,
            'room'  => new Room,
            'billing' => new Billing,
            'services' => Services::model()->getServices()
        ));
    }

    public function actionUploadFile()
    {
        $upload_handler = new UploadHandler();
        exit;
    }

    public function actionTempuploaddel(){
        $file = $_POST['filepath'];
        $file_thumb = $_POST['thumbpath'];

        if (!unlink($file))
        {
            echo ("Error deleting ".$file);
        }

        if (!unlink($file_thumb))
        {
            echo ("Error deleting thumbnail".$file_thumb);
        }
        exit;
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Property']))
        {
            
            
            $transaction = Yii::app()->db->beginTransaction();

            $updated_on = time();
            try {
                $cover_image = CUploadedFile::getInstance($model,'cover_image');
                unset($_POST['Property']['cover_image']);
                $model->attributes=$_POST['Property'];
                // Handling cover image for now.
                if ( ($_FILES['Property']['error']['cover_image']) === 0) {
                    $bucket = new Bucket($cover_image);
                    // Before Setting cover, insert image first.
                    $image = new Images;
                    $image->type = Entity::ENTITY_PROPERTY;
                    $image->property_id = $model->id;
                    $image->is_cover = 1;
                    $image->img_mime = $cover_image->type;
                    $image->img_name = $bucket->getFileName();
                    $image->img_size = $cover_image->size;
                    $image->status = 1;
                    $image->uploaded_on = time();
                    // Time to deactivate old cover.
                    $model->deactivateCover();
                    $image->save();
                    $cover_image->saveAs($bucket->getMovePath());
                    $model->cover_image = $image->id;
                }

                if( $model->save()) {

                    if(isset($_POST['Property']['images'])){
                        foreach($_POST['Property']['images'] as $imgArr){
                            $bucket = new Bucket($imgArr,'javascriptfile');
                            $image = new Images;
                            $image->type = Entity::ENTITY_PROPERTY;
                            $image->property_id = $model->id;
                            $image->is_cover = 0;
                            $image->img_mime = $imgArr['type'];
                            $image->img_name = $bucket->getFileName();
                            $image->img_size = $imgArr['size'];
                            $image->status = 1;
                            $image->uploaded_on = $updated_on;
                            $image->save();
                            file_put_contents($bucket->getMovePath(),fopen(urldecode($imgArr['path']),'r'), FILE_APPEND);
                        }
                    }
                    if(isset($_POST['Room']['images'])){
                        foreach($_POST['Room']['images'] as $imgArr){
                            $bucket = new Bucket($imgArr,'javascriptfile');
                            $image = new Images;
                            $image->type = Entity::ENTITY_PROPERTY;
                            $image->room_id = $model->rooms[0]->id;;
                            $image->is_cover = 0;
                            $image->img_mime = $imgArr['type'];
                            $image->img_name = $bucket->getFileName();
                            $image->img_size = $imgArr['size'];
                            $image->status = 1;
                            $image->uploaded_on = time();
                            $image->save();
                            file_put_contents($bucket->getMovePath(),fopen(urldecode($imgArr['path']),'r'), FILE_APPEND);
                        }
                    }
                    
                    $prop_desc = $model->descriptions;
                    $prop_desc->attributes = $_POST['Descriptions'];
                    // Property Description updated.
                    if ( $prop_desc->save()) {
                        $rooms_data = $_POST['Room'];
                        $instances = $rooms_data['instances'];
                        unset($rooms_data['instances']);
                        // See How many rooms has to be created.
                        if ( $model->available_rooms > $instances) {
                            // More rooms are available then instances.
                            $to_create = $model->available_rooms - $instances;
                            // New number of rooms counted. Lets insert them.
                            for ($j = 1; $j <= $to_create; $j++) {
                                //Insert!
                                $room = new Room;
                                $room->attributes = $rooms_data;
                                $room->property_id = $model->id;
                                $room->title = $model->title.' - Room # '. $instances+1;
                                $room->created_on = $updated_on;
                                $room->updated_on = $updated_on;
                                $room->host_ip = $_SERVER['REMOTE_ADDR'];
                                if ( $room->save() ) {
                                    // Time to create description
                                    $description = new Descriptions;
                                    $description->attributes = $_POST['Room']['Description'];
                                    $description->type = Entity::ENTITY_ROOM;
                                    $description->room_id = $room->id;
                                    if ( !$description->save() ) {
                                        // Unable to save room desc.
                                        $transaction->rollback();
                                    }
                                } else {
                                    // Unable to create Room.
                                    $transaction->rollback();
                                }
                            }
                        }

                        $rooms_data['updated_on'] = $updated_on;
                        // Lets acknowledge all rooms.
                        Room::model()->updateAll(
                            $rooms_data,
                            'property_id = '. $model->id
                        );
                        $room_desc = $_POST['Room']['Description'];
                        // All descriptions updated.
                        $criteria = new CDbCriteria();
                        $roomIds = Property::model()->getRoomsIds($model->id);
                        $criteria->addInCondition('room_id', $roomIds);
                        Descriptions::model()->updateAll(
                            $room_desc,
                            $criteria
                        );

                        $billing = $model->billing;
                        if ( null === $billing )
                            $billing = new Billing;

                        $billing->attributes = $_POST['Billing'];
                        $billing->user_id = $model->uid;
                        $billing->property_id = $model->id;
                        if ( $billing->save() ) {
                            // All good. Go back.
                            $transaction->commit();
                            $this->setFlash('success', 'Your property has been updated successfully!');
                            $this->redirect('/property');
                        } else {
                            // Unable to save billing info.
                            $transaction->rollback();
                        }
                    } else {
                        // Unable to save property desc.
                        $transaction->rollback();
                    }

                } else {
                    // Unabel to save property.
                    $transaction->rollback();
                    $model->validate();
                }

            } catch (Exception $ex) {
                throw $ex;
            }
        }

        $billing = Billing::model()->findByAttributes(array(
            'user_id'   => $model->uid
        ));

        if ( empty ($billing) )
            $billing = new Billing;

        /*
       $room_desc = Descriptions::model()->getDescription(array(
                'type'  => Entity::ENTITY_ROOM,
                'room_id'   => $model->id
            ));
       */
        $room_desc = Property::model()->findByPk($model->id);

        $this->render('update',array(
            'model'=>$model,
            'policies' => $policies,
            'property_description' => Descriptions::model()->getDescription(array(
                'type'  => Entity::ENTITY_PROPERTY,
                'property_id'   => $model->id
            )),
            'room_desc' => $room_desc->rooms[0]->descriptions,
            'room'  => Room::model()->findByAttributes(array(
                'property_id'   => $model->id
            )),
            'cRoom' => Room::model()->countByAttributes(array(
                'property_id'   => $model->id
            )),
            'billing' => $billing,
            'services' => Services::model()->getServices()
        ));

    }
    
    private function persistServices($services) {
        
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
        $model=Property::model()->findByPk($id)->with('Images');
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
    
    /***************************************************
     *  Ajax Actions
     ***************************************************/
    
    public function actionajaxFeatured() {
        $criteria = new CDbCriteria();
        $criteria->offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $criteria->limit = 2;
        $data = Property::model()
                ->featured()
                ->with('coverImage')
                ->findAll($criteria);
        
        $total = Property::model()->featured()->count();
        $output = array();
        $output['total'] = $total;
        if (!empty( $data)) {
            $j = 0;
            /** @var Property $row */
            foreach ($data as $row) {
                $output[$j] = $row->attributes;
                $output[$j]['favorites'] = count($row->favorites);
                $output[$j]['cover'] = $row->coverImage !== null ? $row->coverImage->attributes : array();
                if ( isset($output[$j]['cover']['img_name'])) {
                    $output[$j]['cover']['img_name'] = Bucket::load($output[$j]['cover']['img_name']);
                }
                $j++;
            }
        }
        
        echo json_encode($output);
        
    }
    
    public function actionajaxPopular() {
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $output = array();
        $records = Yii::app()->db->createCommand(
                "select 
                    p.*, 
                    i.img_name, 
                    (CASE WHEN f.favorites IS NULL THEN 0 WHEN f.favorites >= 0 THEN f.favorites END) as favorites
                from property p 
                LEFT JOIN images as i on i.property_id = p.id 
                LEFT JOIN (select 
                                property_id, 
                                count(id) as favorites 
                            from favorites group by property_id) f on f.property_id = p.id 
                group by p.id 
                order by favorites  DESC
                LIMIT 2 OFFSET {$offset}"
            )->query()->readAll();
        $j = 0;        
        foreach ($records as $row) {
            $output[$j] = $row;
            $output[$j]['img_name'] = !empty($row['img_name']) ? Bucket::load($row['img_name']) : null;
            $j++;
        }
        
        
        $output['total'] = Yii::app()->db->createCommand(
                "select 
                    COUNT(DISTINCT p.id) as totals
                from property p 
                LEFT JOIN images as i on i.property_id = p.id 
                LEFT JOIN (select 
                                property_id, 
                                count(id) as favorites 
                            from favorites group by property_id) f on f.property_id = p.id ")
                ->query()->readColumn(0);
        
        
        echo json_encode($output);
        Yii::app()->end();
    }
}
