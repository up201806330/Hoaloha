<?php function draw_profile($user){
/**
 * Draws entire profile page
 */
?>

    <div class="profile-container">
        <div class="user-username"> <?= $user['username'] ?> </div>
        <div class="user-photo"> 
            <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
        </div>
        <div class="user-location"> <?=$user['idLocation'] ?> </div>
        <div class="user-contacts">
            <div class="user-phone"> <?=$user['phoneNumber'] ?> </div>
            <div class="user-email"> <?=$user['email'] ?> </div>
        </div>
    </div>

<?php } ?>

<?php function start_animals_div($username){
/**
 * Starts the division where the users' animals are displayed
 */
?>

    <div class="profile-animals-container">
        <h1><?= $username ?>'s friends looking for a new home...</h1>
    </div>

<?php } ?>


<?php function end_animals_div(){
/**
 * Ends the division where the users' animals are displayed
 */
?>
    </div>
<?php } ?>
