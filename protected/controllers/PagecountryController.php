<?php

class PagecountryController extends FrontController
{
	public $layout='//layouts/simple';

	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionView($country_title, $id_page)
	{
		$model = Pagecountry::model()->findByPk($id_page);
		if( ! $model )
			 throw new CHttpException(404, 'Новостей не найдено');
		
		$this->breadcrumbs=array(
						"{$country_title}"=>array('/country'),
						"{$model->title}",
					);

		
		$this->render('view',array(
			'model'=>$model,
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pagecountry');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
