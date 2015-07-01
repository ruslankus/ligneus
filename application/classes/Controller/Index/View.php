<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_View extends Controller_Index {
    
    public function before(){
        parent::before();
        
        $this->template->styles[] = 'media/css/lightbox.css';
        
        $this->template->scripts[] = 'media/js/lightbox.js';
        $this->template->scripts[] = 'media/js/images.js';
    }
    
    public function action_product(){
        
        $id = $this->request->param('id');
        
        $product = ORM::factory('Product',$id);
        $images = $product->images->find_all();
        
        $content = View::factory('index/view/v_product');
        $content->set('product',$product);
        $content->set('images',$images);
        
        $this->template->title = $product->title_ru;
        
        if($product->title_head){
            $this->template->title_head = $data->title_head;
        }
        
        if($product->seo_snippet){
            $this->template->seo_snippet = $data->seo_snippet;
        }
        
        if($product->keywords){
            $this->template->keywords = $data->keywords;
        }
        
        $this->template->content = $content;
    }
}