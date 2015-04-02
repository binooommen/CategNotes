<?php
function getConnection(){
	$link = mysql_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
	$db_selected = mysql_select_db('categnotes', $link);
	return $link;
}

// function getConnection(){
	// $link = mysql_connect('localhost', 'root', '');
	// $db_selected = mysql_select_db('categnotes', $link);
	// return $link;
// }


function getCategory($id){
	$link=getConnection();
	$sql = "SELECT id, name FROM category ";
	if($id!=false){
		$sql = $sql."where id = $id ;";
	}
	$result=mysql_query($sql, $link);
	return $result;
}

function getCategoryName($id){
	$link=getConnection();
	$sql="SELECT name FROM category where id = "+$id+";";
	$result=mysql_query($sql, $link);
	return $result;
}

function setCategory($name){
	$link=getConnection();
	$sql = "INSERT INTO category (name) VALUES ('".$name."');";
	$result=mysql_query($sql, $link);
	return $result;
}

function getAllNote($id){
	$link=getConnection();
	$sql = "SELECT id, title, detail FROM note where category_id = $id ;";
	$result=mysql_query($sql, $link);
	return $result;
}

function getNote($id){
	$link=getConnection();
	$sql = "SELECT title, detail FROM note where id = $id ;";
	$result=mysql_query($sql, $link);
	return $result;
}

function setNote($title, $detail, $category_id){
	$link=getConnection();
	$sql = "INSERT INTO note (title, detail, category_id) VALUES ('".$title."', '".$detail."', '".$category_id."');";
	$result=mysql_query($sql, $link);
	return $result;
}

function updateNote($id, $title, $detail, $category_id){
	$link=getConnection();
	$sql = "UPDATE note SET title = '".$title."', detail = '".$detail."', category_id = '".$category_id."' where  id = '".$id."';";
	$result=mysql_query($sql, $link);
	return $result;
}

function deleteNote($id){
	$link=getConnection();
	$sql = "DELETE FROM note WHERE id=$id ;";
	$result=mysql_query($sql, $link);
	return $result;
}

function deleteCategory($id){
	$link=getConnection();
	$sql = "DELETE FROM category WHERE id=$id ;";
	$result=mysql_query($sql, $link);
	return $result;
}


?>