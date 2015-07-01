<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widgets_News extends Controller_Widgets{
    
    public $template = 'widgets/w_news';
    
    public function action_index(){
        
        $news = ORM::factory('New')->limit(2)->order_by('id','DESC')->find_all();
        
        $this->template->news = $news;
    }
}