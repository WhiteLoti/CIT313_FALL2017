<?php

class RegisterController extends Controller {

        public $userObject;

	public function index(){
		
		$this->userObject = new User();
		$this->set('task', 'add');
	}

        public function add(){

            $this->userObject = new User();

            $errors = '';

            if(empty($_POST['first_name']))
            {
                $errors .= 'First Name is Empty <br>';
            }
            else if(preg_match('/^[a-zA-Z]+$/',$_POST['first_name']) < 1)
            {
                $errors .= 'First Name Contains Illegal Characters <br>';
            }

            if(empty($_POST['last_name']))
            {
                $errors .= 'Last Name is Empty <br>';
            }
            else if(preg_match('/^[a-zA-Z]+$/',$_POST['last_name']) < 1)
            {
                $errors .= 'Last Name Contains Illegal Characters <br>';
            }

            if(empty($_POST['password']))
            {
                $errors .= 'Password Is Empty <br>';
            }
            if(empty($_POST['re-password']))
            {
                $errors .= 'Verify Password Is Empty<br>';
            }
            if(!empty($_POST['password']) && !empty($_POST['re-password']) && $_POST['password'] != $_POST['re-password'])
            {
                $errors .= 'Password And Verify Password Do Not Match <br>';
            }

            if(empty($_POST['email']))
            {
                $errors .= 'Email Is Empty<br>';
            }
            else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $errors .= 'Malformed Email Address <br>';
            }

            if(!empty($errors))
            {

                $result = '<div class="alert alert-danger">Registration Failed Because: <br>'.$errors.'</div>';

            }
            else
            {

                
		$password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);

                $data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'],'password'=>$password_hash);

                $result = $this->userObject->addUser($data);

                $result = '<div class="alert alert-success">'.$result.'</div>';

            }

            $this->set('message', $result);

        }

}

?>