<?php

include "headers/checkloginstatus.php";	
include 'headers/connect_to_mysql.php';


if($_POST)
	{	
			$question = $_POST['question'];
			$query = "select * from question WHERE question like '%$question' || questionID = '$question' ";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");
	}
		
else{
			$question = $_POST['question'];
 			$query = "select * from question order by questionID";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");
	}
	
?>

<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/jumbotron-narrow/ -->
<html lang="en" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>QuizUp</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="/css/jumbotron-narrow.css" rel="stylesheet" type="text/css">

<script>
function link(){
	window.location.href = "insertQuestion.php"
	}


function resets(){
	window.location.href = "question.php"
	}
	

	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		alert(id);
		if(result == true)
		{	
			this.document.deleteForm.action = "delete.php?id="+id+"&type=question";
				alert(deleteForm.action);
			this.document.deleteForm.submit();
			return true;
		}
		else
		{	
			return false;
			alert("No Selected");	
		}
		
	}	
	
	
	
</script>
</head>

<body>
<div class="container">
  <div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="index.php">Quiz It</a> </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Dashboard</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setup <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="category.php">Category</a></li>
                <li><a href="question.php">Question</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="categoryReport.php">Category</a></li>
                <li><a href="questionReport.php">Question</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div style="margin-bottom:20px;">
     <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" method="post" action="question.php">
      <div class="form-group">
        <label class="sr-only" for="searchC">Category Id</label>
        <input type="text" class="form-control" id="searchC" name= "question" placeholder="Enter Question">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <button type="button" onclick="resets()" class="btn btn-primary">Reset</button>
      <button type="button" onclick="link()" class="btn btn-warning">Add New</button>
    </form>
    </div>
    <div class="table-responsive">
       <form name="deleteForm" action="check.php" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width=5%>#</th>
            <th width=45%>Question</th>
            <th width=8%>Option1</th>
            <th width=8%>Option2</th>
            <th width=8%>Option3</th>
            <th width=8%>Option4</th>
            <th width=2%>C</th>
            <th width=8%>Image</th>
            <th width=8%>Operation</th>
          </tr>
        </thead>
        <tbody>
        
        
        
          <?php
		
								
		
			while($row=mysqli_fetch_array($result))
			{
			$id = $row['questionID'];
		    $question = $row['question'];
			$option1=$row['option1'];
			$option2=$row['option2'];
			$option3=$row['option3'];
		    $option4=$row['option4'];
			$correct=$row['correct'];
			$image=$row['qimage'];
			echo "
          <tr>
            <td>{$id}</td>
        				<td>${question}</td>
        				<td>${option1}</td>
      					<td>${option2}</td>
      					<td>${option3}</td>
      					<td>${option4}</td>
      					<td>${correct}</td>
						<td><img src='http://207.45.190.206/~lolism/quiz/assets/upload/${image}' width='60px' height='60px' ></img></td>
            <td><a href='#' onclick='return deleteConfirm(${id});' > Delete </a>
			<a href='updateQuestion.php?id={$id}'>Update</a></td>
   
          </tr>";
			}
		 ?>
         
        </tbody>
      </table>
      
         </form>
          
  </div>
  
  <div class="footer">
    <p>© SilverSages Studios 2014</p>
  </div>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="js/jquery-1.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>