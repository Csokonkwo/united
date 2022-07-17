<?php 

include('../path.php');
include('server.php');

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['referrer_id']);
    header('location: ../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
</head>
<body>
    
    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>
    
        <div class="stats">
            <div class="container">
                <div class="box">
                    <a href="">Users</a>
                    <div class="">
                        <i class="fa fa-users"></i> <span><?php echo $totalUsers ?></span>
                    </div>
                </div>
                
                <div class="box">
                    <a href="">Deposits</a>
                    <div class="">
                        <i class="fa fa-bar-chart"></i> <span>$<?php echo number_format($confirmedDeposits, 2); ?></span>
                    </div>
                </div>
                
                <div class="box">
                    <a href="">Withdrawals</a>
                    <div class="">
                        <i class="fa fa-pie-chart"></i> <span>$<?php echo number_format($totaLWithdrawals, 2); ?></span>
                    </div>
                </div>
                
                <div class="box">
                    <a href="">Investments</a>
                    <div class="">
                        <i class="fa fa-line-chart"></i> <span>$<?php echo number_format($totaLInvestments, 2); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    
    <?php include(ROOT_PATH . "/admin/includes/footer.php"); ?>
    
</body>
</html>