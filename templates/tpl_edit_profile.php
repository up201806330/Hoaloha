<?php function draw_edit_profile($user){
?>
    <section id="edit-profile-container">
        <div class="edit-content">
            <h1>Edit Profile</h1>
            <h2>Here you can edit your profile settings</h2>
            <form method="post" action="../actions/action_edit_user.php" enctype="multipart/form-data">
                <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
                
                <div class= "form-container">
                    <div class = "form-details-container">
                        <div class="txt_field">
                            <input type="text" value="<?=$user['username']?>" name="username" required placeholder=" ">
                            <span></span>
                            <label>Username</label>
                        </div>
                        <div class="txt_field">
                            <input type="text" value="<?=htmlentities($user['name'])?>" name="name" required placeholder=" ">
                            <span></span>
                            <label>Name</label>
                        </div>
                        <div class="txt_field">
                            <input type="text" value="<?=htmlentities($user['location'])?>" name="location" required placeholder=" ">
                            <span></span>
                            <label>Location</label>
                        </div>
                        <div class="txt_field">
                            <input type="tel" value="<?=htmlentities($user['phoneNumber'])?>" name="phoneNumber" pattern="[9]{1}[0-9]{8}" required placeholder=" ">
                            <span></span>
                            <label>Phone Number</label>
                        </div>
                        <div class="txt_field">
                            <input type="email" value="<?=htmlentities($user['email'])?>" name="email" required placeholder=" ">
                            <span></span>
                            <label>Email</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name="newPassword" placeholder=" ">
                            <span></span>
                            <label>New Password</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name="confirmNewPassword" placeholder=" "> 
                            <span></span>
                            <label>Confirm New Password</label>
                        </div>
                        <input type="hidden" value="<?=$user['id']?>" name="idUser">
                    </div>
                    <div class="change-photo-container">
                        <div class="container">
                            <div class="wrapper">
                                <div class="image">
                                <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" alt="">
                                </div>
                                <div id="cancel-btn">
                                    <i class="fas fa-times"></i></div>
                                </div>
                                <input type = button value="Choose a file" id="custom-btn" onclick="document.getElementById('default-btn').click();" > </button>
                                <input id="default-btn" name="profileImg" type="file" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit">SUBMIT CHANGES</button>
            </form>
        </div>
        
    </section>
    

<?php } ?>