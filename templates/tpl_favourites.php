<?php function draw_favourite_button($n_favourites, $idTopic){
/**
 * Draws the favourite button for a particular topic page
 */
?>
  <div class="favourite-button-container">
    <button id="favouritesButton" class="favourites-counter"><?=$n_favourites?></div>
    <form method="post" action="../actions/action_toggle_favourite.php">
      <input type="hidden" name="idTopic" value=<?=$idTopic?>>
      <button type="submit" class="add-to-favourites-button">Favourite</button>
      <!-- To get state of button (clicked or not): ( getFavourite($idUser, $idTopic) != false ) -->
    </form>
  </div>

<?php } ?>

<?php function start_favourites_div($n_users, $animal_name){
/**
 * Starts the favourites floating object
 */
?>
    <div class="favourites-container">
        <div class="favourites-content">
            <div class="close-button-container">
            <a href="#" id="closeButtonFavourites" class="close"><span class="material-icons-round">close</span></a>
            </div>
            <?php 
                $output;
                if ($n_users == 0) $output = 'No one has added ' . $animal_name . ' to their favourites yet :(';
                else {
                $result_string = ($n_users == 1) ? ' person has added ' : ' people have added ';
                $output = $n_users . $result_string . $animal_name . ' to their favourites';
                }
                echo '<div class="favourites-counter">' . $output . '</div>';
            ?>
            <ul class="favourites-list">

<?php } ?>

<?php function draw_favourite($profile){
/**
 * Draws an entry of the favourites floating object
 */
?>
            <li class="favourites-entry">
                <?php draw_profile_simple($profile); ?>
            </li>

<?php } ?>

<?php function end_favourites_div(){
/**
 * Ends the favourites floating object
 */
?>  
            </ul>    
        </div>
    </div>
<?php } ?>