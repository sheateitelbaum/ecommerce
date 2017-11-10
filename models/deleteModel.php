<?php
session_set_cookie_params(60*5);
session_start();
    if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
}
if (!empty($_GET['site'])){
    $site =urldecode($_GET['site']);}
//include 'views/top.php';
if($action==='secureDelete'){
if (!empty($_GET['id'])){
        $id= $_GET['id'];}
}   
    
if (!empty($_GET['item'])){
    $item = $_GET['item'];
    }
if($action==='secureDeleteCategory'){
    if (!empty($_GET['category'])){
        $category = $_GET['category'];
    }
    }
    if(!empty($_GET['table'])){
        $table = $_GET['table'];
    }else{
        $error = 'can\'t delete without table';
        include 'views/error.php';
        exit;
    }
include 'utils/db.php';

try {
    if($action==='secureDeleteCategory'){
        $query = "DELETE FROM `$table` WHERE category = :category";
    }
    if($action==='secureDelete'){
        $query = "DELETE FROM `$table` WHERE `id`= :id";
}
    $database = Database::getInstance();
    $statement = $database->prepare($query);
if($action==='secureDelete'){
       $statement->bindValue(':id', $id);
}
if($action==='secureDeleteCategory'){
       $statement->bindValue(':category', $category);
} 
    $success=$statement->execute();
        if($success){
            include 'views/top.php';
        if($action==='secureDelete') { echo "<h2 class=\"text-center\">$item deleted</h2>";}
        if($action==='secureDeleteCategory') { echo "<h2 class=\"text-center\">$category deleted</h2>";}
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
