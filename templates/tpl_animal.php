<?php function draw_animal_full($animal, $topic, $thisUser, $isLoggedIn){
/**
 * Draws full animal page
 */?>
  <div class="animal-page-complete">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill= "#3d8af7" fill-opacity="1" d="M0,320L120,293.3C240,267,480,213,720,213.3C960,213,1200,267,1320,293.3L1440,320L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
    </svg>
    <div class="animal-container">
      <div class="animal-photo">
        <img src="../database/db_link_image.php?id=<?php echo $animal[0]['idPhoto'];?>">
      </div>
      <div class="animal-card">

        <div id="animal-name-profile" class="animal-name">
          <?php
            $favourites = getTopicsFavouritedUsers($topic['id']);
            if ($favourites !== null) {
              $topicIsLiked = ($isLoggedIn)? getFavourite($thisUser['id'], $topic['id']) : false;
              draw_favourite_button(count($favourites), $topic['id'], $topicIsLiked);
            }
          ?>
          <h1><?=htmlentities(ucwords($animal[0]['name']))?></h1>
          <div class="animal-card-buttons">
            <?php
              if(isset($_SESSION['username']) && $thisUser['username'] === $topic['username']){
                draw_edit_animal($animal[0]['id']);
                draw_delete_animal($animal[0]['id']);
              } 
            ?>
          </div>

        </div>

        <div class="animal-info">
          <ul>
            <li class="animal-species"> <?=ucwords($animal[0]['species'])?> </li>
            <li class="animal-breed"> <?=htmlentities(ucwords($animal[0]['breed']))?> </li>
            <li class="animal-gender"> <?=ucwords($animal[0]['gender'])?> </li>
            <!--<li class="animal-location"> Location </li>-->
          </ul>
        </div>
        
        <hr>

        <div class="animal-stats">

            <div class="animal-stat">

              <div class="stat-title">
                <h4>Weight (Kg)</h4>
              </div>
              <?=$animal[0]['weight']?>

            </div>

            <div class="animal-stat">

              <div class="stat-title">
                <h4>Color</h4>
              </div>
              <?=htmlentities(ucwords($animal[0]['color']))?>

            </div>

            <div class="animal-stat">

              <div class="stat-title">
                <h4>Dimension</h4>
              </div>
              <?=ucwords($animal[0]['dimension'])?>

            </div>
            
            <div class="animal-stat">

              <div class="stat-title">
                <h4>Age (Years)</h4>
              </div>
              <?=$animal[0]['age']?>

            </div>
        </div>
      </div>
    </div>

    <div class="topic-photos-title-container">
      <h1>More Photos of <?=htmlentities(ucwords($animal[0]['name']))?> <span class="material-icons-round">camera_alt</span></h1>
    </div>
    
    <!-- Slideshow container -->
    <div class="slideshow-container">

      <!-- Full-width images with number and caption text -->
      <?php for ($i=0; $i < count($animal) ; $i++) {       
        ?>
        <div class="mySlides fade">
          <div class="numbertext"><?php echo $i+1 ?> / <?php echo count($animal) ?></div>
          <img src="../database/db_link_image.php?id=<?php echo $animal[$i]['idPhoto'];?>" style="width:100%">
        </div>
      <?php } ?>

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <br>

      <!-- The dots/circles -->
    <div style="text-align:center">
      <?php for ($i=0; $i < count($animal) ; $i++) { ?>  
        <span class="dot" onclick="currentSlide(<?php echo $i+1 ?>)"></span>    
      <?php } ?>
    </div>

<?php } ?>

<?php function draw_add_animal() {
/**
 * Draws the page for registering an animal
 */ ?>
 
  <section id="signup-animal">
    <div class="register-content">
      <h1>Let's find our friend a new Home!</h1>
      <h2>But first, tell us more about them</h2>
      <form method="post" action="../actions/action_add_animal.php" enctype="multipart/form-data">
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input type="text" name="description" required>
          <span></span>
          <label>Description</label>
        </div>
        <select name='species'>
            <option value=''>&#xf039; &nbsp; Select a Species</option>
            <option value='Dog'>&#xf6d3; &nbsp; Dog</option>
            <option value='Cat'>&#xf6be; &nbsp; Cat</option>
            <option value='Bird'>&#xf535; &nbsp; Bird</option>
            <option value='Other'>&#xf059; &nbsp; Other</option>
            <label>Species</label>
        </select>
        <div class="txt_field">
          <input type="text" name="breed" required>
          <span></span>
          <label>Breed</label>
        </div>
        <select name='gender'>
            <option value=''>&#xf22d; &nbsp; Select a Gender</option>
            <option value='male'>&#xf222; &nbsp; Male</option>
            <option value='female'>&#xf221; &nbsp; Female</option>
            <label>Gender</label>
        </select>
        <div class="details">
          <div class="txt_field">
            <input type="text" name="weight" required>
            <span></span>
            <label>Weight (Kg)</label>
          </div>
          <div class="txt_field">
            <input type="text" name="color" required>
            <span></span>
            <label>Color</label>
            </div>
            <select name='dimensions'>
                <option value=''>&#xf22d; &nbsp; Select Dimensions</option>
                <option value='Small'>&#xf56b; &nbsp; Small</option>
                <option value='Medium'>&#xf546; &nbsp; Medium</option>
                <option value='Large'>&#xf436; &nbsp; Large</option>
                <label>Dimensions</label>
            </select>
            <div class="txt_field">
            <input type="number" name="age" required>
            <span></span>
            <label>Age (Years)</label>
          </div>
          <div class="txt_field">
            <input type="file"  name="images[]" multiple require>
          </div>
        </div>
        <button type="submit">Register Pet</button>
      </form>
    </div>
  </section>
<?php } ?>

<?php function draw_edit_animal($animalId) {
  ?>
  <div class="edit-animal-information">
        <a href="../pages/edit_animal.php?animalId=<?=$animalId?>"><span class="material-icons-round">settings</span></a>
  </div>
<?php } ?>

<?php function draw_delete_animal($animalId){
?>
  <div class="delete-animal">
      <form method="post" action="../actions/action_delete_animal.php">
      <input type="hidden" name="animalId" value="<?=$animalId?>">
        <button type="submit" class="delete-button"><span class="material-icons-round">close</span></button>
      </form>
  </div>

<?php } ?>

