<?php

class ManageUsersController extends Controller
{

    public $userObject;

    public function index()
    {
       $this->userObject = new User();

       $result = $this->userObject->getAllUsers();

       $this->set('users',$result);
       
    }

    public function approve()
    {
       $this->userObject = new User();

       if($this->userObject->isAdmin())
       {
           $result = $this->userObject->approveUser($_POST['uID']);
           $this->set('response',$result);
       }
       else
       {
           http_response_code(401);
           $this->set('response','User Is Not Authorized to Perform Action');
       }
    }

    public function delete()
    {
       $this->userObject = new User();

       if($this->userObject->isAdmin())
       {
           $result = $this->userObject->deleteUser($_POST['uID']);
           $this->set('response',$result);
       }
       else
       {
           http_response_code(401);
           $this->set('response','User Is Not Authorized to Perform Action');
       } 
    }
}

?>