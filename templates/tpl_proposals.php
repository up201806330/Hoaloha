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
                <div class="proposal-username"><a href="../pages/profile.php?username=<?= $proposal['username'] ?>"><?= $proposal['username'] ?></a></div>
                <div class="proposal-description"><?= $proposal['description'] ?></div>
                <?php if($proposal['status'] == 'P' && @$_SESSION['username'] != $proposal['username']){
                    echo '<button class="approve-button" onclick="approvalOrRefusalBox(true, ' . $proposal["idUser"] . ', ' . $proposal["idTopic"] . ')">Approve</button>';
                    echo '<button class="refuse-button" onclick="approvalOrRefusalBox(false, ' . $proposal["idUser"] . ', ' . $proposal["idTopic"] . ')">Refuse</button>';
                }?>
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

<?php function start_received_or_sent_proposals_div($toggle){
/**
 * Starts the section that holds either 
 * a) a user's animals still up for adoption and all of their pendind adoption proposals or 
 * b) the proposals a user has created on other people's pets
 */?>
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
