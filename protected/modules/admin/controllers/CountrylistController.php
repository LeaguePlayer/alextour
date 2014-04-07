<?php

class CountrylistController extends AdminController
{
	public function actionCreate()
    {
        $model = new Countrylist;
       // $model->page_size = 5;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/countrylist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
		
        $model = $this->loadModel('Countrylist', $id);
        $countryFinder = new Country('search');
        $countryFinder->unsetAttributes();
        if ( isset($_GET['Country']) ) {
            $countryFinder->attributes = $_GET['Country'];
        }
        $countryFinder->id_list = $model->id;

        if(isset($_POST['Countrylist']))
        {
            $model->attributes = $_POST['Countrylist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'countryFinder' => $countryFinder
        ));
    }
}
