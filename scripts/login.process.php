<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../pages/dashboard.php");
    exit;
}

require_once "connect.php";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        header('location: ../pages/login.php?error=emailempty');
        exit();
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        header('location: ../pages/login.php?error=passwordempty');
        exit();
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Prepare a select statement
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
    if($stmt = $db_connection->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);
        
        // Set parameters
        $param_email = $email;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // store the results
            $result = $stmt->get_result();
            
            // check if there is a row in the result set
            if($result->num_rows == 1){                    
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // retrieve the encrypted password, id and username
                $hashed_password = $row['password'];

                if(password_verify($password, $hashed_password)){
                    // Password is correct, so start a new session
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["email"] = $row['email'];                            
                    
                    // Redirect user to welcome page
                    header("location: /Mwape");
                    exit();
                } else{
                    header('location: ../pages/login.php?error=passwordwrong');
                    exit();
                }
            } else{
                header('location: ../pages/login.php?error=usernamewrong');
                exit();
            }
        } else{
            header('location: ../pages/login.php?error=dberror');
            exit();
        }

        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $db_connection->close();
}