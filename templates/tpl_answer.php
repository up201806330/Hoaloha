<?php function draw_start_answers_container($idQuestion){ ?> 

<div class= "answers-container" id = "answers-container<?=$idQuestion?>">

<?php } ?>

<?php function draw_end_answers_container(){
?>  
</div>
<?php } ?>

<?php function draw_answer($answer){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
   
            <div class="answer-container">

                <div class="answer-username">
                Posted by
                <a><?=$answer['name']?></a>
                <a href="../pages/profile.php?username=<?=$answer['username']?>" >
                    <?=$answer['username']?>
                </a>
                </div>
                <div class="answer-data">
                at <a><?=$answer['data']?></a>
                </div>

                <div class="user-photo">
                <a href="../pages/profile.php?username=<?=$answer['username']?>" >
                    <img src="../database/db_link_image.php?id=<?php echo $answer['idPhoto'];?>" width="200" height="200">
                </a>
                </div>
            
                <div class="answer-description"><?=$answer['answer']?>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
                    <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore odit labore, voluptates tempore vel dolorum obcaecati consequuntur, sed ut officia eligendi ratione nobis? Accusantium ex mollitia obcaecati quaerat sint asperiores!
                </div>

            </div>

<?php } ?>

<?php function draw_add_answer($idQuestion,$idUser){
    ?>
    <script defer src = "../js/answer.js"></script>
    <div class = "addAnswer">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
        <form>
            <label> Add an Answer </label>
            <div class="textinput">
                <textarea name="text"></textarea>
            </div>
            <input type="hidden" id = "idQuestion" value="<?=$idQuestion?>">  
            <input type="hidden" id = "idUser" value="<?=$idUser?>"> 
            <input type="hidden" id= "data" value="<?=date("Y-m-d H:i:s")?>"> 
            <input type="submit" value="Reply">
        </form>
    <?php } else { ?>
        <label> Add an Answer </label>
        <label> Login to post an answer! </label>

    <?php } ?>
    </div>
<?php
}
?>