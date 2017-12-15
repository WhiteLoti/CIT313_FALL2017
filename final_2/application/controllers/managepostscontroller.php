<?php

class ManagePostsController extends Controller{
	
	public $postObject;

        protected $access = 1;
        
        public function index()
        {
		$this->postObject = new Post();
                $this->getCategories();
		$this->set('task', 'add');
        }

	public function add(){
		$this->postObject = new Post();
                $this->getCategories();
		$this->set('task', 'add');

                $errors = 0;
                if((!isset($_POST['title'])) &&
                   (!isset($_POST['date'])) &&
                   (!isset($_POST['category'])) && 
                   (!isset($_POST['content'])))
                {
                   $errors += 1;
                }
                if(isset($_POST['title']) && empty($_POST['title']))
                {
                   $this->set('missing_title','Title Is Missing');
                   $errors += 1;
                }
                else
                {
                   $this->set('title',$_POST['title']);
                }
                if(isset($_POST['date']) && empty($_POST['date']))
                {
                   $this->set('missing_date','Date Is Missing');
                   $errors += 1;
                }
                if(isset($_POST['category']) && empty($_POST['category']))
                {
                   $this->set('missing_category','Category Not Selected');
                   $errors += 1;
                }
                else
                {
                   $category = array();
                   $category['value'] = $_POST['category'];
                   $this->set('category',$category);
                }
                if(isset($_POST['content']) && empty($_POST['content']))
                {
                   $this->set('missing_content','Post Content Is Missing');
                   $errors += 1;
                }
                else
                {
                   $this->set('content',$_POST['content']);
                }

                if($errors < 1)
                {
			$this->postObject = new Post();

			$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'categoryID'=>$_POST['category'],'date'=>$_POST['date'],'uID'=>$_SESSION['uID']);
			$result = $this->postObject->addPost($data);
			
			$this->set('message', $result);
                }
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

        public function edit_posts()
        {
     			$this->postObject = new Post();
                        $posts = $this->postObject->getPosts();
			$this->set('posts',$posts);
                        $this->getCategories();
                        $this->set('task','update');
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

        public function delete_post()
        {
                        $this->postObject = new Post();
                        if($_GET['pID'])
                        {
                            $data = array('pID'=>$_GET['pID']);
                            $result = $this->postObject->deletePost($data);
                        }
                        else
                        {
                            $data = array('pID'=>$_POST['pID']);
                            $result = $this->postObject->deletePost($data);
                        }
                        $this->set('message',$result);
        }
}
