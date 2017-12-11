<?php
class Post extends Model{
	
	function getPost($pID){

		$sql =  "SELECT t1.pID, t1.title, t1.content, t1.date, t1.uID, t1.categoryID,
                         t2.uID, t2.first_name, t2.last_name,
                         t3.categoryID, t3.name FROM posts t1 INNER JOIN users t2 INNER JOIN categories t3 ON 
                         t1.uID = t2.uID AND t1.categoryID = t3.categoryID WHERE t1.pID = ?";
		
		// perform query
		$result = $this->db->getrow($sql, array($pID));
		
		$post = $result;

                // Gets the comment count separately
                $sql = "SELECT COUNT(commentID) as comment_count FROM comments WHERE postID = ".$post['pID'];
                $result = $this->db->execute($sql);

                // Typecast to obj to array
                $result = (array)$result;

                // Add comment to post array
                $post['comment_count'] = $result['fields']['comment_count'];
	
		return $post;
	
	}
		
	public function getAllPosts($limit = 0){
		
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
                else
                {
                        $numposts = '';
                }
		
		$sql =  "SELECT t1.pID, t1.title, t1.content, t1.date, t1.uID, t1.categoryID,
                         t2.uID, t2.first_name, t2.last_name,
                         t3.categoryID, t3.name FROM posts t1 INNER JOIN users t2 INNER JOIN categories t3 ON 
                         t1.uID = t2.uID AND t1.categoryID = t3.categoryID".$numposts;

		// perform query
		$results = $this->db->execute($sql);
                
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}

                // Gets the comment count separately
                foreach($posts as &$post)
                {
                    $sql = "SELECT COUNT(commentID) as comment_count FROM comments WHERE postID = ".$post['pID'];
                    $result = $this->db->execute($sql);

                    // Typecast to obj to array
                    $result = (array)$result;

                    // Add comment to post array
                    $post['comment_count'] = $result['fields']['comment_count'];
                }

		return $posts;
	
	}

        public function getPosts($limit = 0)
        {
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
                else
                {
                        $numposts = '';
                }
		
		$sql =  "SELECT t1.pID, t1.title, t1.content, t1.date, t1.uID, t1.categoryID,
                         t2.uID, t2.first_name, t2.last_name,
                         t3.categoryID, t3.name FROM posts t1 INNER JOIN users t2 INNER JOIN categories t3 ON 
                         t1.uID = t2.uID AND t1.categoryID = t3.categoryID".$numposts;

		// perform query
		$results = $this->db->execute($sql);
                
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}

                return $posts;
        }

        public function getUserPosts($uID)
        {
              $sql = 'SELECT * FROM posts WHERE uID = ?';
     
              $result = $this->db->execute($sql, $uID);

              while($row = $results->fetchrow())
              {
                  $posts[] = $row;
              }

              return $posts;
        }

        public function getCatPosts($cID)
        {
            $sql = 'SELECT * FROM posts WHERE categoryID = ?';

            $results = $this->db->execute($sql, $cID);

            while($row = $results->fetchrow())
            {
                $posts[] = $row;
            }

            return $posts;
        }
	
	public function addPost($data){
		
		$sql='INSERT INTO posts (title,content,categoryID,date,uID) VALUES (?,?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'Post added.';
		return $message;
		
	}

        public function updatePost($data){

                $sql = 'UPDATE posts SET title=?, content=?, categoryID=?, date=? WHERE pID = ?';
		$this->db->execute($sql,$data);
		$message = 'Post Updated.';
		return $message;
        }

        public function deletePost($data)
        {
                $sql = 'DELETE FROM posts WHERE pID =?';
                $this->db->execute($sql,$data);

                $sql = 'DELETE FROM comments WHERE postID =?';
                $this->db->execute($sql,$data);

                $message = 'Post Deleted.';
                return $message;
              
        }
}