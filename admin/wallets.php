<?php 
include('../path.php');
include('server.php');

$pageName = "Wallets";

if(isset($_POST['wallet_edit'])){
    unset($_POST['wallet_edit']);
    update('wallets', 1, $_POST);
}

$wallets = selectOne('wallets', ['id' => 1]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
</head>
<body>
    
    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>
    
    <div class="form">
            <div class="container">
                <div class="left">
                    <h3>Wallet Address </h3>
                    <form method="POST" enctype="multipart/form-data">

                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>
                       
                        <input type="text" placeholder="btc" name="bitcoin" value="<?php echo $wallets['bitcoin'] ?>">
                        <input type="text" placeholder="eth" name="eth" value="<?php echo $wallets['eth'] ?>">
                        <input type="text" placeholder="usdt" name="usdt" value="<?php echo $wallets['usdt'] ?>">
                        
                        <button name="wallet_edit" type="submit">Update</button>
                    
                    </form>
                </div>
            
            </div>
        
        </div>
        
    </main>
    
    <?php include(ROOT_PATH . "/admin/includes/footer.php"); ?>
    
</body>
</html>