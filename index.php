<?php

session_start();

require_once "scripts/connect.php";
include_once "api/get_user.php";
include_once "api/get_data.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $user = get_profile($_SESSION['email'], $db_connection);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include_once "inc/head.php"; ?>
    <link rel="stylesheet" href="css/popup.css">


</head>
<body>

<?php include_once "inc/navbar.php"; ?>

<div class="container">
    <div id="header" style="height: 300px;">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Twamilanga Touring Services</h1>
            <div class="col-lg-6 mx-auto">
            <br>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a class="btn btn-dark video" 
                href="https://www.youtube.com/watch?v=SAqb1xnKUnw" role="button">Watch Video</a>
            </div>
            </div>
        </div>
    </div>
    
    <div id="location" class="p-3">
        <h2 class="text-center">Locations</h2>
        <div class="row">
        <?php get_three_locations($db_connection); ?>
        </div>
        <p class="text-center"><a href="pages/location.php" class="link-dark">View more...</a></p>
    </div>

    <div id="services" class="p-3">
        <h2 class="text-center">Services</h2>
        <div class="row">
            <div class="col-md text-center shadow p-3 mb-5 bg-body rounded">
                <i class="fas fa-hotel" style="height: 30px; width: 30px;"></i>
                <h5>Affordable Hotels</h5>
                <p>Best Prices On 344 Hotels In Zambia, Book Accommodation In Lusaka, Livingstone, Kitwe, Kakumbi, Ndola And More. LOW RATES GUARANTEED!.</p>
            </div>
            <div class="col-md text-center shadow p-3 mb-5 mx-1 bg-body rounded">
                <i class="fas fa-utensils" style="height: 30px; width: 30px;"></i>
                <h5>Food And Drinks</h5>
                <p>Delicious Food, Drinks And Desserts You Need To Try!. See More Ideas About Food, Delicious, Yummy Food.</p>
            </div>
            <div class="col-md text-center shadow p-3 mb-5 mx-1 bg-body rounded">
                <i class="fas fa-bullhorn" style="height: 30px; width: 30px;"></i>
                <h5>Safety Guide</h5>
                <p>We Provide Information On How To Stay Safe And Travel The World With Confidence. Crime, Scams, Health, Local Laws And How To Stay Out Of Trouble.</p>
            </div>
            <div class="col-md text-center shadow p-3 mb-5 mx-1 bg-body rounded">
            <i class="fas fa-plane" style="height: 30px; width: 30px;"></i>
                <h5>Local Transportation</h5>
                <p>We've Partnered With Ulendo Taxi Zambia, A Taxi Service That Helps You To Get A Ride In Minutes Via A Mobile App. Request Ulendo Taxi And Get Picked Up By A Nearby Driver.</p>
            </div>
            <div class="col-md text-center shadow p-3 mb-5 mx-1 bg-body rounded">
                <i class="fas fa-globe-asia" style="height: 30px; width: 30px;"></i>
                <h5>World Links</h5>
                <p>Travelways Connections All Around The World Ensure That You Are Always Guided When Planning Your Trip.</p>
            </div>
            <div class="col-md text-center shadow p-3 mb-5 mx-1 bg-body rounded">
                <i class="fas fa-hiking" style="height: 30px; width: 30px;"></i>
                <h5>Adventures</h5>
                <p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Inventore Commodi Earum, Quis Voluptate Exercitationem Ut Minima Itaque Iusto Ipsum Corrupti!</p>
            </div>
        </div>
    </div>

    <div id="gallery" class="p-3">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/travel.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Travel</h5>
                    <p>A captivating view through a plane window</p>
                </div>
            </div>
            <?php get_gallery_for_carousel($db_connection); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>
<?php include_once "inc/foot.php"; ?>
<script src="js/popup.js"></script>
<script>
$('.video').magnificPopup({
  type: 'iframe'
  // other options
});
</script>
</body>
</html>