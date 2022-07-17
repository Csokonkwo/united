<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Home";

?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include(ROOT_PATH . "/includes/head.php");  ?>
    <link rel="stylesheet" href="css/pricing.css">

</head>

<body>

<?php include(ROOT_PATH . "/includes/header.php");  ?>

    <!-- main content -->
    <div class="top-background py-5 my-2">
        <div class="container mt-5 py-4 w-75">
            <div class="row">
                <div class="text-row col-12 col-md-5">
                    <div class="display-5 text-white fw-normal my-3 py-1">
                    START INVESTING TODAY
                    </div>

                    <div class="fw-normal text-white my-4 py-3">
                    Our state of Investing is already runing! Just choose your favourite portfolio category or algorithm and get started in minutes! 
                    </div>

                    <button class="btn btn-lg btn-genesis my-5 d-block w-75">
                        SIGN UP
                    </button>
                </div>
                <div class="video-row col-12 col-md-7 p-1">
                    <!--<video loop="loop" muted autoplay class="hero-video">
                        <source src="./assets/backgrounds/home_video2.mp4" type="video/mp4">
                    </video> -->
                </div>
            </div>
        </div>

    </div>


     

    <div class="pricing-section py-4 bg-smoke">

        <div class="coin-btns mx-auto w-max">
            <button class="btn btn-genesis coin-btn px-2">
                <img class="img-fluid" src="assets/pricing/btc.png" style="width:25px;height:25px;" /> Stocks

            </button>
            <button class="btn btn-genesis coin-btn px-2">
                <img class="img-fluid" src="assets/pricing/btc.png" style="width:25px;height:25px;" /> Crypocurrencies

            </button>
            <button class="btn btn-genesis coin-btn px-2 ">
                <img class="img-fluid" src="assets/pricing/eth.png" style="width:25px;height:25px;" /> Nfts 

            </button>
            <button class="btn btn-genesis coin-btn px-2">
                <img class="img-fluid" src="assets/pricing/monero.png" style="width:25px;height:25px;" /> Children investment

            </button>
            <button class="btn btn-genesis coin-btn px-2">
                <img class="img-fluid" src="assets/pricing/zcash.png" style="width:25px;height:25px;" />Recovery

            </button>

            <button class="btn btn-genesis coin-btn px-2">
                <img class="img-fluid" src="assets/pricing/zcash.png" style="width:25px;height:25px;" />529 plan students investment

            </button>
            <button class="btn btn-genesis disabled coin-btn px-2">
                <img class="img-fluid" src="assets/pricing/ltc.png" style="width:25px;height:25px;" /> Retirement plan

            </button>
        </div>


        <div class="plan-cont plans my-3 py-3 container">
            <div class="h2 my-3 ms-3">
                Choose a Stock Plan Type
            </div>
            <div class="row my-3 all-plans  align-items-center justify-content-center">

                <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Small
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                            Starter
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            1,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            15% Monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                            Term and Agreement Should be Made, <br>
                            Requires Topping Up To A Higher Plan, <br>
                            Withdrawal Is Available Too with,<br>
                            Zero Maintenance Fee,<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div> 
                        
                        <br><div class="color-1 text-center stocks-text">
                            4.82969 stars, based on 2924 reviews
                        </div>

                    </div>

                </div>


                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Medium
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                            Best Buy
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            10,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            20% monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                            
                            12 Months Portfolio Contract,<br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee, <br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                            4.82831 stars, based on 7560 reviews
                        </div>

                    </div>

                </div>

                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Large
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                         Professional
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            50,000
                            <span class="h5 opacity-5">50</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            30% monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                            12 Months Portfolio Contract,<br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee,<br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                            4.85843 stars, based on 1448 reviews
                        </div>

                    </div>

                </div>

                 <!-- card -->
                 <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Extra Large
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                       Expert
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            100,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            40% monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                           12 Months Portfolio Contract, <br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee,<br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                             4.74360 stars, based on 1123 reviews
                        </div>

                    </div>

                </div>
                
                <!-- card -->
                 <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Double X Large
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                       Superior
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            500,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            50% monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                           12 Months Portfolio Contract, <br>
                            Instant Withdrawals, <br>
                            Zero Maintenance Fee, <br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                            4.46383 stars, based on 598 reviews
                        </div>

                    </div>

                </div>
            </div>
            <div class="text-center text-dark my-3 font-2">
            All plan payments differ (upfront fee) for the entire contract duration and term, and are based on your contract and monthly subscription model. 
            </div>
        </div>
    </div>


    <div class="plan-cont plans my-3 py-3 container">
            <div class="h2 my-3 ms-3">
                Choose a Cryptocurrency Plan Type
            </div>
            <div class="row my-3 all-plans  align-items-center justify-content-center">

                <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Small
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                        Best buy
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            1,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            3.5% weekly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                            Term and Agreement Should be Made, <br>
                            Requires Topping Up To A Higher Plan, <br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee,<br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available <br>

                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div> 
                        
                        <br><div class="color-1 text-center stocks-text">
                        4.37645 stars, based on 1953 reviews
                        </div>

                    </div>

                </div>


                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Medium
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                            Best Buy
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            5,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            4% weekly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">

                            12 Months Portfolio Contract,<br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee, <br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                        4.11382 stars based on 5065 reviews
                        </div>

                    </div>

                </div>

                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Large
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                         Professional
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            10,000
                            <span class="h5 opacity-5">50</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            4.5% weekly Roi
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                            12 Months Portfolio Contract,<br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee,<br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                            4.85843 stars, based on 1448 reviews
                        </div>

                    </div>

                </div>

                 <!-- card -->
                 <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Extra Large
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                       Expert
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            50,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            5% weekly Roi  
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                           12 Months Portfolio Contract, <br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee,<br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                             4.74360 stars, based on 1123 reviews
                        </div>

                    </div>

                </div>
                
                <!-- card -->
                 <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Double X Large
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                       Superior
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            100,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            6% Weekly Roi  
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                           12 Months Portfolio Contract, <br>
                            Instant Withdrawals, <br>
                            Zero Maintenance Fee, <br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                            4.46383 stars, based on 598 reviews
                        </div>

                    </div>

                </div>
            </div>
            <div class="text-center text-dark my-3 font-2">
            All plan payments differ (upfront fee) for the entire contract duration and term, and are based on your contract and monthly subscription model. 
            </div>
        </div>
    </div>


    <div class="plan-cont plans my-3 py-3 container">
            <div class="h2 my-3 ms-3">
                Choose an Nft Plan Type
            </div>
            <div class="row my-3 all-plans  align-items-center justify-content-center">

                <div class="plan card col-12 col-md-4  border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                            Small
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                            Starter
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            1,000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            15% Monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">
                            Term and Agreement Should be Made, <br>
                            Requires Topping Up To A Higher Plan, <br>
                            Instant Withdrawals,<br>
                            Zero Maintenance Fee,<br>
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div> 
                        
                        <br><div class="color-1 text-center stocks-text">
                        2.09451 stars, based on 253 reviews
                        </div>

                    </div>

                </div>


                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                        Custom plan
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                        Create a custom Nft plan
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            0000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            Monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">

                            Use sliders to enter value, Instant Withdrawals,
                            24/7 Services, and <br>
                            5% Referral Bonus - Yes, All Available<br>
                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                        2.2  star rating
                        </div>

                    </div>

                </div>

            </div>
            <div class="text-center text-dark my-3 font-2">
            All plan payments differ (upfront fee) for the entire contract duration and term, and are based on your contract and monthly subscription model. 
            </div>
        </div>
    </div>


    <div class="plan-cont plans my-3 py-3 container">
            <div class="h2 my-3 ms-3">
                Choose a Children Plan Type
            </div>
            <div class="row my-3 all-plans  align-items-center justify-content-center">

                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                        Custom plan
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                        Create a custom Nft plan
                        </small>

                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                           0000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            20% Monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">

                        Earnings and withdrawals are tax-free with 
                        Zero Maintenance Fee, <br>
                        Minors must be under the age of 18, <br>
                        investments must be for the benefit of the minor and all account assets must be transferred when the minor reaches the required age, <br>
                        the maximum yearly contribution of $6,000 per child, <br>
                        There is no minimum to open the account.

                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                        2.2  star rating
                        </div>

                    </div>

                </div>

            </div>
            <div class="text-center text-dark my-3 font-2">
            All plan payments differ (upfront fee) for the entire contract duration and term, and are based on your contract and monthly subscription model. 
            </div>
        </div>
    </div>


    <div class="plan-cont plans my-3 py-3 container">
            <div class="h2 my-3 ms-3">
                Choose a Recovery Plan Type
            </div>
            <div class="row my-3 all-plans  align-items-center justify-content-center">

                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                        buy entrance
                        </div>


                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            1000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            20% charge 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">

                        Must Buy entrance before your recovery process proceeds, <br> 
                        a 20 percentage charge after your recovery is finalized, <br> 
                         a 24/7 Services 

                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                        1.82743 stars, based on 85 reviews
                        </div>

                    </div>

                </div>

            </div>
            <div class="text-center text-dark my-3 font-2">
            All plan payments differ (upfront fee) for the entire contract duration and term, and are based on your contract and monthly subscription model. 
            </div>
        </div>
    </div>

    <div class="plan-cont plans my-3 py-3 container">
            <div class="h2 my-3 ms-3">
                Choose a 529 plan students investment  Plan Type
            </div>
            <div class="row my-3 all-plans  align-items-center justify-content-center">

                <!-- card -->
                <div class="plan card col-12 col-md-4 border-2">

                    <div class="card-body">
                        <div class="radiant color-1 text-center h4 my-3">
                            Radiant
                        </div>
                        <div class="size text-center h3 my-3 text-secondary">
                        Starter
                        </div>

                        <small class="text-center text-secondary d-block my-2">
                            Best Buy
                        </small>
                        <div class="amount color-1 h2 text-center mt-4 display-6 fw-bold">
                            <span class="dollar h4 opacity-5">$</span>
                            1000
                            <span class="h5 opacity-5">00</span>

                        </div>
                        <div
                            class="mh my-4 text-secondary h2 text-center py-3  border border-top-1 border-bottom-1 border-start-0 border-end-0">
                            15% Monthly Roi 
                        </div>

                        <div class="stocks-text text-center text-secondary py-3 my-4">

                        Requires Topping up, Withdrawals must be ment, 
                        Zero Maintenance Fee,24/7 Services, and <br>
                        5% Referral Bonus - Yes, All Available

                        </div>

                        <div class="plan-btn btn px-5 py-2 shadow-0 bg-smoke color-2 text-center d-block mx-auto">
                            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Sign up</a>
                            
                        </div>
                        
                        <br><div class="color-1 text-center stocks-text">
                        1.82743 stars, based on 85 reviews
                        </div>

                    </div>

                </div>

            </div>
            <div class="text-center text-dark my-3 font-2">
            All plan payments differ (upfront fee) for the entire contract duration and term, and are based on your contract and monthly subscription model. 
            </div>
        </div>
    </div>




    <div class="contract-info py-5 my-2 container">

        <div class="row all-plans">
        <div class="text-row col-12 col-md-5 ml">

      
      <div class="h2 fw-bold my-3 color-2">  Contract information</div>
