<?php function draw_animal_full($animal, $species){
/**
 * Draws full animal page
 */?>

    <li class="animal-container">
        <div class="animal-photo"><?=$animal['photo']?></div>
        <div class="animal-name"><?=$animal['name']?></div>
        <div class="animal-stats">
            <div class="animal-species"><?=$species?></div>
            <div class="animal-weight"><?=$animal['weight']?></div>
            <div class="animal-color"><?=$animal['color']?></div>
            <div class="animal-dimension"><?=$animal['dimension']?></div>
        </div>
    </li>

<?php } ?>

<?php function draw_animal_simple($animal, $species){
/**
 * Draws animal division with most important info
 */?>

    <div class="short-animal-container">
        <div class="animal-photo"><?=$animal['photo']?></div>
        <div class="animal-name"><a href='../pages/animal.php?id="<?= $animal['id'] ?>"'><?=$animal['name']?></a></div>
        <div class="animal-species"><?=$species?></div>
    </div>

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
            <option value='dog'>&#xf6d3; &nbsp; Dog</option>
            <option value='cat'>&#xf6be; &nbsp; Cat</option>
            <option value='bird'>&#xf535; &nbsp; Bird</option>
            <option value='other'>&#xf059; &nbsp; Other</option>
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



