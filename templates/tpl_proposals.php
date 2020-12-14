<?php function start_proposals_page(){
/**
 * Starts the section that holds all proposals made on an animal
 */?>
    <div class="proposals-page-complete">
        <div class= "proposals-container-title">
            <h1>Your Proposals</h1>
        </div>
<?php } ?>

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
        <li class="proposal-container-<?php 
        if($proposal['status'] == 'P') echo 'pending';
        else if($proposal['status'] == 'A') echo 'accepted';
        else if($proposal['status'] == 'R') echo 'refused' ?>">
            Proposal by: 
            <div class="proposal-username"><h1><a href="../pages/profile.php?username=<?= $proposal['username'] ?>"><?= $proposal['username'] ?></a></h1></div>
            <div class="proposal-description"><?= $proposal['description'] ?></div>
            <div class="proposal-buttons">
                <?php if($proposal['status'] == 'P'){
                    echo '<button class="approve-button" onclick="approvalOrRefusalBox(true, ' . $proposal["idUser"] . ', ' . $proposal["idTopic"] . ')">Approve</button>';
                    echo '<button class="refuse-button" onclick="approvalOrRefusalBox(false, ' . $proposal["idUser"] . ', ' . $proposal["idTopic"] . ')">Refuse</button>';
                }?>
            </div>
        </li>
<?php } ?>

<?php function end_proposals_div(){
/**
 * Ends the section that holds all proposals made on an animal
 */?>
        </ul>
    </div>
    </div>

<?php } ?>

<?php function end_proposals_page(){
/**
 * Starts the section that holds all proposals made on an animal
 */?>
    </div>
<?php } ?>