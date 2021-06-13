<?php
   require('../scripts/super-admin-assets.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Eturck & Forex">
      <meta name="author" content="3CORES Digitals">
      <meta name="keywords" content="Eturck">
      <!-- Title Page-->
      <title>Eturck & Forex | Super-Admin</title>
      <link rel="icon" href="../images/icon/logo 16x16.png" sizes="16x16">
      <!-- Fontfaces CSS-->
      <link href="../css/font-face.css" rel="stylesheet" media="all">
      <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
      <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
      <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
      <!-- Bootstrap CSS-->
      <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
      <!-- Vendor CSS-->
      <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
      <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
      <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
      <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
      <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
      <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
      <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
      <!-- Main CSS-->
      <link href="../css/theme.css" rel="stylesheet" media="all">
      <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
   </head>
   <body class="animsition">
      <div class="page-wrapper">
      <!-- HEADER MOBILE-->
      <header class="header-mobile d-block d-lg-none">
         <div class="header-mobile__bar">
            <div class="container-fluid">
               <div class="header-mobile-inner">
                  <a class="logo" href="superadmin-dashboard">
                  <img src="../images/icon/logo-panel-small.png" alt="Etruck & Forex" style="height: 100%; position: inherit;" />
                  </a>
                  <button class="hamburger hamburger--slider" type="button">
                  <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                  </span>
                  </button>
               </div>
            </div>
         </div>
         <nav class="navbar-mobile">
            <div class="container-fluid">
               <ul class="navbar-mobile__list list-unstyled">
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-dashboard">
                     <i class="fas fa-desktop"></i>Dashboard</a>
                  </li>
               </ul>
               <ul class="navbar-mobile__list list-unstyled">
                  <li class="has-sub">
                     <a class="js-arrow" href="#">
                     <i class="fas fa-tachometer-alt"style="color: green"></i><i style="color: green">Truck Section</i></a>
                     <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-addtruck">
                           <i class="fas fa-plus-circle"></i>Add Truck Co.</a>
                        </li>
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-alltruck">
                           <i class="fa fa-edit"></i>Manage Truck Co.</a>
                        </li>
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-trucktransaction">
                           <i class="fa fa-edit"></i>Manage Transactions</a>
                        </li>
                        <li class="has-sub">
                           <a class="js-arrow" href="superadmin-truckannexhistory">
                           <i class="fas fa-copy"></i>Annex History</a>
                        </li>
                        <li class="has-sub">
                           <a class="js-arrow" href="superadmin-alltruckdrivers">
                           <i class="fa fa-id-card"></i>Truck Drivers</a>
                        </li>
                        <li class="has-sub">
                           <a class="js-arrow" href="superadmin-tokens">
                           <i class="fa fa-barcode"></i>Tokens</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-sub">
                     <a class="js-arrow" href="#">
                     <i class="fas fa-tint"style="color: orange"></i><i style="color: orange">Petrol Section</i></a>
                     <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-addpetrolstation">
                           <i class="fas fa-plus-circle"></i>Add Petrol St.</a>
                        </li>
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-allpetrolstation">
                           <i class="fa fa-edit"></i>Manage Petrol St.</a>
                        </li>
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-managetransaction">
                           <i class="fa fa-edit"></i>Manage Transactions</a>
                        </li>
                        <li class="has-sub">
                           <a class="js-arrow" href="#">
                           <i class="fas fa-copy"></i>Annex History</a>
                           <ul class="list-unstyled navbar__sub-list js-sub-list">
                              <li>
                                 <a href="superadmin-cashannexhistory">Cash History</a>
                              </li>
                              <li>
                                 <a href="superadmin-litreannexhistory">Litre History</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="has-sub">
                     <a class="js-arrow" href="#"><i class="fa fa-handshake-o"style="color: red"> </i><i style="color: red">Credit Section</i></a>
                     <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="active">
                           <a class="js-arrow" href="superadmin-truck-credit-request">
                           <i class="fa fa-exclamation"></i>Credit Request
                           <span class='badge badge-warning'><?php echo $carret; ?></span></a>
                        </li>
                        <li class="active">
                           <a class="js-arrow" href="superadmin-truck-approved-request">
                           <i class="fa fa-check"></i>Approved Credits</a>
                        </li>
                        <li class="active">
                           <a class="js-arrow" href="superadmin-manage-subadmin">
                           <i class="fas fa-copy"></i>Credits History</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-sub">
                     <a class="js-arrow" href="#"><i class="fa fa-users" style="color: skyblue"> </i><i style="color: skyblue">Sub-Admin Section</i></a>
                     <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-addsubadmin">
                           <i class="fas fa-plus-circle"></i>Add Sub-Admin</a>
                        </li>
                        <li class="active has-sub">
                           <a class="js-arrow" href="superadmin-allpetrolstation">
                           <i class="fa fa-edit"></i>Manage Sub-Admin</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- END HEADER MOBILE-->
      <!-- MENU SIDEBAR-->
      <aside class="menu-sidebar d-none d-lg-block">
         <div class="logo">
            <a href="#">
            <img src="../images/icon/logo panel.png" alt="Etruck & Forex" />
            </a>
         </div>
         <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
               <ul class="list-unstyled navbar__list">
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-dashboard">
                     <i class="fas fa-desktop"></i>Dashboard</a>
                  </li>
               </ul>
               <br>
               <ul class="list-unstyled navbar__list">
                  <li>
                     <i class="fas fa-tachometer-alt" style="color: green"></i> &nbsp <i style="color: green">Truck Section</i>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-addtruck">
                     <i class="fas fa-plus-circle"></i>Add Truck Co.</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-alltruck">
                     <i class="fa fa-edit"></i>Manage Truck Co.</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-trucktransaction">
                     <i class="fa fa-edit"></i>Manage Transactions</a>
                  </li>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-truckannexhistory">
                     <i class="fas fa-copy"></i>Annex History</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-alltruckdrivers">
                     <i class="fa fa-id-card"></i>Truck Drivers</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-tokens">
                     <i class="fa fa-barcode" aria-hidden="true"></i>Tokens</a>
                  </li>
               </ul>
               </br>
               <ul class="list-unstyled navbar__list">
                  <li class="active has-sub">
                     <i class="fas fa-tint" style="color: orange"></i> &nbsp <i style="color: orange">Petrol Section</i>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-addpetrolstation">
                     <i class="fas fa-plus-circle"></i>Add Petrol St.</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-allpetrolstation">
                     <i class="fa fa-edit"></i>Manage Petrol St.</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-managetransaction">
                     <i class="fa fa-edit"></i>Manage Transactions</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="#">
                     <i class="fas fa-copy"></i>Annex History</a>
                     <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                           <a href="superadmin-cashannexhistory"> -Cash History</i> </a>
                        </li>
                        <li>
                           <a href="superadmin-litreannexhistory" > -Litre History</a>
                        </li>
                     </ul>
                  </li>
               </ul>
               <br>
               <ul class="list-unstyled navbar__list">
                  <li class="active has-sub">
                     <i class="fa fa-handshake-o" style="color: red"> </i> &nbsp <i style="color: red">Credit Section</i>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-truck-credit-request">
                     <i class="fa fa-exclamation"></i>Credit Request
                     <span class='badge badge-warning'><?php echo $carret; ?></span></a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-truck-approved-request">
                     <i class="fa fa-check"></i>Approved Credits</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-truck-credit-history">
                     <i class="fas fa-copy"></i>Credits History</a>
                  </li>
               </ul>
               <br>
               <ul class="list-unstyled navbar__list">
                  <li class="active has-sub">
                     <i class="fa fa-users" style="color: skyblue"> </i> &nbsp <i style="color: skyblue">Sub-Admin Section</i>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-addsubadmin">
                     <i class="fas fa-plus-circle"></i>Add Sub-Admin</a>
                  </li>
                  <li class="active has-sub">
                     <a class="js-arrow" href="superadmin-manage-subadmin">
                     <i class="fa fa-edit"></i>Manage Sub-Admin</a>
                  </li>
               </ul>
               <br>
            </nav>
         </div>
      </aside>
      <!-- END MENU SIDEBAR-->
      <!-- PAGE CONTAINER-->
      <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
         <div class="section__content section__content--p30">
            <div class="container-fluid">
               <div class="header-wrap">
                  <h2>Super Admin Panel</h2>
                  <div class="header-button">
                     <div class="noti-wrap">
                     </div>
                     <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                           <div class="image">
                              <img src="../images/icon/Superadmin.png" alt="Super-Admin" />
                           </div>
                           <div class="content">
                              <a class="js-acc-btn" href="#"><?php echo $_SESSION['username']; ?></a>
                           </div>
                           <div class="account-dropdown js-dropdown">
                              <div class="info clearfix">
                                 <div class="image">
                                    <a href="#">
                                    <img src="../images/icon/Superadmin.png" alt="John Doe" />
                                    </a>
                                 </div>
                                 <div class="content">
                                    <h4 class="name">
                                       <a href="#"><?php echo $_SESSION['username']; ?></a>
                                    </h4>
                                 </div>
                              </div>
                              <div class="account-dropdown__body">
                                 <div class="account-dropdown__item">
                                    <a href="superadmin-updateemail">
                                    <i class="zmdi zmdi-email"></i>Change Email</a>
                                 </div>
                              </div>
                              <div class="account-dropdown__body">
                                 <div class="account-dropdown__item">
                                    <a href="superadmin-changepassword">
                                    <i class="zmdi zmdi-account"></i>Change Password</a>
                                 </div>
                              </div>
                              <div class="account-dropdown__footer">
                                 <a href="../">
                                 <i class="zmdi zmdi-power"></i>Logout</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- HEADER DESKTOP-->
      <!-- MAIN CONTENT-->
      <div id="wrapper-id">
      <div class="main-content" style="min-height: 100%;" >