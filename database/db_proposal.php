<?php

    function insertProposal($idUser, $idTopic, $newName, $description) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO Proposals(idUser, idTopic, newName, description, status) VALUES(?, ?, ?, ?, ?)');
        $stmt->execute(array($idUser, $idTopic, $newName, $description, 'P'));
    }

?>