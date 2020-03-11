<?php 
    class SignIn extends Controller
    {
        public function __construct()
        {
            $this->model = $this->model('Admin');
        }
        public function index()
        {
            
            return $this->view('/admin/index');
        }

        public function login()
        {
            
            $login = filter_var($_POST['login']);
            $password = filter_var($_POST['password']);
            if(!empty($login) && !empty($password))
            {
                $result = $this->model->login($login, $password);
                if($result)
                {
                    session_start();
                    $_SESSION['name'] = $login;
                    return $this->view('/admin/loggedIn', ['success' => 'Вы успешно вошли в систему!']);
                }
                else{
                    return $this->view('/admin/index', ['error' => 'Неверный пароль или логин']);
                }
            }
            return $this->view('/admin/index', ['error' => 'Пожалуйста, заполните все поля']);

        }

        public function logout()
        {
            session_start();
            session_unset();
            session_destroy();
            return $this->view('/admin/index', ['success' => 'Вы успешно вышли из системы!']);
        }


    }