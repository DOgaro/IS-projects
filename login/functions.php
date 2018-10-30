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
	global $db, $errors, $name, $username, $Email, $Contact;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $name    =  e($_POST['name']);
	$username    =  e($_POST['username']);
	$Email       =  e($_POST['Email']);
	$password  =  e($_POST['password']);
	$cpassword  =  e($_POST['cpassword']);
	$Contact    =  e($_POST['Contact']);

	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($Email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password != $cpassword) {
		array_push($errors, "The two passwords do not match");
	}
	if (empty($Contact)) { 
		array_push($errors, "Contact is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if (isset($_POST['access_level'])) {
			$user_type = e($_POST['access_level']);
			$query = "INSERT INTO users (name, username, Email, password, Contact, access_level) 
					  VALUES('$name', '$username', '$Email', '$password', '$Contact', '$access_level')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: ../adminTT/admin.php');
		}else{
			$query = "INSERT INTO users (name, username, Email, password, Contact, access_level) 
					  VALUES('$name', '$username', '$Email', '$password', '$Contact', '1')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['1'] = getUserById($logged_in_user_id); // put logged in user in session
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
// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	header("location: ../login/login.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['access_level'] == '1') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../adminTT/admin.php?login=success');		  
			}
			else if ($logged_in_user['access_level'] == '2') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../adminTT/caretaker.php?login=success');		  
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: ../adminTT/tenants.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
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
