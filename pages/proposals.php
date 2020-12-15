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
    start_received_or_sent_proposals_div(true);

    if (count($topics) > 0){
        foreach($topics as &$topic){
            $animal = getAnimal($topic['idPet']);

            if (isAnimalAdopted($topic['idPet'])) continue;

            draw_topic_in_proposals($topic['id'], $animal);

            if ($topic != null) $proposals = getAllTopicsProposals($topic['id']);

            start_proposals_div();
            if (count($proposals) > 0){
                foreach($proposals as &$proposal){
                    if ($proposal != null) draw_proposal($proposal);
                }
            }
            else{ 
                start_no_proposals_div();
                echo 'No proposals yet...';
                end_proposals_page();
            }
            end_proposals_div();
        }
    }
    else{
        start_no_proposals_div();
        echo 'You have not posted any animals yet...';
        end_proposals_page();
    }

    end_received_or_sent_proposals_div();

    start_received_or_sent_proposals_div(false);

    $thisProposals = getAllUsersProposals($thisUser['id']);
    if (count($thisProposals) > 0){
        foreach($thisProposals as &$thisProposal){
            $topic = getTopic($thisProposal['idTopic']);
            $animal = getAnimal($topic['idPet']);

            draw_topic_in_proposals($topic['id'], $animal);
            start_proposals_div();
            draw_proposal($thisProposal);
            end_proposals_div();
        }
    }
    
    else{
        start_no_proposals_div();
        echo 'You have not made any proposals yet...';
        end_no_proposals_div();
    } 
    end_received_or_sent_proposals_div();

    end_proposals_page();
    draw_footer();
?>