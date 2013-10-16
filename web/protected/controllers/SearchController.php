<?php

class SearchController extends Controller
{
    
    public $layout = '//layouts/clean';
    
	public function actionIndex()
	{
            $params = array();
            $criteria = new CDbCriteria();
            // If property type defined
            if (isset($_GET['establishment']) && $_GET['establishment'] != '*') {
                $criteria->addCondition('type = :type','OR');
                $params[':type'] = $_GET['establishment'];
            }
            
            // If keyword defined
            if ( !empty($_GET['kw'])) {
                $criteria->addSearchCondition('title', $_GET['kw'],true,'AND');
            }
            
            // Price range filter.
            if ( isset($_GET['price_range'])) {
                $values = explode(',', $_GET['price_range']);
                $criteria->addBetweenCondition('base_price', $values[0], $values[1]);
                
            }
            
            if ( isset($_GET['people']) && $_GET['people'] != '6+') {
                $people = $_GET['people'];
                $criteria->addCondition('people_min <= :people');
                $criteria->addCondition('people_max >= :people');
                $params[':people'] = $people;
            }
            
            $criteria->params = array_merge($criteria->params,$params);
            
            //$criteria->addSea
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