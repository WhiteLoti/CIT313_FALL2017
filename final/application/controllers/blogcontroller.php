<?php

class BlogController extends Controller{
	
	public $postObject;
   
   	public function post($pID){
	   
		$this->postObject = new Post();
		$post = $this->postObject->getPost($pID);	    
	  	$this->set('post',$post);
	   
   	}
	
	public function index(){
		
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'Blogs');
		$this->set('posts',$posts);
	
	}
	
	
}
