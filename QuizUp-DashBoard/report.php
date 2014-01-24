<?php



$db_host = "localhost"; 

$db_username = "lolism_quizup";  

$db_pass = "Hemani786!";  

$db_name = "lolism_quizup"; 

$tablename = "question";


// Run the connection here  



mysql_connect("$db_host","$db_username","$db_pass") or die ("Could Not Connect to Database!"); 

mysql_select_db("$db_name") or die ("No Database Available!");  

mysql_query("SET NAMES 'utf8'");

mysql_query("SET CHARACTER_SET 'utf8'");  


$query = "SELECT * FROM $tablename";

$result = mysql_query($query) or die("Error executing query: ".mysql_error());

$row = mysql_fetch_assoc($result);

$line = "";

$comma = "";

foreach($row as $name => $value)

{

    $line .= $comma . '"' . str_replace('"', '""', $name) . '"';

    $comma = ",";

}

$line .= "\n";

$out = $line;

 

mysql_data_seek($result, 0);

 

while($row = mysql_fetch_assoc($result))

{

    $line = "";

    $comma = "";

    foreach($row as $value)

    {

        $line .= $comma . '"' . str_replace('"', '""', $value) . '"';

        $comma = ",";

    }
    $line .= "\n";

    $out.=$line;

}

header("Content-type: text/csv");

//header("Content-Disposition: attachment; filename=cvs_questions.csv");

header('Content-Type: text/html; charset=utf-8');

echo $out;

//exit;




?>