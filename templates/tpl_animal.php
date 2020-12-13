<?php function draw_animal_full($animal){
/**
 * Draws full animal page
 */?>
 <div class="animal-page-complete">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill= "#3d8af7" fill-opacity="1" d="M0,320L120,293.3C240,267,480,213,720,213.3C960,213,1200,267,1320,293.3L1440,320L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
    </svg>
    <div class="animal-container">
      <?php for ($i=0; $i < count($animal) ; $i++) {       
        ?>
      <div class="animal-photo">
        <img src="../database/db_link_image.php?id=<?php echo $animal[$i]['idPhoto'];?>">
      </div>
      <?php } ?>
      <div class="animal-card">
        <div id="animal-name-profile" class="animal-name"><h1><?=ucwords($animal[0]['name'])?></h1></div>

        <div class="animal-info">
          <ul>
            <li class="animal-species"> <?=ucwords($animal[0]['species'])?> </li>
            <li class="animal-breed"> <?=ucwords($animal[0]['breed'])?> </li>
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
              <?=ucwords($animal[0]['color'])?>

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
    <div class="topic-title-container"><h1><?=$animal[0]['name']?>'s Story</h1></div>

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
            <input type="file"  name="images[]" multiple>
          </div>
        </div>
        <button type="submit">Register Pet</button>
      </form>
    </div>
  </section>
<?php } ?>



