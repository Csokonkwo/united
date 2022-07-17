<?php 

include('../path.php');
include('server.php');

if(isset($_GET['verified'])){
    $verified = $_GET['verified'];
    $u_id = $_GET['u_id'];
    update('users', $u_id, ['verified'=> $verified]);
}

if(isset($_GET['ban'])){
    $ban = $_GET['ban'];
    $u_id = $_GET['u_id'];
    update('users', $u_id, ['ban'=> $ban]);
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
</head>

<body>
    
    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>
    
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>

        <div class="form">
            <div class="container">
                Register a New Member
                <form method="POST" action="">
                    <?Php if(count($errors) > 0): ?>
                    <div class="alert error">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?>.</li>
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>
                    <input type="text" name="username" placeholder="USERNAME">
                    <input type="email" name="email" placeholder="EMAIL">
                    <input type="text" name="country" placeholder="COUNTRY">
                    <input type="text" name="referrer_id" placeholder="REFERRER_ID">
                    
                    <button name="signup" type="submit">Submit</button>
                </form>
            </div>
        </div> <br>
        
        <div class="table">
            <div class="container"> 
                <i class="fa fa-users"> </i> Registered Members
                <?php $users = selectAll('users'); ?>
                <table>
                    <thead>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Country</th>
                        <th>Referrer</th>
                        <th>Date_created</th>
                        <th colspan="2">Actions</th>
                    </thead>
                    
                    <tbody>
                    <?php foreach ($users as $key => $user): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td> <a href="user_profile.php?user_id=<?php echo $user['id'] ?>">CHECK_PROFILE</a></td>
                            <td><?php echo $user['country'] ?></td>
                            <td><?php $usern = selectOne('users', ['id'=> $user['referrer_id'] ] ); if($usern){echo $usern['username'];} else{echo "None";}  ?></td>
                            <td><?php echo date('F j, Y.', strtotime($user['created_at'])) ?></td>

                            <?php if($user['verified'] === 0): ?>
                            <td><a style ="color:red" href="users.php?verified=1&u_id=<?php echo $user['id'] ?>" class="Verify">Verify</a></td>               
                            <?php else: ?>
                            <td><a style ="color:green" href="users.php?verified=0&u_id=<?php echo $user['id'] ?>" class="Unverify">Unverify</a></td>
                            <?php endif; ?>

                            <?php if($user['ban'] === 0): ?>
                            <td><a style ="color:green" href="users.php?ban=1&u_id=<?php echo $user['id'] ?>">Suspend</a></td>
                            <?php else: ?>
                            <td><a style ="color:red" href="users.php?ban=0&u_id=<?php echo $user['id'] ?>">Unsuspend</a></td>
                            <?php endif; ?>
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