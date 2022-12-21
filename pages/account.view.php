<?php

include_once "../inc/session.php";

if (isset($_GET['viewing'])) {
    $account = get_profile_by_id($_GET['viewing'], $db_connection);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $account['first_name'] .' '. $account['last_name']; ?></title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body class="bg-light">

<?php include_once "../inc/navbar.php"; ?>

<div class="container p-3">
    <div class="row">
        <div class="col-6 shadow p-3 mb-5 bg-body rounded mx-auto">
            <table class="table table-borderless">
                <tr>
                    <td>Name:</td><td><?php echo $account['first_name'] .' '. $account['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Email:</td><td><?php echo $account['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td><td>+<?php echo $account['phone_no']; ?></td>
                </tr>
                <tr>
                    <td>Joined:</td><td><?php echo $account['joined']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include_once "../inc/foot.php"; ?>

</body>
</html>