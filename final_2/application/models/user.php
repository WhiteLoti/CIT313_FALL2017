<?php
class User extends Model{

        public $uID;
        public $first_name;
        public $last_name;
        public $email;
        protected $user_type;

        // Constructor
        public function __construct()
        {
            parent::__construct();

            if(isset($_SESSION['uID']))
            {
                $userInfo = $this->getUserFromID($_SESSION['uID']);

                $this->uID = $userInfo['uID'];

                $this->first_name = $userInfo['first_name'];

                $this->last_name = $userInfo['last_name'];

                $this->email = $userInfo['email'];

                $this->user_type = $userInfo['user_type'];
            }
        }

        public function getUserName()
        {
              return $this->first_name.' '.$this->last_name;
        }

        public function getEmail()
        {
              return $this->email;
        }

        public function isRegistered()
        {
              if(isset($this->user_type))
              {
                  return true;
              }
              else
              {
                  return false;
              }
        }

        public function isActive($uID)
        {
              $sql = "SELECT active FROM users WHERE uID = ".$uID;

              $result = $this->db->getrow($sql,array());

              if($result[0] == 0)
              {
                  return false;
              }
              else
              {
                  return true;
              }  
        }

        public function isAdmin()
        {
              if($this->user_type == 1)
              {
                  return true;
              }
              else
              {
                  return false;
              }
        }

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
        public function getAllUsers($limit = 0)
        {
               $numusers = '';

               if($limit > 0)
               {
                       $numusers = ' LIMIT '.$limit;
               }

               $sql = "SELECT first_name, last_name, email, uID, user_type, active FROM users".$numusers;

               // perform query
               $results = $this->db->execute($sql);

               while($row = $results->fetchrow())
               {
                       $users[] = $row;
               }

               return $users;
        }

        // Deletes user specified by uID
        public function deleteUser($uID)
        {
            $result = $this->getUserFromID($uID);

            $sql = 'DELETE FROM users WHERE uID = '.$uID;

            $this->db->execute($sql,array());

            $message = '<div class="alert alert-success">User '.$result['first_name'].' '.$result['last_name'].' was deleted</div>';

            $json = new stdClass;

            $json->message = $message;
            $json->action = 'delete';

            $json = json_encode($json);

            return $json;
        }

        // Approves user specified by uID
        public function approveUser($uID)
        {
            $sql = 'UPDATE users SET active=1 WHERE uID = '.$uID;

            $this->db->execute($sql,array());

            $result = $this->getUserFromID($uID);

            $message = '<div class="alert alert-success">User '.$result['first_name'].' '.$result['last_name'].' was activated</div>';

            $json = new stdClass;

            $json->message = $message;
            $json->action = '<div class="approved">User Activated</div>';

            $json = json_encode($json);

            return $json;
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

        public function checkUser($email, $password)
        {

                $sql = "SELECT email, password FROM users WHERE email = ?";

                $result = $this->db->getrow($sql, array($email));

                $user = $result;

                $password_db = $user[1];

                if(password_verify($password, $password_db))
                {
                     return true;
                }
                else
                {
                     return false;
                }             
        }

        public function getUserFromEmail($email)
        {
                $sql = "SELECT * FROM users WHERE email = ?";

                $user = $this->db->getrow($sql, array($email));
  
                return $user;            
        }

        public function getUserFromID($uID)
        {
                $sql = "SELECT * FROM users WHERE uID = ?";

                $result = $this->db->getrow($sql, array($uID));

                $user = $result;

                return $user;
        }

        public function updateUser($data)
        {
                if(empty($data['password']))
                {
                    $sql = 'UPDATE users SET first_name=?, last_name=?, email=? WHERE uID=?';
                }
                else
                {
                    $sql = 'UPDATE users SET first_name=?, last_name=?, email=?, password=? WHERE uID=?';
                }
                $values = array();
                foreach($data as $key => $value)
                {
                   if(!empty($value) && isset($value))
                   {
                     array_push($values, $value);
                   }  
                }
                $this->db->execute($sql,$values);
                $message = 'Profile Updated<br>';
                return $message;
        }

}

?>