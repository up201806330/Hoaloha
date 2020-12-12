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
                <?php if($proposal['status'] == 'P'){
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
