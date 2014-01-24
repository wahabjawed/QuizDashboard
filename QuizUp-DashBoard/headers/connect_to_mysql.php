<?php

$db_host = "localhost"; 

$db_username = "lolism_quizup";  

$db_pass = "Hemani786!";  

$db_name = "lolism_quizup"; 

// Run the connection here  

$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name");

mysqli_set_charset($con, "utf8");

//mysql_connect("$db_host","$db_username","$db_pass") or die ("Couldnot Connect to Database!"); 
//mysql_select_db("$db_name") or die ("No Database!");    

?>