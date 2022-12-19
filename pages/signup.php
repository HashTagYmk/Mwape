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
    <title>Sign Up</title>

    <?php include_once "../inc/head.php"; ?>
    
</head>
<body>
    <div class="container">
        <div class="row p-5">
            <div class="col-md-6 mx-auto shadow-sm p-3 mb-5 bg-body rounded">
                <?php include_once "../inc/handles.php"; ?>
                <h2 class="text-center">Sign Up</h2>
                <p class="text-center">Please fill this form to create an account.</p>
                <hr>
                <form action="../scripts/signup.process.php" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li>Password must be atleast 8 charaters.</li>
                            <li>Password can contain letters, numbers, and any other charaters.</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <div class="col-12 d-grid d-md-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                    <hr>
                    <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
                </form>
            </div>
        </div>
    </div>

<?php include_once "../inc/footer.php"; ?>
<?php include_once "../inc/foot.php"; ?>

</body>
</html>