<?php

class PagecountryController extends AdminController
{
	public function actionCreate($id_country)
    {
        $model = new Pagecountry();
        $model->id_country = $id_country;
        $model->create_time = date('d-m-Y');

        if(isset($_POST['Pagecountry']))
        {
            $model->attributes = $_POST['Pagecountry'];
            $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/country/list', 'id'=>$model->id_country));
            }
        }
        $this->render('create', array('model' => $model));
    }
	
	
	public function actionUpdate($id)
    {
        $model = $this->loadModel('Pagecountry', $id);
        if(isset($_POST['Pagecountry']))
        {
            $model->attributes = $_POST['Pagecountry'];
            //$model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/country/list', 'id'=>$model->id_country));
            }
        }
        $this->render('update', array('model' => $model));
    }
}
