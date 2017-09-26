<?php
    // Nathan Thomas
    // Professor Rob Dillon
    // Date 9 / 26 / 2017
    // Assignment 2 : MVC Framework

    class Controller
    {
        public $model;
        public $load;

        function __construct()
        {
            $this->model = new User();
            $this->load = new Load();
            $this->home();
        }

        function home()
        {
            $this->model->__set('user_id','thomanat');
            $this->model->__set('first_name','Nathan');
            $this->model->__set('last_name','Thomas');
            $this->model->__set('email','thomanat@iupui.edu');
            $this->model->__set('role','Administrator');

            $data = $this->model->getName();

            $this->load->view('view.php',$data);
        }
    }
?>