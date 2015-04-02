<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<title>CategNotes</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
	<?php
		include 'db.php';
		if(isset($_POST) and isset($_POST['save']) and isset($_POST['name'])){
			$name=$_POST['name'];
			setCategory($name);
			header('location:index.php');
		}
		if(isset($_POST) and isset($_POST['DelCategory'])){
			$id=$_POST['DelCategory'];
			deleteCategory($id);
			header('location:index.php');
		}
	?>
	<body>
		<div class="container-fluid">
			<h1>CategNotes</h1>
			<h2>List of Categories</h2>
			<form id="category_list" method="post" action="viewCategory.php">
				<?php
				$result=getCategory(false);
				if($result){
					while($row = mysql_fetch_assoc($result)) { ?>
						<button type="submit" name="category_id" id="category_id" value="<?php echo $row["id"];?>" class="btn btn-warning btn-block">
							<?php echo $row["name"];?>
						</button>
						<br>
					<?php }?>
				<?php }?>
			</form>
			<form id="category_list" method="post" action="addCategory.php">
				<button type="submit" name="add_category" id="add_category" class="btn btn-primary btn-block">Add New Category</button>
			</form>
		</div>
	</body>
</html>