<?php
session_set_cookie_params(60*5);
session_start();
      if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
}		
require_once 'utils/direct.php';
include 'homeModel.php';
require_once 'utils/db.php';

if(!empty($_POST['category'])){
	$category = $_POST['category'];
}else{
		$error = 'Can not get details without inputting in a category';
		include 'views/error.php';
}
?>
<?php
try {
	$query = "SELECT id,item,price FROM $table WHERE category = '$category'";
	
    $database = Database::getInstance();
    $statement = $database->prepare($query);
    $statement->execute();
	$detail = $statement->fetchAll();
	$statement->closeCursor();
   } catch(DBOException $e) {
	$error = $e->getMessage();
	require 'views/error.php';
	exit;
}
?>