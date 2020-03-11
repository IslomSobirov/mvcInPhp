<?php   require_once ROOT . '/views/include/header.php';
        require_once ROOT . '/views/include/nav.php'; 
?> 


<div class="container">
<?php if(isset($date['success'])): ?>
    <h4 class="text-center alert alert-success"><?= $data['success']?></h4>
<?php endif ?>
<?php if(isset($date['error'])): ?>
    <h4 class="text-center alert alert-danger"><?= $data['error']?></h4>
<?php endif ?>
<h3 class="text-center mt-4 mb-4">Задачи</h3>

<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Все задачи</h4>
                    </div>
                    <form action="<?=URLROOT?>/pages/index" method="POST">
                        <select onchange="this.form.submit()" name="order">
                            <option value="1">Сортировать</option>
                            <option value="1">по имени</option>
                            <option value="2">по э-почте</option>
                            <option value="3">по статусу</option>
                        </select>
                    </form>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Ид</th>
                            <th>Пользователь</th>
                            <th>Эл. адрес</th>
                            <th>Статус</th>
                            <th>Детали</th>
                            <?php if(isset($_SESSION['name'])) : ?>
                            <th>Редактировать</th>
                            <?php endif ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data['tasks'] as $task) : ?>
                        <tr>
                            <td><?=$task->id?></td>
                            <td><?= $task->user_name?></td>
                            <td><?= $task->email?></td>
                            <td><?= $task->isDone ? "Отредактировано администратором" : "В ожидании"?></td>
                            <td>
                                <a href="<?=URLROOT?>/pages/show/<?= $task->id?>" class="btn btn-secondary">
                                    Детали
                                </a>
                            </td>
                            <?php if(isset($_SESSION['name'])) : ?>
                                <td>
                                    <div class="col-md-3">
                                            <a href="<?=URLROOT?>/pages/edit/<?= $task->id?>" class="btn btn-danger">
                                            Редактировать
                                            </a>
                                    </div>
                                </td>
                            <?php endif ?>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

                    <!-- PAGINATION -->
                    <nav class="ml-4">
                        <ul class="pagination">
                            <?php if($data['page'] == 0) :?>
                            <li class="page-item disabled">
                                <a href="#" class="page-link">предыдущий</a>
                            </li>
                            <?php else: ?>
                                <li class="page-item">
                                <a href="<?=URLROOT?>/pages/index/<?=$data['page']-1?>" class="page-link">предыдущий</a>
                            </li>
                            <?php endif?>
                            
                            
                            <?php if($data['page']+1 >= $data['num']) : ?>
                            <li class="page-item disabled">
                                <a href="<?=URLROOT?>/pages/index/<?=$data['page']+1?>" class="page-link">следующий</a>
                            </li>
                            <?php else: ?>
                                <li class="page-item">
                                <a href="<?=URLROOT?>/pages/index/<?=$data['page']+1?>" class="page-link">следующий</a>
                            </li>
                            <?php endif ?> 
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once ROOT . '/views/include/footer.php'; ?> 
