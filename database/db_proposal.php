<?php

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