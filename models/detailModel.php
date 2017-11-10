<?php
require_once 'utils/direct.php';
include 'homeModel.php';
require_once 'utils/db.php';

if(!empty($_POST['category'])){
	$category = $_POST['category'];
} 
else{
	$error = 'Can not get details without inputting in a category';
}
?>
<?php
try {
	$query = "SELECT item,price FROM $table WHERE category = '$category'";
	$database = Database::getInstance();
    $statement = $database->prepare($query);
    $statement->execute();
	$detail = $statement->fetchAll();

	
	/*foreach($hView as $key)
	{
		Item $i = new Item();
		$i->setId($hView["id"]);
	}*/

	$statement->closeCursor();
} catch(DBOException $e) {
	$error = $e->getMessage();
	require 'views/error.php';
	exit;
}
?>