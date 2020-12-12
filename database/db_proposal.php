<?php
  include_once('../includes/database.php');

    function approveRequest($idUser, $idTopic){
        $db = Database::instance()->db();

        $stmt = $db->prepare('UPDATE Proposals SET status=? WHERE idTopic=?');
        $stmt->execute(array('F', $idTopic));

        $stmt = $db->prepare('UPDATE Proposals SET status=? WHERE idUser=? AND idTopic=?');
        $stmt->execute(array('A', $idUser, $idTopic));
    }

    function refuseProposal($idUser, $idTopic){
        $db = Database::instance()->db();

        $stmt = $db->prepare('UPDATE Proposals SET status=? WHERE idUser=? AND idTopic=?');
        $stmt->execute(array('R', $idUser, $idTopic));
    }

    function getAllTopicsProposals($idTopic){
        $db = Database::instance()->db();
    
        $stmt = $db->prepare('SELECT Proposals.* , UserEntities.username FROM Proposals, UserEntities WHERE Proposals.idUser = UserEntities.id AND Proposals.idTopic = ?');
        $stmt->execute(array($idTopic));
        return $stmt->fetchAll();
    }

    function insertProposal($idUser, $idTopic, $newName, $description) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO Proposals(idUser, idTopic, newName, description) VALUES(?, ?, ?, ?)');
        $stmt->execute(array($idUser, $idTopic, $newName, $description));
    }

?>