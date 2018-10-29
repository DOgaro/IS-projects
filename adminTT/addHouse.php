<?php 
include('houses.php');
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'kejamanage'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

$sql = 'SELECT * 
        FROM house';
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../login/login.php');
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
            text-align: center;
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
          <a class="nav-link" href="admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addUnit.php">
            <i class="fas fa-home"></i>
            <span>Add Unit</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addHouse.php">
            <i class="fas fa-home"></i>
            <span>Add House</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../adminTT/create_user.php">
            <i class="fas fa-user-plus"></i>
            <span>Add Tenant</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../adminTT/create_caretaker.php">
            <i class="fas fa-user-plus"></i>
            <span>Add Caretaker</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="indexTT.php">
            <i class="fas fa-users"></i>
            <span>Tenants</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-comments"></i>
            <span>Announcements</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tenants.php">
            <i class="fas fa-dollar-sign"></i>
            <span>Payments</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deleteF.php">
            <i class="fas fa-trash-alt"></i>
            <span>Remove User</span></a>
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
<html lang="en">
<body>
  
  <form action="addHouse.php" method="post" class="form-style-9">
    <?php echo display_error(); ?>
<ul>
  <li>
  <?php
    $con=mysqli_connect("localhost","root","","kejamanage");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
     <select class="field-style one field-full align-none" name="blockname" placeholder="Block">
         <?php 
         $result = mysqli_query($con,"SELECT blockname FROM block");

         while($row = mysqli_fetch_array($result)) 
             echo "<option value='" . $row['blockname'] . "'>" . $row['blockname'] . "</option>";
         ?>
     </select>
</select>
</li>
<li>
    <input type="text" name="house" class="field-style field-split align-left" placeholder="House Name" />
</li>
<li>
    <input type="text" name="rent" class="field-style field-split align-left" placeholder="Rent per Month" />
</li>
<li>
    <input type="text" name="type" class="field-style field-split align-left" placeholder="Number of Rooms" />
</li>
<li>
<input type="submit" name="register_btn" value="+ Add House"/>
</li>
</ul>
</form>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
      <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kejamanage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM house";
$result = $conn->query($sql);

?>
<div class="table-responsive">
<table class="table">
        <tr class="header">
            <td>Block</td>
            <td>House</td>
            <td>Rent</td>
            <td>Type</td>
            <td>Status</td>
            <td><i class="fas fa-trash-alt"></i></td>
        </tr>
        <?php
           while ($row =$result->fetch_assoc()) {
            $n=$row['blockname'];
            $um=$row['house'];
            $em=$row['rent'];
            $cn=$row['type'];
            $bl=$row['status'];
               echo "<tr class= info>";
               echo "<td>".$n."</td>";
               echo "<td>".$um."</td>";
               echo "<td>".$em."</td>";
               echo "<td>".$cn."</td>";
               echo "<td>".$bl."</td>";
               echo "<td><a class=\"btn btn-danger\" href=\"delete.php?username=".$um."\">Delete</a></td>";
               echo "</tr>";
           }

$conn->close();
        ?>
    </table>
    </div>             
              <hr/>         
  </div>
</div>

    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

    </script>


</body>
</html>