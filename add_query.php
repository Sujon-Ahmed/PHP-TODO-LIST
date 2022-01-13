<?php
	require_once 'conn.php';
	if(isset($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
 
			$conn->query("INSERT INTO `task` (`task`)VALUES('$task')");
			header('location:index.php');
		}
	}
?>