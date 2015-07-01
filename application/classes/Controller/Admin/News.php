<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Admin_News extends Controller_Admin {
    
    public function before(){
        parent::before();
        
        $this->template->scripts = array('media/js/jquery-1.7.2.min.js','media/tinymce/tinymce.min.js','media/js/edit_tech.js');
        $this->template->submenu = Widget::load('SubMenuMain');
    }
    
    
    public function action_index(){
        
        $all_news = ORM::factory('New')->find_all();
        
        
        $content = View::factory('admin/news/v_news_index');
        $content->set('all_news',$all_news);
        
        $this->template->block_center = array($content);
        
    }
    
    public function action_add(){
        
        if(isset($_POST['submit'])){
            
            $post = Arr::extract($_POST,array('news_date','news_title','news_text'));
            
            
            
            try{
                
                $news = ORM::factory('New');
                $news->values($post);
                $news->save();
                
                Controller::redirect('admin/news');
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validaton');
            }
        }
        
        $content = View::factory('admin/news/v_news_add');
        $content->bind('errors',$errors);
        $content->bind('post',$post);        
        $this->template->block_center = array($content);
    }//  end add
    
    
    public function action_edit(){
        
        $id = $this->request->param('id');
        
        $post = ORM::factory('New',$id)->as_array();
        
        if(isset($_POST['submit'])){
            
            $post = Arr::extract($_POST,array('news_date','news_title','news_text'));
            
            
            
            try{
                
                $news = ORM::factory('new',$id);
                $news->values($post);
                $news->save();
                
                Controller::redirect('admin/news');
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validaton');
            }
        }
        
        
        $content = View::factory('admin/news/v_news_edit');
        $content->bind('errors',$errors);
        $content->bind('news',$post);
        
        $this->template->block_center = array($content);
        
    }// end edit
    
    public function action_delete(){
        
          $id = $this->request->param('id');    
            
        $post = ORM::factory('New',$id);
        if(!$post->loaded()){
            Controller::redirect('admin/news');
        }
        $post->delete();
        Controller::redirect('admin/news');  
    } // end delete
    
}// end class