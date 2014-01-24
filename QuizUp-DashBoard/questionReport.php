<?php
include "headers/checkloginstatus.php";
    include_once('headers/phpToPDF.php') ;
		
include 'headers/connect_to_mysql.php';
 
	
    // Assign html code into php variable:-
	$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<title>Question Report</title>
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
<div id="page"><!--end logo--><!--end address-->
  
  <div id="content">
   <div style="text-align:center"> <p> <strong>QUIZ UP</strong><br /><br />
    <strong>QUESTION REPORT</strong><br />
    </p>
    </div>
    <hr>
    <table>
      <tr>
        <td width="4%"><strong>ID</strong></td>
        <td width="24%"><strong>Question</strong></td>
        <td width="16%"><strong>Option 1</strong></td>
        <td width="16%"><strong>Option 2</strong></td>
         <td width="16%"><strong>Option 3</strong></td>
        <td width="16%"><strong>Option4</strong></td>
         <td width="8%"><strong>Correct</strong></td>
      </tr>';
	  
	  $query = "select * from question q order by questionID";
        $result = mysqli_query($con,$query)
        or die ("Couldn’t execute query.");
				$i=2;					
			while($row=mysqli_fetch_array($result))
			{
			$id = $row['questionID'];
		    $question = $row['question'];
			$option1=$row['option1'];
			$option2=$row['option2'];
			$option3=$row['option3'];
		    $option4=$row['option4'];
			$correct=$row['correct'];
												
	  		
			if($i%2==0){
			$html=$html."
	  					<tr class='odd'>
        				<td>{$id}</td>
        				<td>${question}</td>
        				<td>${option1}</td>
      					<td>${option2}</td>
      					<td>${option3}</td>
      					<td>${option4}</td>
      					<td>${correct}</td>
      				
						</tr>";
			}else{
			$html=$html."	
						<tr class='even'>
        				<td>{$id}</td>
        				<td>${question}</td>
        				<td>${option1}</td>
      					<td>${option2}</td>
      					<td>${option3}</td>
      					<td>${option4}</td>
      					<td>${correct}</td>
      				
						</tr>";
				
				}
			$i++;
			}
	  
     
    $html=$html.'  </table>
  
    <p>
      <center>
        <small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited. <br />
        <br />
        &copy; SilverSages Studios All Rights Reserved </small>
      </center>
    </p>
  </div>
  <!--end content--> 
</div>
<!--end page-->
</body>
</html>';

phptopdf_html($html,'assets/upload/', 'questionReport.pdf');

echo $html;

//header('Content-Type: text/html; charset=utf-8');

//header('Content-type: application/pdf; charset=utf-8');
//header("location:assets/upload/questionReport.pdf");

?>
