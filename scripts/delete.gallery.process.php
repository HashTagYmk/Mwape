<?php

require_once "connect.php";

$id = $_GET['gallery'];

$sql = "DELETE FROM gallery WHERE id = ?";

if($stmt = $db_connection->prepare($sql)){
    $stmt->bind_param("s", $id);

    if($stmt->execute()) {
        header("location: ../pages/gallery.manage.php?success=gallerydeleted");
        exit();
    } else{
        header("location: ../pages/gallery.manage.php?error=dberror");
        exit();
    }

    $db_connection->close();
}