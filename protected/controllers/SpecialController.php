<?php

class SpecialController extends FrontController
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
		$model = $this->loadModel('Special', $id);
		if ( !$model )
			throw new CHttpException(404, 'Новостей не найдено');
			
		
			
		$this->breadcrumbs=array(
						"{$model->speciallist->node->name}"=>$model->speciallist->node->getUrl(),
						"{$model->title}",
					);
					
		$this->render('view',array(
			'model'=>$model,
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Special');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
