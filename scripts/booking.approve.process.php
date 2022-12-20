<?php

require_once "connect.php";

$id = $_GET['booking'];

$sql = "UPDATE booking SET status = 'approved' WHERE id = ?";

if($stmt = $db_connection->prepare($sql)){
    $stmt->bind_param("s", $id);

    if($stmt->execute()) {
        header("location: ../pages/booking.php?success=bookingapproved");
        exit();
    } else{
        header("location: ../pages/booking.php?error=dberror");
        exit();
    }

    $db_connection->close();
}