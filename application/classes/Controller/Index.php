<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Index extends Controller_Base {
    
    public $template = 'index/v_base';
    
    public function before(){
        parent::before();
        
        $meniu_main = Widget::load('MainMeniu');        
        
        //Установка начальных настроек
        $setting = ORM::factory('Setting',1);
        
        $this->template->seo_snippet = $setting->seo_snippet;
        $this->template->keywords = $setting->keywords;
        $this->template->title_head = $setting->main_head;
        $this->template->email = $setting->email;
        
        // подключаем стили и скрипты
        $this->template->styles = array('media/css/style.css');
        $this->template->scripts = array('media/js/jquery-1.7.2.min.js','media/js/menu.js',);
        
        $this->template->meniu_main = $meniu_main;
    }
    
    
    
    
}