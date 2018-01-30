<?
session_save_path("./session/");
session_start();
$b_username = $_SESSION['b_username'];
//$username = "admin";

include "connect.php";
include "fchangdate.php";

	if($_REQUEST['action2']=='delete')
	{
		$position_id = $_REQUEST['post_id'];
		$sql_delete = "delete from post where position_id = '$position_id'";
 		$query_delete = mysql_query($sql_delete); 
	}
	
	$sql_list = "select * from post where b_username = '$b_username'";
 	$query_list = mysql_query($sql_list);

?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: ประกาศงาน</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome-->
</head>
<body>
<? include "topmenu.php";?>
<!--div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
		    
           </div>
		</div>
   </div> 
</div-->	
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="search_wrapper1">
	       <div class="clearfix">
	       	
			<h1>รายการประกาศงาน</h1>

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">รายการประกาศงาน</div>
			<div class="panel-body">								
                           <? 
						   $i=0;
						   while($result_list = mysql_fetch_array($query_list)){
						   $i++;
						   ?>
                         	<a href="post_detail.php?post_id=<? echo $result_list['position_id'];?>"><? echo $i.". ".$result_list['position'];?></a>
                            <p><? echo "ลงประกาศเมื่อ ".dmy($result_list['day']);?> </p>                           
                            <hr>
                          <? }?>                      

			</div>
		</div>
	</div>
</div>
			 </div>
		  </div>
	  </div>
     </div>
    </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>
<? include "footer.php";?>
</body>
</html>	