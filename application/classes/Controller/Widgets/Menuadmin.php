<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_Menuadmin extends Controller_Widgets{
    
    public $template = 'widgets/w_menuadmin';
    
    public function action_index(){
                   
       $select = Request::initial()->controller();
       $select = strtolower($select);       
        
        $menu = array(
            'Страницы' => array('main'),
            'Продукты' => array('products'),           
            'Настройки' => array('settings'),        
        );
        
        $this->template->menu = $menu;
        $this->template->select = $select;    
        
    }
}