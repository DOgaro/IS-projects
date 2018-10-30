<?php
include('functionss.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login/tenant.php?login=error');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/main.js"></script>
    <link href="favicon.gif" rel="icon">
    <title>KejaManage</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="favicon.gif"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="admin.php"><i class="fas fa-home"></i> KejaManage</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i></i><?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo 'Welcome, '. $_SESSION['user']['username']; ?></strong><?php endif ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <?php  if (isset($_SESSION['user'])) : ?>
         <small>
            <a class="dropdown-item" href="logout.php?logout='1'">LOGOUT</a>
          </small>
            <?php endif ?>
            
          </div>
        </li>
      </ul>

    </nav>

          

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="TenantsHome.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments.php">
            <i class="fas fa-comments"></i>
            <span>Announcements</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">KejaManage</li>
          </ol>



<html>
<body>
<div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <div class="profile_info">
            <img src="avatar.png" style="height: 70px;">
            <div>
                <?php  if (isset($_SESSION['user'])) : ?>
                   Username: <strong style="color: #888;"><?php echo $_SESSION['user']['username']; ?></strong><br>
                   Name:  <strong style="color: #888;"><?php echo $_SESSION['user']['name']; ?></strong><br>
                   Email:  <strong style="color: #888;"><?php echo $_SESSION['user']['Email']; ?></strong><br>
                   Contact: <strong style="color: #888;"><?php echo $_SESSION['user']['Contact']; ?></strong><br>
                   Block: <strong style="color: #888;"><?php echo $_SESSION['user']['blockname']; ?></strong><br>
                   House: <strong style="color: #888;"><?php echo $_SESSION['user']['house']; ?></strong><br>
                   Rent: <strong style="color: #888;"><?php echo $_SESSION['user']['rent']; ?></strong><br>
                   Equipments: <strong style="color: #888;"><?php echo $_SESSION['user']['Equipments']; ?></strong><br>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>
</html>
