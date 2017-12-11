<?php

class AjaxController extends Controller{
	
	protected $postObject;
        protected $commentObject;
	
	public function index(){
	    $this->set('response',"Invalid Request");
	}

        public function get_post_content()
        {
            $this->postObject = new Post();
            $post = $this->postObject->getPost($_GET['pid']);
            $this->set('response',$post['content']);
        }
	
        public function get_comments()
        {
            $u = new User();

            $this->commentObject = new Comment();
            $comments = $this->commentObject->loadComments($_GET['pid']);
            $comment_collection = '';
            if(sizeof($comments) > 0)
            {
                foreach($comments as &$comment)
                {
                    $full_name = ucfirst($comment['first_name']).' '.ucfirst($comment['last_name']);
                    $date = date('F j, Y \a\t H:i:s A', strtotime($comment['date']));
                    $comment_collection .= '<div class="comment_wrapper">';
                    $comment_collection .= '<form>';
                    $comment_collection .= '<hr><br>';
                    if($u->isAdmin())
                    {
                        $comment_collection .= '<div href="'.BASE_URL.'ajax/delete_comment" onclick="remover(event)" class="btn delete border-secondary" title="Remove comment">X</div>';
                    }
                    $comment_collection .= $comment['commentText'].'<br>';
                    $comment_collection .= '<input type="hidden" name="pid" value="'.$_GET['pid'].'">';
                    $comment_collection .= '<input type="hidden" name="commentID" value="'.$comment['commentID'].'">';
                    $comment_collection .= '<sub>Comment Posted on '.$date.' by <a href="'.BASE_URL.'members/view/'.$comment['uID'].'">'.$full_name.'</a></sub>';
                    $comment_collection .= '</form>';
                    $comment_collection .= "</div>";
                }
                unset($comments); 
            }
            $this->set('response',$comment_collection);
        }

        public function post_comment()
        {
            $u = new User();

            $this->commentObject = new Comment();
            // sanitize data
            $data = array('commentText'=>$_POST['comment'],'pID'=>$_POST['pid'],'uID'=>$_POST['uid']);
            foreach($data as $key => &$value)
            {
                $key = htmlentities($key,ENT_QUOTES);
                $value = htmlentities($value,ENT_QUOTES);
                $data[$key] = $value;
            }
            // SQL
            $comment = $this->commentObject->addComment($data);
            unset($data);

            $comments = $this->commentObject->loadComments($_POST['pid']);
            $comment_collection = '';
            if(sizeof($comments) > 0)
            {
                foreach($comments as &$comment)
                {
                    $full_name = ucfirst($comment['first_name']).' '.ucfirst($comment['last_name']);
                    $date = date('F j, Y \a\t H:i:s A', strtotime($comment['date']));
                    $comment_collection .= '<div class="comment_wrapper">';
                    $comment_collection .= '<form>';
                    $comment_collection .= '<hr><br>';
                    if($u->isAdmin())
                    {
                        $comment_collection .= '<div href="'.BASE_URL.'ajax/delete_comment" onclick="remover(event)" class="btn delete border-secondary" title="Remove comment">X</div>';
                    }
                    $comment_collection .= $comment['commentText'].'<br>';
                    $comment_collection .= '<input type="hidden" name="pid" value="'.$_POST['pid'].'">';
                    $comment_collection .= '<input type="hidden" name="commentID" value="'.$comment['commentID'].'">';
                    $comment_collection .= '<sub>Comment Posted on '.$date.' by <a href="'.BASE_URL.'members/view/'.$comment['uID'].'">'.$full_name.'</a></sub>';
                    $comment_collection .= '</form>';
                    $comment_collection .= "</div>";
                }
                unset($comments); 
            }
            $this->set('response',$comment_collection);
        }

        public function delete_comment()
        {
            $this->commentObject = new Comment();
            $u = new User();

            if($u->isAdmin())
            {
                $data = array('postID'=>$_POST['pid'],'commentID'=>$_POST['commentID']);
                $result = $this->commentObject->deleteComment($data);
                
                $this->set('response','');
            }
            else
            {
                http_response_code(401);
                $this->set('response','');
            }
        }
        
        public function delete_post()
        {
            $this->postObject = new Post();

            $u = new User();

            if($u->isAdmin())
            {
                $data = array('postID'=>$_POST['pid']);
                $result = $this->postObject->deletePost($data);
            }
            else
            {
                http_response_code(401);
                $this->set('message','');
            }
        }
}
