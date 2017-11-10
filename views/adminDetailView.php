<?php
    include'top.php';
 // session_start();already started
      if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
}  
?>

<div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
    <?php foreach($hView as $key){
            if($key['category']===$category){
                continue;} ?>
        <li><form action="index.php?action=secureDetail" method="post">
            <button type="submit" name="category" value="<?= $key['category']?>"><?=$key['category'];?></button>
            <input type="hidden" name="table" value="<?= $table ?>">
        </form></li>
    <?php }?>
    </ul>
    <ul class="nav navbar-nav navbar-left">
        <li><button ><a href='index.php?action=<?=switchAdminSite($table);?>'><?=switchSiteTag($table);?></a></button></li>
        <li><button><a  href="index.php?action=<?=$table?>">Home</a></li></button>
        <li><button ><a href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a></button></li>
        </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-striped table-hover table-condensed">
                <caption class="text-center"><h1><a href="index.php?action=secureUpdateCategory&category=<?=$category?>&table=<?=$table?>"><?=$category?></a</h1></caption>
                <thead>
                    <tr><?php foreach($detail[0] as $key=>$value){
                        if (!is_numeric($key)) echo "<th class=\"text-center\">$key</th>";
                        }?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $item) { ?>
                        <tr>
                            <?php foreach ($item as $key => $value) {
                                if (!is_numeric($key))
                                    echo"<td class=\"text-center\"><a href=\"index.php?action=secureUpdate&id=$item[id]&table=$table\">$value</a></td>";}?>
                                
                        </tr>                  <?php } ?>
                </tbody>
            </table>
        </div>
            
    </div>
</div>

<?php
include'bottom.php';
?>


                    
