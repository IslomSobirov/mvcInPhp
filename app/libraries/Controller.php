<?php 
    //Controller loads models and views
    class Controller {
        public $model;
        public function model($model)
        {
            //Get the model
            require_once '../app/models/' .$model . '.php';

            return new $model();
        }

        public function view($view, $data = [])
        {
            if(file_exists('../app/views/' . $view . '.php'))
            {
                require_once '../app/views/' .$view . '.php';
            }
            else{
                die('View is not found');

            }
        }
    }