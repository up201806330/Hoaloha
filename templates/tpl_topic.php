<?php function draw_topic($topic){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
    
    <div class="topic-container">
        <div class="topic-username"><?=$topic['username']?></div>
        <div class="topic-description"><?=$topic['description']?></div>
    </div>

<?php } ?>

<?php function draw_topic_simple($id, $animal){
/**
 * Draws topic division with the animal's most important info
 */?>

    <li>
      <div class="short-animal-container" style="background-image: url(../database/db_link_image.php?id=<?php echo $animal['idPhoto'];?>);">
        <a href="../pages/topic.php?id=<?=$id?>">
          <div class="animal-text">
            <div class="animal-name"><?=$animal['name']?></div>
            <div class="animal-species"><?=$animal['species']?></div>
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
          <div class="animal-text">
            <div class="animal-name"><?=$animal['name']?></div>
            <div class="animal-species"><?=$animal['species']?></div>
          </div>
        </a>
      </div>
    </li>

<?php } ?>


<?php function draw_n_results($n_results){
  $output;
  if ($n_results == 0) $output = 'No results match your search :((';
  else {
    $result_string = ($n_results == 1) ? ' result' : ' results';
    $output = 'Found ' . $n_results . $result_string;
  }
  echo $output;
}
?>

