<?php include_once "../inc/session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lodging</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body class="bg-light">

<?php

include_once "../inc/navbar.php";

?>

<div class="container p-3">
    <div class="row p-5">
        <div class="col-md-6 mx-auto shadow-sm p-3 mb-5 bg-body rounded">
            <?php include_once "../inc/handles.php"; ?>
            <h2 class="text-center">Add Lodging</h2>
            <p class="text-center">Please fill this form to add a new lodging location.</p>
            <form action="../scripts/create.lodging.process.php" method="post" enctype="multipart/form-data" class="row g-3">
                <input type="text" value="<?php echo $user['id'];?>" class="visually-hidden" name="id" id="id">
                <div class="col-md-12">
                    <label for="location_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="location_name" name="location_name" required>
                </div>
                <div class="col-md-12">
                    <label for="desc" class="form-label">Description</label>
                    <input type="text" class="form-control" id="desc" name="desc" required>
                </div>
                <div class="col-md-12">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="col-md-12">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating"  min="1" max="5" required>
                </div>
                <div class="col-md-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="col-12 d-grid d-md-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Add Lodging</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "../inc/foot.php"; ?>
</body>
</html>