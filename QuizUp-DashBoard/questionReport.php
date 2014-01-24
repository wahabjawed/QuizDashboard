<?php

include "headers/checkloginstatus.php";
include 'headers/connect_to_mysql.php';



?>

<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/jumbotron-narrow/ -->
<html lang="en" class=" clickberry-extension clickberry-extension-standalone">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Question Report- QuizUp</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="/css/jumbotron-narrow.css" rel="stylesheet" type="text/css">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<meta content="clickberry-extension-here">
<script id="clickberry-standalone-script" src="chrome-extension://lfmhcpmkbdkbgbmkjoiopeeegenkdikp/modules/clickberry/ChromeStdInjector.js?v=prod&addonType=fvd"></script>
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
  <div class="jumbotron">
    <div style="text-align:center">
      <h1>Question Report</h1>
    </div>
    <form role="form" enctype="multipart/form-data" method="post" action="questionReportGenerate.php">
       <div class="form-group">
        <label class="category" for="element_4"> Select a Category </label>
        <br/>
        <select name="category" class="form-control" value="0">
          <option value='0'>All</option>
          <?php
	
								$query = "SELECT * FROM category";
                                $result = mysqli_query($con,$query)
                                or die ("Couldn’t execute query.");
									
									while($row=mysqli_fetch_array($result))
									{
										$id = $row['id'];
										$name = $row['name'];
										
										echo "
											 
	     <option value='${id}'>${name}</option>
     										";
										
									}
							?>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
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