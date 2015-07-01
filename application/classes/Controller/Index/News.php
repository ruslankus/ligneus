<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_News extends Controller_Index {
    
    public function action_index(){
        
        $news = ORM::factory('New')->find_all();
        
        $content = View::factory('index/news/v_all_news');
        $content->set('news',$news);
        
        $this->template->content = $content;
        
    }
    
    public function action_get_news(){
        
        $id = $this->request->param('id');
        
        $news = ORM::factory('New',$id);
        
        $content = View::factory('index/news/v_single_news');
        $content->set('news',$news);
        
        $this->template->content = $content;
    }
    
}