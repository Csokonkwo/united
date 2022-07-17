<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-3 py-lg-4">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="<?php echo BASE_URL . '/img/logo.png' ?>" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="<?php echo BASE_URL . '/index.php' ?>">HOME</a>
                    <a class="nav-link" href="<?php echo BASE_URL . '/blog.php' ?>">BLOG</a>
                    <a class="nav-link" href="<?php echo BASE_URL . '/pricing.php' ?>">PRICING</a>
                    <a class="nav-link" href="<?php echo BASE_URL . '/why-mining.php' ?>">WHY MINING</a>
                    <a class="nav-link" href="<?php echo BASE_URL . '/about.php' ?>">ABOUT US</a>
                    <a class="nav-link" href="<?php echo BASE_URL . '/press.php' ?>">PRESS</a>
                    <a class="nav-link" href="<?php echo BASE_URL . '/customer-service.php' ?>">CUSTOMER SERVICE</a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ACCOUNT
                        </a>
                        <ul class="dropdown-menu text-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo BASE_URL . '/register/signup.php' ?>">REGISTER</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL . '/register/signin.php' ?>">LOGIN</a></li>
                        </ul>
                    </li>

                </div>
            </div>
    </nav>

    
    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <img src="<?php echo BASE_URL . '/img/loader.svg' ?>" />
        </div>
    </div> 