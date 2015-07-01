<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Contacts extends Controller_Index {
    
    public function action_index(){
        
        $data_settings = ORM::factory('Setting',1);
        $data = ORM::factory('Page')->where('title_en','=','contacts')->find();
        
        $content = View::factory('index/contacts/v_contacts');
        $content->set('data',$data_settings);
        
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