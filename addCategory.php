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
	<body>
		<div class="container-fluid">
			<a href="index.php"><h1>CategNotes</h1></a>
			<h2>Add Category</h2>
			<form id="add_category" method="post" action="index.php">
				<div class="form-group">
				  <label for="name">Name</label>
				  <input type="text" class="form-control" name="name" id="name">
				</div>
				<button type="submit" name="save" id="save" class="btn btn-primary btn-block">Save</button>
			</form>
		</div>
	</body>
</html>