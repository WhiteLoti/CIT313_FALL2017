<?php

class AddPostController extends Controller{
	
	public $postObject;
        public $companionObject;
	
	public function defaultTask(){

                $this->categoriesObject = new Categories();
		$this->postObject = new Post();
                $this->set('categories',$this->categoriesObject->getCategories());
		$this->set('task', 'add');
	
	
	}
	
	public function add(){
		
			$this->postObject = new Post();
			
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'date'=>$_POST['date'],'categoryID'=>$_POST['categoryID']);
			
	
			$result = $this->postObject->addPost($data);
			
			$this->set('message', $result);
			
		
	}
	
	public function edit($pID){
		
			$this->postObject = new Post();

			$post = $this->postObject->getPost($pID);
			
			$this->set('pID', $post['pID']);
			$this->set('title', $post['title']);
			$this->set('content', $post['content']);
			$this->set('task', 'update');
			
		
	}

        public function update()
        {
			$this->postObject = new Post();
			
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'categoryID'=>$_POST['categoryID'],'date'=>$_POST['date']);
			$result = $this->postObject->editPost($_POST['pID'],$data);
			
			$this->set('message', $result);
      
        }
	
	
}
