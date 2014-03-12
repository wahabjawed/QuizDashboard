<?php
		include 'headers/connect_to_mysql.php';
		$id = $_GET['id'];
		$type = $_GET['type'];
		
		if($type == "category"){
		
		$query = "DELETE from category WHERE id = '$id'";
		mysqli_query($con,$query);
		
		$query = "DELETE from question WHERE categoryID = '$id'";
		mysqli_query($con,$query);
		
		header('Location: category.php');
		
		}
		else if($type=="question"){
			
		$query = "DELETE from question WHERE questionID = '$id'";
		mysqli_query($con,$query);
		header('Location: question.php');
			
		}
		

?>