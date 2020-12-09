<?php function draw_question($question){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
    
        <div class="question-container">

            <div class="question-username">
              Posted by
              <a href="../pages/profile.php?username=<?=$question['username']?>" >
                <?=$question['username']?>
              </a>
              
            </div>
            <div class="question-data">
              at <a><?=$question['data']?></a>
            </div>

            <div class="user-photo">
              <a href="../pages/profile.php?username=<?=$question['username']?>" >
                <img src="../database/db_link_image.php?id=<?php echo $question['idPhoto'];?>" width="200" height="200">
              </a>
            </div>
        
          <div class="question-description"><?=$question['question']?>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
              <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
          </div>

        </div>

    </div>
  </div>

<?php } ?>


<?php function draw_add_question($idTopic,$idUser){
    ?>
    <script defer src = "../js/question.js"></script>
    <div class = "addComment">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
        <form>
            <label> Add a Comment </label>
            <div class="textinput">
                <textarea name="text"></textarea>
            </div>
            <input type="hidden" id = "idTopic" value="<?=$idTopic?>">  
            <input type="hidden" id = "idUser" value="<?=$idUser?>"> 
            <input type="hidden" id= "data" value="<?=date("Y-m-d H:i:s")?>"> 
            <input type="submit" value="Reply">
        </form>
    <?php } else { ?>
        <label> Add a Comment </label>
        <label> Login to post a comment! </label>

    <?php } ?>
    </div>
<?php
}
?>
