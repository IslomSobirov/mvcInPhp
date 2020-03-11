<?php   require_once ROOT . '/views/include/header.php';
        require_once ROOT . '/views/include/nav.php'; 
?>

<div class="container">
<div class="card text-center">
  <div class="card-header">
    Задача
  </div>
  <div class="card-body">
    <h5 class="card-title">
        <?=$data['task']->email?>
    </h5>
    <p class="card-text">
        <?=$data['task']->text?>
    </p>
    <!-- <a href="<?=URLROOT?>/" class="btn btn-primary">Назад</a> -->
    <a href="<?=URLROOT?>/" class="btn btn-primary">Назад</a>
    <?php if(isset($_SESSION['name'])) :?>
    <a href="<?=URLROOT?>/pages/destroy/<?=$data['task']->id?>" class="btn btn-danger">Удалить</a>
    <a href="<?=URLROOT?>/pages/edit/<?=$data['task']->id?>" class="btn btn-secondary">Редактировать</a>
    <?php endif?>
  </div>
  <div class="card-footer text-muted">
    <?=$data['task']->created_at?>
  </div>
</div>
</div>

<?php require_once ROOT . '/views/include/footer.php'; ?> 
