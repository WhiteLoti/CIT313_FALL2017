<?php

class MembersController extends Controller {

        public $userObject;


        public function user($uID){
          
             $this->userObject = new User();
             $user = $this->userObject->getUser($uID);
             $this->set('user',$user);

        }

	public function index(){
		
		$this->userObject = new User();
		$users = $this->userObject->getAllUsers();
                $this->set('title','The Members View');
                $this->set('users',$users);
                $this->set('first_name',$first_name);
                $this->set('last_name',$last_name);
                $this->set('email',$email);
	}


        public function profile(){
                $this->userObject = new User();
                $user = $this->userObject->getUser($_SESSION['uID']);
                $this->set('task','edit');
                $this->set('user',$user);
        }

        public function edit(){
                $this->userObject = new User();

                $password = '';
                $error_message = 'Profile could not update because: <br>';
                $errors = '';

                if(empty($_POST['first_name']))
                {
                    $errors .= 'First name field is empty <br>';
                }
                if(empty($_POST['last_name']))
                {
                    $errors .= 'Last name field is empty <br>';               
                }
                if(empty($_POST['email']))
                {
                    $errors .= 'Email field is empty <br>';
                }
                if(!empty($_POST['password']) && empty($_POST['re-password']))
                {
                    $errors .= 'Verify Password field is empty<br>';
                }
                else if(empty($_POST['password']) && !empty($_POST['re-password']))
                {
                    $errors .= 'Password field is empty<br>';
                }
                else if($_POST['password'] != $_POST['re-password'])
                {
                    $errors .= 'Password and Verify Password do not match <br>';
                }
                else if($_POST['password'] == $_POST['re-password'] && !empty($_POST['password']))
                {
		    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                }

                if($errors != '')
                {
                    $message = $error_message.$errors."<br>";
                    $this->set('message',$message);
                }
                else
                {
                    $message = $this->userObject->updateUser(array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'],'password'=>$password,'uID'=>$_POST['uID']));
                    $this->set('message',$message."<br>");
                }

                $this->userObject = new User();
                $user = $this->userObject->getUser($_SESSION['uID']);
                $this->set('task','edit');
                $this->set('user',$user);
        }

}

?>