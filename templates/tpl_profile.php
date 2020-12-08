<?php function draw_profile($user){
/**
 * Draws entire profile page
 */
?>
<div class="profile-page-complete">
    <div class="profile-container">
        <div class="user-photo"> 
            <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
        </div>
        <div class="user-card">
            <div class="user-username"> <h1><?= $user['username'] ?></h1> </div>
            
            <hr>
            
            <div class= "user-information">
                <div class="user-name"> <h4>Name:</h4> <?=$user['name'] ?> </div>
                <div class="user-location"> <h4>Lives in:</h4> <?=$user['location'] ?> </div>
                <div class="user-contacts">
                    <div class="user-phone"> <h4>Phone Number:</h4> <?=$user['phoneNumber'] ?></div>
                    <div class="user-email"> <h4>Email:</h4> <?=$user['email'] ?> </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php function draw_profile_simple($user){
/**
 * Draws simplified version of profile page (just username and photo)
 */
?>
    <div class="simple-profile-container">
        <!-- <div class="user-photo"> 
            <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
        </div> -->
        <div class="user-card">
            <div class="user-username"> <a href="../pages/profile.php?username=<?= $user['username'] ?>"><h1><?= $user['username'] ?></h1></a> </div>
        </div>
    </div>

<?php } ?>

<?php function start_profile_animals_div($username, $is_own_profile, $n_topics){
/**
 * Starts the division where the users' animals are displayed
 */
?>
    <?php 
        $string = $is_own_profile ? 
            ($n_topics > 0 ? 'Your animals up for adoption' : 'You have no animals up for adoption yet. <a href=../pages/add_animal.php>Lets change that!</a>') : 
            ($n_topics > 0 ? $username . chr(39) . 's animals up for adoption' : $username . ' has no animals up for adoption yet');
    ?>

    <div class="profile-animals-title-container">
        <div class="profile-animals-title-divider"><hr></div> 
            <h1><?= $string ?></h1>
        <div class="profile-animals-title-divider"><hr></div> 
    </div>

    <div class="profile-animals-ext-container">
        <div class="profile-animals-container">

<?php } ?>


<?php function end_profile_animals_div(){
/**
 * Ends the division where the users' animals are displayed
 */
?>
        </div>
    </div>
</div>
<?php } ?>

<?php function start_profile_favourites_div($username, $is_own_profile, $n_favourites){
/**
 * Starts the division where the users' favourite animals are displayed
 */
?>
    <?php 
        $string = $is_own_profile ? 
            ($n_favourites > 0 ? 'Your favourites' : 'You have no favourites yet') : 
            ($n_favourites > 0 ? $username . chr(39) . 's favourites' : $username . ' has no favourites yet');
    ?>

    <div class="profile-favourites-title-container">
        <div class="profile-favourites-title-divider"><hr></div> 
            <h1><?= $string ?></h1>
        <div class="profile-favourites-title-divider"><hr></div> 
    </div>

    <div class="profile-favourites-ext-container">
        <div class="profile-favourites-container">

<?php } ?>


<?php function end_profile_favourites_div(){
/**
 * Ends the division where the users' favourite animals are displayed
 */
?>
        </div>
    </div>
<?php } ?>