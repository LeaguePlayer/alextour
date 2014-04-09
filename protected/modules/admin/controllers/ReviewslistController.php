<?php

class ReviewslistController extends AdminController
{
	public function actionCreate()
    {
        $model = new Reviewslist;
       // $model->page_size = 5;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/reviewslist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Reviewslist', $id);
        $reviewsFinder = new Reviews('search');
        $reviewsFinder->unsetAttributes();
        if ( isset($_GET['Reviews']) ) {
            $reviewsFinder->attributes = $_GET['Reviews'];
        }
		//var_dump($reviewsFinder);die();
        $reviewsFinder->id_list = $model->id;

        if(isset($_POST['Reviewslist']))
        {
            $model->attributes = $_POST['Reviewslist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'reviewsFinder' => $reviewsFinder
        ));
    }
}
