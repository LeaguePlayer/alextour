<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends Controller
{
    public $layout='//layouts/simple';
    public $menu=array();
    public $breadcrumbs=array();

    public function init() {
        parent::init();
        $this->title = Yii::app()->name;
    }

    //Check home page
    public function is_home(){
        return $this->route == 'site/index';
    }

    public function beforeRender($view)
    {
		$this->buildMenu();
        $this->renderPartial('//layouts/clips/_main_menu');
		//Yii::app()->getComponent('bootstrap')->register();
        return parent::beforeRender($view);
    }

    public function buildMenu($parent = null)
    {
        if ( !$parent )
            $parent = Menu::model()->roots()->find();
			
        $this->menu = Menu::model()->getMenuList(1, $parent);
    }
    
}