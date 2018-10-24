<?php
if(isset($_POST['get_option']))
{
 $con=mysqli_connect("localhost","root","","Kejamanage");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

 $state = $_POST['get_option'];
 $result = mysqli_query($con,"SELECT house FROM house WHERE (blockname='$blockname' AND status='Vacant')");

         while($row = mysqli_fetch_array($result)) 
             echo "<option value='" . $row['house'] . "'>" . $row['house'] . "</option>";
 exit;
}
?>