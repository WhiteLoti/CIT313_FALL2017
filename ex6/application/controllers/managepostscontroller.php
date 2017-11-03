<?php

class ManagePostsController extends Controller{
	
	public $postObject;

        protected $access = 1;
	
	public function index()
        {}

	public function add(){
		$this->postObject = new Post();
                $this->getCategories();
		$this->set('task', 'save');
	}
	
	public function save(){

			$this->postObject = new Post();

			$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'categoryID'=>$_POST['category'],'date'=>$_POST['date'],'uID'=>$_SESSION['uID']);
			$result = $this->postObject->addPost($data);
			
			$this->set('message', $result);
		
	}
	
	public function edit($pID){
		
			$this->postObject = new Post();
			$post = $this->postObject->getPost($pID);
                        $this->getCategories();
			
			$this->set('pID', $post['pID']);
			$this->set('title', $post['title']);
			$this->set('content', $post['content']);
                        $this->set('date', $post['date']);
                        $this->set('category', $post['categoryID']);
			$this->set('task', 'update');
			
		
	}

        public function getCategories()
        {
                        $this->postObject = new Categories();
                        $categories = $this->postObject->getCategories();
                        $this->set('categories',$categories);
        }

        public function update()
        {
			$this->postObject = new Post();
			$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'categoryID'=>$_POST['categoryID'],'date'=>$_POST['date'],$_POST['pID']);
			$result = $this->postObject->updatePost($data);
                        $outcome = $this->postObject->getAllPosts();
			$this->set('posts',$outcome);
			$this->set('message', $result);
                        $this->getCategories();
                        $this->set('task','update');
        }
	
	
}
