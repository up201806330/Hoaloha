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
            <div class="user-location"> <h4>Lives in:</h4> <?=$user['idLocation'] ?> </div>
            <div class="user-contacts">
                <div class="user-phone"> <h4>Phone Number:</h4> <?=$user['phoneNumber'] ?></div>
                <div class="user-email"> <h4>Email:</h4> <?=$user['email'] ?> </div>
            </div>
        </div>
    </div>
<?php } ?>

