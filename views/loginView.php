<?php
if(!empty($_POST['logout'])){
    unset($_SESSION['loggedIn']);
    header("Location: index.php");
    exit;
    }



include 'utils/httpsOnly.php';
//session_start();
  require 'utils/db.php';
  $site = $_SESSION['site'];

 setCookie('admin','loggedIN',time() + (60*5),'/','phpTest' );

if(!isset($site)){
    echo'can\'t login through browser';?>
    <!--<a class="btn btn-primary" href="index.php">Home</a>-->
<?php 
    header("Location: index.php");
    exit;
 }
if (!empty($_POST['user'])) {
      
  if (!empty($_POST['user'])) {
    $user = $_POST['user'];
}else {
    header("Location:$_SERVER[PHP_SELF]");
    exit;
}
  if (!empty($_POST['password'])) {
        $password = $_POST['password'];
}else {
    header("Location:$_SERVER[PHP_SELF]");
    exit;
}


$db = Database::getInstance();
$query = 'SELECT hash FROM administrators WHERE user_name = :user';
$statement = $db->prepare($query);
$statement->bindValue(':user', $user);
$statement->execute();
$row = $statement->fetch();
//$hash = password_hash($password, PASSWORD_DEFAULT);
 //"$password = $hash";
 echo $row['hash'];
 //if(!empty($POST['user'])&& !empty($_POST['password'])){this line of code cost me probably over 2 hours today! 
if (!password_verify($password, $row['hash'])) {
    echo "wrong password";
    header("Location: index.php");
    exit;
}
 if (!isset($_SESSION['loggedIn'])) {
            
           $_SESSION['loggedIn'] = [true];}
            echo 'your an admin<br>';
            $secureAction = 'secure';
            $secureAction .=substr($site,4);
            header("Location: index.php?action=$secureAction");
}
include'top.php';

$_SESSION['site'] = $site;
?>
<body>
    <form  method="post">
    <input type="text" placeholder="user name" name="user" required />
    <input type="password" placeholder="password" name="password" required/>
    <input type="submit" value="login"/>
    <button ><a href='index.php?action=<?=lcfirst(substr($site,4))?>'>Home</a></button>
    </form>
</body>
<?php
include'bottom.php';
?>


