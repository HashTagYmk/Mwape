<header class="p-3 bg-dark text-white sticky-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item"><a href="/Mwape/" class="nav-link link-light px-2">Home</a></li>
            <li class="nav-item"><a href="/Mwape/index.php#services" class="nav-link link-light px-2">Services</a></li>
            <li class="nav-item"><a href="/Mwape/pages/location.php" class="nav-link link-light px-2">Locations</a></li>
            <li class="nav-item"><a href="/Mwape/pages/lodging.php" class="nav-link link-light px-2">Lodging</a></li>
            <li class="nav-item"><a href="/Mwape/pages/gallery.php" class="nav-link link-light px-2">Gallery</a></li>
            <?php
            if (isset($_SESSION['email'])) {
                echo '<li class="nav-item"><a href="/Mwape/pages/booking.php" class="nav-link link-light px-2">Bookings</a></li>'; 
                if ($user['is_admin'] == true) {
                    echo '<li class="nav-item"><a href="/Mwape/pages/users.php" class="nav-link link-light px-2">Users</a></li>';     
                }
            }
            ?>
        </ul>

        <div class="text-end">
            <ul class="nav">
                <?php
                if (isset($_SESSION['email'])) {
                echo '<li class="nav-item"><a href="/Mwape/pages/account.php" class="nav-link link-light px-2">'.$user['first_name'].' '.$user['last_name'].'</a></li>
                <li class="nav-item"><a href="/Mwape/scripts/logout.process.php" class="nav-link link-light px-2 btn btn-danger mx-2">Logout</a></li>';
                } else {
                echo '<li class="nav-item"><a href="/Mwape/pages/login.php" class="btn btn-outline-light-me-2 nav-link link-light px-2 mx-2">Login</a></li>
                <li class="nav-item"><a href="/Mwape/pages/signup.php" class="btn btn-warning nav-link link-light px-2 mx-2">Sign up</a></li>';
                }
                ?>
            </ul>
        </div>
      </div>
    </div>
</header>