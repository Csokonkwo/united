<?php

require '../includes/dbFunctions.php';

if(!isset($_SESSION['id'])){
    header('location: ../register/signin.php');
    exit();
}

$ban = selectOne('users', ['id' => $_SESSION['id']]);

if($ban['ban'] == 1){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['referrer_id']);
    
    header('location: ../index.php');
    exit();
}

$confirmedDeposits = sum('amount', 'transactionz', ['user_id'=> $_SESSION['id'], 'type'=> '"deposit"', 'status'=> '3']);
$confirmedReferrals = sum('amount', 'transactionz', ['user_id'=> $_SESSION['id'], 'type'=> '"referral"', 'status'=> '3']);
$confirmedInterests = sum('amount', 'interests', ['user_id'=> $_SESSION['id'], 'type'=> '"interest"', 'status'=> '3']);
$confirmedCredits = sum('amount', 'transactionz', ['user_id'=> $_SESSION['id'], 'type'=> '"transfer"', 'status'=> '3']);

$confirmedCashouts = sum('amount', 'transactionz', ['user_id'=> $_SESSION['id'], 'type'=> '"withdrawal"', 'status'=> '3']);
$confirmedinvestments = sum('amount', 'transactionz', ['user_id'=> $_SESSION['id'], 'type'=> '"investment"', 'status'=> '2']);
$confirmedDebits = sum('amount', 'transactionz', ['user_id'=> $_SESSION['id'], 'type'=> '"transfer"', 'status'=> '2']);

$income = $confirmedDeposits + $confirmedReferrals + $confirmedInterests + $confirmedCredits;
$expenditure = $confirmedCashouts + $confirmedinvestments + $confirmedDebits;

$balance = $income - $expenditure;
$portfolio = $balance + $confirmedinvestments;

$portfolio = number_format($portfolio, 2);

$id = '';
$amount = '';
$reference = '';
$errors = array();


