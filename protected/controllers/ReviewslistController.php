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

	
	public function actionView($url = 'otzivi')
    {
		//Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/bootstrap.js', CClientScript::POS_END);
		
		
        $node = Structure::model()->findByUrl($url);
        if ( !$node )
            throw new CHttpException(404, 'Новостей не найдено');
        $reviewslist = $node->getComponent();
        $dataProvider = $reviewslist->reviewsSearch();

       // $this->buildMenu($node);
        $this->breadcrumbs = $node->getBreadcrumbs();

        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title.' | '.Yii::app()->config->get('app.name');
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

        $this->render('/reviews/index', array(
            'dataProvider'=>$dataProvider,
            'node'=>$node
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
