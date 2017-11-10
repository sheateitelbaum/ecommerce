<?php
require_once'utils/db.php';
require_once'utils/direct.php';

if(!empty($_POST['table'])){
	$table = $_POST['table']; 
}
try {
	$query = "SELECT DISTINCT site, category FROM $table";
	$database = Database::getInstance();
    $statement = $database->prepare($query);
    $statement->execute();
	$hView = $statement->fetchAll();
	$statement->closeCursor();
   $site = $hView[0]['site'];
} catch(DBOException $e) {
	$error = $e->getMessage();
	require 'views/error.php';
	exit;
}
?>