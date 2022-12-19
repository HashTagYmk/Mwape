<?php

require_once "connect.php";

// Define variables and initialize with empty values
$first_name = $last_name = $email = $password = $confirm_password = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate email
    if(empty(trim($_POST["email"]))){
        header('location: ../pages/signup.php?error=emailempty');
        exit();
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE email = ?";
        
        if($stmt = $db_connection->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    header('location: ../pages/signup.php?error=emailtaken');
                    exit();
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                header('location: ../pages/signup.php?error=dberror');
                exit();
            }

            // Close statement
            $stmt->close();
        }
    }

    // validate first name
    if(empty(trim($_POST["first_name"]))){
        header('location: ../pages/signup.php?error=firstnameempty');
        exit();
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // validate last name
    if(empty(trim($_POST["last_name"]))){
        header('location: ../pages/signup.php?error=lastnameempty');
        exit();
    } else {
        $last_name = trim($_POST["last_name"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        header('location: ../pages/signup.php?error=passwordempty');
        exit();     
    } elseif(strlen(trim($_POST["password"])) < 8){
        header('location: ../pages/signup.php?error=passwordlength');
        exit();
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        header('location: ../pages/signup.php?error=cpasswordempty');
        exit();     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            header('location: ../pages/signup.php?error=passwordmatch');
            exit();
        }
    }
    
    $sql = "INSERT INTO users (first_name, last_name, email, password, is_admin) VALUES (?, ?, ?, ?, ?)";
         
    if($stmt = $db_connection->prepare($sql)){
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $is_admin);
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // hash password

        $is_admin = false;
        
        if($stmt->execute()){
            // Redirect to login page
            header("location: ../pages/login.php");
            exit();
        } else{
            header('location: ../pages/signup.php??error=dberror');
            exit();
        }

        $stmt->close();
    }

    // Close connection
    $db_connection->close();
}