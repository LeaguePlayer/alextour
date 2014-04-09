<?php

class SpecialController extends AdminController
{
	public function actionCreate($list_id)
    {
        $model = new Special();
        $model->id_list = $list_id;
        $model->create_time = date('d-m-Y');

        if(isset($_POST['Special']))
        {
            $model->attributes = $_POST['Special'];
            $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/speciallist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Special', $id);
        if(isset($_POST['Special']))
        {
            $model->attributes = $_POST['Special'];
          //  $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/speciallist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('update', array('model' => $model));
    }
}
