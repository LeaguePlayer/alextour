<?php

class SubscribesController extends AdminController
{
	public function actionExcel()
	{
		$models = Subscribes::model()->findAll( array("order"=>'id DESC') );
		
		if( count( $models ) > 0 )
		{
			foreach ($models as $model)
			{
				echo "{$model->email}<br>";	
			}
		}
	}	
}
