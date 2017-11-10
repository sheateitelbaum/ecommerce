
<?php
session_set_cookie_params(60*5);
session_start();
if(!isset($_SESSION['loggedIn'])){
    header ("Location: index.php?");
    exit;
    }
if (!empty($_POST['site'])) {
    $site = $_POST['site'];
}else {
        $error = "Unable to update without site";
        include 'views/error.php';
        exit;
    }
if($action==='secureActuallyUpdate'){

    if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    } else {
        $error = "Unable to update without an id";
        include 'views/error.php';
        exit;
    }
    }
    if (!empty($_POST['table'])) {
    $table = $_POST['table'];
}else {
        $error = "Unable to update without table";
        include 'views/error.php';
        exit;
    }
if($action==='secureActuallyUpdate'){   
if (!empty($_POST['category'])) {
    $category = $_POST['category'];
}else {
        $error = "Unable to update without category";
        include 'views/error.php';
        exit;
    }

if (!empty($_POST['item'])) {
    $item = $_POST['item'];
}else {
        $error = "Unable to update without item";
        include 'views/error.php';
        exit;
}

 if (!empty($_POST['price'])) {
    $price = $_POST['price'];
}else {
        $error = "Unable to update without price";
        include 'views/error.php';
        exit;
    }
}    

if($action==='secureActuallyUpdateCategory'){
    if (!empty($_POST['oldCategory'])) {
    $oldCategory = $_POST['oldCategory'];
}else {
        $error = "Unable to update without old category";
        include 'views/error.php';
        exit;
    }

if (!empty($_POST['newCategory'])) {
    $newCategory = $_POST['newCategory'];
}else {
        $error = "Unable to update without category";
        include 'views/error.php';
        exit;
    }
}
include 'utils/db.php';

try{

    if($action==='secureActuallyUpdateCategory'){
        $query = "UPDATE $table SET category = :newCategory WHERE category = :oldCategory";
        }
    if($action==='secureActuallyUpdate'){   
        $query = "UPDATE `$table` SET `site` = :site, `category` = :category, `item` = :item,`price` = :price WHERE `$table`.`id` =:id";
        } 
    
    $database = Database::getInstance();
    $statement = $database->prepare($query);
if($action==='secureActuallyUpdate'){ 
    $statement->bindValue(':site', $site);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':item', $item);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    }
if($action==='secureActuallyUpdateCategory'){
    $statement->bindValue(':newCategory', $newCategory);
    $statement->bindValue(':oldCategory', $oldCategory);
    }
    $success = $statement->execute();
        if ($success) {
            include 'views/top.php';
        if($action==='secureActuallyUpdate'){ 
            echo "<h3 class=\"text-center\">$item was updated</h3> <hr>";
            }
        if($action==='secureActuallyUpdateCategory'){ 
            echo "<h3 class=\"text-center\">$newCategory was updated</h3> <hr>";
            }
        }
        } catch (PDOException $e) {
        $error = $e->getMessage();
        include 'views/error.php';
        exit;
}?>
    <a class="btn btn-primary" href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a>
    <a class="btn btn-primary" href="index.php?action=<?=$table?>">Home</a>
<?php
include 'views/bottom.php';
?>  
