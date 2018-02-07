<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];

include "connect.php";
include "fchangdate.php";
$post_id = $_REQUEST['post_id'];

	$sql_list2 = "select * from job_list where m_username = '$username'";
 	$query_list2 = mysql_query($sql_list2);

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
		   <div id="search_form" class="clearfix">
		    
           </div>
		</div>
   </div> 
</div>	
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="search_wrapper1">
	       <div class="clearfix">
	       	
			<!-- <h1>รายการที่สมัคร</h1> -->

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">รายละเอียดงาน

			</div>
			<div class="panel-body">
<table width="100%" border="0">
<tr>
    <th>ตำแหน่ง</th>
    <th>บริษัท</th>
  </tr>
<? 
$i=0;
while($result_list2= mysql_fetch_array($query_list2)){
	$i++;
	$position_id = $result_list2['position_id'];
	$sql3 = "select * from post where position_id = '$position_id'";
 	$query3 = mysql_query($sql3);
	$result3 = mysql_fetch_array($query3);
	$b_username = $result3['b_username'];
	
	$sql4 = "select * from business where b_username = '$b_username'";
 	$query4 = mysql_query($sql4);
	$result4 = mysql_fetch_array($query4);
	
	?>
    
  <tr>
    <td><a href="job_detail.php?post_id=<? echo $position_id;?>"><? echo $i.". ".$result3['position'];?></a></td>
    <td><? echo $result4['name'];?></td>
  </tr>
<? }?>
</table>
      
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
    <div class="clearfix"></div>
   </div>
  
 </div>

<? include "footer.php";?>
</body>
</html>	