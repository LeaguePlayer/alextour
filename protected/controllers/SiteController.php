<?php

class SiteController extends FrontController
{
	public $layout = '//layouts/simple';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function actionFeedback()
	{
		if( isset($_POST['data']) )
		{
			
			$model = new Orders;
			$model->attributes = $_POST['data'];
			$model->status = 0;
			
			if($model->save())
			{
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
						//if($model->rating) $message .="Оценка: {$model->rating}<br>";
						if($model->comment) $message .="Комментарий: {$model->comment}<br>";
						//$message.="{$model->create_time}";
					//	$message.="http://{$_SERVER['SERVER_NAME']}/admin/reviews/update/id/{$model->id}/list_id/{$model->id_list}";
						
							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	
						


						if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,Yii::app()->config->get('app.email'),"no-reply@alextour72.ru")) 
				echo CJSON::encode("OK");
			}
			else
			{
				//print_r($model->getErrors());
				echo CJSON::encode($model->getErrors());	
			}
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		$this->initGoogleMap();
        $this->title = Yii::app()->config->get('app.name');
		
		$data = array();
		
		$node = Structure::model()->findByUrl('main');
        if ( !$node )
            throw new CHttpException(404, 'Новостей не найдено');
       
		
        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
		
		// get partners
		$data['partners'] = Partners::model()->findAll("status=:status", array(':status'=>Partners::STATUS_PUBLISH));
		
		$this->render('index', array('data'=>$data));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}