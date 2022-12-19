<?php

session_start();

require_once "../scripts/connect.php";
include_once "../api/get_user.php";

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header('location: login.php');
    exit();
} else {
    $user = get_profile($_SESSION['email'], $db_connection);
}

?>