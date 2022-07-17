<?php 
include('../path.php');
include('server.php');

if($_GET['edit'] == 1){
    $table = 'transactionz';
}
if($_GET['edit'] == 2){
    $table = 'interests';
}

$transaction = selectOne($table, ['id' => $_GET['t_id']]);

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
                Edit <span style = "text-transform: capitalize"><?php echo $table; ?></span>
                <form method="POST" action="">
                    <?Php if(count($errors) > 0): ?>
                    <div class="alert error">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?>.</li>
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>

                    <input type="hidden" name="table" value= "<?php echo $table ?>" class="text-input">

                    <?php foreach($transaction as $key => $value): ?>
                        
                    <input type = "<?php if($key == 'id'){echo 'hidden';} else{echo 'text';} ?>" name="<?php echo $key ?>" value= "<?php echo $value; ?>" placeholder="<?php echo $key ?>">
                    <?php endforeach; ?>

                    <button type="submit" name="edit_transaction" class="btn btn-big">Submit</button>
                
                </form>
            </div>
        </div>

        <div class="table">
            <div class="container">     
            <i class="fa fa-calendar"> </i> Transactions
                <?php $transactions = selectAll($table); ?>
                <table>
                    <thead>
                        <th>S/N</th>
                        <th>USERNAME</th>
                        
                        <th>T_ID</th>
                        <th>AMOUNT</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <?php if($table != 'interests'): ?>
                        <th>P_METHOD</th>
                        <th>REFERENCE</th>
                        <?php endif; ?>
                        <th>DATE</th>
                        <th colspan="2">Actions</th>
                    </thead>
                    <tbody>
                    <?php foreach ($transactions as $key => $transaction): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $transaction['user_id']]); 
                            if($transaction['type'] == 'deposit' || $transaction['status'] == 'received'){
                                $color='green'; 
                            }
        
                            if($transaction['type'] == 'withdrawal' || $transaction['status'] == 'sent'){
                                $color='red'; 
                            }
                            
                            if($transaction['type'] == 'investment'){
                                $color='blue'; 
                            }
                            if($transaction['type'] == 'interest'){
                                $color='green'; 
                            }

                            if($transaction['type'] == 'referral'){
                                $color='green'; 
                            }
                        
                        ?>
                            <td style="color:<?php echo $color?>"><?php echo $key + 1 ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $userT['username'] ?></td>

                            <td style="color:<?php echo $color?>"><?php echo $transaction['id'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo '$'. $transaction['amount'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['type'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['status'] ?></td>
                            <?php if($table != 'interests'): ?>
                            <td><?php echo $transaction['payment_method'] ?></td>
                            <td><?php echo $transaction['reference'] ?></td>
                            <?php endif; ?>
                            <td style="color:<?php echo $color?>"><?php echo date('F j, Y.', strtotime($transaction['created_at'])); ?></td>

                            <td><a href="edit_transaction.php?edit=<?php echo $_GET['edit'] ?>&t_id=<?php echo $transaction['id'] ?>">edit</a></td>
                            <td><a href="history.php?delete=1&u_id=<?php echo $transaction['id'] ?>">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <?php include(ROOT_PATH . "/admin/includes/footer.php"); ?>
    
</body>
</html>