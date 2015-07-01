<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Email extends Controller_Index {
    
    public function action_index(){
        
        $site_mail = ORM::factory('Setting',1)->email;
        
        
        
        if(isset($_POST)){
           
           $data = Arr::extract($_POST,array('name','mail','phone','mail_text')); 
           $sender_name = $data['name'];
           $sender_phone = $data['phone'];
           $sender_mail = $data['mail'];
           $sender_text = $data['mail_text'];
           
           $email_content = "На сайте оставленно сообщение от \n $sender_name , mail: $sender_mail, тел: $sender_phone \nтекст сообщение:\n $sender_text";
           
           $email = Email::factory('Сообщение с сайта',$email_content);
           $email->to($site_mail);
           $email->from($data['mail'],'Ligneus');
           $email->send();
        }
        
        $content = View::factory('index/email/v_email');
        $this->template->content = $content;
    }
}