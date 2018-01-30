<?
session_save_path("./session/");
session_start();
//$b_username = $_SESSION['b_username'];
//$username = "admin";

include "connect.php";
include "fchangdate.php";
		
	$busi_id = $_REQUEST['busi_id'];
	$sql_b = "select * from business where b_id = '$busi_id'"; 
 	$query_b = mysql_query($sql_b);
	$result_b= mysql_fetch_array($query_b);	
   $b_username = $result_b['b_username'];
	$sql_list2 = "select * from post where b_username = '$b_username'"; 
 	$query_list2 = mysql_query($sql_list2);
		

	//$province_id = $result_list2['province'];
	 
	/*
	
	$sql_list = "select * from post where b_username = '$b_username'";
 	$query_list = mysql_query($sql_list);*/

?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: หางาน</title>
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
<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix"><br>
		    <h1> <? echo $result_b['name'];?></h1>
           </div>
		</div>
   </div> 
</div>	
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="search_wrapper1">
	       <div class="clearfix">
	       	<? 
			/*while($result_list2= mysql_fetch_array($query_list2)){
			$i++;
			$b_username1 = $result_list['b_username'];
			$sql_b1 = "select * from business where b_username = '$b_username'";
 			$query_b1 = mysql_query($sql_b1);
			$result_b1 = mysql_fetch_array($query_b1);

			/*$i=0;
			while($result_list = mysql_fetch_array($query_list)){
			$i++;
			$b_username = $result_list['b_username'];
			$sql_b = "select * from business where b_username = '$b_username'";
 			$query_b = mysql_query($sql_b);
			$result_b = mysql_fetch_array($query_b);*/
			
		?> 


		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title"><? echo $result_b['name'];?></div>
			<div class="panel-body">								
                           <? 
						   $i=0;
						   while($result_list2= mysql_fetch_array($query_list2)){
						   $i++;
						    $pro_id = $result_list2['province_id'];
						   	$sql_pro2 = "select * from province where PROVINCE_ID ='$pro_id' ";
							$query_pro2 = mysql_query($sql_pro2);
							$result_pro2 = mysql_fetch_array($query_pro2);

						   ?>
                         	<a href="job_detail.php?post_id=<? echo $result_list2['position_id'];?>"><? echo $i.". ".$result_list2['position'];?></a>
                         	<p>ลักษณะงาน : <? echo $result_list2['feature'];?></p>
                         	<p>คุณสมบัติ : <? echo $result_list2['property1'];?></p>
                         	<p>เงินเดือน : <? echo $result_list2['salary'];?></p>

                         	<p>สถานที่ปฏิบัติงาน : <? echo $result_pro2['PROVINCE_NAME'];?></p>
                            <p><?  //echo "ลงประกาศเมื่อ ".dmy($result_list['day']);?> </p>                           
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