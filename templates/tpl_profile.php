<?php function draw_profile($user){
/**
 * Draws entire profile page
 */
?>
<div class="profile-page-complete">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill= "#3d8af7" fill-opacity="1" d="M0,320L120,293.3C240,267,480,213,720,213.3C960,213,1200,267,1320,293.3L1440,320L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
    </svg>
    <div class="profile-container">
        <div class="user-photo"> 
            <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
        </div>
        <div class="user-card">
            <div class="user-title"> 
                <div class="user-name"> <h1><?=htmlentities($user['name'])?></h1> </div>
                <?php if(isset($_SESSION['username']) && $user['username'] == $_SESSION['username']) draw_edit_profile($user['username']);?>
            </div> 
            <hr>
        
            <div class= "user-information">
                <div class="user-username"> <h4>Username:</h4> <?=$user['username'] ?> </div>
                <div class="user-location"> <h4>Lives in:</h4> <?=htmlentities($user['location'])?> </div>
                <div class="user-contacts">
                    <div class="user-phone"> <h4>Phone Number:</h4> <?=htmlentities($user['phoneNumber'])?></div>
                    <div class="user-email"> <h4>Email:</h4> <?=htmlentities($user['email'])?> </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php function draw_edit_profile($username){
    ?>
    <div class="edit-profile">
        <h1><a href="../pages/edit_profile.php?username=<?=$username?>"><span class="material-icons-round">settings</span></a></h1>
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

<?php function start_profile_animals_up_for_adoption_div($username, $is_own_profile, $n_topics){
/**
 * Starts the division where the users' animals still up for adoption are displayed
 */
?>
    <?php 
        $string = $is_own_profile ? 
            ($n_topics > 0 ? 'Your animals up for adoption' : 'You have no animals registered yet. <a href=../pages/add_animal.php>Lets change that!</a>') : 
            ($n_topics > 0 ? $username . chr(39) . 's animals' : $username . ' has no animals registered yet');
    ?>

    <div class="profile-animals-title-container">
        <h1><?= $string ?></h1>
    </div>

    <div class="profile-animals-ext-container">
        <div class="profile-animals-container">

<?php } ?>


<?php function end_profile_animals_up_for_adoption_div(){
/**
 * Ends the division where the users' animals still up for adoption are displayed
 */
?>
        </div>
    </div>

<?php } ?>

<?php function start_profile_animals_adopted_div($username, $is_own_profile, $n_topics){
/**
 * Starts the division where the animals adopted by this user are displayed
 */
?>
    <?php 
        $string = $is_own_profile ? 
            ($n_topics > 0 ? 'The animals you have adopted' : 'You havent adopted any animals yet...') : 
            ($n_topics > 0 ? $username . chr(39) . 's adopted animals' : $username . ' hasnt adopted any animals yet');
    ?>

    <div class="profile-adopted-title-container">
        <h1><?= $string ?></h1>
    </div>

    <div class="profile-adopted-ext-container">
        <div class="profile-adopted-container">

<?php } ?>


<?php function end_profile_animals_adopted_div(){
/**
* Ends the division where the animals adopted by this user are displayed */
?>
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
            ($n_favourites > 0 ? 'Your favourite animals' : 'You have no favourite animals yet') : 
            ($n_favourites > 0 ? $username . chr(39) . 's favourite animals' : $username . ' has no favourite animals yet');
    ?>

    <div class="profile-favourites-title-container">
        <h1><?= $string ?></h1>
    </div>

    <?php
        if ($n_favourites > 0){
    ?>
    <div class="profile-favourites-ext-container">
        <div class="profile-favourites-container">
    <?php
        }
    ?>

<?php } ?>


<?php function end_profile_favourites_div(){
/**
 * Ends the division where the users' favourite animals are displayed
 */

?>
    
        </div>
    </div>
</div>
<?php } ?>