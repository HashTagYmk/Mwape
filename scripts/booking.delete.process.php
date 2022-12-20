<?php

require_once "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET['booking'];

    $sql = "DELETE FROM bookings WHERE id = ?";

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
}

