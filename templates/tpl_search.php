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
        <label>Name, Species, Breed, ...</label>
      </div>
      <button type="submit">Search</button>
    </form>
  </div>
</div>

<?php } ?>