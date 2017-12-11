<?php

class AboutMeController extends Controller{

        public $bioObject;
	
	public function index(){

                $this->bioObject = new Biography();

                // Check for a specific user
                if(isset($_GET['user']) && is_numeric($_GET['user']))
                {
                    $bio = $this->bioObject->getBio($_GET['user']);
                    $blogs = $this->bioObject->getUserBlogs($_GET['user']);
                }
                // Check if the user is logged in
                else if(isset($_SESSION['uID']) && is_numeric($_SESSION['uID']))
                {
                    $bio = $this->bioObject->getBio($_SESSION['uID']);
                    $blogs = $this->bioObject->getUserBlogs($_SESSION['uID']);
                }
                else
                {
                    $bio = $this->bioObject->getBio(6);
                    $blogs = $this->bioObject->getUserBlogs(6);
                }
                
                // Check if user exist
                if(empty($bio))
                {
                   $bio = array('first_name'=>'Unknown','last_name'=>'User');
                }
                $this->set('bio',$bio);
                $this->set('blogs',$blogs);
	}

        public function edit()
        {
                $this->bioObject = new Biography();

                $bio = $this->bioObject->getBio($_SESSION['uID']);
                $blogs = $this->bioObject->getUserBlogs($_SESSION['uID']);

                $this->set('bio',$bio);
                $this->set('blogs',$blogs);
        }

        public function upload()
        {
                $this->bioObject = new Biography();
                
        }

        public function update()
        {
                
        }
}
