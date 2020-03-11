<?php   require_once ROOT . '/views/include/header.php';
        require_once ROOT . '/views/include/nav.php'; 
?> 

<div class="container">
<?php if(isset($data['success'])): ?> 
    <h2 class="text-center alert alert-success"><?=$data['success']?></h2>
<?php endif ?>
<h3 class="text-center mt-4">Login to your profile</h3>
    <?php if(isset($data['error'])){ ?>
        <p class="text-danger text-center"><?= $data['error']?></p>
    <?php } ?>
    <form method="POST" action="<?= URLROOT ?>/signIn/login">
    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter login">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php require_once ROOT . '/views/include/footer.php'; ?> 