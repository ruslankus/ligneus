<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Main extends Controller_Admin {
    
    public function before(){
        
        parent::before();       
        
        $this->template->scripts = array('media/js/jquery-1.7.2.min.js','media/tinymce/tinymce.min.js','media/js/edit_tech.js');
        $this->template->submenu = Widget::load('SubMenuMain');
    }
    
    
    public function action_index(){
        
        Controller::redirect('admin/news');
    }
}
    