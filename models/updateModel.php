<?php
session_set_cookie_params(60*5);
session_start();
	if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
}
include 'utils/db.php';

if(!empty($_GET['id'])) {
	$id = $_GET['id'];
} 
if($action==='secureUpdate'){
	if(empty($_GET['id'])) {
		$error = "Unable to update item without an id";
		require 'views/error.php';
		exit;
}
}
if(!empty($_GET['category'])) {
	$category = $_GET['category'];
}
 if($action==='secureUpdateCategory'){
	if(empty($_GET['category'])) {
	$error = "Unable to update category without a category";
	require 'views/error.php';
	exit;
}
}
if(!empty($_GET['table'])) {
	$table = $_GET['table'];
} else {
	$error = "Unable to update item without table name";
	require 'views/error.php';
	exit;
}

try {         //can't do :table b/c it's FROM,only works in WHERE?
	if($action==='secureUpdate'){
		$query = "SELECT * FROM $table WHERE id=:id";
}
	if($action==='secureUpdateCategory'){
		$query = "SELECT site,category  from `$table` WHERE category = :category";
	}
	$database = Database::getInstance();
    $statement = $database->prepare($query);
	if($action==='secureUpdate'){
	$statement->bindValue(':id', $id);}
	if($action==='secureUpdateCategory'){
	$statement->bindValue(':category', $category);}
    $success =$statement->execute();
	if ($success) {
		$hView = $statement->fetch();
		$site = $hView['site'];
	} else {
		$error = "Unable to get info $id";
		require 'views/error.php';
		exit;
	}	
} catch(DBOException $e) {
	$error = $e->getMessage();
	require 'views/error.php';
	exit;
}
?>