<?php

class CountryController extends AdminController
{
	public function actionCreate($list_id)
    {
        $model = new Country();
        $model->id_list = $list_id;
        $model->create_time = date('d-m-Y');

        if(isset($_POST['Country']))
        {
            $model->attributes = $_POST['Country'];
            $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/countrylist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Country', $id);
        if(isset($_POST['Country']))
        {
            $model->attributes = $_POST['Country'];
          //  $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/countrylist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('update', array('model' => $model));
    }
	
	public function actionList($id)
	{
		// countrylist =  country
		// country = pagecountry
		$model = $this->loadModel('Country', $id);
        $pagecountryFinder = new Pagecountry('search');
        $pagecountryFinder->unsetAttributes();
        if ( isset($_GET['Country']) ) {
            $pagecountryFinder->attributes = $_GET['Country'];
        }
        $pagecountryFinder->id_country = $model->id;

        if(isset($_POST['Pagecountry']))
        {
            $model->attributes = $_POST['Country'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('list', array(
            'model' => $model,
            'pagecountryFinder' => $pagecountryFinder
        ));	
	}
}
