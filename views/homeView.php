<?php
//session_start();
$_SESSION['site'] = $site;

include'top.php';
?>
<div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
        <?php foreach($hView as $key){?>
		    <li><form action="index.php?action=detail" method="post">
                <button type="submit" name="category" value="<?= $key['category']?>"><?=$key['category'];?></button>
                <input type="hidden" name="table" value="<?= $table ?>">
            </form></li>
               
           <?php }?>
    </ul>
        <ul class="nav navbar-nav navbar-left">
            <li><form action="index.php?action=administrators" method="post">
                <button type="submit" name="site" value="<?=$site;?>">Admin</button>
                <input type="hidden" name="table" value="<?= $table ?>">
                </form></li>
            <li><button ><a href='index.php?action=<?=switchSite($table);?>'><?=switchSiteTag($table);?></a></button></li>
        </ul>
           <?php
           $time = time();
           //echo "setting cookie to " . $time;
           setCookie('coupon',$time,time() + (60*60*24*150 ));

           
        if(isset($_COOKIE['coupon'])){
            $lastVisit = $_COOKIE['coupon'];
            $currentVisit = time();
            $noVisit = $currentVisit - $lastVisit;
            $days = number_format($noVisit/86400) ;
            if($noVisit > 604800){
            echo"<h2 class=\"text-center\">Welcome back! You havn't visited for<br>$days days<br>
            We are giving you a 10% discount on your next purchase of over $75!</h2>";
             //echo"<br>this is $currentVisit currentVisit<br>this is $lastVisit lastVisit <br> this is $noVisit noVisit<br> this is $days days<hr>";
            }

        }
         //echo"<hr>this is $currentVisit currentVisit<br>this is $lastVisit lastVisit <br> this is $noVisit noVisit<br> this is $days days";
           include'bottom.php';
           ?>

