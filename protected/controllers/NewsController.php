<?php

class NewsController extends FrontController
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

	
	public function actionView($id, $newsPage = null)
    {
        $model = $this->loadModel('News', $id);
        $newslist = $model->list;
        $node = $newslist->node;

        $breadcrumbs = $node->getBreadcrumbs();
        array_pop($breadcrumbs);
        $breadcrumbs[$node->name] = $node->getUrl();
        $breadcrumbs[] = $model->title;

        $this->buildMenu($node);
        $this->breadcrumbs = $breadcrumbs;

        if ( !empty($model->seo->meta_title) )
            $this->title = $model->seo->meta_title.' | '.Yii::app()->config->get('app.name');
        else
            $this->title = $model->title.' | '.Yii::app()->config->get('app.name');

        Yii::app()->clientScript->registerMetaTag($model->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($model->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

        $this->render('view', array(
            'model'=>$model,
            'node'=>$node,
            'newsPage'=>$newsPage
        ));
    }

	
	public function actionIndex()
	{
		
		
		
		$node = Structure::model()->findByUrl('news');
        if ( !$node )
            throw new CHttpException(404, 'Новостей не найдено');
        $newslist = $node->getComponent();
		
		
        $dataProvider = $newslist->newsSearch();
		
        //$this->buildMenu($node);
        $this->breadcrumbs = $node->getBreadcrumbs();

        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

        $this->render('index', array(
            'dataProvider'=>$dataProvider,
            'node'=>$node
        ));
	}
}
