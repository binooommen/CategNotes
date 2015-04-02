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
		if(isset($_POST) and isset($_POST['DelNote'])){
			$id=$_POST['DelNote'];
			deleteNote($id);
		}
		$categ="";
		if(isset($_POST)){
			if(isset($_POST['save'])){
				if(isset($_POST['id']) and $_POST['id']!=""){
					$result=updateNote($_POST['id'], $_POST['title'], $_POST['detail'], $_POST['category_id']);
				}else{
					$result=setNote($_POST['title'], $_POST['detail'], $_POST['category_id']);
				}
			}
			$result=getCategory($_POST['category_id']);
			if($result){
				while($row = mysql_fetch_assoc($result)) { 
					$categ=$row['name'];
				}
			}
		}
		$category_id=$_POST['category_id'];
		
	?>
	<body>
		<div class="container-fluid">
			<a href="index.php"><h1>CategNotes</h1></a>
			<form id="DelForm" method="post" action="index.php">
				<h2>Notes in <?php echo $categ; ?> 
					<button type="submit" name="DelCategory" id="DelCategory" value="<?php echo $category_id;?>" class="btn btn-danger" >Delete Category</button>
				</h2>
			</form>
			<form id="notes_list" method="post" action="viewNotes.php">
				<?php
				$result=getAllNote($_POST['category_id']);
				if($result){
					while($row = mysql_fetch_assoc($result)) { ?>
						<button type="submit" name="note" id="note" value="<?php echo $row["id"];?>" class="btn btn-warning btn-block">
							<?php echo $row["title"];?>
						</button>
						<br>
					<?php }?>
				<?php }?>
				<input type="hidden" name="category_id" id="category_id" value="<?php echo $_POST['category_id']; ?>"/>
				<button type="submit" name="add_note" id="add_note" value="new" class="btn btn-primary btn-block">Add New Note</button>
			</form>
		</div>
	</body>
</html>