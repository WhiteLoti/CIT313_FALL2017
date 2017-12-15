<?php

class ManageCategoriesController extends Controller
{

        public function index(){
                $outcome = $this->getCategories();
                $this->set('outcome',$outcome);
        }

        public function edit($categoryID){
                $this->categoryObject = new Categories;
                $outcome = $this->categoryObject->getCategory($categoryID); 
                $this->set('outcome',$outcome);
        }

	public function getCategories(){

		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategories();
                return $outcome;
	}

        public function save($categoryID)
        {
                $this->categoryObject = new Categories;
                $message = $this->categoryObject->update($_POST['categoryID'],$_POST['categoryName']);
                $this->set('message',$message);
        }

        public function add()
        {
                $this->categoryObject = new Categories;
                $message = $this->categoryObject->addCategory($_POST['categoryName']);
                $this->set('message',$message);
        }

}

?>