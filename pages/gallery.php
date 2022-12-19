<?php include_once "../inc/1session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
</body>

<?php

include_once "../inc/navbar.php";
include_once "../api/get_data.php";

?>

<div class="container p-3">
    <?php
        if (isset($_SESSION['email'])) {
            if ($user['is_admin'] == true) {
                echo '<a href="gallery.form.php" class="btn btn-primary">Add to Gallery</a>';
            }
        }
    ?>
</div>

<div class="container p-3">
    <div class="row">
    <?php get_gallery($db_connection); ?>
    </div>
</div>

<?php include_once "../inc/footer.php"; ?>
<?php include_once "../inc/foot.php"; ?>
</body>
</html>