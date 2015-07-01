<?php defined('SYSPATH') or die('No direct script access.');


/**
 *  Базовый класс  админки
 */
 
 abstract class Controller_Admin extends Controller_Base {
    
        public $template = 'admin/v_base';
        
        public function before(){
            
            parent::before();
            
            if(!$this->auth->logged_in('admin')){
                Controller::redirect('Auth');
            } 

            
            $menu_admin = Widget::load('menuadmin');
            
            
            
            
            // Вывод в шаблон
            $this->template->site_name = null;
               
            $this->template->styles = array('media/css/style_adm_first.css',);
            $this->template->styles[] = 'media/css/style_admin.css';
            $this->template->scripts = array('media/js/jquery-1.7.2.min.js');
            $this->template->menu_admin = $menu_admin; 
            $this->template->page_title = null;
        }
        
        protected function _diverseArray($vector)// Функция сортировки массива $_FILES
        { 
           $my_files = array(); 
        
        
            foreach ($vector['images']['error'] as $key => $error) { 
                $my_files[$key]['name'] = $vector['images']['name'][$key]; 
                $my_files[$key]['type'] = $vector['images']['type'][$key]; 
                $my_files[$key]['tmp_name'] = $vector['images']['tmp_name'][$key]; 
                $my_files[$key]['error'] = $vector['images']['error'][$key]; 
                $my_files[$key]['size'] = $vector['images']['size'][$key]; 
            }
            
            return $my_files; 
        }// end _diverseArray
        
         protected function _prod_image_upload($file, $ext = null, $directory = null){
            
            if($ext == 'image/png'){
                $ext = 'png';
            }
            else{
                $ext = 'jpg';
            }
            
            if($directory == null){
                $directory = 'media/uploads';
            }
            
            //Случайное значение
            $symbols = '0123456789abcdefghijklmopqrstuvwxyz';            
            $filename = '';
            
            for($i=0; $i < 7; $i++){                
                $filename .= rand(1, strlen($symbols));
            }  
            
            $img = Image::factory($file);
            
            if($img->height < 800 ){
                $img->resize('',800,Image::HEIGHT);
            } 
                        
            $img->save("$directory/$filename.$ext");      
            return "$filename.$ext";        
        
   }// tech image upload
   
   
   protected function _info_image_upload($file, $ext = null, $directory = null){        
        
        if($ext == 'image/png'){
            $ext = 'png';
        }
        else{
            $ext = 'jpg';
        }
        
        if($directory == null){
            $directory = 'media/uploads';
        }
        
        //Случайное значение
        $symbols = '0123456789abcdefghijklmopqrstuvwxyz';        
        $filename = '';
        
        for($i=0; $i < 7; $i++){            
            $filename .= rand(1, strlen($symbols));
        }  
        
        $img = Image::factory($file);
        
        if($img->width > 260  ){
            $img->resize(260);
        }
                
        $img->save("$directory/$filename.$ext");      
        return "$filename.$ext";        
        
   }// image info_img upload
   
   protected function _gal_image_upload($file, $ext = null, $directory = null){
        
         if($ext == 'image/png'){
            $ext = 'png';
        }
        else{
            $ext = 'jpg';
        }
        
        if($directory == null){
            $directory = 'media/uploads';
        }
        
        //Случайное значение
        $symbols = '0123456789abcdefghijklmopqrstuvwxyz';
        
        $filename = '';
        
        for($i=0; $i < 7; $i++){
            
            $filename .= rand(1, strlen($symbols));
        }  
        
        $img = Image::factory($file);
        
        if($img->width > 630  ){
            $img->resize(630);
        }        
        
        $img->save("$directory/$filename.$ext");   
        return "$filename.$ext";
    }// end gal image upload
    
    
    protected function _banner_image_upload($file, $ext = null, $directory = null){        
        
        if($ext == 'image/png'){
            $ext = 'png';
        }
        else{
            $ext = 'jpg';
        }
        
        if($directory == null){
            $directory = 'media/uploads';
        }
        
        //Случайное значение
        $symbols = '0123456789abcdefghijklmopqrstuvwxyz';
        
        $filename = '';
        
        for($i=0; $i < 7; $i++){
            
            $filename .= rand(1, strlen($symbols));
        }        
      
        $img = Image::factory($file);
        
        if($img->width > 960){
            $img->resize(960);
        }
        
        $img->save("$directory/$filename.$ext");      
        
        return "$filename.$ext";        
        
   }// banner image upload
    
}// end class Admin