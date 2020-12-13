<?php function draw_edit_profile($user){
?>
    <div class= "edit-profile-form">
    <div class="user-photo"> 
        <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
    </div>
        <form method="post" action="../actions/action_edit_user.php" enctype="multipart/form-data">
            <div class="txt_field">
                Username
                <input type="text" value="<?=$user['username']?>" name="username">
            </div>
            <div class="txt_field">
                Name
                <input type="text" value="<?=$user['name']?>" name="name">
            </div>
            <div class="txt_field">
                Location
                <input type="text" value="<?=$user['location']?>" name="location">
            </div>
            <div class="txt_field">
                Phone Number
                <input type="tel" value="<?=$user['phoneNumber']?>" name="phoneNumber"> <!--pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"-->
            </div>
            <div class="txt_field">
                Email
                <input type="email" value="<?=$user['email']?>" name="email">
            </div>
            <div class="txt_field">
                New Password
                <input type="text" name="newPassword">
            </div>
            <div class="txt_field">
                Confirm New Password
                <input type="text" name="confirmNewPassword">
            </div>
            <div class="image">
                Photo
                <input type="file" name="profileImg">      
            </div>
            <input type="hidden" value="<?=$user['id']?>" name="idUser">
            <button type="submit">Change</button>
        </from>
    </div>


<?php } ?>