<?php

class LoginController extends Controller{

   public $userObject;

   public function do_login()
   {
       $this->userObject = new User();

       if($this->userObject->checkUser($_POST['email'],$_POST['password']))
       {       

           $userInfo = $this->userObject->getUserFromEmail($_POST['email']);  
         
           $_SESSION['uID'] = $userInfo['uID'];

           if(strlen($_SESSION['redirect']) > 0)
           {
               $view = $_SESSION['redirect'];

               unset($_SESSION['redirect']);
 
               header('Location: '.BASE_URL.$view);
           }
           else
           {
               header('Location: '.BASE_URL);
           }

       }
       else
       {
           $this->set('error','Wrong Username / Email and Password Combination');
       }
   }

   public function logout()
   {
       unset($_SESSION['uID']);

       session_write_close();

       header('Location: '.BASE_URL.'?action=loggedout');
   }	
	
}