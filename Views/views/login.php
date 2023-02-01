<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form  action="?controller=User&action=do_login" method="POST">
    <h1 class="text-center">Đăng nhập</h1>
    <div class="container bg-light">
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo ($_SESSION['error_message']); $_SESSION['error_message']=null;?>
        </div>
        <?php endif;?>
    <div class="container bg-light">
        <div class="mb-3">
            <label for="user_name" class="form-label">User name</label>
            <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ""?>">
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Password">
        </div>

        <div>
            <input type="reset" class="btn btn-outline-secondary">
            <input type="submit" class="btn btn-outline-primary" value="Đăng nhập">
        </div>
    </div>
</form>
<?php //session_destroy();?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>