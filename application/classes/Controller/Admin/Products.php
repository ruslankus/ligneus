<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Products extends Controller_Admin {
    
    public function before(){
        
        parent::before();       
        
        $this->template->scripts = array('media/js/jquery-1.7.2.min.js','media/tinymce/tinymce.min.js','media/js/edit_tech.js');
        $this->template->submenu = Widget::load('SubMenuProduct');
    }
    
    
    public function action_index(){
        
        $products = ORM::factory('Product')->find_all();
        
        $content = View::factory('admin/products/v_products_index');
        $content->set('products',$products);
        
        $this->template->block_center = array($content); 
    }// end index
    
    
    public function action_prod_add(){
        
        $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
        $this->template->scripts[] = 'media/js/upload.js';
        
        $categories = ORM::factory('Category')->find_all();        
        $cats = array();
        
        foreach($categories as $item){            
            $cats[$item->id] = $item->cat_title_ru;
        }
        
        if(isset($_POST['submit'])){
            
            $data = Arr::extract($_POST,array('title_ru','cat_id','satus','prod_intro','prod_text','seo_snippet','keywords'));
            
            try{
                          
                 if(!empty($_FILES['images']['name'][0])){
                    
                    $prod = ORM::factory('Product');
                    $prod->values($data);
                    $prod->save();
                    
                    $files = $this->_diverseArray($_FILES);
                    
                    foreach($files as $file){                          
                                    
                     $image = $file['tmp_name'];
                     $image_type =  $file['type'];
                     $img_name  =  $this->_gal_image_upload($image,$image_type); 
                     
                     $img_db = ORM::factory('Prodimage');
                     $img_db->prod_id = $prod->pk();
                     $img_db->image_name = $img_name;
                     $img_db->save();                  
                     
                    }
                    Controller::redirect('admin/products');
                 }
                 else{
                    
                    $prod = ORM::factory('Product');
                    $prod->values($data);
                    $prod->save();
                    
                    Controller::redirect('admin/products');
                    
                 }       
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
        }
         
        $content = View::factory('admin/products/v_products_add');
        $content->bind('errors',$errors);
        $content->bind('data',$data);
        $content->set('cats',$cats);
        
        $this->template->block_center = array($content);
        
    }//prod_add
    
    public function action_prod_edit(){
        
        $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
        $this->template->scripts[] = 'media/js/upload.js';
        
        $categories = ORM::factory('Category')->find_all();        
        $cats = array();
        
        foreach($categories as $item){            
            $cats[$item->id] = $item->cat_title_ru;
        }
        
        $id = $this->request->param('id');
        
        $product = ORM::factory('Product',$id);
        if(!$product->loaded()){
            Controller::redirect('admin/products');
        }
        
        
        if(isset($_POST['submit'])){
            
            $data = Arr::extract($_POST,array('title_ru','cat_id','satus','prod_intro','prod_text','seo_snippet','keywords'));
            
            try{
                          
                 if(!empty($_FILES['images']['name'][0])){
                    
                    $prod = ORM::factory('Product',$id);
                    $prod->values($data);
                    $prod->save();
                    
                    $files = $this->_diverseArray($_FILES);
                    
                    foreach($files as $file){                          
                                    
                     $image = $file['tmp_name'];
                     $image_type =  $file['type'];
                     $img_name  =  $this->_prod_image_upload($image,$image_type); 
                     
                     $img_db = ORM::factory('Prodimage');
                     $img_db->prod_id = $id;
                     $img_db->image_name = $img_name;
                     $img_db->save();                  
                     
                    }
                    Controller::redirect('admin/products/prod_edit/'.$id);
                 }
                 else{
                    
                    $prod = ORM::factory('Product',$id);
                    $prod->values($data);
                    $prod->save();
                    
                    Controller::redirect('admin/products');
                    
                 }       
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
        }
        
        
        $data = $product->as_array();
        $data['images'] = ORM::factory('Prodimage')->where('prod_id','=',$id)->find_all()->as_array();
        
        $content = View::factory('admin/products/v_products_edit');
        $content->bind('errors',$errors);
        $content->bind('data',$data);
        $content->set('cats',$cats);
        
        $this->template->block_center = array($content);
    }// end prod_edit
    
    
    public function action_cat_img(){
    
        $id = (int)$this->request->param('id');
        
        $img = ORM::factory('Prodimage',$id);
        $product_id = $img->prod_id;
        
        $product = ORM::factory('Product',$product_id);
        $product->small_photo = $img->image_name;
        $product->save();
        
        Controller::redirect('admin/products/prod_edit/'.$product_id);    

    }// end cat_img

    public function action_prod_delimg(){
        
        $id = (int)$this->request->param('id');
        
        $img_db = ORM::factory('Prodimage',$id);
        $prod_id = $img_db->prod_id;
        
        if(!$img_db->loaded()){
            
            Controller::redirect('admin/products/prod_edit/'.$prod_id);
        }
        
        $prod_db = ORM::factory('Product',$prod_id);
        if($prod_db->small_photo == $img_db->image_name){
            $prod_db->small_photo = null;
            $prod_db->save();
        }
        
         if(file_exists('media/uploads/'.$img_db->image_name)){
            unlink('media/uploads/'.$img_db->image_name);
         }
            
        $img_db->delete();
        Controller::redirect('admin/products/prod_edit/'.$prod_id);     
        
        
    }// prod_delimg
    
    public function action_prod_delete(){
        
        $id = $this->request->param('id');
        
        $prod_db = ORM::factory('Product',$id);
        if(!$prod_db->loaded()){
            Controller::redirect('admin/products');
        }
        
        //???????? ??? ???????? 
        $images = ORM::factory('Prodimage')->where('prod_id','=',$id)->find_all();
        
        //??????? ??? ????????
        if($images->count() > 0){
            foreach($images as $image){
                
                $img_db = ORM::factory('Prodimage',$image->id);
                
                if(file_exists('media/uploads/'.$img_db->image_name)){
                    unlink('media/uploads/'.$img_db->image_name);
                }
                $img_db->delete();
            }
        }
        
        $prod_db->delete();
        
        Controller::redirect('admin/products');
        
    }// end prod_delete
    
    public function action_cat_index(){
        
        $cat = ORM::factory('Category')->find_all();
        
        $content = View::factory('admin/products/v_categories_index');
        $content->set('categories',$cat);
        
        $this->template->block_center = array($content);
        
    }// end cat_index
    
    public function action_cat_edit(){
        
        $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
        $this->template->scripts[] = 'media/js/upload.js';
        
        $id = $this->request->param('id');
        
        if(isset($_POST['submit'])){
            
            $data = Arr::extract($_POST,array('cat_title_ru','cat_description','seo_snippet','keywords'));
            
            try{
                
                $prod = ORM::factory('Category',$id);
                $prod->values($data);
                $prod->save();
                
                if(!empty($_FILES['images']['name'][0])){
                    
                                        
                    $files = $this->_diverseArray($_FILES);
                    
                    foreach($files as $file){                          
                                    
                     $image = $file['tmp_name'];
                     $image_type =  $file['type'];
                     $img_name  =  $this->_gal_image_upload($image,$image_type); 
                     
                     $img_db = ORM::factory('Example');
                     $img_db->cat_id = $id;
                     $img_db->photo_name = $img_name;
                     $img_db->save();                  
                     
                    }
                    Controller::redirect('admin/products/cat_edit/'.$id);
                 }
                                 
                
                Controller::redirect('admin/products/cat_index');
            }
            catch(ORM_Validation_Exception $e){
                $errors = $e->errors('validation');
            }
        }
        
        $data = ORM::factory('Category',$id)->as_array();        
        $data['images'] = ORM::factory('Example')->where('cat_id','=',$id)->find_all()->as_array(); 
        
        $content = View::factory('admin/products/v_categories_edit');
        $content->bind('errors',$errors);
        $content->set('data',$data);
        
        $this->template->block_center = array($content);
    }// cat)edit
    
    public function action_del_cat_img(){
        
               
        $id = (int)$this->request->param('id');
        
        $img_db = ORM::factory('Example',$id);
        $cat_id = $img_db->cat_id;
        
        if(!$img_db->loaded()){
            
            Controller::redirect('admin/products/cat_edit/'.$cat_id);
        }
        
                
         if(file_exists('media/uploads/'.$img_db->photo_name)){
            unlink('media/uploads/'.$img_db->photo_name);
         }
            
        $img_db->delete();
        Controller::redirect('admin/products/cat_edit/'.$cat_id); 
        
    }
}