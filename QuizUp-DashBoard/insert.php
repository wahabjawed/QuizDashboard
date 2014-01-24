<?php

	include 'headers/connect_to_mysql.php';
	include 'headers/image_upload.php';
	$question = $_POST['question'];
	$one = $_POST['optionOne'];
	$two = $_POST['optionTwo'];
	$three = $_POST['optionThree'];
	$four = $_POST['optionFour'];
	//$checkbox = $_POST['checkbox'];
	$category = $_POST['category'];
	$correct = $_POST['correct'];
	echo $profilePic;

        mysql_query("SET NAMES 'utf8'");

        mysql_query("SET CHARACTER_SET 'utf8'");  
	
	$query = "INSERT INTO question (question,option1,option2,option3,option4,correct,categoryID,qimage) VALUES (
'$question','$one','$two','$three','$four','1','$category','$profilePic')";
	mysql_query($query);
	
	header('Location: index.php?thankyou=1');
	
	
	


?>