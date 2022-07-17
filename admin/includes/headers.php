<header class="clearfix">
        <div class="logo">
            <img src="<?php echo BASE_URL . '/admin/img/logo.png' ?>">
        </div>
        <div class="username">
            Username
        </div>
        
        <div class="menu_btn" onclick="menu_show()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
    </header>
    
    <aside>
        <ul>
            <li><a href="<?php echo BASE_URL . '/admin/index.php' ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/users.php' ?>"><i class="fa fa-user"></i> Users</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/history.php' ?>"><i class="fa fa-history"></i> History</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/deposits.php' ?>"><i class="fas fa-coins"></i> Deposits</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/withdrawals.php' ?>"><i class="fa fa-credit-card"></i> Withdrawals</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/investments.php' ?>"><i class="fas fa-briefcase"></i> Investments</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/interests.php' ?>"><i class="fa fa-piggy-bank"></i> Interests</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/email.php' ?>"><i class="fa fa-envelope"></i> Email</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/blog.php' ?>"><i class="fa fa-blog"></i> Blog</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/guides/index.php' ?>"><i class="fas fa-book-open"></i> Guides</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/index.php?logout=1' ?>"><i class="fa fa-sign-out"></i> Sign out</a></li>
            <li><a href="<?php echo BASE_URL . '/app/index.php' ?>"><i class="fas fa-angle-double-left"></i> My account</a></li>
        </ul>
    </aside>

    <main>

    <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>