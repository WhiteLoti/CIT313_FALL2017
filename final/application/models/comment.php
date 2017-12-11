<?php
class Comment extends Model{

	public function loadComments($pID){

                $sql = 'SELECT t1.*, t2.first_name, t2.last_name FROM comments t1 LEFT JOIN users t2 ON t1.uID = t2.uID WHERE postID = '.$pID.' ORDER BY t1.date DESC';
                $results = $this->db->execute($sql, array());

                while($row = $results->fetchrow())
                {
                    $comments[] = $row;
                }

                return $comments;
        }

        public function addComment($data)
        {
                // Generate current datetime
                $date = date('Y-m-d H:i:s');
                
                $data = array_merge($data, array('date'=>$date));

                $sql = 'INSERT INTO comments (commentText,postID,uID,date) VALUES (?,?,?,?)';

                $this->db->execute($sql, $data);


                $sql = 'SELECT t1.*, t2.first_name, t2.last_name, t2.uID FROM comments t1
                        LEFT JOIN users t2 ON t1.uID = t2.uID
                        WHERE t1.commentID = (SELECT MAX(commentID) FROM comments)';

                $result = $this->db->execute($sql, array());

                return $result;
                
        }

        public function deleteComment($data)
        {
                $sql = 'DELETE FROM comments WHERE postID = ? AND commentID = ?';
                $result = $this->db->execute($sql, $data);
                var_dump($result);
                return;
        }
}