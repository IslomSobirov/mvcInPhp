<?php   require_once ROOT . '/views/include/header.php';
        require_once ROOT . '/views/include/nav.php'; 
?> 

<div class="container">

<form method="POST" action="<?=URLROOT?>/pages/createTask">
    <h3 class="text-center mt-4">Создать задачу</h3>
    <div class="form-group">
    <label for="exampleFormControlInput1">Имя пользователя</label>
    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Имя пользователя">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Е-адрес</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Описание задачи</label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button class="btn btn-primary">Создать</button>
  <a class="btn btn-secondary" href="<?=URLROOT?>/">Назад</a>
</form>

</div>


<?php require_once ROOT . '/views/include/footer.php'; ?> 
