<?php function draw_edit_animal($animal,$topic){
    ?>
    <section id="edit-animal">
    <div class="register-content">
      <h1>Edit Animal Details</h1>
      <form method="post" action="../actions/action_edit_animal.php">
        <div class="txt_field">
          <input type="text" name="name" value="<?=htmlentities($animal['name'])?>" required>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input type="text" name="description" value="<?=htmlentities($topic['description'])?>" required>
          <span></span>
          <label>Description</label>
        </div>
        <div class="select-box">
          <select name='species'>
              <option value=''>Select a Species</option>
              <option value='Dog'>🐶 Dog</option> <!-- maybe do this with javascript-->
              <option value='Cat'>🐱 Cat</option>
              <option value='Bird'>🐥 Bird</option>
              <option value='Other'>❓ Other</option>
              <label>Species</label>
          </select>
        </div>
        <div class="txt_field">
          <input type="text" name="breed" value="<?=htmlentities(ucfirst($animal['breed']))?>" required>
          <span></span>
          <label>Breed</label>
        </div>
        <div class="select-box">
          <select name='gender'>
              <option value=''>Select a Gender</option>
              <option value='male'>♂️ Male</option>
              <option value='female'>♀️ Female</option>
              <label>Gender</label>
          </select>
        </div>
        <div class="details">
          <div class="txt_field">
            <input type="number" step="0.01" name="weight" value="<?=$animal['weight']?>" min="0" required>
            <span></span>
            <label>Weight (Kg)</label>
          </div>
          <div class="txt_field">
            <input type="text" name="color" value="<?=htmlentities(ucfirst($animal['color']))?>" required>
            <span></span>
            <label>Color</label>
            </div>
            <div class="select-box">
              <select name='dimensions'>
                  <option value=''>Select Dimensions</option>
                  <option value='Small'>Small</option>
                  <option value='Medium'>Medium</option>
                  <option value='Large'>Large</option>
                  <label>Dimensions</label>
              </select>
            </div>
            <div class="txt_field">
            <input type="number" step="0.1" name="age" value="<?=$animal['age']?>" min="0" required>
            <span></span>
            <label>Age (Years)</label>
          </div>
        </div>
        <div>
            <input type="hidden" name="idAnimal" value="<?=$animal['id']?>">
        </div>
        <button type="submit">Change</button>
      </form>
    </div>
  </section>
<?php } ?>