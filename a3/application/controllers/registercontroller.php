<?php

class RegisterController extends Controller {

        public $userObject;

	public function defaultTask(){
		
		$this->userObject = new User();
		$this->set('task', 'add');
	}

        public function add(){

            $this->userObject = new User();

            $data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'],'password'=>$_POST['password']);

            $result = $this->userObject->addUser($data);

            $this->set('message', $result);

        }

}

?>