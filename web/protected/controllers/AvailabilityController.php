<?php

class AvailabilityController extends Controller
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
				'actions'=>array('create','update', 'property', '_calendar'),
				'roles'=>array(Users::ROLE_OWNER),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array(Users::ROLE_ADMIN),
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
		$model=new RoomAvailability;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomAvailability']))
		{
			$model->attributes=$_POST['RoomAvailability'];
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomAvailability']))
		{
			$model->attributes=$_POST['RoomAvailability'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        /**
         * Generates HTML for calendar with events.
         * @param Room $room
         * @param type $month
         * @param type $year
         * @return string
         */
        function drawCalendar($room,$month,$year) {
            $days = array(
                'domenica',
                'lunedi',
                'martedi',
                'mercoledi',
                'giovedi',
                'venerdi',
                'sabato'
            );
            
            $running_day = date('w',mktime(0,0,0,$month,1,$year));
            $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
            $days_in_this_week = 1;
            $day_counter = 0;
            $dates_array = array();
            $calendar = '<div class="calendar-nav a-center">'
                            . '<div class="cnav-right pull-right"><a href="javascript:void(0);" onclick="nextMonth('."'cal_".$room->id."'".', '.$room->id.')"><i class="icon-adjust"></i></a></div>';
                            
            if ( date('m') == $month )
                $calendar .= '<div class="cnav-left pull-left"><a class="disabled" href="javascript:void(0);"><i class="icon-adjust"></i></a></div>';
            else
                $calendar .= '<div class="cnav-left pull-left"><a class="" href="javascript:void(0);" onclick="lastMonth('."'cal_".$room->id."'".', '.$room->id.')"><i class="icon-adjust"></i></a></div>';
                
                    
                $calendar .= '<span class="month">'.date('F',  mktime(0,0,0,$month,1,$year)).'</span>'
                    .'<span class="year">'.$year. '</span>'
                      . '</div>';
            $calendar .= '<div class="main-calendar" id="cal_'.$room->id. '" data-year="'.$year.'" data-month="'.$month. '">';
                $calendar.= '<div class="mc-head c-days">';
                    foreach ($days as $day) {
                        $calendar .= sprintf('<div class="cell">%s</div>', $day);
                    }
                $calendar .= '</div>';
                
                $calendar .= '<div class="mc-body c-dates">';
                    // Empty Day padding.
                    for($x = 0; $x < $running_day; $x++):
                            $calendar.= '<div class="cell blank">&nbsp;</div>';
                            $days_in_this_week++;
                    endfor;
                    
                    for($list_day = 1; $list_day <= $days_in_month; $list_day++):
                            $calendar.= '<div class="cell available">';
                                    /* add in the day number */
                                    $calendar.= '<div class="date">'.$list_day.'</div>';
                                    $calendar .= '<div class="input-box">
                                                        <input type="hidden" name="Availability['.$room->id. ']['.$list_day. '][is_available]" value="0" />
                                                        <input type="text" maxlength="3" readonly class="input-field small _offer_' .$room->id.'_'.$list_day. '" name="Availability['.$room->id. ']['.$list_day. '][price]" value="'.$room->price. '" />
                                                </div>
                                                <div class="input-box">
                                                <input type="checkbox" class="checkbox" onclick="enableOffer('.$room->id.', '.$list_day.');">
                                                <label>Offerta</label>';
                                    /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
                                    //$calendar.= str_repeat('<p> </p>',2);
                                $calendar.= '</div>';
                            $calendar.= '</div>';
                            if($running_day == 6):
                                    $running_day = -1;
                                    $days_in_this_week = 0;
                            endif;
                            $days_in_this_week++; $running_day++; $day_counter++;
                    endfor;
                    //echo $day_counter; exit;
                    if($days_in_this_week < 8):
                        for($x = 1; $x <= (8 - $days_in_this_week); $x++):
                                $calendar.= '<div class="cell blank">&nbsp;</div>';
                        endfor;
                    endif;
                $calendar .= '</div>';
            $calendar .= '</div>';
            
            return $calendar;
        }
        
        public function action_calendar() {
            $room = $_GET['room'];
            $month = $_GET['month'];
            $year = $_GET['year'];
            $room = Room::model()->findByPk($room);
            echo $this->drawCalendar($room, $month, $year);
        }
        
        public function actionProperty($id) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('property_id = '.$id);
            $dataProvider=new CActiveDataProvider(
                    'Room',
                    array(
                        'criteria' => $criteria
                    )
            );
            
            //$this->drawCalendar(date('m'), date('Y'));
            
            /*
             * $calendar = array();
            
            $start = 1;
            $end = date('t');
            $month = date('m');
            $year = date('Y');
            for ( $i = $start; $i <= $end; $i++) {
                $date = sprintf('%d-%d-%d', $i, $month, $year);
                $stamp = strtotime($date);
                $day = date('D', $stamp);
                $calendar[$day][] = array(
                    'day' => $i,
                    'month' => $month,
                    'year' => $year
                );
            }
            $sorted = array();
            // Sorry but our week starts with Monday :-) . Lets sort (manually)
            $sorted['Mon'] = $calendar['Mon'];
            $sorted['Tue'] = $calendar['Tue'];
            $sorted['Wed'] = $calendar['Wed'];
            $sorted['Thu'] = $calendar['Thu'];
            $sorted['Fri'] = $calendar['Fri'];
            $sorted['Sat'] = $calendar['Sat'];
            $sorted['Sun'] = $calendar['Sun'];
             */
            
            $this->render('property',array(
                'dataProvider'  =>  $dataProvider
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
		$dataProvider=new CActiveDataProvider('RoomAvailability');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RoomAvailability('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RoomAvailability']))
			$model->attributes=$_GET['RoomAvailability'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RoomAvailability the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RoomAvailability::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RoomAvailability $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-availability-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
