<?php include_once "../inc/session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
</body>

<?php

include_once "../inc/navbar.php";
include_once "../api/get_table_data.php";

?>

<div class="container p-3">
    <table id="usertable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Joined</th>
                <th>--</th>
            </tr>
        </thead>
        <tbody>
            <?php get_user_data($db_connection); ?>
        </tbody>
    </table>
</div>

<?php include_once "../inc/foot.php"; ?>

<script>
    $(document).ready(function () {
        $('#usertable').DataTable();
    });
</script>

</body>
</html>