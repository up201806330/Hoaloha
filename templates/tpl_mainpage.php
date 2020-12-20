<?php 
function draw_mainpage_body() {
/**
 * Draws the center piece of the mainpage, which incu´ludes the slideshow and the two buttons
 */ ?>

    <div class="image-container">
        <h1>Find the Right Animal for You</h1>
        <h2>Check out our list of Available Pets</h2>
        <div class="button-container">
            <div class="inner-button-container">
                <button id="searchButton" class="btn btn1">Search a Pet    <span class="material-icons-round">search</span></button>
                <button onclick="window.location='../pages/add_animal.php';" class="btn btn2">Rehome a Pet   <span class="material-icons-round">home</span></button>
            </div>
        </div>
    </div>
<?php } ?>