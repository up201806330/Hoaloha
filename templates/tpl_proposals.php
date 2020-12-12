<?php function start_proposals_div(){
/**
 * Starts the section that holds all proposals made on an animal
 */?>
    <div class="proposals-container">
        <ul>

<?php } ?>

<?php function draw_proposal($proposal){
/**
 * Draws one proposal section.
 */?>
            <li class="proposal-container">
                <div class="proposal-username"><a href="../pages/profile?username=<?= $proposal['username'] ?>"><?= $proposal['username'] ?></a></div>
                <div class="proposal-description"><?= $proposal['description'] ?></div>
                <div class="proposal-status"><?= $proposal['status'] ?></div>
            </li>

<?php } ?>

<?php function end_proposals_div(){
/**
 * Ends the section that holds all proposals made on an animal
 */?>
        </ul>
    </div>

<?php } ?>
