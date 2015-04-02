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
		$detail="";
		$title="";
		$id="";
		$category_id="";
		if(isset($_POST)){
			$category_id=$_POST['category_id'];
		}
		if(isset($_POST) and isset($_POST['note'])){
			$result=getNote($_POST['note']);
			if($result){
				while($row = mysql_fetch_assoc($result)) { 
					$detail=$row['detail'];
					$title=$row['title'];
					$id=$_POST['note'];
				}
			}
		}
		// else if(isset($_POST) and isset($_POST['note'])){
			// $id=$_POST['note'];
		// }
		
	?>
	<body>
		<div class="container-fluid">
			<a href="index.php"><h1>CategNotes</h1></a>
			<?php 
			if($id!=""){?>
			<form id="DelNoteForm" method="post" action="viewCategory.php">
				<button type="submit" name="DelNote" id="DelNote" value="<?php echo $id;?>" class="btn btn-danger" >Delete Note</button>
				<input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id; ?>"/>
			</form>
			<?php } ?>
			<form id="add_note" method="post" action="viewCategory.php">
				<div class="form-group">
				  <label for="name">Title</label>
				  <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>">
				</div>
				<div class="form-group">
				  <textarea type="text" class="form-control" name="detail" id="detail"><?php echo $detail;?></textarea>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
				<input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id; ?>"/>
				<button type="submit" name="save" id="save" class="btn btn-primary btn-block">Save</button>
			</form>
		</div>
	</body>
</html>