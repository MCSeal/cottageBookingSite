<?php
$title = "Index";
require_once "includes/header.php";



?>


<h1 class="text-center">Interested in staying with us?</h1>
<div class="container_main">
    <div class="text-center">Welcome to our rustic cottage, 15 minutes from Shawville. We have a wonderful guest house
        direcly on a lake, with a beautiful view.</div>

    <div id="carouselOuter" class="carousel slide carousel-outer" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-20" src="./pictures/mainCottage.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-20" src="./pictures/patio.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-20" src="./pictures/wardrobe.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-20" src="./pictures/outside.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselOuter" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselOuter" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <h2 class="text-center mt-5">Details</h2>
    <div class="text-center mt-5">Information about stuff</div>
    <div class="map-center mt-5">
        <iframe title="mymap" width="600" height="400" loading="lazy" allowFullScreen
            src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJWb2zPmSc0UwRoW9lDDmHOqI&key=AIzaSyAiDdUivumjEr6OyLOAfzZVAoC0V0Sc2Vo"></iframe>

    </div>
</div>
<?php require_once "includes/footer.php";
?>