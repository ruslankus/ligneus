<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_About extends Controller_Index {
    
    
    public function action_index(){
        
        $video = Widget::load('AboutVideo');
        
        $data = ORM::factory('Page')->where('title_en','=','about')->find();
        
        $this->template->slider_plugin = $video;       
        
        $content = View::factory('index/about/about');
        $content->set('data',$data);
        
        $this->template->title = $data->title_ru;
        
        if($data->title_head){
            $this->template->title_head = $data->title_head;
        }
        
        if($data->seo_snippet){
            $this->template->seo_snippet = $data->seo_snippet;
        }
        
        if($data->keywords){
            $this->template->keywords = $data->keywords;
        }
        
        $this->template->content = $content;
    }
}