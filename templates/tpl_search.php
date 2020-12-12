<?php function start_animal_list(){
/**
 * Starts the section that contains all results of a search
 */?>
    <div class="animal-list-container">
      <ul class="animal-list-grid">
<?php } ?>

<?php function end_animal_list(){
/**
 * Ends the section that contains all results of a search
 */?>
      </ul>
    </div>
<?php } ?>


<?php function draw_search(){
/**
 * Draws the search floating object.
 */?>

<div class="search-container">
  <div class="search-content">
    <div class="close-button-container">
      <a href="#" id="closeButtonSearch" class="close"><span class="material-icons-round">close</span></a>
    </div>
    <h1>Pet Search</h1>
    <h2>Find a friend fit for you! </h2>
    <form method="post" action="../actions/action_search.php">
      <div class="txt_field">
        <input type="text" placeholder=" " name="search_string">
        <span></span>
        <label>Name, Breed, ...</label>
      </div>

      <div class="species-checkbox-container">
        <label>Species</label><br>
        <label class="checkbox-container" for="checkbox-dog">
          Dog
          <input type="checkbox" id="checkbox-dog" name="is_dog" value="dog" checked>
          <span class="checkmark"></span>
        </label>
        
        <label class="checkbox-container" for="checkbox-cat">
          Cat
          <input type="checkbox" id="checkbox-cat" name="is_cat" value="cat"checked>
          <span class="checkmark"></span>
        </label>

        <label class="checkbox-container" for="checkbox-bird">
          Bird
          <input type="checkbox" id="checkbox-bird" name="is_bird" value="bird"checked>
          <span class="checkmark"></span>
        </label>
        
        <label class="checkbox-container" for="checkbox-other">
          Other
          <input type="checkbox" id="checkbox-other" name="is_other" value="other" checked>
          <span class="checkmark"></span>
        </label>
      </div>


      <div class="gender-checkbox-container">
        <label>Gender</label><br>
        <label class="checkbox-container" for="checkbox-male">
          Male
          <input type="checkbox" id="checkbox-male" name="is_male" value="male" checked="checked">
          <span class="checkmark"></span>
        </label>
            
        <label class="checkbox-container" for="checkbox-female">
          Female
          <input type="checkbox" id="checkbox-female" name="is_female" value="female"checked>
          <span class="checkmark"></span>
        </label>
      </div>
      <button type="submit">Search</button>
    </form>
  </div>
</div>

<?php } ?>

<?php function draw_search_parameters(){
/**
 * Draws the section that contains aditional search parameters
 */?>
  
  <div class="search-parameters-container">
    <div class="search-parameters">
      <h1>Advanced Search</h1>

      <form class="advanced-search-form" method="post" action="../actions/action_search.php">

        <div class="range-sliders-container">
          <div class="range-slider-container">
            <label for="weight">Weight (Kg)</label>
            <div class="min-max-slider" data-legendnum="2" id="weight">
              <label for="min">Minimum weight</label>
              <input id="min" class="min" name="weight_min" type="range" step="0.1" min="0" max="10" />
              <label for="max">Maximum weight</label>
              <input id="max" class="max" name="weight_max" type="range" step="0.1" min="0" max="10" />
            </div>
          </div>

          <div class="range-slider-container">
            <label for="age">Age (Years)</label>
            <div class="min-max-slider" data-legendnum="3" id="age">
              <label for="min">Minimum weight</label>
              <input id="min" class="min" name="age_min" type="range" step="0.1" min="0" max="5" />
              <label for="max">Maximum weight</label>
              <input id="max" class="max" name="age_max" type="range" step="0.1" min="0" max="5" />
            </div>
          </div>
        </div>
        
        <div class="species-checkbox-container">
          <label>Species</label><br>
          <label class="checkbox-container" for="checkbox-dog">
            Dog
            <input type="checkbox" id="checkbox-dog" name="is_dog" value="dog" checked>
            <span class="checkmark"></span>
          </label>
          
          <label class="checkbox-container" for="checkbox-cat">
            Cat
            <input type="checkbox" id="checkbox-cat" name="is_cat" value="cat"checked>
            <span class="checkmark"></span>
          </label>

          <label class="checkbox-container" for="checkbox-bird">
            Bird
            <input type="checkbox" id="checkbox-bird" name="is_bird" value="bird"checked>
            <span class="checkmark"></span>
          </label>
          
          <label class="checkbox-container" for="checkbox-other">
            Other
            <input type="checkbox" id="checkbox-other" name="is_other" value="other" checked>
            <span class="checkmark"></span>
          </label>
        </div>

        <div class="gender-checkbox-container">
          <label>Gender</label><br>
          <label class="checkbox-container" for="checkbox-male">
            Male
            <input type="checkbox" id="checkbox-male" name="is_male" value="male" checked>
            <span class="checkmark"></span>
          </label>

          <label class="checkbox-container" for="checkbox-female">
            Female
            <input type="checkbox" id="checkbox-female" name="is_female" value="female"checked>
            <span class="checkmark"></span>
          </label>

        </div>

        <button type="submit">Search</button>
      </form>
    </div>
  <!-- </div> -->

<?php } ?>

