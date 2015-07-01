<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_About extends Controller_Admin {
    
    public function before(){
        
        parent::before();       
        
        $this->template->scripts = array('media/js/jquery-1.7.2.min.js','media/tinymce/tinymce.min.js','media/js/edit_tech.js');
        $this->template->submenu = Widget::load('SubMenuMain');
    }
    
    
    public function action_index(){
        
        $data = ORM::factory('Page')->where('title_en','=','about')->find()->as_array();
        
        $id = $data['id'];
        
       
        if(isset($_POST['submit'])){
            
            $data = Arr::extract($_POST,array('text','seo_snippet','keywords','title_ru'));
            
            try{
                                
                $page = ORM::factory('Page',$id);
                $page->values($data);
                $page->save();
                
                Controller::redirect('admin/about');
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
            
           
        }
        
        
        $content = View::factory('admin/about/v_about_edit');
        $content->bind('errors',$errors);
        $content->bind('data',$data);
        
        $this->template->page_title = 'Страница о нас';
        $this->template->block_center = array($content);
        
    }
    
}