<?php function draw_profile($user){
/**
 * Draws entire profile page
 */
?>

    <div class="profile-container">
        <div class="user-photo"> 
            <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
        </div>
        <div class="user-card">
            <div class="user-username"> <h1><?= $user['username'] ?></h1> </div>
            <hr>
            <div class= "user-information">
                <div class="user-location"> <h4>Lives in:</h4> <?=$user['location'] ?> </div>
                <div class="user-contacts">
                    <div class="user-phone"> <h4>Phone Number:</h4> <?=$user['phoneNumber'] ?></div>
                    <div class="user-email"> <h4>Email:</h4> <?=$user['email'] ?> </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php function start_animals_div($username, $is_own_profile){
/**
 * Starts the division where the users' animals are displayed
 */
?>
    <?php 
        $string = $is_own_profile ? 'Your animals up for adoption': $username . '´s animals up for adoption';
    ?>
    
    <div class="profile-animals-title-container">
        <div class="profile-animals-title-divider"><hr></div> 
        <h1><?= $string ?></h1>
        <div class="profile-animals-title-divider"><hr></div> 
    </div>
    
    <div class="profile-animals-ext-container">
        <div class="profile-animals-container">

<?php } ?>


<?php function end_animals_div(){
/**
 * Ends the division where the users' animals are displayed
 */
?>
        </div>
    </div>
<?php } ?>
