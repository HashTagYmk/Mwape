<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header('location: dasboard.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body>
<div class="container">
    <div class="row p-5">
        <div class="col-md-3 mx-auto shadow-sm p-3 mb-5 bg-body rounded">
            <?php include_once "../inc/handles.php"; ?>
            <h2 class="text-center">Login</h2>
            <hr>
            <form action="../scripts/login.process.php" method="post" class="row g-3">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-12 d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <hr>
                <p class="text-center">Don't have an account? <a href="signup.php">Sign up here</a>.</p>
            </form>
        </div>
    </div>
</div>

<?php include_once "../inc/footer.php"; ?>
<?php include_once "../inc/foot.php"; ?>

</body>
</html>