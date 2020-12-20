<?php function draw_favourite_button($n_favourites, $idTopic, $topicIsLiked){
/**
 * Draws the favourite button for a particular topic page
 */ ?>
    <div class="favourite-container">
        <div class="favourite-button-container"> 
        <form method="post" action="../actions/action_toggle_favourite.php">
        <input type="hidden" name="idTopic" value=<?=$idTopic?>>
        
        <?php if($topicIsLiked) : ?>
        <button type="submit" class="add-to-favourites-button-liked">
            <!-- <span class="material-icons-round">star</span> -->
            <i class="fas fa-heart" style="font-size:48px;color:red"></i>
        <?php else : ?>
        <button type="submit" class="add-to-favourites-button-unliked">
            <!-- <span class="material-icons-round">star_border</span> -->
            <i class="far fa-heart" style="font-size:48px;color:red"></i>
        <?php endif; ?>
        </button>

        </form>
        <button id="favouritesButton" class="favourites-counter"><?=$n_favourites?></div>
    </div>
  

<?php } ?>