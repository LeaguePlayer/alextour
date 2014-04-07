<?php

class PartnerslistController extends AdminController
{
	public function actionCreate()
    {
        $model = new Partnerslist;
       // $model->page_size = 5;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/partnerslist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Partnerslist', $id);
        $partnersFinder = new Partners('search');
        $partnersFinder->unsetAttributes();
        if ( isset($_GET['Partners']) ) {
            $partnersFinder->attributes = $_GET['Partners'];
        }
        $partnersFinder->id_list = $model->id;

        if(isset($_POST['Partnerslist']))
        {
            $model->attributes = $_POST['Partnerslist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'partnersFinder' => $partnersFinder
        ));
    }
}
