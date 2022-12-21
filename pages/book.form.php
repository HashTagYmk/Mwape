<?php include_once "../inc/session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Booking</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body class="bg-light">

<?php

include_once "../inc/navbar.php";
require_once "../api/get_data.php";

if(isset($_GET['location'])) {
    $s = get_location($_GET['location'], $db_connection);
}

if(isset($_GET['lodge'])) {
    $s = get_lodge($_GET['location'], $db_connection);
}

?>

<div class="container p-3">
    <div class="row p-5">
        <div class="col-md-6 mx-auto shadow-sm p-3 mb-5 bg-body rounded">
            <?php include_once "../inc/handles.php"; ?>
            <h2 class="text-center">Create a Booking</h2>
            <p class="text-center">Complete the form to book for <?php echo $s['name']; ?>.</p>
            <form action="../scripts/book.location.process.php" method="post" class="row g-3">
                <input type="text" value="<?php echo $s['id'];?>" name="s_id" id="s_id" class="visually-hidden">
                <input type="text" value="<?php echo $user['id'];?>" name="user_id" id="user_id" class="visually-hidden">
                <div class="col-md-12">
                    <label for="guest_no" class="form-label">How many people are you bringing?</label>
                    <input type="number" class="form-control" id="guest_no" name="guest_no" min="1" placeholder="number of guests" required>
                </div>
                <div class="col-md-12">
                    <label for="date" class="form-label">When are you coming?</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="col-md-12 d-grid">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('date').valueAsDate = new Date();
    document.getElementById('date').min = new Date().toISOString().split("T")[0];
</script>


<?php include_once "../inc/foot.php"; ?>
</body>
</html>