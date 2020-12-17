<?php function start_proposals_page(){
/**
 * Starts the section that holds all proposals made on an animal
 */?>
    <div class="proposals-page-complete">
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
            <div class="proposal-description"><?=htmlentities($proposal['description'])?></div>
            <div class="proposal-buttons">
                <?php if($proposal['status'] == 'P' && @$_SESSION['username'] != $proposal['username']){
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

<?php function start_received_or_sent_proposals_div($toggle){
/**
 * Starts the section that holds either 
 * a) a user's animals still up for adoption and all of their pendind adoption proposals or 
 * b) the proposals a user has created on other people's pets
 */?>
    <div class= "proposals-container-title">
        <h1><?php echo ($toggle) ? "Received Proposals Status" : "Sent Proposals Status";?> <span class="material-icons-round"><?php echo ($toggle) ? "call_received" : "call_made";?></span></h1>
    </div>
    <div class="<?php echo ($toggle) ? 'received' : 'sent';?>-proposals-container">

<?php } ?>

<?php function end_received_or_sent_proposals_div(){
/**
 * Ends the section that holds either 
 * a) a user's animals still up for adoption and all of their pendind adoption proposals or 
 * b) the proposals a user has created on other people's pets
 */?>
    </div>

<?php } ?>


<?php function start_no_proposals_div(){?>
    <div class="proposals-animal-container">
<?php } ?>

<?php function end_no_proposals_div(){?>
    </div>
<?php } ?>