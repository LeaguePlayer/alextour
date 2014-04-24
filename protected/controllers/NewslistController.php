<?php

class NewslistController extends FrontController
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

	
	public function actionView($url = 'news', $country = false)
    {
		
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/bootstrap.js', CClientScript::POS_END);
		
		if($country)
		{
			$country_model = Country::model()->find( "LOWER(title) = :country", array(':country'=>mb_strtolower($country, 'UTF-8')) );
			$id_country =  (is_object($country_model)) ? $country_model->id : 0;
		}
		
		
        $node = Structure::model()->findByUrl($url);
        if ( !$node )
            throw new CHttpException(404, 'Новостей не найдено');
        $newslist = $node->getComponent();
        $dataProvider = $newslist->newsSearch(null, $id_country);

        $this->buildMenu($node);
		
		if($country)
		{
			$this->breadcrumbs = array(
									"Страны мира"=>array("/countrylist/strani-mira"),
								    "Новости {$country_model->title}",
								 );
		}
		else
        	$this->breadcrumbs = $node->getBreadcrumbs();

        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

        $this->render('/news/index', array(
            'dataProvider'=>$dataProvider,
            'node'=>$node,
			'country'=>$country,
        ));
    }


	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Newslist');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
