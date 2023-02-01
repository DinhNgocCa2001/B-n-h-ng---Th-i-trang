<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng kí</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form  action="?controller=User&action=do_register" method="POST">
    <h1 class="text-center">Đăng kí</h1>
    <div class="container bg-light">
        <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo ($_SESSION['error_message']); $_SESSION['error_message']=null;?>
        </div>
        <?php endif;?>
    <div class="container bg-light">
        <div class="mb-3">
            <label for="ten" class="form-label">First name</label>
            <input type="text" name="ten" class="form-control" id="ten" placeholder="First name" value="<?php echo isset($_SESSION['ten']) ? $_SESSION['ten'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="ho" class="form-label">Last name</label>
            <input type="text" name="ho" class="form-control" id="ho" placeholder="Last name" value="<?php echo isset($_SESSION['ho']) ? $_SESSION['ho'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="sdt" class="form-label">Phone number</label>
            <input type="number" name="sdt" class="form-control" id="sdt" placeholder="Phone number" value="<?php echo isset($_SESSION['sdt']) ? $_SESSION['sdt'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="dia_chi" class="form-label">Address</label>
            <input type="text" name="dia_chi" class="form-control" id="dia_chi" placeholder="Address" value="<?php echo isset($_SESSION['dia_chi']) ? $_SESSION['dia_chi'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">User name</label>
            <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Password">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="male" value="male">
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="female" value="female" checked>
            <label class="form-check-label" for="female">
                Female
            </label>
        </div>
        <div>
            <input type="reset" class="btn btn-outline-secondary">
            <input type="submit" class="btn btn-outline-primary" value="Đăng kí">
        </div>
    </div>
</form>
<?php //session_destroy();?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