<div class="h6 fw-bold my-3 color-2">  Stock Investing</div>
<div class="text-dark">

Stock investing / trading refers to the buying and selling of shares of a particular company; if you own a stock portfolio, you own a piece of a companies. Without any possibility of loss or downtime, or third-party interference. We trade the S&P 500 The S&P 500 Index features 500 leading U.S. publicly traded companies, with a primary emphasis on market capitalization. When it's traded with our trading strategies and the help of our trading professionals, you still own a piece of the top companies in this index, now you would also receive dividends and profits made while trading in favour of price appreciation, these   Outputs are made to your portfolio using the Auto allocation feature in our dashboard.
</div>

<div class="my-3 color-2 fw-bold">
    Contract Term
</div>
<div class="text-dark">
The Stock investment plans will run for a maximum of 12-24 months depending on your options, however portfolio allocation to proof of stake before the end of the term, we will use the best scenarios, legal responsibility and basis to manage other running portfolios for you. 
</div>
<div class="my-3 color-2 fw-bold">
   Maintenance Fee
</div>
<div class="text-dark">
There is no maintenance fee involved in this contract plan. Your only cost is what you invest in your portfolio at purchase and while operating. There are no other fees to consider when calculating the performance of this contract plan. To make a well informed decision, you can contact our officials or check out our profit calculator. 
</div>
</div>

