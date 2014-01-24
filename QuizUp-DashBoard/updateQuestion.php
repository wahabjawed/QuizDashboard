<?php

include 'headers/connect_to_mysql.php';
include "headers/checkloginstatus.php";
mysql_query("SET NAMES 'utf8'");

mysql_query("SET CHARACTER_SET 'utf8'");  
if($_POST)
	{
	
	$question=$_POST['question'];
	$option1=$_POST['optionOne'];
	$option2=$_POST['optionTwo'];
	$option3=$_POST['optionThree'];
	$option4=$_POST['optionFour'];

	$query = "UPDATE question SET question='".$question."',option1='".$option1."',option2='".$option2."',option3='".$option3."',option4='".$option4."' WHERE questionID='".$_GET["id"]."'"; 
$result =mysql_query($query)
or die("Error querying database.");
header("location:question.php");

	}

 $data = mysql_query("SELECT * FROM question where questionID ='".$_GET["id"]."'") 
 or die(mysql_error());  
 while($info = mysql_fetch_array( $data )) 
 { 
	$ques=$info["question"];
	$opt1=$info['option1'];
	$opt2=$info['option2'];
	$opt3=$info['option3'];
	$opt4=$info['option4'];
	$correct=$info['correct'];
	$categoryid=$info['categoryID'];

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
<title>Update Records- QuizUp</title>

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
          <a class="navbar-brand" href="index.html">Quiz It</a> </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.html">Dashboard</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setup <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Category</a></li>
                <li><a href="#">Question</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Category</a></li>
                <li><a href="#">Question</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="jumbotron">
    <div style="text-align:center">
      <h1>Update Question</h1>
    </div>
    <form role="form" enctype="multipart/form-data" method="post" action="updateQuestion.php?id=<?php echo $_GET['id']; ?>">
      <div class="form-group">
        <label for="element_1">Question </label>
        <input type="textarea" name= "question" class="form-control" id="element_1" value="<?php echo $ques; ?>"  rows="3">
      </div>
      <div class="form-group">
        <label for="element_2">Option #1</label>
        <input type="text" class="form-control" id="element_2" name="optionOne" value="<?php echo $opt1; ?>">
      </div>
      <div class="form-group">
        <label for="element_3">Option #2</label>
        <input type="text" class="form-control" id="element_3" name="optionTwo" value="<?php echo $opt2; ?>">
      </div>
      <div class="form-group">
        <label for="element_4">Option #3</label>
        <input type="text" name="optionThree" class="form-control" id="element_4"  value="<?php echo $opt3; ?>">
      </div>
      <div class="form-group">
        <label for="element_5">Option #4</label>
        <input type="text" class="form-control" id="element_5" name="optionFour" value="<?php echo $opt4; ?>">
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="correct" style="float:none;" id="optionsRadios1" value="1"  <?php echo ($correct=='1')?'checked':'' ?>>
          Option One </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="correct"  style="float:none;" id="optionsRadios2" value="2"  <?php echo ($correct=='2')?'checked':'' ?>>
          Option Two </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio"  name="correct" id="optionsRadios3" style="float:none;" value="3"  <?php echo ($correct=='3')?'checked':'' ?>>
          Option Three </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="correct" style="float:none;" id="optionsRadios4" value="4"  <?php echo ($correct=='4')?'checked':'' ?>>
          Option Four </label>
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