<?php

class ReviewsController extends FrontController
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
				'actions'=>array('index','view','addreview'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionAddReview()
	{
		if( isset($_POST['data']) )
		{
			$model = new Reviews;
			$model->attributes = $_POST['data'];
			
			if($model->save())
			{
						if($model->name) $message .="Имя: {$model->name}<br>";
						//if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
						if($model->rating) $message .="Оценка: {$model->rating}<br>";
						if($model->review) $message .="Комментарий: {$model->review}<br>";
						if($model->create_time) 
						{
							$date = date('d.m.Y H:i',strtotime($model->create_time));
							$message .="Время заявки: {$date}<br>";	
						}


						if(SiteHelper::sendMail("Получен новый отзыв на сайте!",$message,"minderov@amobile-studio.ru","minderov@amobile-studio.ru")) echo CJSON::encode("send"); else echo CJSON::encode("fail");
				
			}
			else
			{
				//print_r($model->getErrors());
				echo CJSON::encode($model->getErrors());	
			}
		}
	}

	
	public function actionView($id)
	{
		$model = $this->loadModel('Reviews', $id);
		if ( !$model )
			throw new CHttpException(404, 'Новостей не найдено');
			
		
			
		$this->breadcrumbs=array(
						"{$model->reviewslist->node->name}"=>$model->reviewslist->node->getUrl(),
						"{$model->title}",
					);
					
		$this->render('view',array(
			'model'=>$model,
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Reviews');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
