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

	
	public function actionView($country_title, $id_page, $return_to_news = false, $country = false)
	{
		
		
		$model = Pagecountry::model()->findByPk($id_page);
		if( ! $model )
			 throw new CHttpException(404, 'Новостей не найдено');
		
		//$part_breadcrumbs = ($return_to_news) ? array("Новости"=>array('/newslist/news')) : array("{$country_title}"=>array('/country'));
		
		if($return_to_news)
		{
			if($country)
				$breadcrumbs =  array("Новости"=>array("/newslist/view/url/news/country/{$country}"),
								  "{$model->title}",
								 );
			else
				$breadcrumbs =  array("Новости"=>array('/newslist/news'),
								  "{$model->title}",
								 );
			
			
								 
								 
				
		}
				else
					$breadcrumbs =  array("{$country_title}"=>array('/country'),
								  "{$model->title}",
								 );
		
		
		$this->breadcrumbs = $breadcrumbs;

		
		$this->render('view',array(
			'model'=>$model,
			'return_to_news'=>$return_to_news,
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
