<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Auth extends Controller_Index {
    
    public function action_index(){
        
        if(Auth::instance()->logged_in('admin')){
            Controller::redirect('admin/main');
        }
        
       $content = View::factory('index/auth/v_login');
       
       $this->template->content = $content;
       $content->bind('errors',$eerors);
    }
    
    public function action_login(){
        
        if(Auth::instance()->logged_in('admin')){
            Controller::redirect('admin/main');
        }
        
        if(isset($_POST['submit'])){
            
            $data = Arr::extract($_POST,array('username','password'));
            
            $status = Auth::instance()->login($data['username'],$data['password']);
            
            if($status){
                if(Auth::instance()->logged_in('admin')){
                    Controller::redirect('admin/main');
                }
                Controller::redirect('account');                
            }
            else{
                
                $errors = array('Не правильные данные',);
            }
        }       

        
        $content = View::factory('index/auth/v_login');
        $content->bind('errors',$errors);
        $content->bind('data',$data);
        
        
        $this->template->content = $content;
        
    } // login
    
    public function action_logout(){
        
        if(Auth::instance()->logout()){
            Controller::redirect();
        }
    }// logiut

    
    public function action_create_pass(){
        
        $pass = Auth::instance()->hash('12345678');
        echo "<h2>$pass</h2>";
        
    }

}