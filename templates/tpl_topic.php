<?php function draw_topic_details($topic, $user, $approved_proposal, $animal_name){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
      <div class="topic-title-container"><h1><?=$animal_name?>'s Story</h1></div>

        <div class="topic-container">
          <div class="topic-header">
            <div class="topic-title">
              <div class="topic-username">
                Posted by
                <a href="../pages/profile.php?username=<?=$user['username']?>" >
                  <?=$topic['username']?>
                </a>
              </div>
              <div class="topic-data">
                At <a><?=$topic['data']?></a>
              </div>
            </div>
            <div class="user-photo">
              <a href="../pages/profile.php?username=<?=$user['username']?>" >
                <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
              </a>
            </div>
          </div>
          <div class="topic-description"><?=$topic['description']?>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
              <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
          </div>

          <?php if ($approved_proposal != null) : ?>

            <?php if ($approved_proposal['newName'] != null) : ?>
              <div class="proposal-newName">
                Now 
                <?=$approved_proposal['newName']?>
              </div>
            <?php endif; ?>

            <div class="proposal-user">
              Adopted by 
              <a href="../pages/profile.php?username=<?=$approved_proposal['username']?>" >
                <?=$approved_proposal['username']?>
              </a>
            </div>
            <div class="proposal-description">
              <?=$approved_proposal['description']?>
            </div>

          <?php endif; ?>

        </div>

    </div>
  </div>

<?php } ?>

<?php function draw_topic_simple($id, $animal){
/**
 * Draws topic division with the animal's most important info
 */?>

    <li>
      <div class="short-animal-container" style="background-image: url(../database/db_link_image.php?id=<?php echo $animal[0]['idPhoto'];?>);">
        <a href="../pages/topic.php?id=<?=$id?>">
          <div class="animal-text">
            <div class="animal-name"><?=$animal[0]['name']?></div>
            <div class="animal-species"><?=$animal[0]['species']?></div>
          </div>
        </a>
      </div>
    </li>

<?php } ?>

<?php function draw_topic_in_profile($id, $animal){
/**
 * Draws the topic shown inside a user's profile
 */
?>
    <li>
      <div class="profile-animal-container" >
        <a href="../pages/topic.php?id=<?=$id?>">
          <div class="animal-photo" style="background-image: url(../database/db_link_image.php?id=<?php echo $animal['idPhoto'];?>);">
          </div>
          <div class="animal-text">
            <div class="animal-name"><?=$animal['name']?></div>
            <div class="animal-species"><?=$animal['species']?></div>
          </div>
        </a>
      </div>
    </li>

<?php } ?>

<?php function draw_topic_in_proposals($id, $animal){
/**
 * Draws the topic shown inside a user's proposals page
 */
?>
    <div class="proposals-animal-container" >
      <a href="../pages/topic.php?id=<?=$id?>">
        <div class="animal-photo" style="background-image: url(../database/db_link_image.php?id=<?php echo $animal['idPhoto'];?>);">
        </div>
        <div class="animal-text">
          <div class="animal-name"><?=$animal['name']?></div>
          <div class="animal-species"><?=$animal['species']?></div>
        </div>
      </a>

<?php } ?>


<?php function start_favourite_adopt_div(){
/**
 * Starts the division that holds the adopt and favourite buttons
 */
?>
  <div class="favourite-adopt-container">

<?php } ?>

<?php function end_favourite_adopt_div(){
/**
 * Ends the division that holds the adopt and favourite buttons
 */
?>
  </div>

<?php } ?>

<?php function draw_n_results($n_results){
  if ($n_results == 0) $output = 'No results match your search :((';
  else {
    $result_string = ($n_results == 1) ? ' result' : ' results';
    $output = 'Found ' . $n_results . $result_string;
  }
  echo $output;

  echo '</div>';

} ?>

