<?php

require_once "connect.php";
require_once "../api/get_user.php";

$name = $description = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["location_name"]))){
        header('location: ../pages/gallery.form.php?error=nameempty');
        exit();
    } else {
        $name = trim($_POST["location_name"]);
    }

    if(empty(trim($_POST["desc"]))){
        header('location: ../pages/.form.php?error=descriptionempty');
        exit();
    } else {
        $description = trim($_POST["desc"]);
    }

    $user_id = $_POST["id"];

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = time().'_'.$_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!array_key_exists($ext, $allowed)) {
            header('location: ../pages/gallery.form.php?error=filetype');
            exit();
        }
        if(file_exists("images/" . $filename)){
            header('location: ../pages/gallery.form.php?error=fileexists');
            exit();
        } else{
            $filelocation = "images/" . $filename;
            move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $filename);

            $sql = "INSERT INTO gallery (name, description, image, user_id) VALUES (?, ?, ?, ?)";

            if($stmt = $db_connection->prepare($sql)){
                $stmt->bind_param("ssss", $name, $description, $filelocation, $user_id);
                
                if($stmt->execute()){
                    header("location: ../pages/gallery.php?success=addedtogallery");
                    exit();
                } else{
                    header('../pages/gallery.form.php?error=dberror');
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