<nav class="py-2 bg-dark border-bottom sticky-top">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/Mwape/" class="nav-link link-light px-2">Home</a></li>
            <li class="nav-item"><a href="/Mwape/pages/location.php" class="nav-link link-light px-2">Locations</a></li>
            <li class="nav-item"><a href="/Mwape/index.php#services" class="nav-link link-light px-2">Services</a></li>
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
        <ul class="nav">
            <?php
            if (isset($_SESSION['email'])) {
              echo '<li class="nav-item"><a href="/Mwape/pages/account.php" class="nav-link link-light px-2">'.$user['first_name'].' '.$user['last_name'].'</a></li>
              <li class="nav-item"><a href="/Mwape/scripts/logout.process.php" class="nav-link link-light px-2">Logout</a></li>';
            } else {
              echo '<li class="nav-item"><a href="/Mwape/pages/login.php" class="nav-link link-light px-2">Login</a></li>
              <li class="nav-item"><a href="/Mwape/pages/signup.php" class="nav-link link-light px-2">Sign up</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>