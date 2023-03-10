<?php

require_once "connect.php";

$id = $_GET['booking'];

$sql = "DELETE FROM booking WHERE id = ?";

if($stmt = $db_connection->prepare($sql)){
    $stmt->bind_param("s", $id);

    if($stmt->execute()) {
        header("location: ../pages/booking.php?success=bookingdeleted");
        exit();
    } else{
        header("location: ../pages/booking.php?error=dberror");
        exit();
    }

    $db_connection->close();
}