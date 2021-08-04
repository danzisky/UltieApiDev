<?php

session_start();

if (isset($_POST['authenticate'])) {

	include '../includes/autoloader.inc.php';

	$email = $_POST["email"];
	$pwd = $_POST["pwd"];

	//Error handlers
	//check for empty fields
	if (empty($email) || empty($pwd))  {
		$status = "error";
 	 	$data = "input error";
 	 	$message = "please fill in all fields";
	} else {
		$usersObj1 = new UsersView();
		$usersObj1->showUser($email);
		$result = $usersObj1->showUser($email);

			 if (empty ($result[0]['email'])) {
				 //error report for invalid email
				 $status = "error";
	       $data = "no user";
	       $message = "account not found";
			 } else {
				 if ($row = $result) {
					 //De-hashing the pssword
					 $hashedPwdCheck = password_verify($pwd, $result[0]['pwd']);
					 if ($hashedPwdCheck == false) {
						 $status = "error";
						 $data = "input error";
						 $message = "wrong password";
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
						 $status = "success";
			       $data = "login success";
			       $message = "logged in successfully";

					 }
				 }
			 }
	}
	$response = array();
	$response['status'] = $status;
	$response['data'] = $data;
	$response['message'] = $message;
	$response = json_encode($response);
	return $response;
	exit();
} else {
	//return a major error of invalid entry request
	exit();
}
