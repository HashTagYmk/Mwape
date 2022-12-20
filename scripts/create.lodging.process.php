<?php

require_once "connect.php";
require_once "../api/get_user.php";

$name = $description = $price = $rating = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["location_name"]))){
        header('location: ../pages/lodging.form.php?error=nameempty');
        exit();
    } else {
        $name = trim($_POST["location_name"]);
    }

    if(empty(trim($_POST["desc"]))){
        header('location: ../pages/lodging.form.php?error=descriptionempty');
        exit();
    } else {
        $description = trim($_POST["desc"]);
    }

    if(empty(trim($_POST["price"]))){
        header('location: ../pages/lodging.form.php?error=priceempty');
        exit();
    } else {
        $price = trim($_POST["price"]);
    }
    
    if(empty(trim($_POST["rating"]))){
        $rating = 1;     
    } else{
        $rating = trim($_POST["rating"]);
    }

    $user_id = $_POST["id"];

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = time().'_'.$_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!array_key_exists($ext, $allowed)) {
            header('location: ../pages/lodging.form.php?error=filetype');
            exit();
        }
        if(file_exists("images/" . $filename)){
            header('location: ../pages/lodging.form.php?error=fileexists');
            exit();
        } else{
            $filelocation = "images/" . $filename;
            move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $filename);

            $sql = "INSERT INTO lodging (name, description, price, rating, image, user_id) VALUES (?, ?, ?, ?, ?, ?)";

            if($stmt = $db_connection->prepare($sql)){
                $stmt->bind_param("ssssss", $name, $description, $price, $rating, $filelocation, $user_id);
                
                if($stmt->execute()){
                    header("location: ../pages/lodging.php");
                    exit();
                } else{
                    header('../pages/lodging.form.php?error=dberror');
                    exit();
                }
        
                $stmt->close();
            }

            $db_connection->close();
        }
    } else{
        echo "Error: " . $_FILES["image"]["error"];
    }
}