<?php
  if (isset($_POST['submit'])) {

  	include 'autoloader.inc.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //Error handlers
    //check for empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
      //return a json error report
     exit();
    }
    else {
     //check if input characters are valid
     if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
       //return an error report
       exit();
     }
     else {
       //check if email is valid
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header("Location: ../sign up.php?signup=email");
         exit();
       }
          $usersObj1 = new UsersView();
          else {
          $usersObj1->showUser($email);
          $result = $usersObj1->showUser($email);

          if (!empty ($result[0]['email'])) {
            //return an email is already used error
            //header("Location: ../sign up.php?signup=emailused");
            exit();
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
               exit();
      			 } else {
      				 if ($result[0]['email'] = $email) {
      					 //report sigun was successful
      					 exit();
      				 }
      			 }
             //header("Location: ../sign up.php?signup=success");
             //exit();
          }
        }
      }
    }

  }
  else {
    //return error
    exit();
  }
?>
