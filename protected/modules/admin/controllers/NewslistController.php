<?php
/**
 * Created by JetBrains PhpStorm.
 * User: megakuzmitch
 * Date: 25.12.13
 * Time: 18:39
 * To change this template use File | Settings | File Templates.
 */

class NewslistController extends AdminController
{
    public function actionCreate()
    {
        $model = new Newslist;
        $model->page_size = 5;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/newslist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Newslist', $id);
        $newsFinder = new News('search');
        $newsFinder->unsetAttributes();
        if ( isset($_GET['News']) ) {
            $newsFinder->attributes = $_GET['News'];
        }
        $newsFinder->id_list = $model->id;

        if(isset($_POST['Newslist']))
        {
            $model->attributes = $_POST['Newslist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'newsFinder' => $newsFinder
        ));
    }
}