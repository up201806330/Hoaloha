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
   
            <div class="answer-container" id="<?=$answer['id']?>">
                <div class="answer-header">
                <?php if(isset($_SESSION['username']) && $answer['username'] === $_SESSION['username']){?> 
                    <div class="delete-button-answer">
                        <span class="fas fa-times-circle">
                            <input type="hidden" value="<?=$answer['id']?>">
                        </span>
                    </div>
                <?php } ?>
                    <div class="answer-username">
                    Posted by
                    <h1><a><?=htmlentities($answer['name'])?></a> -
                    <a class="topic-answer-link" href="../pages/profile.php?username=<?=$answer['username']?>" >
                        <?=$answer['username']?>
                    </a></h1>
                    </div>
                    <div class="answer-data">
                    at <a><?=$answer['data']?></a>
                    </div>
                </div>
                
                <div class="answer-body">
                    <div class="user-photo">
                        <a href="../pages/profile.php?username=<?=$answer['username']?>" >
                            <img src="../database/db_link_image.php?id=<?php echo $answer['idPhoto'];?>" width="200" height="200">
                        </a>
                    </div>
                    <div class="answer-description"><?=htmlentities($answer['answer'])?>
                    </div>
                </div>
            </div>

<?php } ?>

<?php function draw_add_answer($idQuestion,$idUser){
    ?>
    <div class = "add-answer-container" id="add-answer-container<?=$idQuestion?>">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
        <form>
        <div class="form-title"><h1>Add an Answer <span class="material-icons-round">insert_comment</span></h1></div>
            <div class="textinput">
                <textarea name="text"></textarea>
            </div>
            <input type="hidden" id = "idQuestion" value="<?=$idQuestion?>">  
            <input type="hidden" id = "idUser" value="<?=$idUser?>"> 
            <input class="forum-button" type="submit" id="<?=$idQuestion?>" value="Reply">
        </form>
    <?php } else { ?>
        <label> Add an Answer </label>

    <?php } ?>
    </div>
    <hr>
<?php
}
?>