<?php
	include 'views/top.php';
?>
<div class="alert alert-danger">
	<h2>Something went wrong</h2>
<?php if(!empty($error)) : ?>
	 <h3><?= $error ?></h3>
<?php endif; ?>
</div>
	<a href="index.php?action=<?=$table?>" class="btn btn-primary">Home</a>
	<a class="btn btn-primary" href="index.php?action=<?='secure'.ucfirst($table)?>">Home(Admin)</a>
<?php
include 'views/bottom.php';
?>