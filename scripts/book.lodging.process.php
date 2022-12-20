<?php

require_once "connect.php";
require_once "../api/get_user.php";

$location_id = $user_id = $guest_no = $date = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["guest_no"]))){
        $guest_no = 1;
    } else {
        $guest_no = $_POST["guest_no"];
    }
    
    if(empty(trim($_POST["date"]))){
        header('location: ../pages/location.form.php?error=dateempty');
        exit();     
    } else{
        $date = $_POST["date"];
    }

    $user_id = $_POST["user_id"];
    $location_id = $_POST["s_id"];

    $sql = "INSERT INTO booking (user_id, s_id, date, guest_no, status, type) VALUES (?, ?, ?, ?, ?, ?)";

    if($stmt = $db_connection->prepare($sql)){
        $stmt->bind_param("ssssss", $user_id,$location_id, $date, $guest_no, $status, $type);

        $status = "pending";
        $type = "lodging";
        
        if($stmt->execute()){
            header("location: ../pages/booking.php?success=bookingcreated");
            exit();
        } else{
            header('../pages/booking.form.php?error=dberror');
            exit();
        }

        $stmt->close();
    }

    $db_connection->close();
}