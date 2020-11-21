<?php function draw_animal_full($animal){
/**
 * Draws full animal page
 */?>

    <li class="animal-container">
        <div class="animal-photo"><?=$animal['photo']?></div>
        <div class="animal-name"><?=$animal['name']?></div>
        <div class="animal-stats">
            <div class="animal-species"><?=$animal['species']?></div>
            <div class="animal-weight"><?=$animal['weight']?></div>
            <div class="animal-color"><?=$animal['color']?></div>
            <div class="animal-dimension"><?=$animal['dimension']?></div>
        </div>
    </li>

<?php } ?>

<?php function draw_animal_simple($animal){
/**
 * Draws animal division with most important info
 */?>

    <li>
      <a href="../pages/animal.php?id=<?= $animal['id'] ?>">
        <div class="short-animal-container">
          <!-- <div class="animal-photo"></div> -->
          <!-- <div class="animal-photo"><img src="../puppy.jpg"></div> -->
          <div class="animal-text">
            <div class="animal-name"><?=$animal['name']?></div>
            <div class="animal-species"><?=$animal['species']?></div>
            <!-- <div class="animal-name">Lorem ipsum, doltae quo officia? </div>
            <div class="animal-species">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel quas aut aliquid fuga omnis est mollitia amet pariatur tempora id quam sapiente atque tenetur sunt officia enim, provident fugiat laudantium.</div> -->
          </div>
        </div>
      </a>
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



