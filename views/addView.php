<?php
session_set_cookie_params(60*5);
session_start();
      if(!isset($_SESSION['loggedIn'])){
header ("Location: index.php?");
exit;
}		
include 'utils/direct.php';
include 'top.php';
?>

	<div class="container">   
		<form class = "form-horizontal" action="index.php?action=secureActuallyAdd" method="post">                                                    
			<div class="form-group">
				<label for="site" class="control-label col-md-2">Site</label>
					<div class = "col-md-9">
						<input type="text" class="form-control" name="site" id= "site" value="<?=substr($site, 0, -7);?>" readonly>
					</div>
			</div>
			
			<div class="form-group">
				<label for="category" class="control-label col-md-2">Category</label>
					<div class = "col-md-9">
					<input type="text" class="form-control" name="category" id= "category" required >
					</div>
			</div>
			
			<div class="form-group">
				<label for="item" class="control-label col-md-2">Item</label>
					<div class = "col-md-9">
					<input type="text" class="form-control" name="item" id= "item" required>
					</div>
			</div>
			<div class="form-group">
				<label for="price" class="control-label  col-md-2">Price</label>
					<div class = "col-md-9">
					<input type="number" step=".01" min="5" class="form-control" name="price" id= "Price" required>
					</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
				<input type="submit" class="btn btn-primary" value="Add Item"/>
				<a class="btn btn-primary" href="index.php">Home</a>
				<a class="btn btn-primary" href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a>
				</div>
			</div>
	</div>
		<input type="hidden" name="table" value="<?=$table?>">
		 
		</form>

    <?php
	include 'bottom.php';
	?>