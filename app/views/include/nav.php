<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=URLROOT?>/">Главная</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?=URLROOT?>/pages/create">Создать задачу</a>
      </li>
    </ul>
    <ul class="nav justify-content-end navbar-nav">
        <?php if(isset($_SESSION['name'])): ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?=URLROOT?>/signIn/logout">Выйти из системы</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?=URLROOT?>/signIn/index">Войти в систему</a>
            </li>
        <?php endif ?>
    </ul>
      
      

    
  </div>
</nav>