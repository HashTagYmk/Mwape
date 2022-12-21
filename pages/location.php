<?php include_once "../inc/1session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body class="bg-light">

<?php

include_once "../inc/navbar.php";
include_once "../api/get_data.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $user = get_profile($_SESSION['email'], $db_connection);

    if($user['is_admin'] == true) {
        header('location: location.manage.php');
        exit();
    }
}

?>

<div class="container p-3">
    <?php include_once "../inc/handles.php"; ?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form method="get" action="location.php">
                <input class="form-control" type="text" name="search" id="search" placeholder="What are you looking for?">
            </form>
        </div>
    </div> 
</div>

<div class="container p-3">
    <div class="row d-flex justify-content-center">
    <?php get_locations($db_connection); ?>
    </div>
</div>

<?php include_once "../inc/footer.php"; ?>
<?php include_once "../inc/foot.php"; ?>
</body>
</html>