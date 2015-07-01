<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Categories extends Controller_Index {
    
    public function before(){
        parent::before();
        
        $this->template->styles[] = 'media/css/lightbox.css';
        
        $this->template->scripts[] = 'media/js/plugin_cat_wondows.js';        
        $this->template->scripts[] = 'media/js/lightbox.js';        
    }
    
    
    public function action_index(){
        
        $id = $this->request->param('cat_alias');  
        $cat = ORM::factory('Category',$id);
        
        $suff = $cat->cat_title_en;
        $this->template->styles[] = 'media/css/'.$suff.'_plugin_style.css';
        
        $plugin = Widget::load('Plugin'.$suff);
        $this->template->slider_plugin = $plugin;
        
        
        
        $products = $cat->products->find_all();
        $examples = $cat->examples->limit(5)->find_all();
        
        $wood_colors = Widget::load('WoodColors');
        $glass_colors = Widget::load('GlassColors');
        
        $content = View::factory('index/category/v_category');
        $content->set('cat',$cat);
        $content->set('products',$products);
        $content->set('wood_colors',$wood_colors);
        $content->set('glass_colors',$glass_colors);
        $content->set('examples',$examples);
        
        $this->template->title = $cat->cat_title_ru;
        
        if($cat->title_head){
            $this->template->title_head = $cat->title_head;
        }
        
        if($cat->seo_snippet){
            $this->template->seo_snippet = $cat->seo_snippet;
        }
        
        if($cat->keywords){
            $this->template->keywords = $cat->keywords;
        }
        
        $this->template->content = $content;
    }
}