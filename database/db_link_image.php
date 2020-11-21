<?php
include_once('../database/db_image.php');

use App\SQLiteBLOB as SQLiteBlob;

$sqlite = new SQLiteBlob(new PDO('sqlite:../database/teste.db'));

$id = $_GET['id'];

$photo = $sqlite->readDoc($id);
header("Content-Type:" . $photo['mime_type']);
echo $photo['doc'];

?>