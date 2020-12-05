<?php function draw_animal_full($animal){
/**
 * Draws full animal page
 */?>

    <div class="animal-container">
        <div class="animal-photo"> <!-- <img src="../puppy.jpg" alt="puppy"> -->
          <img src="../database/db_link_image.php?id=<?php echo $animal['idPhoto'];?>">
        </div>
        <!-- <div class="animal-photo"> --> <!-- < --> <!-- ? =$animal['photo']?></div> -->
        <div class="animal-card">
          <div id="animal-name-profile" class="animal-name"><?=$animal['name']?></div>

          <ul>
            <li class="animal-species"> <?=$animal['species']?> </li>
            <li class="animal-gender"> Gender </li>
            <li class="animal-location"> Location </li>
          </ul>

          <hr>

          <div class="animal-stats">

              <div class="animal-stat">
              <!-- <div class="animal-weight"> -->
                <div class="stat-title">
                  Weight
                </div>
                <?=$animal['weight']?>
              </div>

              <div class="animal-stat">
              <!-- <div class="animal-color"> -->
                <div class="stat-title">
                  Color
                </div>
                <?=$animal['color']?>
              </div>

              <div class="animal-stat">
                <div class="stat-title">
                  Dimension
                </div>
              <!-- <div class="animal-dimension"> -->
                <?=$animal['dimension']?>
              </div>
          </div>
        </div>
    </div>

<?php } ?>

<?php function draw_animal_simple($animal){
/**
 * Draws animal division with most important info
 */?>

    <li>
      <div class="short-animal-container" style="background-image: url(../database/db_link_image.php?id=<?php echo $animal['idPhoto'];?>);">
        <a href="../pages/animal.php?id=<?=$animal['id']?>">
          <div class="animal-text">
            <div class="animal-name"><?=$animal['name']?></div>
            <div class="animal-species"><?=$animal['species']?></div>
          </div>
        </a>
      </div>
    </li>



<?php } ?>

<?php function draw_add_animal() {
/**
 * Draws the page for registering an animal
 */ ?>
  <section id="signup">
    <div class="register-content">
      <h1>Let's find our friend a new Home!</h1>
      <h2>But first, tell us more about them</h2>
      <form method="post" action="../actions/action_add_animal.php">
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Name</label>
        </div>
        <select name='species' style='height: 45px; font-family:Arial, FontAwesome;'>
            <option value=''>&#xf039; &nbsp; All States</option>
            <option value='Dog'>&#xf6d3; &nbsp; Dog</option>
            <option value='Cat'>&#xf6be; &nbsp; Cat</option>
            <option value='Bird'>&#xf535; &nbsp; Bird</option>
            <option value='Other'>&#xf059; &nbsp; Other</option>
            <label>Species</label>
        </select>
        <div class="details">
            <div class="txt_field">
            <input type="text" name="weight">
            <span></span>
            <label>Weight</label>
            </div>
            <div class="txt_field">
            <input type="text" name="color">
            <span></span>
            <label>Color</label>
            </div>
            <div class="txt_field">
            <input type="text" name="dimension">
            <span></span>
            <label>Dimension</label>
            </div>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </section>
<?php } ?>



