<?php

class ReviewslistController extends FrontController
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

	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel('Reviewslist', $id),
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Reviewslist');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
