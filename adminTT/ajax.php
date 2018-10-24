<?php
include('database.php');
if($_POST['id']){
$id=$_POST['id'];
if($id==1){
	echo "<option>Select House</option>";
}else{
	$sql = mysqli_query($con,"SELECT house FROM `house` WHERE blockname='$id'");
	while($row = mysqli_fetch_array($sql)){
		echo "<option value='" . $row['house'] . "'>" . $row['house'] . "</option>";
	}
	}
}
?>