<?php
include_once('../includes/database.php');

//use App\SQLiteBLOB as SQLiteBlob;

//$sqlite = new SQLiteBlob(new PDO('sqlite:../database/teste.db'));

$id = $_GET['id'];

$photo = Database::instance()->readDoc($id);
header("Content-Type:" . $photo['mime_type']);
echo $photo['doc'];

?>