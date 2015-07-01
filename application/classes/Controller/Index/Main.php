<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Main extends Controller_Index {
    
    
    
    public function action_index(){
        
        $this->template->scripts[] = 'media/js/slider.js';
        
        $data = ORM::factory('Page')->where('title_en','=','main')->find();
        
        $slider = Widget::load('Slider');
        $this->template->slider_plugin = $slider;
        
        $news = Widget::load('News');
        $adress = ORM::factory('Setting',1)->main_adress;
        
        $content = View::factory('index/main/v_main');
        $content->set('news',$news);
        $content->set('adress',$adress);
        
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