<?php 
include('../path.php');
include('server.php');

//include('../register/mailer.php');

if(isset($_GET['status'])){
    $status = $_GET['status'];
    $t_id = $_GET['t_id'];
    update('transactionz', $t_id, ['status'=> $status]);
    if(isset($_GET['u_id'])){
        $hash = bin2hex(random_bytes(30));
        $casUser = selectOne('users', ['id' => $_GET['u_id']]);
        sendCashoutConfirm($casUser['email'], $casUser['username'], $_GET['a_id'], $hash);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
</head>
<body>
    
    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>

        <div class="table">
            <div class="container">     
            <i class="fa fa-credit-card"> </i> Withdrawals
            <?php $withdrawals = selectAll('transactionz', ['type' => 'withdrawal']); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>amount</th>
                        <th>P_method</th>
                        <th>Wallet Address</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="2">Actions</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($withdrawals as $key => $withdrawal): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $withdrawal['user_id']]); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $withdrawal['id'] ?></td>
                            <td><?php echo $withdrawal['amount'] ?></td>
                            <td><?php echo $withdrawal['payment_method'] ?></td>
                            <td><?php echo $withdrawal['reference'] ?></td>
                            <td><?php echo $withdrawal['status'] ?></td>
                            <td><?php echo $withdrawal['created_at'] ?></td>
                            
                            <?php if($withdrawal['status'] != 3 ): ?>
                            <td><a href="withdrawal.php?status=3&t_id=<?php echo $withdrawal['id']?>&u_id=<?php echo $withdrawal['user_id'] ?>&a_id=<?php echo $withdrawal['amount'] ?>"> Paid</a></td>
                            <?php endif; ?>
                            <td><a href="withdrawal.php?status=0&t_id=<?php echo $withdrawal['id']?>">Cancel</a></td>                       
                        
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