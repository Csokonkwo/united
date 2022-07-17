<?php

include (ROOT_PATH . '/includes/dbFunctions.php');

if(!isset($_SESSION['id'])){
    header('location: ../register/login.php');
    exit();
}

if($_SESSION['admin'] < 5){
    header('location: ../app/index.php');
    exit();
}

$userDetail = selectOne('users', ['id' => $_SESSION['id']]);
$_SESSION['id'] = $userDetail['id'];
$_SESSION['verified'] = $userDetail['verified'];
$_SESSION['referrer_id']= $userDetail['referrer_id'];


$id = '';
$user_id = '';
$username = '';
$amount = '';
$type = '';
$title = '';
$body = '';
$city = '';
$fullname = '';
$errors = array();

$confirmedDeposits = sum('amount', 'transactionz', ['type'=> '"deposit"', 'status'=> '3']);
$totaLWithdrawals = sum('amount', 'transactionz', ['type'=> '"withdrawal"']);
$totaLInvestments = sum('amount', 'transactionz', ['type'=> '"investment"']);
$pendingInterests = sum('amount', 'interests', ['status'=> '3']);
$totalUsers = count(selectAll('users'));


if(isset($_POST['add_transaction'])){

    unset($_POST['add_transaction']);

    if($_POST['type'] != 'investment'){
        $_POST['reference'] = $_SESSION['username'];
    }

    if($_POST['type'] == 'investment'){
        $_POST['payment_method'] = 0;
    }

    if(empty($_POST['user_id'])){
        array_push($errors, 'User_id is required');
    }

    if($_POST['amount'] < 1){
        array_push($errors, 'Amount is required');
    }

    if(empty($_POST['status'])){
        $_POST['status'] = 0;
    }

    $user = selectOne('users', ['id' => $_POST['user_id']]);

    if($user == false){
        array_push($errors, 'No user found');
    }
    
    if(count($errors)==0){

        $table = 'transactionz';
        
        if($_POST['type'] == 'interest'){
            $table = 'interests';
            if(isset($_POST['reference'])){
                unset($_POST['reference']);
                unset($_POST['payment_method']);
            }
            $_POST['status'] = 1;
        }

        $addmo = createUser($table, $_POST);
        
        if($addmo == True){
            successful_msg("Transaction Sent Successfully", 'history.php');
        }

        else{
            echo mysqli_error($conn);
            die();
        }
       
    }

    else{
        $amount = $_POST['amount'];
        $user_id = $_POST['user_id'];
    }

}


if(isset($_POST['edit_transaction'])){
    $table = $_POST['table'];
    $t_id = $_POST['id'];
    unset($_POST['table'], $_POST['edit_transaction'], $_POST['id']);

    foreach($_POST as $key => $value) {
        $value = trim($value);
        if(empty($value)){
            $errors[$key] = $key . " Cannot be empty" ;
        }
    }

    if(count($errors) == 0){
        update($table, $t_id, $_POST);
    }
}


if(isset($_POST['submit_blog_post'])){

    unset($_POST['submit_blog_post']);

    $_POST['created_at'] = date("Y-m-d H:i:s");

    if(strlen($_POST['title']) < 5){
        $errors['title'] = "Enter title";
    }

    if(strlen($_POST['body']) < 10){
        $errors['body'] = "Please blog details";
    }

    if(empty($_FILES['image']['name'])){
        $errors['image'] = "Please select an image";
    }

    if(!empty($_FILES['image']['name'])){
        $image_name = time(). "_" . $_FILES['image']['name'];
        $destination = "img/blog/" .$image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }
        else{
            $errors['image'] = "Failed to upload screenshot";
        }
    }

    if (count($errors) === 0){
        
        $titleCheck = selectOne('blog', ['title' => $_POST['title']]);

        if($titleCheck){
            $errors['titleCheck'] = "Blog post already exists";
        }

        if (count($errors) === 0){
    
            $_POST['published'] = 1;
            $_POST['username'] = $_SESSION['username'];

            $postblog = createUser('blog', $_POST);
    
            if($postblog == true){

                successful_msg("Post added to Blog successfully", 'blog.php');
    
            }
            
            else {$errors['db_error'] = "Failed to add Post";}
        }
    
    }

    else{
        $title = $_POST['title'];
        $body = $_POST['body']; 
    }

}


