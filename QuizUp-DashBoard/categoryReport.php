<?php
include "headers/checkloginstatus.php";
   // include_once('headers/phpToPDF.php') ;

include 'headers/connect_to_mysql.php';

	
    // Assign html code into php variable:-
	$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Category Report</title>
<style type="text/css">
<!--
body {
	font-family:Tahoma;
	font-size: 16px;
}
img {
	border:0;
}
#page {
	width:800px;
	margin:0 auto;
	padding:15px;
}
#logo {
	float:left;
	margin:0;
}
#address {
	height:181px;
	margin-left:250px;
}
table {
	width:100%;
}
td {
	padding:5px;
}
tr.odd {
	background:#B6B6B6;
}
-->
</style>
</head>
<body>
<div id="page">
 
  
  <div id="content">
    <div style="text-align:center">
      <p><strong>QUIZ UP</strong></p>
      <p><strong>CATEGORY REPORT</strong><br />
      </p>
    </div>
    <hr>
    <table>
      <tr>
        <td width="21%"><strong>ID</strong></td>
        <td width="51%"><strong>Category Name</strong></td>
        <td width="28%"><strong>No of Questions</strong></td>
      </tr>';
     
	 	$query = "select c.id,c.name,count(q.questionID) as 'question' from category c left outer join question q on c.id = q.categoryID group by c.id";
        $result = mysqli_query($con,$query)
        or die ("Couldn’t execute query.");
				$i=2;					
			while($row=mysqli_fetch_array($result))
			{
			$id = $row['id'];
		    $name = $row['name'];
			$question=$row['question'];
	  		
			if($i%2==0){
			$html=$html."
	  					<tr class='odd'>
        				<td>{$id}</td>
        				<td>${name}</td>
        				<td>${question}</td>
      					</tr>";
			}else{
			$html=$html."
	  					<tr class='even'>
        				<td>{$id}</td>
        				<td>${name}</td>
        				<td>${question}</td>
      					</tr>";
				
				}
			$i++;
			}
      
	  $html=$html.'
    </table>

    <p>
      <center>
        <small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited. <br />
        <br />
        &copy; SilverSages Studios All Rights Reserved</small>
      </center>
    </p>
  </div>
  <!--end content--> 
</div>
<!--end page-->
</body>
</html>';

echo $html;
//phptopdf_html($html,'assets/upload/', 'categoryReport.pdf');


//header("location:assets/upload/categoryReport.pdf");
//header('Content-type: application/pdf');
?>
