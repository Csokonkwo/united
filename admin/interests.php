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
            <i class="fa fa-piggy-bank"> </i> Interests/Earnings
                <?php $interests = selectAll('interests') ?>
                <table>
                    <thead>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan ="2">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($interests as $key => $interest): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $interest['user_id']]);  ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $interest['id'] ?></td>
                            <td><?php echo '$'. $interest['amount'] ?></td>
                            <td><?php echo $interest['type'] ?></td>
                            <td><?php echo $interest['status'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($interest['created_at'])); ?></td>
                            <td><a href="edit_transaction.php?edit=2&t_id=<?php echo $interest['id'] ?>">edit</a></td>
                            <td><a href="interests.php?delete=2&del_id=<?php echo $interest['id'] ?>">delete</a></td>
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