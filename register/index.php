<?php 

$pageName = 'Sign in';
include("../path.php");

require_once 'server.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<?php include(ROOT_PATH . '/register/includes/head.php'); ?>

</head>

<body>
   
<div id="preloader" style="display: none">
    <div id="status" style="display: inherit">&nbsp; <span> Loading...</span></div>
    
  </div>

  <script src="<?php echo BASE_URL . '/js/load.js'?>"></script>
  <header class="sticky">
    <div id="toggle-sidebar" onclick="togglesidebar()">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div id="logo">
      <img src="<?php echo BASE_URL . '/img/logo.png'?>" />
    </div>

    <nav>
      <ul>
        <li class="nav-item active"> <a href="<?php echo BASE_URL . '/index.php'?>"><span>Home</span></a></li>
        <li class="nav-item"><span>About Us</span>

          <i class="fa fa-angle-down"></i>
          <ul class="dropdown">

            <li class=""><i class="">-</i><a href="<?php echo BASE_URL . '/about.php'?>">Overview</a></li>
            <li class=""><i class="">-</i><a href="<?php echo BASE_URL . '/morenews.php'?>">Recent News</a></li>
            <li class=""><i class="">-</i><a href="<?php echo BASE_URL . '/plans.php'?>">Investment Plans</a></li>
            <li class=""><i class="">-</i><a href="<?php echo BASE_URL . '/guide.php'?>">Investment Guides</a></li>

          </ul>

          </div>

        </li>

        <li class="nav-item"><a href="<?php echo BASE_URL . '/offer.php'?>"><span>Services</span>
        </li>


        <li class="nav-item"> <a href="<?php echo BASE_URL . '/contact.php'?>"><span>Contact</span>


          </a></li>


        <li class="nav-item">
          <span>Account</span>

          <i class="fa fa-angle-down"></i>
          <ul class="dropdown">
            <li><a href="<?php echo BASE_URL . '/register/signup.php'?>">Register</a></li>
            <li><a href="<?php echo BASE_URL . '/register/signin.php'?>">Login</a></li>
          </ul>
        </li>


        <a><i class="fa fa-search search-btn inline-search"></i></a>

        <li> <a href="<?php echo BASE_URL . '/register/signin.php'?>" class="login">Login</a></li>
      </ul>
    </nav>

    <a><i class="fa fa-search search-btn"></i></a>
  </header>

  <div class="search-form">
      <form action="<?php echo BASE_URL . '/guide.php'?>" method="post">
          <input type="text" name="search_term"  placeholder="Search..." id="searcher">
      </form>
  </div>
  
<main>

    <!-------------- Hero Section --------->
        
    

<div class="form">
           <div class="container">

                <form action="signin.php" method="POST" onSubmit="return validateForm(this)">
                    <h2>Member Login</h2>
                    
                    <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <div>
                        <i class="fa fa-user"></i>
                        <input id="l_user" type="text" name="user" placeholder="Username or Email" value="<?php echo $user; ?>" oninput="checkLength(this)">
                        <label id="l_user_2" for=""></label>
                    </div>

                    <div>
                        <i class="fa fa-lock"></i>
                        <input id = "pass" type="password" placeholder="Password" name="password" oninput="checkLength(this)">
                        <label id ="l_pass" for=""></label>
                    </div>

                    <div>
                        <button type="submit" name="log_in" class="btn"> Login</button>
                    </div>

                    <p class="">Not yet a member? <a href="signup.php">Sign up</a></p>
                    
                    <div style="font-size: 0.8em; text-align:center;"><a href="forgot_password.php"> forgot password?</a></div>

                </form>
           </div>
           
           <div class="right"></div>
       </div>

                    </main>


      <?php include(ROOT_PATH . '/register/includes/footer.php'); ?>
       
</body>
</html>