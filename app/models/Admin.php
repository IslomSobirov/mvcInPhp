<?php 
    class Admin{
        private $conn;
        public function __construct(){
            $this->conn = new Database();
        }

        public function login($login, $password)
        {
            
            $sql = 'SELECT * from users where login = :login AND password = :password';
            $this->conn->query($sql);
            $this->conn->bind(':login', $login, PDO::PARAM_STR);
            $this->conn->bind(':password', $password, PDO::PARAM_STR);

            $this->conn->execute();
            $result = $this->conn->single();
            if(!empty($result))
            {
                return true;
            }

            return false;
            
        }

    }