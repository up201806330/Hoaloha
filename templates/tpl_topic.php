<?php function draw_topic($topic){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
    
        <div class="topic-container">
            <div class="topic-username">Found by <?=$topic['username']?></div>
            <div class="topic-description"><?=$topic['description']?>
            
              <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
              <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
            </div>
        </div>



    </div>
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

