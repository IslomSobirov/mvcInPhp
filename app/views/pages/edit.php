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
<form method="POST" action="<?=URLROOT?>/pages/editTask">
<input name="id" value="<?=$data['task']->id?>" type="hidden">
    <h3 class="text-center mt-4">Редактировать задачу</h3>
    <div class="form-group">
    <label for="exampleFormControlInput1">Имя пользователя</label>
    <input name="name" value="<?=$data['task']->user_name?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Имя пользователя">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Е-адрес</label>
    <input name="email" value="<?=$data['task']->email?>" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Описание задачи</label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="4"><?=$data['task']->text?></textarea>
  </div>
  <select name = "isDone" class="form-control mb-2">
    <option value="1">Выполнено</option>
    <option value="0">В ожидании</option>
  </select>
  <button class="btn btn-primary">Обновить</button>
  <a class="btn btn-secondary" href="<?=URLROOT?>/">Назад</a>

</form>

</div>


<?php require_once ROOT . '/views/include/footer.php'; ?> 
