<?php defined('SYSPATH') or die('No direct script access.');

 abstract class Controller_Base extends Controller_Template {
    
    protected $auth;
    protected $user;
    
    public function before(){
        parent::before();
        
        $this->auth = Auth::instance();
        $this->user = $this->auth->get_user();

            
        $this->template->title = null;
        $this->template->title_head = null;
        //Подключаем блоки
        $this->template->infomenu = null;
        $this->template->main_menu = null;
        $this->template->menu_block = null;
        $this->template->left_block = null;
        $this->template->slider_block = null;
        
        $this->template->right_block = null;
        $this->template->center_block = null;

    }
    
}