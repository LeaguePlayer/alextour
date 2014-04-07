<?php

class NewsController extends AdminController
{
	public function actionCreate($list_id)
    {
		$data = array();
        $model = new News();
        $model->id_list = $list_id;
        $model->create_time = date('d-m-Y');
		
		$data['country'][0] = "Не указана страна"; 
		
		$model_country = Country::model()->findAll( array( 'condition'=>'status = :status', 'order'=>'id DESC' , 'params'=>array( ':status'=>Country::STATUS_PUBLISH ) ) );
		
		foreach ( $model_country as $country )
			$data['country'][$country->id] = $country->title; 

        if(isset($_POST['News']))
        {
            $model->attributes = $_POST['News'];
            $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/newslist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('create', array('model' => $model, 'data'=>$data));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('News', $id);
		
		$data['country'][0] = "Не указана страна"; 
		
		$model_country = Country::model()->findAll( array( 'condition'=>'status = :status', 'order'=>'id DESC' , 'params'=>array( ':status'=>Country::STATUS_PUBLISH ) ) );
		
		foreach ( $model_country as $country )
			$data['country'][$country->id] = $country->title; 
			
		
			
        if(isset($_POST['News']))
        {
            $model->attributes = $_POST['News'];
          //  $model->create_time = date('Y-m-d', strtotime($model->create_time));
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/newslist/update', 'id'=>$model->id_list));
            }
        }
        $this->render('update', array('model' => $model, 'data'=>$data));
    }
}