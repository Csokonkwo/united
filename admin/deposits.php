<?php 
include('../path.php');
include('server.php');

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
            <i class="fas fa-coins"> </i> Deposits
            <?php $deposits = selectAll('transactionz', ['type' => 'deposit']); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>amount</th>
                        <th>P_Method</th>
                        <th>Trans_Hash</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="3">Actions</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($deposits as $key => $deposit): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $deposit['user_id']]); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $deposit['id'] ?></td>
                            <td><?php echo $deposit['amount'] ?></td>
                            <td><?php echo $deposit['payment_method'] ?></td>
                            <td><a href="check_deposit.php?t_id=<?php echo $deposit['id']?>" >CHECK</a></td>
                            <td><?php echo $deposit['status'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($deposit['created_at'])) ?></td>
                            
                            <td><a href="deposits.php?status=1&t_id=<?php echo $deposit['id']?>" >Pending</a></td>
                            <td><a href="deposits.php?status=3&t_id=<?php echo $deposit['id']?>" >Completed</a></td>
                        
                            <td><a href="deposits.php?status=0&t_id=<?php echo $deposit['id']?>">Cancelled</a></td>
                            
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