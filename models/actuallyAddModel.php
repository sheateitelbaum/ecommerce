<?php
session_set_cookie_params(60*5);
session_start();
      if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
        }

if (!empty($_POST['site'])) {
    $site = $_POST['site'];
    }
    include 'views/top.php';
 if (!empty($_POST['site'])) {
    $site = $_POST['site'];
    }      
if (!empty($_POST['category'])) {
    $category = $_POST['category'];
} else {
    $error = 'Can\'t add without adding all fields';
    include 'views/error.php';
}
if (!empty($_POST['item'])) {
    $item = $_POST['item'];
} else {
    $error = 'Can\'t add without adding all fields';
    include 'views/error.php';
}
if ($_POST['price']) {
    $price = $_POST['price'];
} else {
    $error = 'Can\'t add without adding all fields';
    include 'views/error.php';
}
if (!empty($_POST['table'])) {
    $table = $_POST['table'];
}else {
    $error = 'Can\'t add without table';
    include 'views/error.php';
}

include 'utils/db.php';

if (!empty($_POST['item'])) {

    
    $query = "INSERT INTO $table (`site`, `category`, `item`, `price`) VALUES (:site,:category,:item,:price)";
    $database = Database::getInstance();
    $statement = $database->prepare($query);
    $statement->bindValue(':site', $site);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':item', $item);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();

        if ($success) {
            echo "<h3 class=\"text-center\">$item was inserted</h3>";
        }
    } else {
        echo '<h3 class="text-center">' . "Must insert an item</h3>";
    }
    ?>
    <div class="text-center">
        <a class="btn btn-primary" href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a>
        <a class="btn btn-primary" href="index.php?action=<?=$table?>">Home</a>
    </div>
<?php include 'views/bottom.php'; ?>
	
