<?php include_once "../inc/session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
</body>

<?php

include_once "../inc/navbar.php";
include_once "../api/get_table_data.php";

?>

<div class="container p-3">
    <table id="bookingtable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Location</th>
                <?php
                if($user['is_admin'] == true) {
                    echo '<th>User</th>';
                }
                ?>
                <th>Booked for</th>
                <th>No. of Guests</th>
                <th>Status</th>
                <th>--</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($user['is_admin'] == true) {
                get_all_bookings($db_connection);
            } else {
                get_my_bookings($user['id'], $db_connection);
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once "../inc/foot.php"; ?>

<script>
    $(document).ready(function () {
        $('#bookingtable').DataTable();
    });
</script>

</body>
</html>