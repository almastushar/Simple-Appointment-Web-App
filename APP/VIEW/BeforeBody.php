
  <body data-ma-theme="green">
    <main class="main">
      <!-- PAGE LOADER STARTS -->
      <div class="page-loader">
        <div class="page-loader__spinner">
          <svg viewBox="25 25 50 50">
            <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
          </svg>
        </div>
      </div>
      <!-- PAGE LOADER ENDS -->
      <!-- HEADER MENU STARTS -->
      <header class="header">
        <ul class="top-nav">
          
          <li class="dropdown top-nav__notifications">
            <a href="<?php echo $ToCall; ?>" class="top-nav__notify">
            <i class="zmdi zmdi-phone-ring"></i>
            </a>
          </li>
          <li class="dropdown top-nav__notifications">
            <a href="<?php echo $Contacts; ?>">
            <i class="zmdi zmdi-accounts-list-alt"></i>
            </a>
          </li>
          <li class="dropdown top-nav__notifications">
            <a href="<?php echo $AddNumber; ?>">
            <i class="zmdi zmdi-account-add"></i>
            </a>
          </li>
          <!-- <li class="dropdown top-nav__notifications">
            <a href="">
            <i class="zmdi zmdi-calendar-note"></i>
            </a>
          </li> -->
        </ul>
      </header>
      <!-- HEADER MENU ENDS -->