if(isset($_POST['testimonials_submit'])){

    if(strlen($_POST['fullname']) < 10){
        $errors['title'] = "Enter fullname";
    }

    if(strlen($_POST['body']) < 37){
        $errors['body'] = "Please testimony";
    }

    if(strlen($_POST['city']) < 2){
        $errors['city'] = "Please city";
    }

    if (count($errors) === 0){
        
        $fullnameCheck = selectOne('testimonials', ['fullname' => $_POST['fullname']]);

        if($fullname == TRUE){
            $errors['fullnameCheck'] = "This man posted in the past";
        }

        if (count($errors) === 0){
            unset($_POST['testimonials_submit']);
    
            $_POST['published'] = 1;
            $_POST['username'] = $_SESSION['username'];
            
            $postTestimonials = createUser('testimonials', $_POST);
    
            if($postTestimonials == true){
    
                $_SESSION['message'] = "Testimonial post successful";
                $_SESSION['alert-class'] = "success";
    
                header("location: testimonials.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Failed to post testimonials";}
        }
    
    }

    else{
        $title = $_POST['fullname'];
        $body = $_POST['body']; 
    }

}


if(isset($_POST['signup'])){

    if(strlen($_POST['username']) < 4){
        $errors['username'] = "Username must be at least 4 characters";
    }

    if(strlen($_POST['email']) < 7){
        $errors['email'] = "Please enter a valid email";
    }

    if(strlen($_POST['country']) < 3){
        $errors['country'] = "Please enter a country";
    }

    if(count($errors) == 0){
        unset($_POST['signup']);

        $usernameCheck = selectOne('users', ['username' => $_POST['username']]);
        $useremailCheck = selectOne('users', ['email' => $_POST['email']]);
        $refCheck = selectOne('users', ['id' => $_POST['referrer_id']]);

        if(isset($usernameCheck)){
            if($usernameCheck['username'] == $_POST['username']){
                $errors['username'] = "Username already registered";
            }    
        }
        
        if(isset($useremailCheck)){
            if($useremailCheck['email'] == $_POST['email']){
                $errors['email'] = "Email already Registered";
            }
        }   

        if(!isset($refCheck)){
            $errors['email'] = "Invalid Referral ID";
        }
        
    }

    if (count($errors) === 0){
        $_POST['password'] = '123456';
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['token'] = bin2hex(random_bytes(50));
        $_POST['verified'] = 0;
        $_POST['ban'] = 0;
        $_POST['admin'] = 0;

        $user_id = createUser('users', $_POST); 

        if($user_id == true){

            sendVerification($_POST['email'], $_POST['username'], $_POST['token']);

            successful_msg("User is now Registered, Password is 123456", 'users.php');

        }else {$errors['db_error'] = "Registration not successful";}

    }
}


if(isset($_POST['send_email'])){

    unset($_POST['send_email']);

    foreach($_POST as $key => $value) {
        $value = trim($value);
        if(empty($value)){
            $errors[$key] = $key . " Cannot be empty" ;
        }
    }
    
    if(count($errors)==0){

        if($_POST['email'] == "verified"){
            $users = selectAll('users', ['verified'=> 1]);
        }else if($_POST['email'] == "unverified"){
            $users = selectAll('users', ['verified'=> 0]);
        }else if($_POST['email'] == "all"){
            $users = selectAll('users');
        }else{
            $users = selectOne('users', ['email' => $_POST['email']]);
            $addmo = emailUsers($users['email'], $users['username'], $_POST['message'], $_POST['subject']);
            
            $_SESSION['message'] = "Email Sent Successfully";
            $_SESSION['alert-class'] = "alert-success";

            header('location: index.php');
            exit();

        }

        foreach($users as $user){
            $addmo = emailUsers($user['email'], $user['username'], $_POST['message'], $_POST['subject']);
        }

        if($addmo == True){

            successful_msg("Email Sent Successfully", 'index.php');
        }
        else{
            echo mysqli_error($conn);
            die();
        }
       
    }

}


if(isset($_GET['delete'])){

    $table = "";

    if($_GET['delete'] = 1){
        $table = 'transactionz';
    }
    if($_GET['delete'] = 2){
        $table = 'interests';
    }
    if($_GET['delete'] = 3){
        $table = 'blog';
    }
    if($_GET['delete'] = 4){
        $table = 'posts';
    }
    if($_GET['delete'] = 5){
        $table = 'topics';
    }

    delete($table, $_GET['del_id']);
}


if(isset($_GET['published'])){
    $published = $_GET['published'];
    $n_id = $_GET['n_id'];
    update('blog', $n_id, ['published'=> $published]);
}


if(isset($_GET['status'])){
    $status = $_GET['status'];
    update('transactionz', $_GET['t_id'], ['status'=> $status]);
}

?>