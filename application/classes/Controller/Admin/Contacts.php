<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Contacts extends Controller_Admin {
    
    
    public function before(){
        
        parent::before();       
        
        $this->template->scripts = array('media/js/jquery-1.7.2.min.js','media/tinymce/tinymce.min.js','media/js/edit_tech.js');
        $this->template->submenu = Widget::load('SubMenuMain');
    }
    
    public function action_index(){
        
        $data_pages = ORM::factory('Page')->where('title_en','=','contacts')->find()->as_array();
        $id = $data_pages['id'];
        
        $data_contacts = ORM::factory('Setting',1)->as_array();
        
         if(isset($_POST['submit'])){
            
            $data_pages = Arr::extract($_POST,array('seo_snippet','keywords','title_head'));
            $data_contacts = Arr::extract($_POST,array('main_adress','branch_adress'));
            
            try{
                
                
                $page = ORM::factory('Page',$id);
                $page->values($data_pages);
                $page->save();
                
                $contacts = ORM::factory('Setting',1);
                $contacts->values($data_contacts);
                $contacts->save();
                
                Controller::redirect('admin/contacts');
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
            
           
        }
        
        $content = View::factory('admin/contacts/v_contacts_edit');
        $content->bind('errors',$errors);
        $content->bind('data_pages',$data_pages);
        $content->bind('data_contacts',$data_contacts);
        
        $this->template->page_title = 'Контакты';
        $this->template->block_center = array($content);
    }
}