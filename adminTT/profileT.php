<?php
include ('functions.php');
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
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylesss.css" />
    <link rel="stylesheet" type="text/css" href="style.css">

    <script language="javascript" src="users.js" type="text/javascript"></script>
    <script type="text/javascript">
$(document).ready(function()
{
$("#blockname").change(function()
{
var blockname=$(this).val();
var post_id = 'id='+ blockname;
 
$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(houses)
{
$("#house").html(houses);
} 
});
 
});
});
</script>
     <style type="text/css">
        body {
            font-size: 15px;
            color: #343d44;
            font-family: "segoe-ui", "open-sans", tahoma, arial;
            padding: 0;
            margin: 0;
        }
        table {
            margin: auto;
            font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            font-size: 12px;
        }

        h1 {
            margin: 25px auto 0;
            text-align: center;
            text-transform: uppercase;
            font-size: 17px;
        }

        table td {
            transition: all .5s;
        }
        
        /* Table */
        .data-table {
            border-collapse: collapse;
            font-size: 13px;
            min-width: 537px;
        }

        .data-table th, 
        .data-table td {
            border: 1px solid #e1edff;
            padding: 7px 17px;
        }
        .data-table caption {
            margin: 7px;
        }

        /* Table Header */
        .data-table thead th {
            background-color: #508abb;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .data-table tbody td {
            color: #353535;
        }
        .data-table tbody td:first-child,
        .data-table tbody td:nth-child(4),
        .data-table tbody td:last-child {
            text-align: right;
        }

        .data-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }
        .data-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
        }

        /* Table Footer */
        .data-table tfoot th {
            background-color: #e5f5ff;
            text-align: right;
        }
        .data-table tfoot th:first-child {
            text-align: left;
        }
        .data-table tbody td:empty
        {
            background-color: #ffcccc;
        }
    </style>
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
            <i class="fas fa-user-circle fa-fw"></i><?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo $_SESSION['user']['username']; ?></strong><?php endif ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <?php  if (isset($_SESSION['user'])) : ?>
         <small>
            <a href="index.php?logout='1'" style="color: red;">LOGOUT</a>
          </small>
            <?php endif ?>
            <a class="dropdown-item" href="#" name="logout">Logout</a>
          </div>
        </li>
      </ul>

    </nav>
          
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="caretaker.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments.php">
            <i class="fas fa-comments"></i>
            <span>Announcements</span></a>
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
<?php
require_once "db.php";

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_GET["username"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($conn, "SELECT * FROM tenants WHERE username='" . $_GET["username"][$i] . "', username='" . $_GET["username"][$i] . "', name='" . $_GET["name"][$i] . "', Email='" . $_GET["Email"][$i] . "', Contact='" . $_GET["Contact"][$i] . "', blockname='" . $_GET["blockname"][$i] . "', house='" . $_GET["house"][$i] . "', rent='" . $_GET["rent"][$i] . "', Equipments='" . $_GET["Equipments"][$i] . "' WHERE id='" . $_GET["id"][$i] . "'");
//header("Location: indexTT.php");
echo("Changed successfully");
}
}
?>
<form name="frmUser" method="post" action="" class="form-style-9" >
<div style="width:500px;">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="data-table">
<tr class="tableheader">
<td>My Profile</td>
</tr>
<?php
//$rowCount = count($_GET["username"]);
//for($i=0;$i<$rowCount;$i++) {
//$result = mysqli_query($conn, "SELECT * FROM tenants WHERE username='" . $_GET["username"][$i] . "'");
//$row[$i]= mysqli_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr>
<td><label>Username</label></td>
<td><input type="hidden" name="id[]" class="txtField" value="<?php echo $row[$i]['id']; ?>">
	<input type="text" name="username[]" class="txtField" value="<?php echo $row[$i]['username']; ?>"></td>
</tr>
<td><label>Name</label></td>
<td><input type="text" name="name[]" class="txtField" value="<?php echo $row[$i]['name']; ?>"></td>
</tr>
<td><label>Email</label></td>
<td><input type="email" name="Email[]" class="txtField" value="<?php echo $row[$i]['Email']; ?>"></td>
</tr>
</tr>
<td><label>Contact</label></td>
<td><input type="text" name="Contact[]" class="txtField" value="<?php echo $row[$i]['Contact']; ?>"></td>
</tr>
</tr>
<td><label>Block</label></td>
<td><input type="text" name="blockname[]" class="txtField" value="<?php echo $row[$i]['blockname']; ?>"></td>
</tr>
<td><label>House</label></td>
<td><input type="text" name="house[]" class="txtField" value="<?php echo $row[$i]['house']; ?>"></td>
</tr>
<td><label>Rent</label></td>
<td><input type="text" name="rent[]" class="txtField" value="<?php echo $row[$i]['rent']; ?>"></td>
</tr>
</tr>
<td><label>Equipments</label></td>
<td><input type="text" name="Equipments[]" class="txtField" value="<?php echo $row[$i]['Equipments']; ?>"></td>
</tr>
</table>
</td>
</tr>
<?php

?>
<tr>
</tr>
</table>
</div>
</form>
</body></html>