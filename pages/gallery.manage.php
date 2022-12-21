<?php include_once "../inc/session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body class="bg-light">

<?php

include_once "../inc/navbar.php";
include_once "../api/get_table_data.php";

?>

<div class="container p-3">
    <?php include_once "../inc/handles.php"; ?>
    <table id="gallerytable" class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>--</th>
            </tr>
        </thead>
        <tbody>
            <?php get_gallery_data($db_connection); ?>
        </tbody>
    </table>
</div>

<div class="container p-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-2">
            <div class="row">
                <?php
                if (isset($_SESSION['email'])) {
                    if ($user['is_admin'] == true) {
                        echo '<a href="gallery.form.php" class="btn btn-primary">Add to Gallery</a>';
                    }
                }
                ?>
            </div>
        </div>
    </div> 
</div>

<?php include_once "../inc/foot.php"; ?>

<script>
    $(document).ready(function () {
        $('#gallerytable').DataTable();
    });
</script>

</body>
</html>