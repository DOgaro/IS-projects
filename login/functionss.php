<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'kejamanage');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 


// return user array from their id
function getUserById($id){
	global $db;
	$id=$_GET['id'];
	$query = 'SELECT * FROM tenants WHERE id='.$id.' ';
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

		$query = "SELECT * FROM tenants WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['access_level'] == '1') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../adminTT/admin.php');		  
			}
			else if ($logged_in_user['access_level'] == '2') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../adminTT/caretaker.php');		  
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: ../adminTT/TenantsHome.php?login=success');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
function isLoggedIn()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['access_level'] == '3' ) {
		return true;
	}
	else{
		return false;
	}
}
