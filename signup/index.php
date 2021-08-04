<?php
  if (isset($_POST['submit'])) {

  	include '../includes/autoloader.inc.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    //Error handlers
    //check for empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
      //return a json error report

      $status = "error";
      $data = "input error";
      $message = "please fill in all fields";
    }
    else {
     //check if input characters are valid
     if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
       //return an error report
       $status = "error";
       $data = "invalid characters";
       $message = "invalid characters";
     }
     else {
       //check if email is valid
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $status = "error";
         $data = "data";
         $message = "invalid email";
       }
          $usersObj1 = new UsersView();
          else {
          $usersObj1->showUser($email);
          $result = $usersObj1->showUser($email);

          if (!empty ($result[0]['email'])) {
            //return an email is already used error
            $status = "error";
            $data = "used email";
            $message = "email has already been used";
          }
          else {
           //Hashing the password
           $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
           //Insert the user into the database

            $usersObj = new UsersContr();
            $usersObj->createUser($first_name, $last_name, $email, $hashedPwd);

            //check is user now exists...
            $usersObj1 = new UsersView();
        		$usersObj1->showUser($email);
        		$result = $usersObj1->showUser($email);

      			 if (empty ($result[0]['email'])) {
               //error occurred
               $status = "false";
               $data = "data";
               $message = "signup error";
      			 } else {
      				 if ($result[0]['email'] = $email) {
      					 //report signup was successful
                 $status = "success";
                 $data = "data";
                 $message = "user created";
      				 }
      			 }
             $response = array();
             $response['status'] = $status;
             $response['data'] = $data;
             $response['message'] = $message;
             $response = json_encode($response);
             return $response;
             exit();
             //header("Location: ../sign up.php?signup=success");
             //exit();
          }
        }
      }
    }

  }
  else {
    //return error
    $status = "error";
    $data = "data";
    $message = "unrecognized access";

    $response = array();
    $response['status'] = $status;
    $response['data'] = $data;
    $response['message'] = $message;
    $response = json_encode($response);
    return $response;
    exit();
  }
?>
