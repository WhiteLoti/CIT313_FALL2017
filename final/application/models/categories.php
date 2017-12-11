<?php
class Categories extends Model{

        public function getCategories() {
      
                $sql = 'SELECT name, categoryID FROM categories';
                $categories2 = array();

                $results = $this->db->execute($sql);

                while ($row = $results->fetchrow()) {
                    $categories[] = $row;
                }

                foreach($categories as $array)
                {
                     $categories2[] = array('categoryID'=>$array['categoryID'],'name'=>$array['name']);
                }

                $categories = $categories2;

                return $categories;

        }

        public function getCategory($cID)
        {
		$sql = 'SELECT categoryID, name FROM categories WHERE categoryID=?';
		$outcome = $this->db->execute($sql,array($cID));
                $outcome = (array)$outcome;
                $outcome = $outcome['fields'];
                $array = array('categoryID'=>$outcome['categoryID'],'name'=>$outcome['name']);
		return $outcome;
	}

       	public function update($cID,$name)
        {
	        $categoryID = $this->db->qstr($cID);
		$categoryName = $this->db->qstr($name);
		$sql = "UPDATE categories SET name=$categoryName WHERE categoryID = $categoryID";
		$results = $this->db->execute($sql);
                $message = 'A category has been changed to'.$name;
		return $message;
	}

	public function addCategory($category)
        {
		$sql = "INSERT INTO categories (name) VALUES (?)";
		$this->db->execute($sql, $category);
		$message = 'Category has been added.';
		return $message;
	}
		

}