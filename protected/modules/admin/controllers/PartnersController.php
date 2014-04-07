<?php

class PartnersController extends AdminController
{
	public function actionCreate($list_id)
    {
        $model = new Partners();
        $model->id_list = $list_id;
        $model->create_time = date('d-m-Y');

        if(isset($_POST['Partners']))
        {
            $model->attributes = $_POST['Partners'];
            $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/partnerslist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Partners', $id);
        if(isset($_POST['Partners']))
        {
            $model->attributes = $_POST['Partners'];
          //  $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/partnerslist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('update', array('model' => $model));
    }
}
