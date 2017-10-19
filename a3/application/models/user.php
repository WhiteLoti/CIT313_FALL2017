<?php
class User extends Model{

        // Fetches user information from user id
        function getUser($uID)
        {

                $sql = "SELECT uID, email, first_name, last_name, user_type, active FROM users
                        WHERE uID = ?";

                // perform query
                $result = $this->db->getrow($sql, array($uID));
                
                $user = $result;

                return $user;

        }

        // Fetches all users from database
        public function getUsers($limit = 0)
        {
               if($limit > 0)
               {
                       $numusers = ' LIMIT '.$limit;
               }

               $sql = "SELECT first_name, last_name, email, uID FROM users";

               // perform query
               $results = $this->db->execute($sql);

               while($row = $results->fetchrow())
               {
                       $users[] = $row;
               }

               return $users;
        }

        // Adds user to the database from supplied data
        // data is an array
        public function addUser($data)
        {

                $sql = 'INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)';
                $this->db->execute($sql,$data);
                $message = 'Thanks for registering.';
                return $message;
        }

}

?>