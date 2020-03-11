<?php 
    class Pages extends Controller
    {
        public function __construct()
        {
            $this->model = $this->model("Task");
        }
        public function index($page=0)
        {
            isset($_SESSION['order']) ? $order = $_SESSION['order'] : $order = "user_name";
            // $order = "user_name";
            if(isset($_POST['order']))
            {
                $_SESSION['order'] = $_POST['order'];
                $choice = $_SESSION['order'];
                if($choice == 1){$order = 'user_name';}
                else if($choice == 2){$order = 'email';}
                else if($choice == 3){$order = 'isDone';}
            }
            //Get number of elemets from db for pagination
            $num = $this->model->numOfElements();
            $num = ceil($num/3);
            if($page>0)
            {
                
                $tasks = $this->model->getTasks($page, $order);
                $data = [
                    'tasks' => $tasks,
                    'page' => $page,
                    'num' => $num
                ];
                return $this->view('/pages/index', $data);

            }
            $tasks = $this->model->getTasks($page, $order);
            $data = [
                'tasks' => $tasks,
                'num' => $num,
                'page' => $page
            ];
            
            return $this->view('/pages/index', $data);
        }

        public function show($id)
        {
            $task = $this->model->find($id);
            $data = [
                'task' => $task,
            ];
            return $this->view('/pages/show', $data);
        }

        public function edit($id, $data=[])
        {
            $task = $this->model->find($id);
            $data = [
                'task' => $task,
                'data' => $data
            ];
            return $this->view('/pages/edit', $data);
        }

        public function editTask()
        {            

            $id = $_POST['id'];
            $name = filter_var($_POST['name']);
            $email = filter_var($_POST['email']);
            $text = filter_var($_POST['text']);
            $isDone = filter_var($_POST['isDone']);

            if(!empty($name) && !empty($email) && !empty($text) )
            {
                
                $result = $this->model->update($id, $name, $email, $text, $isDone);
                if($result){
                    $tasks = $this->model->getTasks();
                    $data = [
                        'tasks' => $tasks,
                        'success' => 'Обновлено'
                    ];
                    return $this->view('/pages/index', $data);
                }
                else{
                    $tasks = $this->model->getTasks();
                    $data = [
                        'tasks' => $tasks,
                        'error' => 'Что-то пошло не так'
                    ];
                    return $this->view('/pages/index', $data);
                }

            }

            $data = [
                'tasks' => $tasks,
                'error' => 'Что-то пошло не так'
            ];
            
            $tasks = $this->model->getTasks();
            return $this->edit($id, ["error" => "Пожалуйста, заполните все поля"]);

        }

        public function create()
        {
            return $this->view('/pages/create');
        }

        public function createTask()
        {
            $num = $this->model->numOfElements();
            $num = ceil($num/3);

            $name = filter_var($_POST['name']);
            $email = filter_var($_POST['email']);
            $text = filter_var($_POST['text']);

            if(!empty($name) && !empty($email) && !empty($text))
            {
                $result = $this->model->create($name, $email, $text);
                if($result)
                {
                    $tasks = $this->model->getTasks();
                    $data = [
                        'tasks' => $tasks,
                        'success' => 'Задача создано успешно!',
                        'num' => $num,
                        'page' => 0
                    ];
                    return $this->view('/pages/index', $data);
                }
                else{
                    $tasks = $this->model->getTasks();
                    $data = [
                        'tasks' => $tasks,
                        'error' => 'Что-то пошло не так',
                        'num' => $num,
                        'page' => 0
                    ];
                    return $this->view('/pages/index', $data);
                }
            }
        }

        public function destroy($id)
        {

            $result = $this->model->destroy($id);
            $tasks = $this->model->getTasks();
            $num = $this->model->numOfElements();
            $num = ceil($num/3);
            if($result)
            {
                    $data = [
                        'tasks' => $tasks,
                        'success' => 'Задача удалено успешно!',
                        'num' => $num,
                        'page' => 0
                    ];
                return $this->view('/pages/index', $data); 
            }
            else{
                $data = [
                    'tasks' => $tasks,
                    'error' => 'Что-то пошло не так',
                    'num' => $num,
                    'page' => 0
                ];
                return $this->view('/pages/index', $data); 
            }
        }

        public function order()
        {
            $num = $this->model->numOfElements();
            $num = ceil($num/3);
            if(isset($_POST['order']))
            {
                $choice = $_POST['order'];
                if($choice == 1)
                {
                    $tasks = $this->model->orderByName();
                }
                else if($choice == 2){
                    $tasks = $this->model->orderByEmail();
                }
    
                else if($choice == 3){
                    $tasks = $this->model->orderByStatus();
                }
                $data = [
                    'tasks' => $tasks,
                    'num' => $num,
                    'page' => 3
                ];
                return $this->view('/pages/index', $data);
            }
            $tasks = $this->model->getTasks();
            $data = [
                'tasks' => $tasks,
                'num' => $num,
                'page' => 0
            ];
            return $this->view('/pages/index', $data);
            
        }

    }