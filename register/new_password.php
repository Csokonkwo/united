<?php 

$pageName = 'New Password';
include("../path.php");
require_once 'server.php';

if(!isset($_GET['new_pass'])){
    header('location: signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<?php include(ROOT_PATH . '/register/includes/head.php'); ?>

</head>
<body>
    
<?php include(ROOT_PATH . '/register/includes/header.php'); ?>

    <!-------------- Hero Section --------->
        
    

            <div class="form">
                <div class="container">
                <form action="new_password.php" method="POST" class="form-container">
                    <h3 class="center">Update Password</h3>

                    <?Php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>

                    <div>
                        <input type="password" name="password" placeholder="New Password" class="text-input" oninput="checkLength(this, 6)">
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Confirm New Password" name="password_2" class="text-input" oninput="checkLength(this, 6)">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="new_password" class="btn"> Update Password</button>
                    </div>

                    
                </form>

                
            </div>
        </div>
    

    <?php include(ROOT_PATH . '/register/includes/footer.php'); ?>
</body>
</html>