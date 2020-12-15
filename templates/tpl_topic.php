<?php function draw_topic_details($topic, $user, $approved_proposal, $animal_name){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
      <div class="topic-title-container"><h1><?=$animal_name?>'s Story <span class="material-icons-round">library_books</span></h1></div>
        <div class="topic-container">
          <div class="topic-header">
            <div class="topic-title">
              <div class="topic-username">
                Posted by
                <h1><a><?=$user['name']?></a>-
                <a class="topic-username-link" href="../pages/profile.php?username=<?=$user['username']?>" ><?=$topic['username']?></a></h1>
              </div>
              <div class="topic-data">
                at <a><?=$topic['data']?></a>
              </div>
            </div>
          </div>
          <div class= "topic-body">
            <div class="user-photo">
              <a href="../pages/profile.php?username=<?=$user['username']?>" >
                <img src="../database/db_link_image.php?id=<?php echo $user['idPhoto'];?>" width="200" height="200">
              </a>
            </div>
          
            <div class="topic-description"><?=$topic['description']?>
            </div>
          </div>

          <?php if ($approved_proposal != null) : ?>

            <?php if ($approved_proposal['newName'] != null) : ?>
          <hr>
          <div class="proposal-header">
            <div class="proposal-user-photo">
              <a href="../pages/profile.php?username=<?=$approved_proposal['username']?>" >
                <img src="../database/db_link_image.php?id=<?php echo $approved_proposal['idPhoto'];?>" width="200" height="200">
              </a>
            </div>
            <div class="proposal-title">
              <div class="proposal-newName">
                Changed name to 
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
            </div>
          </div>
          
          <?php endif; ?>

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
          <div class="animal-photo" style="background-image: url(../database/db_link_image.php?id=<?php echo $animal[0]['idPhoto'];?>);">
          </div>
          <div class="animal-text">
            <div class="animal-name"><?=$animal[0]['name']?></div>
            <div class="animal-species"><?=$animal[0]['species']?></div>
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
      <div class="proposals-animal-inner-container" >
        <div class="animal-proposal-photo">
          <a href="../pages/topic.php?id=<?=$id?>"><img src="../database/db_link_image.php?id=<?php echo $animal[0]['idPhoto'];?>" width="200" height="200"></a>
        </div>
        <div class="animal-text">
          <a href="../pages/topic.php?id=<?=$id?>"><h1><div class="animal-name"><?=$animal[0]['name']?></div></h1></a>
          <h3><div class="animal-species">Species: <?=$animal[0]['species']?></div></h3>
        </div>
      </div>
    

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

