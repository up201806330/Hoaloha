<?php
    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_navbar.php');
    include_once('../templates/tpl_proposals.php');
    include_once('../templates/tpl_topic.php');
    include_once("../database/db_proposal.php");
    include_once("../database/db_topic.php");
    include_once("../database/db_user.php");
    include_once("../database/db_animal.php");
    
    if (!isset($_SESSION['username'])){
        header('Location: ../pages/main.php');
        die();
    }

    $thisUser = getUser($_SESSION['username']);
    $topics = getTopicsPostedByUser($thisUser['id']);

    draw_header();
    draw_navbar();
    start_proposals_page();
    if (count($topics) > 0){
        foreach($topics as &$topic){
            $animal = getAnimal($topic['idPet']);
            draw_topic_in_proposals($topic['id'], $animal);

            if ($topic != null) $proposals = getAllTopicsProposals($topic['id']);

            start_proposals_div();
            if (count($proposals) > 0){
                foreach($proposals as &$proposal){
                    if ($proposal != null) draw_proposal($proposal);
                }
            }
            else echo 'No proposals yet...';
            end_proposals_div();
        }
    }
    else echo 'You havent posted any animals yet...';
    end_proposals_page();
    draw_footer();
?>