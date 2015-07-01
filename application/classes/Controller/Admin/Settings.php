<?php defined('SYSPATH') or die('No direct script access.');
/*
 * 
 */
class Controller_Admin_Settings extends Controller_Admin {
    
   public function before(){
        parent::before();
      
        $this->template->submenu = null;
   }
   
   
   public function action_index(){        
        
        $data = ORM::factory('Setting',1)->as_array();
               
        if(isset($_POST['submit'])){
            
            $data = Arr::extract($_POST,array('site_name','seo_snippet','site_keywords','email'));
                    
            try{
                
                $options = ORM::factory('Setting',1);
                $options->values($data);
                $options->save();
                               
                Controller::redirect('admin/settings');                
            }
            catch(ORM_Validation_Exception $e){
                
                $errors = $e->errors('validaion');
            }    
        }        
        
        $content = View::factory('admin/settings/v_settings_index');
        $content->bind('data',$data);        
        
        $this->template->page_title = 'Настройки';
        $this->template->block_center = array($content,);         
   }    
}