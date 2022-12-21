<?php

require_once "connect.php";

$id = $_GET['location'];

$sql = "DELETE FROM locations WHERE id = ?";

if($stmt = $db_connection->prepare($sql)){
    $stmt->bind_param("s", $id);

    if($stmt->execute()) {
        header("location: ../pages/location.manage.php?success=locationdeleted");
        exit();
    } else{
        header("location: ../pages/location.manage.php?error=dberror");
        exit();
    }

    $db_connection->close();
}