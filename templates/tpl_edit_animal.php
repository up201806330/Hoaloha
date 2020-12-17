<?php function draw_edit_animal($animal,$topic){
    ?>
    <section id="signup-animal">
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
        <select name='species'>
            <option value=''>&#xf039; &nbsp; Select a Species</option>
            <option value='Dog'>&#xf6d3; &nbsp; Dog</option> <!-- maybe do this with javascript-->
            <option value='Cat'>&#xf6be; &nbsp; Cat</option>
            <option value='Bird'>&#xf535; &nbsp; Bird</option>
            <option value='Other'>&#xf059; &nbsp; Other</option>
            <label>Species</label>
        </select>
        <div class="txt_field">
          <input type="text" name="breed" value="<?=htmlentities(ucfirst($animal['breed']))?>" required>
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
            <input type="number" step="0.01" name="weight" value="<?=$animal['weight']?>" required>
            <span></span>
            <label>Weight (Kg)</label>
          </div>
          <div class="txt_field">
            <input type="text" name="color" value="<?=htmlentities(ucfirst($animal['color']))?>" required>
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
            <input type="number" step="0.1" name="age" value="<?=$animal['age']?>" required>
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