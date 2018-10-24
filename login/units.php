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
    $name    =  e($_POST['name']);
	$description =  e($_POST['description']);

	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($description)) { 
		array_push($errors, "Description is required"); 
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		if (isset($_POST['status'])) {
			$user_type = e($_POST['status']);
			$query = "INSERT INTO blocks (name, status, description) 
					  VALUES('$name', '$status', '$description')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New unit successfully created!!";
			header('location: ../adminTT/admin.php');
		}else{
			$query = "INSERT INTO blocks (name, status, description) 
					  VALUES('$name', 'Unoccupied', '$description')";
			mysqli_query($db, $query);
			$logged_in_user_id = mysqli_insert_id($db);
			$_SESSION['success']  = "You are now logged in";
			header('location: ../adminTT/admin.php');				
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
