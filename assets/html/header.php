<header class="main-header d-flex">
  <div id="navBar" data-base_url="<?php echo constant('URL') ?>" class="d-flex d-flex-center main-header__container">
    <img src="<?php echo constant('URL') ?>assets/images/logo.svg" alt="Company logo" class="main-header__logo" />
    <span class="main-header__title">Employees Management</span>
    <nav class="main-header__menu">
      <ul class="list-container d-flex">
        <li class="nav-link">
          <a href="<?php echo constant('URL') ?>employee/dashboard">Dashboard</a>
        </li>
        <li class="nav-link">
          <a href="<?php echo constant('URL') ?>employee/showEmployee">Employee</a>
        </li>
        <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
        <li class="nav-link"><a href="<?php echo constant('URL') ?>user/admin">Admin</a></li>
        <?php } ?>

        <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'user') { ?>
        <li class="nav-link"><a href="<?php echo constant('URL') ?>user/user">User</a></li>
        <?php } ?>
        
      </ul>
    </nav>
  </div>
  <a href="<?php echo constant('URL') ?>login/logout" class="logout-btn">Logout</a>
</header>