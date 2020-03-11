<?php 
    class Task{
        private $conn;
        public function __construct(){
            $this->conn = new Database();
        }

        public function getTasks($page=0, $order='user_name')
        {   
            if($page>0)
            {                
                $s = $page*3;
                $sql = 'SELECT * from tasks ORDER BY ' .$order. ' LIMIT ' . $s . ',3';

                $this->conn->query($sql);
                return $this->conn->resultSet();
            }

            $sql = 'SELECT * from tasks ORDER BY ' . $order . ' LIMIT 3';
            $this->conn->query($sql);
            return $this->conn->resultSet();
        }

        public function numOfElements()
        {
            $sql = 'SELECT * from tasks';
            $this->conn->query($sql);
            $numOfEL = count($this->conn->resultSet());
            return $numOfEL;
        }

        public function find($id)
        {
            $sql = 'SELECT * from tasks where id = :id';
            $this->conn->query($sql);
            $this->conn->bind(':id', $id);
            return $this->conn->single();
        }

        public function create($name, $email, $text)
        {
            $sql = 'INSERT INTO tasks (user_name, email, text) VALUES(:name, :email, :text)';
            $result = $this->conn->query($sql);
            $this->conn->bind(':name', $name);
            $this->conn->bind(':email', $email);
            $this->conn->bind(':text', $text);
            

            if($this->conn->execute())
            {
                return true;
            }
            else{
                return false;
            }
        }

        public function update($id, $name, $email, $text, $isDone)
        {
            $sql = 'UPDATE tasks SET user_name=:name, email=:email, text=:text, isDone=:isDone WHERE id=:id';
            $result = $this->conn->query($sql);
            $this->conn->bind(':name', $name);
            $this->conn->bind(':email', $email);
            $this->conn->bind(':text', $text);
            $this->conn->bind(':isDone', $isDone);
            $this->conn->bind(':id', $id);

            

            if($this->conn->execute())
            {
                return true;
            }
            else{
                return false;
            }
        }

        public function destroy($id)
        {
            $sql = 'DELETE FROM tasks WHERE id=' .$id;
            $this->conn->query($sql);
            if($this->conn->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function orderByName()
        {
            $sql = 'SELECT * from tasks ORDER BY user_name limit 3';
            $this->conn->query($sql);
            return $this->conn->resultSet();
        }

        public function orderByEmail()
        {
            $sql = 'SELECT * from tasks ORDER BY email  limit 3';
            $this->conn->query($sql);
            return $this->conn->resultSet();
        }

        public function orderByStatus()
        {
            $sql = 'SELECT * from tasks ORDER BY isDone  limit 3';
            $this->conn->query($sql);
            return $this->conn->resultSet();
        }

    }