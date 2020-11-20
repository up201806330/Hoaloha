<?php function draw_profile($user){
/**
 * Draws entire profile page
 */?>
    <div class="profile-container">
        <div class="user-username"> <?= $user['username'] ?> </div>
        <div class="user-photo"> <?=$user['photo'] ?> </div>
        <div class="user-location"> <?=$user['idLocation'] ?> </div>
        <div class="user-contacts">
            <div class="user-phone"> <?=$user['phoneNumber'] ?> </div>
            <div class="user-email"> <?=$user['email'] ?> </div>
        </div>
    </div>

<?php } ?>