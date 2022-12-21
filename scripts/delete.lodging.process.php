<?php

require_once "connect.php";

$id = $_GET['lodging'];

$sql = "DELETE FROM lodging WHERE id = ?";

if($stmt = $db_connection->prepare($sql)){
    $stmt->bind_param("s", $id);

    if($stmt->execute()) {
        header("location: ../pages/lodging.manage.php?success=lodgingdeleted");
        exit();
    } else{
        header("location: ../pages/lodging.manage.php?error=dberror");
        exit();
    }

    $db_connection->close();
}