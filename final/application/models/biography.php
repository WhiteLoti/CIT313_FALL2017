<?php

class Biography extends Model
{
      function getBio($uID = null)
      {        

           $sql = "SELECT t1.first_name, t1.last_name, t1.email, t1.uID,
                   t2.biography, t2.school, t2.graduation, t2.major, t2.concentration, t2.interests,
                   t3.profile_picture_link, t3.type FROM users t1
                   LEFT JOIN biographies t2
                   ON t1.uID = t2.uID
                   LEFT JOIN pictures t3
                   ON t2.uID = t3.uID
                   WHERE t1.uID = ".$uID;

           // perform query
           $result = $this->db->getrow($sql, array());
           
           $bio = $result;

           return $bio;  
      }

      public function getUserBlogs($uID)
      {
        $sql = 'SELECT t1.pID, t1.title, t1.date, t1.categoryID,
                       t2.categoryID, t2.name FROM posts t1 INNER JOIN categories t2 ON
                       t1.categoryID = t2.categoryID AND t1.uID = '.$uID;
     
        $results = $this->db->execute($sql, $uID);
        //print_r($results);
        /*
        while($row = $results->fetchrow())
        {
           $blogs[] = $row;
        }*/

        //return $blogs;
     }

     public function uploadPicture($image_data,$uID)
     {
        
     }
}