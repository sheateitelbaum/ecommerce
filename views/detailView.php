XC<?php
include'top.php';
?>

<div class="container-fluid">
<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
            <ul class="nav navbar-nav navbar-right">
                <?php foreach($hView as $key){
                    if($key['category']===$category){
                continue;} ?>
                    <li><form action="index.php?action=detail" method="post">
                        <button type="submit" name="category" value="<?= $key['category']?>"><?=$key['category'];?></button>
                        <input type="hidden" name="table" value="<?= $table ?>">
                    </form></li>
               
                <?php }?>
           
            </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><button ><a href='index.php?action=<?=switchSite($table);?>'><?=switchSiteTag($table);?></a></button></li>
                    <li><button ><a href='index.php?action=<?=$table?>'>Home</a></button></li>
                </ul>
       <!-- </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-striped table-hover table-condensed">
                <caption class="text-center"><h1><?=$category?></h1></caption>
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
                                    echo"<td class=\"text-center\">$value</td>";}?>
                                
                        </tr>                  <?php } ?>
                </tbody>
            </table>
        </div>
            
    </div>
</div>

<?php
include'bottom.php';
?>


                    
