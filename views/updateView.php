
<?php
//session_start();
      if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
}        
function getLink($action,$site,$item=0 ) {
    $link = "index.php?";
    $params = $_GET;

    if (!empty($action)) {
        $params['action'] = $action;
    } 
        $params['site'] = $site;
        $params['item'] = $item;
    
        $link .= http_build_query($params);

         return $link;
}
?>
<?php
include 'views/top.php';
?>
<div class="container">
<?php if($action==='secureUpdate'){?>   
    <form class = "form-horizontal" action="index.php?action=secureActuallyUpdate" method="post">                                                    
        <div class="form-group">
            <label for="site" class="control-label col-md-2">Site</label>
            <div class = "col-md-9">
                <input type="text" class="form-control" name="site" id= "sefer" value="<?= $hView['site'];?>"readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="category" class="control-label col-md-2">Category</label>
            <div class = "col-md-9">
                <input type="text" class="form-control" name="category" id= "category" value="<?= $hView['category'] ?>"required>
            </div>
        </div>

        <div class="form-group">
            <label for="item" class="control-label  col-md-2">Item</label>
            <div class = "col-md-9">
                <input type="text" class="form-control" name="item" id= "item" value="<?= $hView['item'] ?>"required>
            </div>
        </div>

        <div class="form-group">
            <label for="price" class="control-label col-md-2">Price</label>
            <div class = "col-md-9">
                <input type="number" step=".01" min="5"class="form-control" name="price" id= "price" value="<?= $hView['price'] ?>"required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" class="btn btn-primary" value="Update"/>
                <a class="btn btn-primary" href="<?=getLink('secureDelete',$site,$hView['item'])?>">Delete</a>
                <a class="btn btn-primary" href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a>
                <a class="btn btn-primary" href="index.php?action=<?=$table?>">Home</a>
            </div>
        </div>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="table" value="<?= $table ?>">
    </form>   
       <?php } ?>
        
       <?php if($action==='secureUpdateCategory'){?>
        <form class = "form-horizontal" action="index.php?action=secureActuallyUpdateCategory" method="post">   
            <div class="form-group">
                <label for="oldCategory" class="control-label col-md-2">Category</label>
                <div class = "col-md-9">
                    <input type="text" class="form-control" name="oldCategory" id= "oldCategory" value="<?= $hView['category'] ?>"readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="newCategory" class="control-label col-md-2">New Category</label>
                    <div class = "col-md-9">
                    <input type="text" class="form-control" name="newCategory" id= "newCategory" placeholder="only enter category if you would like to update"required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" value="Update"/>
                    <a class="btn btn-primary" href="<?=getLink('secureDeleteCategory',$site)?>">Delete</a>
                    <a class="btn btn-primary" href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a>
                    <a class="btn btn-primary" href="index.php?action=<?=$table?>">Home</a>
                </div>
            </div>

                    <input type="hidden" name="table" value="<?= $table ?>">
                    <input type="hidden" name="site" value="<?=$hView['site']?>">
        </form>                
        <?php
             }
        ?>
        
</div>        

<?php
include 'views/bottom.php';
?>