if(isset($_POST['deposit'])){

    if($_POST['amount'] < 100){
        $errors['amount'] = "Minimum Deposit is $100";
    }

    if(strlen($_POST['payment_method']) < 7){
        $errors['payment_method'] = "Please choose a payment method";
    }

    if(empty($_FILES['reference']['name'])){
        $errors['image'] = "Select Proof of payment";
    }

    if(!empty($_FILES['reference']['name'])){
        $image_name = time(). "_" . $_FILES['reference']['name'];
        $destination = "img/deposits/" .$image_name;
        $result = move_uploaded_file($_FILES['reference']['tmp_name'], $destination);

        if($result){
            $_POST['reference'] = $image_name;
        }
        else{
            $errors['reference'] = "Failed to upload image";
        }
    }

    if (count($errors) === 0){
        
        $hashCheck = selectOne('transactionz', ['reference' => $_POST['reference']]);
        $pendingCheck = selectOne('transactionz', ['user_id'=> $_SESSION['id'], 'type'=> 'deposit', 'status'=> 0 ]);

        if(isset($pendingCheck)){
            $errors['pendingCheck'] = "You currently have pending Deposit";
        }

        if(isset($hashCheck)){
            $errors['pendingCheck'] = "Image already uploaded";
        }

        if (count($errors) === 0){
            unset($_POST['deposit']);
    
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['status'] = '1';
            $_POST['type'] = 'deposit';
            
            $makeDeposit = createUser('transactionz', $_POST);
    
            if($makeDeposit == true){
    
                $_SESSION['message'] = "Deposit pending";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: index.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Failed to make Deposit";}
        }
    
    }

    else{
        $amount = $_POST['amount'];
    }

}


if(isset($_POST['withdraw'])){

    if(strlen($_POST['reference']) < 16){
        $errors['reference'] = "Enter a valid Wallet Address";
    }

    if(strlen($_POST['payment_method']) < 7){
        $errors['payment_method'] = "Choose a payment method";
    }

    if($_POST['amount'] > $balance){
        $errors['balance'] = "Insufficient Balance";
    }

    if (count($errors) === 0){
        
        $pendingCheck = selectOne('transactionz', ['user_id'=> $_SESSION['id'], 'type'=> 'withdrawal', 'status'=> 0 ]);

        if(isset($pendingCheck)){
            $errors['pendingCheck'] = "You have a pending withdrawal";
        }

        if($_POST['amount'] < 100){
            $errors['amount'] = "Minimum withdrawal allowed is $100";
        }

        if (count($errors) === 0){

            unset($_POST['withdraw']);

            $_POST['user_id'] = $_SESSION['id'];
            $_POST['status'] = 1;
            $_POST['type'] = 'withdrawal';
            
            $makeDeposit = createUser('transactionz', $_POST);
    
            if($makeDeposit == true){
    
                $_SESSION['message'] = "withdrawal Pending";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: index.php");
                exit();
    
            }
        
            else {$errors['db_error'] = "Withdrawal not successful";}

        }

    } 

    else{
        $amount = $_POST['amount'];
        $reference = $_POST['reference'];
    }

}


if(isset($_POST['invest'])){

    if($_POST['amount'] < 100){
        $errors['amount'] = "Minimum Investment allowed is $100";
    }

    if($_POST['amount'] > $balance){
        $errors['Balance'] = "Insufficient Balance for this transaction";
    }

    if(strlen($_POST['reference']) < 3){
        $errors['reference'] = "Please choose a Package";
    }

    if (count($errors) === 0){
        unset($_POST['invest']);

        if($confirmedinvestments == 0){

            if(strlen($_SESSION['referrer_id']) > 3){
                $amountt = $_POST['amount'] * 0.05;
                $_GET['amount'] = $amountt;
                $_GET['user_id'] = $_SESSION['referrer_id'];
                $_GET['status'] = 3;
                $_GET['type'] = 'referral';
                $_GET['payment_method'] = 'Nil';

                $payReferrer = createUser('transactionz', $_GET);
               
            }
        }

        $_POST['user_id'] = $_SESSION['id'];
        $_POST['status'] = 2;
        $_POST['type'] = 'investment';
        $_POST['payment_method'] = 0;
        
        $makeInvest = createUser('transactionz', $_POST);

        if($makeInvest == true){

            $_SESSION['message'] = "Investment Successful";
            $_SESSION['alert-class'] = "alert-success";

            header("location: index.php");
            exit();

        }
        
        else {$errors['db_error'] = "Investment unsuccessful";}
    }

    else{
        $amount = $_POST['amount'];
    }

}

if(isset($_POST['transfer'])){

    if($_POST['amount'] <= 9){
        $errors['amount'] = "Minimum transfer allowed is $10";
    }

    if($_POST['amount'] > $balance){
        $errors['balance'] = "Insufficient Balance";
    }

    if(strlen($_POST['receiver_id']) < 4){
        $errors['balance'] = "Wrong A/c number";
    }

    if($_POST['receiver_id'] == $_SESSION['id']){
        $errors['receiver_id'] = "Please check the A/c number";
    }

    if($confirmedDeposits < 500){
        $errors['balance'] = "Transfers not activated for your account";
    }

    if (count($errors) === 0){
        unset($_POST['transfer']);

        $reciever = selectOne('users', ['id' => $_POST['receiver_id']]);

        if($reciever == TRUE){

            $charge = 0.05 * $_POST['amount'];
            $_GET['user_id'] = $_POST['receiver_id'];
            $_GET['amount'] = $_POST['amount'] - $charge;
            $_GET['type'] = 'transfer';
            $_GET['status'] = 3;
            $_GET['reference'] = $_SESSION['username'];
            $_GET['payment_method'] = 'credit';

            $sendMoney = createUser('transactionz', $_GET);

             if($sendMoney == TRUE){
                unset($_POST['receiver_id']);
                $_POST['user_id'] = $_SESSION['id'];
                $_POST['type'] = 'transfer';
                $_POST['status'] = 2;
                $_POST['reference'] = $reciever['username'];
                $_POST['payment_method'] = 'debit'; 
                
                $debitMoney = createUser('transactionz', $_POST);
             }

             if($debitMoney == true){

                $_SESSION['message'] = "Transfer to ". $reciever['username'] . ' Successful';
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: index.php");
                exit();
    
            }else {$errors['db_error'] = "Transfer failed";}
        }
        
    }else{$amount = $_POST['amount'];}

}



if(isset($_POST['upload_image'])){

    if(empty($_FILES['image']['name'])){
        $errors['image'] = "Please select Image";
    }

    if(!empty($_FILES['image']['name'])){
        $image_name = time(). "_" . $_FILES['image']['name'];
        $destination = "img/img/" .$image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }
        else{
            $errors['image'] = "Failed to upload Image";
        }
    }


    if (count($errors) === 0){
        unset($_POST['upload_image']);

        $updateImage = update('users', $_SESSION['id'], $_POST);

        if($updateImage  == true){

            $_SESSION['message'] = "Image uploaded Successfully";
            $_SESSION['alert-class'] = "alert-success";

            header("location: profile.php");
            exit();
        }
        
        else {$errors['db_error'] = "Failed to Upload Image, Please try to rename";}
    }
    
}


?>