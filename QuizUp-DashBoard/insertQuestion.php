<?php

include "headers/checkloginstatus.php";

include 'headers/connect_to_mysql.php';
if($_GET['thankyou'] == 1)
	{
		echo "<script> 
			alert('Your question has been successfully entered');
		</script>";
	}
	





if($_POST)
	{
	
	include 'headers/image_upload.php';
	$question = $_POST['question'];
	$one = $_POST['optionOne'];
	$two = $_POST['optionTwo'];
	$three = $_POST['optionThree'];
	$four = $_POST['optionFour'];
	//$checkbox = $_POST['checkbox'];
	$category = $_POST['category'];
	$correct = $_POST['correct'];



     
	
	$query = "INSERT INTO question (question,option1,option2,option3,option4,correct,categoryID,qimage) VALUES (
'$question','$one','$two','$three','$four','$correct','$category','$profilePic')";
	mysqli_query($con,$query);
	
	header('Location: insertQuestion.php?thankyou=1');
	
	}

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
<title>Insert Recors- QuizUp</title>

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
      <h1>Add Question</h1>
    </div>
    <form role="form" enctype="multipart/form-data" method="post" action="insertQuestion.php">
      <div class="form-group">
        <label for="element_1">Question </label>
        <textarea name= "question" class="form-control" id="element_1" placeholder="Enter Question"  rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="element_2">Option #1</label>
        <input type="text" class="form-control" id="element_2" name="optionOne" placeholder="Enter Option 1">
      </div>
      <div class="form-group">
        <label for="element_3">Option #2</label>
        <input type="text" class="form-control" id="element_3" name="optionTwo" placeholder="Enter Option 2">
      </div>
      <div class="form-group">
        <label for="element_4">Option #3</label>
        <input type="text" name="optionThree" class="form-control" id="element_4"  placeholder="Enter Option 3">
      </div>
      <div class="form-group">
        <label for="element_5">Option #4</label>
        <input type="text" class="form-control" id="element_5" name="optionFour" placeholder="Enter Option 4">
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="correct" style="float:none;" id="optionsRadios1" value="1" checked>
          Option One </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="correct"  style="float:none;" id="optionsRadios2" value="2">
          Option Two </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio"  name="correct" id="optionsRadios3" style="float:none;" value="3">
          Option Three </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="correct" style="float:none;" id="optionsRadios4" value="4">
          Option Four </label>
      </div>
      <div class="form-group">
        <label class="category" for="element_4"> Select a Category </label>
        <br/>
        <select name="category" class="form-control" value="0">
          <option value='0'>Select Category</option>
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
      <div class="form-group">
        <label for="exampleInputFile">Upload Question Picture</label>
        <input type="file" name="file" id="exampleInputFile">
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

<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>