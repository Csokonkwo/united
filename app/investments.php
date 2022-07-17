<?php

include("../path.php");
require("server.php");
$pageName = "Investments";
$investments = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'investment']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php") ?>
</head>

<body>
    <script> 

    var balance = "<?php echo $balance; ?>"

    </script>
    <?php include("header.php") ?>
        <div class="deposit">
            <div class="container">
                <div class="left">
                    <h3>Invest </h3>
                    <form onsubmit="return calcInvest()" action="investments.php"  method="POST">

                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>
                       
                        <div class="max-wrap">
                            <input class="max-input" type="text" placeholder="Enter amount, $<?php echo $balance ?> available" name="amount" id="invest-amount" value="<?php echo $amount ?>">
                            <span onclick="inputMax()" class="max-btn">Max</span>
                        </div>
                        
                        <select name="reference" id="invest-plan" oninput="return calcInv()">
                            <option value="basic">Basic</option>
                            <option value="regular">Regular</option>
                            <option value="standard">Standard</option>
                            <option value="premium">Premium</option>
                        </select>

                        <p id="expecteda"> </p> <br>
                        
                        <button name="invest" type="submit">Submit</button>
                    
                    </form>
                </div>
            
            </div>
        
        </div>
        
        <div class="trans">
        <h3>Investment History</h3>
        <?php $shares_trans = selectStaz('transactionz', 10, ['user_id' => $_SESSION['id'], 'type' => 'investment']); ?>
            <div class="container">
                <?php foreach($shares_trans as $shares_tran):
                    
                    if($shares_tran['status'] == 1){
                        $shares_tran['status'] = 'pending';
                    }
        
                    else if($shares_tran['status'] == 2){
                        $shares_tran['status'] = 'confirmed';
                    }
        
                    else if($shares_tran['status'] == 3){
                        $shares_tran['status'] = 'completed';
                    }
        
                    else if($shares_tran['status'] == 0){
                        $shares_tran['status'] = 'cancelled';
                    }
                    
                    ?>
                <div class="box">
                    <div class="left">
                        <span>Transaction ID: <?php echo $shares_tran['id'] ?></span>
                        <span>Plan: <?php echo $shares_tran['reference'] ?></span>
                        <span> <?php echo $shares_tran['payment_method'] ?> Pay</span>
                    </div>

                    <div class="right">
                        <span>Order <?php echo $shares_tran['status'] ?></span>
                        <span><?php echo date('F j, Y.', strtotime($shares_tran['created_at'])); ?></span>
                        <span>$<?php echo number_format($shares_tran['amount'], 2) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        
    </div>
        <?php include("footer.php") ?>

        <script src="<?php echo BASE_URL .'/js/calculator.js'?>"></script>
    
</body>
</html>