<?php function draw_adopt_div($user_full_name, $previous_pet_name, $idTopic){
/**
 * Draws the adoption floating object
 */
?>

    <div class="adopt-container">
        <div class="adopt-content">
            <div class="close-button-container">
            <a href="#" id="closeButtonAdopt" class="close"><span class="material-icons-round">close</span></a>
            </div>
            <div class="adopt-title">You're so close...</div>
            <div class="adopt-vow">I, <?= htmlentities($user_full_name) ?>, solemnly promise to cherish, protect and deeply care for my pet until their last breath, and pledge to, above all else, never break this pact.</div>
            <form method="post" action="../actions/action_adopt.php">
                <input type="hidden" name="idTopic" value="<?= $idTopic ?>">
                <div class="txt_field">
                <input type="text" id="new_name" name="new_name" value="<?= htmlentities($previous_pet_name)?>" placeholder=" "> 
                    <span></span>
                    <label>Your pet's name:</label>
                </div>
                <textarea name="description" id="description" rows="10" cols="30" placeholder="Describe why you want to adopt a pet"></textarea>
                <button type="submit">Send proposal</button>
            </form>
        </div>
    </div>

<?php } ?>

<?php function draw_adopt_button(){
/**
 * Draws the adopt button for a particular topic page
 */
?>

    <button id="adoptButton" class="adopt-button-container">Adopt this pet</button>

<?php } ?>