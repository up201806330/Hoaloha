<?php function draw_start_questions_container(){ ?> 

    <div class= "question-section">
        <div class="questions-title-container"><h1>Questions & Comments <span class="material-icons-round">question_answer</span></h1></div>
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
        <div class="question-container" id="question<?=$question['id']?>"> 
            <div class="question-header">
                <?php if(isset($_SESSION['username']) && $question['username'] === $_SESSION['username']){?> 
                    <div class="delete-button-question">
                        <span class="fas fa-times-circle">
                            <input type="hidden" value="<?=$question['id']?>">
                        </span>
                    </div>
                <?php } ?>
                <div class="question-username">
                    Posted by
                    <h1><a><?=$question['name']?></a> -
                    <a class="topic-question-link" href="../pages/profile.php?username=<?=$question['username']?>" ><?=$question['username']?></a></h1>
                </div>
                <div class="question-data">
                at <a><?=$question['data']?></a>
                </div>
            </div>
            <div class= "question-body">
                <div class="user-photo">
                    <a href="../pages/profile.php?username=<?=$question['username']?>" >
                        <img src="../database/db_link_image.php?id=<?php echo $question['idPhoto'];?>" width="200" height="200">
                    </a>
                </div>
                <div class="question-description"><?=htmlentities($question['question'])?>
                </div>
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
            <div class="form-title"><h1>Add a Question <span class="material-icons-round">rate_review</span></h1></div>
            <div class="textinput">
                <textarea name="text"></textarea>
            </div>
            <input type="hidden" id = "idTopic" value="<?=$idTopic?>">  
            <input type="hidden" id = "idUser" value="<?=$idUser?>"> 
            <input class="forum-button" type="submit" value="Post">
        </form>
    <?php } else { ?>
        <label> Add a Question </label>

    <?php } ?>
    </div>
<?php
}
?>


<?php function draw_end_question_section(){
/**
 * Draws the independent part of the topic (username and description)
 */
    ?> 
    </div>
    </div>
<?php
}
?>
