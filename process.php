<?php

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crud';



//connection

$connection = new mysqli($server, $user, $password, $dbname) or die(mysqli_error($connection));

$id = 0;
$update = false;
$name = "";
$location = "";


if (isset($_POST['save'])){
	
	$name = $_POST['name'];
	$location = $_POST['location'];


$connection->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($connection->error());



header("location:index.php");

}


if (isset($_GET['delete'])){

	$id = $_GET['delete'];
	
	$connection->query("DELETE FROM data WHERE id = $id") or die($connection->error());



	header("location:index.php");

}


if (isset($_GET['edit'])){

	$id = $_GET['edit'];
	$update = true;
	$result = $connection->query("SELECT * FROM data WHERE id=$id") or die($connection->error());
		
		if($result->num_rows==1){
		$row = $result->fetch_array();
		$name = $row['name'];
		$location = $row['location'];
	}
}


if (isset($_POST['update'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$location = $_POST['location'];

	$connection->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($connection->error);

	header('location: index.php');
}

?>
