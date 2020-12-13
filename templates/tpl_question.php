<?php function draw_start_questions_container(){ ?> 

    <div class= "questions-container" id = "questions-container">

<?php } ?>

<?php function draw_end_questions_container(){
    ?>  
    </div>
<?php } ?>

<?php function draw_question($question){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?>
   
            <div class="question-container">

                <div class="question-username">
                Posted by
                <a><?=$question['name']?></a>
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
                </div>

            </div>

<?php } ?>


<?php function draw_add_question($idTopic,$idUser){
    ?>
    <script defer src = "../js/question.js"></script>
    <script defer src = "../js/answer.js"></script>
    <div class = "add-question-container">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
        <form>
            <label> Add a Question </label>
            <div class="textinput">
                <textarea name="text"></textarea>
            </div>
            <input type="hidden" id = "idTopic" value="<?=$idTopic?>">  
            <input type="hidden" id = "idUser" value="<?=$idUser?>"> 
            <input type="submit" value="Reply">
        </form>
    <?php } else { ?>
        <label> Add a Question </label>
        <label> Login to post a question! </label>

    <?php } ?>
    </div>
<?php
}
?>
