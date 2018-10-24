<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'kejamanage');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $status, $description;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $blockname    =  e($_POST['blockname']);
	$description =  e($_POST['description']);

	// form validation: ensure that the form is correctly filled
	if (empty($blockname)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($description)) { 
		array_push($errors, "Description is required"); 
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		if (isset($_POST['status'])) {
			$user_type = e($_POST['status']);
			$query = "INSERT INTO block (blockname, description) 
					  VALUES('$blockname', '$description')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New unit successfully created!!";
			header('location: ../adminTT/addUnit.php');
		}else{
			$query = "INSERT INTO block (blockname, description) 
					  VALUES('$blockname', '$description')";
			mysqli_query($db, $query);
			$logged_in_user_id = mysqli_insert_id($db);
			$_SESSION['success']  = "You are now logged in";
			header('location: ../adminTT/addUnit.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['access_level'] == '1' ) {
		return true;
	}
	else{
		return false;
	}
}
if (isset($_POST['update_btn'])) {
	update();
}
function update(){
if (count($errors) == 0) {
		$query = "UPDATE block SET status='Occupied' WHERE id='$username' LIMIT 1";		
		$results = mysqli_query($db, $query);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
       }
   }
}
?> 