<div class="col-12 col-md-6">

    <div class="review-box shadow mx-auto p-4">
        <div class="h3 my-3 color-2">
            Reviews
        </div>

        <div class="h4 positive my-5">
            Positive
        </div>

        <div class="text fw-light my-3">
        I'm really happy to have taken advantage of this offer and plan from United, I hope United capital will live up to my expectations Congratulations to the team for their work long live 
        </div>


        <div class="author color-1 position-absolute bottom-5">
            Joel A
        </div>
    </div>
</div>
    </div>
    </div>


    <div class="purchase py-5 bg-smoke">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <h2 class="color-2 w-75">
                    WHY SHOULD I INVEST WITH UNITED CAPITAL? 
                    </h2>

                    <div class="py-5">
                    The potential to earn higher returns: The primary reason for investing with us is the potential return compared to alternatives such as banks, 

                    The ability to protect your wealth from inflation and also Belief in Management: The stock market returns often significantly outpace the rate of inflation. you will choose to invest in this company, because we have confidence in the business acumen and passion of the management team. This reason can support investment decisions, our management team has experiences of past business experience and opportunities. 

                    The ability to earn regular dividend and income: our company pays dividends, and profits to investors. Our high majority make quarterly dividend payments, although our regular term pays daily and monthly dividends. Dividend income can help supplement an investor's paycheck or retirement income.

                    The pride of ownership: A share of stock represents fractional ownership of a company. You can own a tiny slice of a company whose products or services you love.

                    Liquidity: Most stocks trade publicly on a major stock exchange, making it easy to trade them. It also makes stocks a more liquid investment compared to other options investment  that you can't quickly sell.

                    Diversification: You can easily build a diversified portfolio across many different industries through stocks. That can help you diversify your overall investment portfolio, which could also include IRA's, bonds, Nfts, cryptocurrency, and so on reducing your overall risk profile while improving returns. also our Investors are typically advised to diversify their investments, so their money is dispersed to different types of investment. 

                    The ability to start : Thanks to our $0 commissions and the ability to buy fractional shares with our brokers, investors can begin investing in stocks with less than $1000.

                    Undervaluation - Strategically, we protect our  investors by analyzing a company's financial, managerial, operational and market position to identify stocks and projects that has been undervalued.

                    Anticipated Advantages -Occasionally, your investment with us, is justified by our future expectations.

                    Corporate Responsibility - our customers choose to invest with us, because of the way we handle our business. We involve an assessment of the corporation's daily culture, the work we do to protect our community, its labor practices, and its commitment to green solutions among other things.

                    Additional:  we are regulated and registered by the UK government, Finra, and Sec e.t.c 

                    </div>

                    <div class="sign color-2 h3 fw-normal">
                    Sign up with one of the best investment providers in the market and start earning on your favorite portfolio today! 
                    </div>

                    <button class="btn-genesis d-block mt-4 w-75 ">
                        SELECT A PORTFOLIO
                    </button>
                </div>

                <div class="col-7">
                    <div class="img-hold w-100 h-100 mt-5 laptop">
                        <img src="assets/pricing/img2.webp" class="img-fluid mt-5"/>
                    </div>
             
                </div>
            </div>
        </div>
    </div>





<?php include(ROOT_PATH . "/includes/footer.php");  ?>
<script src="<?php echo BASE_URL . '/js/pricing.js'?>"></script>


</body>

</html>