<?php

class SubscribesController extends FrontController
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
				'actions'=>array('invite'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionInvite()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			
		     if( isset($_POST['data']) )
				{
					$message = "";
					$model = new Subscribes;
					$model->attributes = $_POST['data'];
					$model->status = 0;
					
					if($model->save())
					{
							//	if($model->name) $message .="Имя: {$model->name}<br>";
								
								if($model->email) $message .="Получена новая подписка на сайте: {$model->email}<br><br>";
								
								
									$date = date('d.m.Y H:i');
									$message .="Время подписки: {$date}<br>";	
								
		
		
								if(SiteHelper::sendMail("Ура! Новая подписка на сайте",$message,"minderov@amobile-studio.ru","minderov@amobile-studio.ru")) 
						echo CJSON::encode("OK");
					}
					else
					{
						//print_r($model->getErrors());
						echo CJSON::encode($model->getErrors());	
					}
				}
		}
		
	}

	
}
