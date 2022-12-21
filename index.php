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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-light">

<?php include_once "inc/navbar.php"; ?>

<!-- image Slider -->
<section class="home">
  <div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-controls">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active" style="background-image:url('images/P1.jpg')"></li>
      <li data-target="#carousel" data-slide-to="1" style="background-image:url('images/P2.jpg')"></li>
      <li data-target="#carousel" data-slide-to="2" style="background-image:url('images/P3.jpg')"></li>
      
    </ol>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
     <img src="images/left-arrow.svg" alt="Prev"> 
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <img src="images/right-arrow.svg" alt="Next">
  </a>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image:url('images/P1.jpg')">
      <div class="container">
         <h2>Victoria Falls Bridge</h2>
         <p>Livingstone, Zambia</p>
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('images/P2.jpg')">
      <div class="container">
         <h2>Blue Lagoon</h2>
         <p>West Of Lusaka On The Kafue</p>
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('images/P3.jpg')">
      <div class="container">
         <h2>Kuomboka Ceremony</h2>
         <p>Traditional Ceremony</p>
      </div>
    </div>
  </div>
</div>
 </section>
<!-- image Slider -->
<div class="container">
    <div id="header" style="height: 200px;">
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
        <div class="row d-flex justify-content-center">
        <?php get_three_locations($db_connection); ?>
        </div>
        <p class="text-center"><a href="pages/location.php" class="btn btn-primary btn-sm">View more...</a></p>
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
    </section>























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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>