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
	global $db, $errors, $blockname, $house, $rent, $type;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $blockname    =  e($_POST['blockname']);
	$house =  e($_POST['house']);
	$rent =  e($_POST['rent']);
	$type =  e($_POST['type']);

	// form validation: ensure that the form is correctly filled
	if (empty($blockname)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($house)) { 
		array_push($errors, "Housename is required"); 
	}
	if (empty($type)) { 
		array_push($errors, "Type is required"); 
	}
	if (empty($rent)) { 
		array_push($errors, "Rent is required"); 
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		if (isset($_POST['status'])) {
			$user_type = e($_POST['status']);
			$query = "INSERT INTO house (blockname, house, rent, type, status) 
					  VALUES('$blockname', '$house', '$rent', '$type', '$status')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New unit successfully created!!";
			header('location: ../adminTT/addHouse.php');
		}else{
			$query = "INSERT INTO house (blockname, house, rent, type, status) 
					  VALUES('$blockname', '$house', '$rent', '$type', 'Vacant')";
			mysqli_query($db, $query);
			$logged_in_user_id = mysqli_insert_id($db);
			$_SESSION['success']  = "You are now logged in";
			header('location: ../adminTT/addHouse.php');				
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
