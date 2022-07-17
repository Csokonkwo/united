<?php 

include('../path.php');
include('server.php');

if($_SESSION['admin'] < 4){
    header('location: ../app/index.php');
    exit();
}

$referrals = selectAll('users', ['referrer_id' => $_GET['user_id']]);
$user = selectOne('users', ['id' => $_GET['user_id']]);

if(isset($_GET['reset'])){
    $u_id = $_GET['user_id'];
    $_POST['password'] = 123456;
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    update('users', $u_id, $_POST);

    $_SESSION['message'] =  $user['username'] . "'s Password has been changed to 123456";
    $_SESSION['alert-class'] = "alert-success";

    header('location:' . BASE_URL .'/admin/users.php');
    exit();

    if($table == "transactionz"){
        header('location: history.php');
    }
}

$confirmedDeposits = sum('amount', 'transactionz', ['type'=> '"deposit"', 'user_id' => $_GET['user_id'], 'status'=> '"3"']);
$confirmedReferrals = sum('amount', 'transactionz', ['type'=> '"referral"', 'user_id' => $_GET['user_id'], 'status'=> '"3"']);
$confirmedInterests = sum('amount', 'interests', ['type'=> '"interest"', 'user_id' => $_GET['user_id']]);
$confirmedCredits = sum('amount', 'transactionz', ['type'=> '"transfer"', 'user_id' => $_GET['user_id'], 'status'=> '"2"']);

$confirmedCashouts = sum('amount', 'transactionz', ['type'=> '"withdrawal"', 'user_id' => $_GET['user_id']]);
$confirmedinvestments = sum('amount', 'transactionz', ['type'=> '"investment"', 'user_id' => $_GET['user_id'], 'status'=> '"2"']);
$confirmedDebits = sum('amount', 'transactionz', ['type'=> '"transfer"', 'user_id' => $_GET['user_id'], 'status'=> '"2"']);

$income = $confirmedDeposits + $confirmedReferrals + $confirmedInterests + $confirmedCredits;
$expenditure = $confirmedCashouts + $confirmedinvestments + $confirmedDebits;

$balance = $income - $expenditure;
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
    
</head>
<body>
    
    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>

        <div class="profile"> 
           <div class="container">
               
               <div class="right">
                   <div class="head">
                       <a href="user_profile.php?user_id=<?php echo $user['id'] ?>&reset=1">Reset Password</a>
                   </div>
                   
                   <div class="content">
                       <h2>Account Details</h2>
                       <p>Account Balance: <span><?php echo $balance ?></span></p>
                       <p>Verified: <span><?php if($user['verified'] == 1){echo 'yes';}else{echo 'Not Verified';}  ?></span></p>
                       <p>Fullname: <span><?php if(isset($user['firstname'])){echo $user['firstname'] . ' '; echo $user['lastname'] ;} else{echo '<a href="../register/update_profile.php"> Please update profile </a>';}?> </span></p>
                       <p>Username: <span><?php echo $user['username'] ?></span></p>
                       <p>Email: <span><?php echo $user['email'] ?></span></p>
                       <p>Mobile: <span><?php if(isset($user['phone'])){echo $user['phone'];} else{echo '<a href="../register/update_profile.php"> Update profile </a>';}?></span></p>
                       <p>Country: <span><?php echo $user['country'] ?></span></p>
                       <p>Gender: <span><?php if(isset($user['gender'])){echo $user['gender'];} else{echo '<a href="../register/update_profile.php"> Update profile </a>';}?></span></p>
                       <p>Date Created: <span><?php echo date('F j, Y.', strtotime($user['created_at'])) ?></span></p>
                       
                   </div>
               </div>
           
           </div>
        </div>
        
        

        <div class="table">
            <i class="fa fa-history"> </i> Transactions
            <div class="container">
        <?php $transactions = selectAll('transactionz', ['user_id' => $_GET['user_id']]); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>User_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Reference</th>
                        <th>Date_created</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($transactions as $key => $transaction): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $transaction['id'] ?></td>
                            <td><?php echo $transaction['user_id'] ?></td>
                            <td><?php echo $transaction['amount'] ?></td>
                            <td><?php echo $transaction['type'] ?></td>
                            <td><?php echo $transaction['status'] ?></td>
                            <td><?php echo $transaction['reference'] ?></td>
                            <td><?php echo $transaction['created_at'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div> <br>

        <div class="table">
            <i class="fa fa-history"> </i> Interests
            <div class="container">
        <?php $interests = selectAll('interests', ['user_id' => $_GET['user_id']]); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>User_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Date_created</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($interests as $key => $interest): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $interest['id'] ?></td>
                            <td><?php echo $interest['user_id'] ?></td>
                            <td><?php echo $interest['amount'] ?></td>
                            <td><?php echo $interest['type'] ?></td>
                            <td><?php echo $interest['created_at'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div> <br>
        
        <div class="table">
            <i class="fa fa-history"> </i> Referrals
            <div class="container">
        <?php $referrer = selectOne('users', ['id'=> $_GET['user_id']]); ?>
            <h3> <?php echo $referrer['username'] ?>  's Downlines</h3>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>User_id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Invested</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($referrals as $key => $referral): ?>
                        <tr>
                        <?php $ifinvested = selectOne('transactionz', ['user_id'=> $referral['id'], 'type'=>'investment']); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $referral['id'] ?></td>
                            <td><?php echo $referral['username'] ?></td>
                            <td><?php echo $referral['email'] ?></td>
                            <td> <?php  if($ifinvested){ echo ('Yes');} else{echo ('No');} ?> </td>
                            
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