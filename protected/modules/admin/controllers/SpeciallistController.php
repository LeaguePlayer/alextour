<?php

class SpeciallistController extends AdminController
{
	public function actionCreate()
    {
        $model = new Speciallist;
       // $model->page_size = 5;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/speciallist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Speciallist', $id);
        $specialFinder = new Special('search');
        $specialFinder->unsetAttributes();
        if ( isset($_GET['Special']) ) {
            $specialFinder->attributes = $_GET['Special'];
        }
		//var_dump($SpecialFinder);die();
        $specialFinder->id_list = $model->id;

        if(isset($_POST['Speciallist']))
        {
            $model->attributes = $_POST['Speciallist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'specialFinder' => $specialFinder
        ));
    }
}
