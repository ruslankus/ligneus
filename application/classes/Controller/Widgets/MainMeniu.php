<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_MainMeniu extends Controller_Widgets{
    
     public $template = 'widgets/w_mainmenu';
    
    public function action_index(){
        
        $pages = ORM::factory('Page')->find_all();
        
        $categories = ORM::factory('Category')->find_all();
        
        $this->template->pages = $pages;
        $this->template->categories = $categories;
    }
   
    
}