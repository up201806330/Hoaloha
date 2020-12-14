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

    function getAllUsersProposals($idUser){
        $db = Database::instance()->db();
    
        $stmt = $db->prepare('SELECT Proposals.* , UserEntities.username FROM Proposals, UserEntities WHERE Proposals.idUser = UserEntities.id AND Proposals.idUser = ?');
        $stmt->execute(array($idUser));
        return $stmt->fetchAll();
    }

    function insertProposal($idUser, $idTopic, $newName, $description) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO Proposals(idUser, idTopic, newName, description) VALUES(?, ?, ?, ?)');
        $stmt->execute(array($idUser, $idTopic, $newName, $description));
    }

    function isAnimalAdopted($idPet){
        $db = Database::instance()->db();
    
        $stmt = $db->prepare('SELECT Proposals.* FROM Proposals, Topics WHERE Proposals.idTopic = Topics.id AND Topics.idPet = ?');
        $stmt->execute(array($idPet));
        $results = $stmt->fetchAll();

        foreach($results as &$result){
            $status = $result['status'];
            if ($status == 'A') return true;
        }
        return false;
    }

    function getApprovedProposal($idTopic){
        $db = Database::instance()->db();
    
        $stmt = $db->prepare('SELECT Proposals.*, UserEntities.username, idPhoto FROM Proposals, UserEntities INNER JOIN UserPhotos ON UserEntities.id = UserPhotos.idUser WHERE Proposals.idUser = UserEntities.id AND idTopic = ? AND status = "A" ');
        $stmt->execute(array($idTopic));
        return $stmt->fetch();
    }

?>