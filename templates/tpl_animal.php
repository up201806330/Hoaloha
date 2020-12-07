<?php function draw_animal_full($animal){
/**
 * Draws full animal page
 */?>

    <div class="animal-container">
        <div class="animal-photo">
          <img src="../database/db_link_image.php?id=<?php echo $animal['idPhoto'];?>">
        </div>

        <div class="content-grid">

          <div class="animal-card">
            <div id="animal-name-profile" class="animal-name"><?=$animal['name']?></div>

            <ul>
              <li class="animal-species"> <?=$animal['species']?> </li>
              <li class="animal-breed"> <?=$animal['breed']?> </li>
              <li class="animal-gender"> <?=$animal['gender']?> </li>
              <li class="animal-location"> Location </li>
            </ul>

            <hr>

            <div class="animal-stats">

                <div class="animal-stat">

                  <div class="stat-title">
                    Weight (Kg)
                  </div>
                  <?=$animal['weight']?>

                </div>

                <div class="animal-stat">

                  <div class="stat-title">
                    Color
                  </div>
                  <?=$animal['color']?>

                </div>

                <div class="animal-stat">

                  <div class="stat-title">
                    Dimension
                  </div>
                  <?=$animal['dimension']?>

                </div>
                
                <div class="animal-stat">

                  <div class="stat-title">
                    Age (Years)
                  </div>
                  <?=$animal['age']?>

                </div>
            </div>


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
      <form method="post" action="../actions/action_add_animal.php">
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
        <select name='species' style='height: 45px; font-family:Arial, FontAwesome;'>
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
        <select name='gender' style='height: 45px; font-family:Arial, FontAwesome;'>
          <option value=''>&#xf22d; &nbsp; Select a Gender</option>
          <option value='Male'>&#xf222; &nbsp; Male</option>
          <option value='Female'>&#xf221; &nbsp; Female</option>
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
          <select name='dimensions' style='height: 45px; font-family:Arial, FontAwesome;'>
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
        </div>
        <button type="submit">Register Pet</button>
      </form>
    </div>
  </section>
<?php } ?>



