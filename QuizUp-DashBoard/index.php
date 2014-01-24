<!DOCTYPE html>
<html lang="en" class=" clickberry-extension clickberry-extension-standalone">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>QuizUp</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery.circliful.css"/>
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="/css/jumbotron-narrow.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/admin.quizup.css"/>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.circliful.min.js"></script>
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
  <div class="jumbotron" style="background:#f8f8f8;">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Category Chart</h3>
      </div>
      <div class="panel-body" style="text-align:center">
        <center>
        <!--
  	
    Generating Counters Dynamically using LOOKUP from the database.
  
  -->
        
        <?php
		//include "headers/checkloginstatus.php";
	
	require 'include/connect.inc.php';

        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER_SET 'utf8'"); 
	
        $query = "SELECT * FROM category";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		
		/*
			Getting total number of tuples in questions table.
		*/
		
		$query_totalQuestion = "SELECT * FROM question";
		$result_totalQuestion = mysql_query($query_totalQuestion);
		$totalCount_totalQuestion = mysql_num_rows($result_totalQuestion);
		//echo "total Count " . $totalCount_totalQuestion . "<br/>";
		
	
	while($row = mysql_fetch_array($result))
	{
		$id = $row['id'];
		$category = $row['name'];
		$parentId = $row['parent_id'];
		
		$query_qsCount  = "SELECT * from question WHERE categoryID = '$id'";
		$result_qsCount = mysql_query($query_qsCount);
		$count = mysql_num_rows($result_qsCount);
		
		//echo "Count -- >" . $count . "<br/>";
		
		if($count!=0)
		{
				$percent = percent($count,$totalCount_totalQuestion);
				//echo $percent. " ";
		}
		else
		{
			$percent = 0;
		}
		
		
		
		
		if($id%2==0)
		{
			$color = "#61a9dc";
		}
		else
		{
			$color = "#7ea568";
		}
		
		
		
		echo "
		<div id='myStat{$id}' data-dimension='250' data-text='{$percent}%' data-info='{$category}' data-width='30' data-fontsize='38' data-percent='{$percent}' data-fgcolor='{$color}' data-bgcolor='#eee' data-fill='#ddd'></div>
			  ";
			  
		  if(($id)%3 == 0)
		  {
			  echo "<br style='clear:both' />";
		  }
		
		
		
	
		
	}
	
	
	function percent($num_amount, $num_total) {
		$count1 = $num_amount / $num_total;
		$count2 = $count1 * 100;
		$count = number_format($count2, 0);
		return  $count;
}
	
	
?>
        
        <!-- <div id="myStat1" data-dimension="250" data-text="35%" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#7ea568" data-bgcolor="#eee" data-fill="#ddd"></div>
    
    <div id="myStat2" data-dimension="250" data-text="35%" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-fill="#ddd"></div>
    
    <div id="myStat3" data-dimension="250" data-text="35%" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#7ea568" data-bgcolor="#eee" data-fill="#ddd"></div>
    
    <br style="clear:both" />
    
    <div id="myStat4" data-dimension="250" data-text="35%" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#7ea568" data-bgcolor="#eee" data-fill="#ddd"></div>
    
    <div id="myStat5" data-dimension="250" data-text="35%" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#7ea568" data-bgcolor="#eee" data-fill="#ddd"></div>
    
    <div id="myStat6" data-dimension="250" data-text="35%" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="35" data-fgcolor="#7ea568" data-bgcolor="#eee" data-fill="#ddd"></div> --> 
        </center>
      </div>
    </div>
  </div>
  <div class="footer">
    <p>© SilverSages Studios 2014</p>
  </div>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!--
<script src="js/jquery-1.js"></script> 
<script src="js/bootstrap.js"></script> --> 
<script>
$( document ).ready(function() {
		
		
		
		for (var i=0; i<50; i++)
		{
			$('#myStat'+i).circliful();
		}
		
		
		
    });
</script>
</body>
</html>