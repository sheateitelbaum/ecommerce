
<?php
//session_start();
//session_set_cookie_params (10);
if(!isset($_SESSION['loggedIn'])){
    header ("Location: index.php?");
    exit;
}
include'top.php';
?>
<div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
    <?php foreach($hView as $key){?>
        <li><form action="index.php?action=secureDetail" method="post">
            <button type="submit" name="category" value="<?= $key['category']?>"><?=$key['category'];?></button>
            <input type="hidden" name="table" value="<?= $table ?>">
        </form></li>
    <?php }?>
        <li><form action="index.php?action=secureAdd" method="post">
            <button type="submit" name="site" value="<?= substr($site,0,-7)?>">Add Item</button>
            <input type="hidden" name="table" value="<?= $table ?>">
        </form></li>
    </ul>
        <ul class="nav navbar-nav navbar-left">
            <li><form action="index.php?action=administrators" method="post">
            <button type="submit" name="logout" value="true">Logout</button>
        </form></li>
            <li><button ><a  href="index.php?action=<?=$table?>">Home</a></button></li>
            <li><button ><a href="index.php?action=<?=switchAdminSite($table)?>"><?=switchSiteTag($table);?></a></button></li>
        </ul>
</div>
<?php
include'bottom.php';
?>



