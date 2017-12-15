<?php

class LoginController extends Controller{

   public $userObject;

   public function index()
   {

   }

   public function do_login()
   {
       $this->userObject = new User();

       if($this->userObject->checkUser($_POST['email'],$_POST['password']))
       {
           $result = $this->userObject->getUserFromEmail($_POST['email']);

           $result = $this->userObject->isActive($result['uID']);

           if($result)
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
                header('Location: '.BASE_URL.'aboutme?active=false');
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