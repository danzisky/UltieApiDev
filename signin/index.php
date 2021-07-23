<?php

session_start();

if (isset($_POST['crib'])) {

	include 'autoloader.inc.php';

	$email = $_POST["email"];
	$pwd = $_POST["pwd"];

	//Error handlers
	//check for empty fields
	if (empty($email) || empty($pwd))  {
	 //return error of empty fields...
   exit();
	} else {
		$usersObj1 = new UsersView();
		$usersObj1->showUser($email);
		$result = $usersObj1->showUser($email);

			 if (empty ($result[0]['email'])) {
				 //error report for invalid email
         exit();
			 } else {
				 if ($row = $result) {
					 //De-hashing the pssword
					 $hashedPwdCheck = password_verify($pwd, $result[0]['pwd']);
					 if ($hashedPwdCheck == false) {
						  //error for invalid password
						  exit();
					 } elseif ($hashedPwdCheck == true) {
						 //Log in the user here

             // set cookies instead......

						 $_SESSION['u_id'] = $row[0]['user_id'];
						 $_SESSION['first'] = $row[0]['first_name'];
						 $_SESSION['last'] = $row[0]['last_name'];
						 $_SESSION['mid'] = $row[0]['middle_name'];
						 $_SESSION['email'] = $row[0]['email'];
						 $_SESSION['dob'] = $row[0]['dob'];

             // return data containing details
						 exit();
					 }
				 }

			 }
	}
} else {
	 //return a major error of invalid entry request
	 exit();
	 }
