<?php

include "headers/checkloginstatus.php";
	
include 'headers/connect_to_mysql.php';

if($_POST)
	{
			$category = $_POST['category'];
		
		  $query = "select * from category c where id = $category";
		
        $result = mysqli_query($con,$query)
        or die ("Couldn’t execute query.");
		
		}else{
  $query = "select * from category c order by id";
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
	window.location.href = "insertCategory.php"
	}


function resets(){
	window.location.href = "category.php"
	}

	
	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		if(result == true)
		{	
			document.deleteForm.action = "delete.php?id="+id+"&type=category";
			document.deleteForm.submit();
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
    <form class="form-inline" role="form" enctype="multipart/form-data" method="post" action="category.php">
      <div class="form-group">
        <label class="sr-only" for="searchC">Category Id</label>
        <input type="text" class="form-control" id="searchC" name="category" placeholder="Enter Category">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <button type="button" onclick="resets()" class="btn btn-primary">Reset</button>
      <button type="button" onclick="link()" class="btn btn-warning">Add New</button>
    </form>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="15%">ID</th>
            <th width="50%">Name</th>
            <th width="15%">Parent ID</th>
            <th width="20%">Operation</th>
          
          </tr>
        </thead>
        <tbody>
        
        <form name="deleteForm" action="check.php" method="post">
          
          <?php
		
								
			while($row=mysqli_fetch_array($result))
			{
			$id = $row['id'];
		    $name = $row['name'];
			$parent=$row['parent_id'];
			echo "
          <tr>
            <td>${id}</td>
            <td>${name}</td>
            <td>${parent}</td>
            <td><a href='#' onclick='return deleteConfirm(${id});'><span class='glyphicon glyphicon-star'></span> Delete </a>
            <a href='updateCategory.php?id={$id}' onclick='return updateConfirm(${id});'><span class='glyphicon glyphicon-star'></span> Update </a></td>
			
   
          </tr>";
			}
		 ?>
         
         </form>
        </tbody>
      </table>
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