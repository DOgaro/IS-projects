<?php
require_once "db.php";

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["username"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($conn, "UPDATE tenants SET username='" . $_POST["username"][$i] . "', password='" . $_POST["password"][$i] . "', name='" . $_POST["name"][$i] . "', block='" . $_POST["block"][$i] . "' WHERE id='" . $_POST["id"][$i] . "'");
}
header("Location: tenants.php");
}
?>
<html>
<head>
<title>Edit Multiple User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center">
<tr class="tableheader">
<td>Edit User</td>
</tr>
<?php
$rowCount = count($_POST["id"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysqli_query($conn, "SELECT * FROM tenants WHERE id='" . $_POST["id"][$i] . "'");
$row[$i]= mysqli_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr>
<td><label>Username</label></td>
<td><input type="hidden" name="id" class="txtField" value="<?php echo $row[$i]['id']; ?>"><input type="text" name="name" class="txtField" value="<?php echo $row[$i]['name']; ?>"></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" name="password[]" class="txtField" value="<?php echo $row[$i]['password']; ?>"></td>
</tr>
<td><label>First Name</label></td>
<td><input type="text" name="firstName[]" class="txtField" value="<?php echo $row[$i]['firstName']; ?>"></td>
</tr>
<td><label>Last Name</label></td>
<td><input type="text" name="lastName[]" class="txtField" value="<?php echo $row[$i]['lastName']; ?>"></td>
</tr>
</table>
</td>
</tr>
<?php
}
?>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>