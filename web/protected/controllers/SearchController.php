<?php

class SearchController extends Controller
{
    
    public $layout = '//layouts/clean';
    
	public function actionIndex()
	{
            $criteria = new CDbCriteria();
            $total = Property::model()->count();
            
            $pages = new CPagination($total);
            $pages->pageSize = 1;
            $pages->applyLimit($criteria);
            
            $records = Property::model()->findAll($criteria);
            
            
            $this->render('index',
                    array(
                        'pages' => $pages,
                        'records' => $records
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}