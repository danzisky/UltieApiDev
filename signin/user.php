<?php

session_start();

if (isset($_POST['authenticate'])) {

	include '../includes/autoloader.inc.php';

	$email = $_POST["email"];
	$pwd = $_POST["password"];

	//Error handlers
	//check for empty fields
	if (empty($email) || empty($pwd))  {
		$status = "error";
 	 	$data = "input error";
 	 	$message = "please fill in all fields";
		$response = array();
		$response['status'] = $status;
		$response['data'] = $data;
		$response['message'] = $message;
		$response = json_encode($response);
		echo $response;
		//return $response;
	} else {

		$users = array();
		$user1 =  array();
		
		//echo $email;
		//echo $pwd;

   		$user1['email'] = 'sam@gmail.com';
		$user1['first_name'] = 'Sam';
		$user1['last_name'] = 'King';
		$user1['password'] = 'sam king';

    	$user2 =  array();
		$user2['email'] = 'man@gmail.com';
		$user2['first_name'] = 'Man';
		$user2['last_name'] = 'Kong';
		$user2['password'] = 'Man kong';

    array_push($users, $user1, $user2);
		
    if (!array_search($email, $users)) {
      	$status = "error";
   	 	$data = "user error";
   	 	$message = "no user was found with the email";
    } else {
			$status = "error";
	 	 	$data = "input error";
	 	 	$message = "unidentified issues";
    }

	}
	$response = array();
	$response['status'] = $status;
	$response['data'] = $data;
	$response['message'] = $message;
	$response = json_encode($response);
	echo $response;
	//return $response;
	//exit();
} else {
	 //return a major error of invalid entry request	 exit();
	 $status = "error";
	 $data = "input error";
	 $message = "wrong entry";
	 
	 $response = array();
	 $response['status'] = $status;
	 $response['data'] = $data;
	 $response['message'] = $message;
	 $response = json_encode($response);
	 echo $response;
	 //return $response;
	 //exit();
	 }
