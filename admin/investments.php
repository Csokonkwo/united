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
            <i class="fas fa-briefcase"> </i> investments
            <?php $investments = selectAll('transactionz', ['type' => 'investment']); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>amount</th>
                        <th>package</th>
                        <th>Status</th>
                        <th>Num of pay</th>
                        <th>Date</th>
                        <th colspan="3">Actions</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($investments as $key => $investment): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $investment['user_id']]); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $investment['id'] ?></td>
                            <td><?php echo $investment['amount'] ?></td>
                            <td><?php echo $investment['reference'] ?></td>
                            <td><?php echo $investment['status'] ?></td>
                            <td><?php echo $investment['payment_method'] ?></td>
                            <td><?php echo $investment['created_at'] ?></td>
                            <?php if($investment['status'] != 3 ): ?>
                            <td><a href="investments.php?status=2&t_id=<?php echo $investment['id']?>" >In Process</a></td>
                            <td><a href="investments.php?status=3&t_id=<?php echo $investment['id']?>" >Completed</a></td>
                            <?php endif; ?>
                            <td><a href="investments.php?status=1&t_id=<?php echo $investment['id']?>">Pending</a></td>                       
                        
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