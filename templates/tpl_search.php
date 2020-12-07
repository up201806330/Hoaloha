<?php function draw_search(){
    /**
 * Draws the search floating object.
 */?>

<div class="search-container">
  <div class="search-content">
    <div class="close-button-container">
      <a href="#" id="closeButtonSearch" class="close"><span class="material-icons-round">close</span></a>
    </div>
    <h1>Find a Friend</h1>
    <h2>Fit for you </h2>
    <form method="post" action="../actions/action_search.php">
      <div class="txt_field">
        <input type="text" name="search_string">
        <span></span>
        <label>Name, Breed, ...</label>
      </div>
      <div class="species-checkbox-container">
        <label>Species</label><br>
        <label for="checkbox-dog">Dog</label>
        <input type="checkbox" id="checkbox-dog" name="is_dog" value="dog" checked>
        <label for="checkbox-cat">Cat</label>
        <input type="checkbox" id="checkbox-cat" name="is_cat" value="cat"checked>
        <label for="checkbox-bird">Bird</label>
        <input type="checkbox" id="checkbox-bird" name="is_bird" value="bird"checked>
        <label for="checkbox-other">Other</label>
        <input type="checkbox" id="checkbox-other" name="is_other" value="other" checked>
        <span></span>
      </div>
      <button type="submit">Search</button>
    </form>
  </div>
</div>

<?php } ?>