<?php
include_once('../includes/database.php');

$id = $_GET['id'];

$photo = Database::instance()->readDoc($id);
header("Content-Type:" . $photo['mime_type']);
echo $photo['doc'];

?>