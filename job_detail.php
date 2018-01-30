<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];

include "connect.php";
include "fchangdate.php";
$post_id = $_REQUEST['post_id'];

	$sql_list2 = "select * from post where position_id = '$post_id'";
 	$query_list2 = mysql_query($sql_list2);
	$result_list2= mysql_fetch_array($query_list2);
	$province_id = $result_list2['province_id'];
	
	$sql_pro = "select * from province where PROVINCE_ID = '$province_id'";
 	$query_pro = mysql_query($sql_pro);
	$result_pro = mysql_fetch_array($query_pro);
	
	
	
	if($_REQUEST['action']=='insert'){
		$position_id = $_POST['position_id'];
		
		$sql_job = "select * from job_list where position_id = '$position_id' and m_username = '$username'";
 		$query_job = mysql_query($sql_job);	
		$count_job = mysql_num_rows($query_job);
			
		$date = date("Y-m-d H:i:s");
		if($count_job<1){			
			$sql2 = "insert into job_list values('','$position_id','$username','$date')";		
			$query2 = mysql_query($sql2);
			?><script>window.location="myjob.php";</script><?
		}else{		
			?><script>alert("คุณสมัครตำแหน่งนี้แล้ว"); window.location="myjob.php";</script><?
		}
		} 

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
		        <br>       
             <h1>รายละเอียด</h1>
			
           </div>
		</div>
   </div> 
</div>		
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="search_wrapper1">
	       
	       	
			<!--<h1>ลงประกาศงาน</h1>-->

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title" style="font-size: 18px">รายละเอียดงาน

			</div>
			<div class="panel-body">
<form name="myform" action="job_detail.php?action=insert" method="post">
                <input type="hidden" name="position_id" value="<? echo $result_list2['position_id'];?>">
					<div class="form-group">
						<p for="myName" style="font-weight: bolder;font-size: 18px">ตำแหน่งงาน :  <span style="font-size: 16px; font-weight: normal;"><? echo $result_list2['position'];?></span></p>
                        <p></p>
					</div>
                    
					<div class="form-group">
						<p for="status" style="font-weight: bolder;font-size: 18px">สถานที่ปฏิบัติงาน : <span style="font-size: 16px; font-weight: normal;"><? echo $result_pro['PROVINCE_NAME'];?></span></p>
						
					</div>
					<div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">อัตรา : <span style="font-size: 16px; font-weight: normal;"><? echo $result_list2['amount'];?></span></p>						
                        <p></p>
					</div>
                    <div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">เงินเดือน :<span style="font-size: 16px; font-weight: normal;"> <? echo number_format($result_list2['salary']);?> บาท</span> </p>
						
					</div>
                    <div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">คุณสมบัติ : </p>
						<p><? echo $result_list2['property1'];?></p>
                        <p><? echo $result_list2['property2'];?></p>
                        <p><? echo $result_list2['property3'];?></p>
                        <p><? echo $result_list2['property4'];?></p>
                        <p><? echo $result_list2['property5'];?></p>
                        <p><? echo $result_list2['property6'];?></p>
					</div>
					<div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">ลักษณะงาน :  </p>
						<p><? echo $result_list2['feature'];?></p>
					</div>
                    
                    <div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">หมายเหตุ : </p>
                        <p><? echo $result_list2['remark'];?>
					</div>                    
                    <div class="form-group">
                    <p for="nationality" style="font-weight: bolder;font-size: 16px">การรับสมัคร : 
                    <? if($result_list2['copy1']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>สมัครด้วยตนเอง</span>
                    <? }?>    
                    <? if($result_list2['copy2']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>ส่งอีเมล์</span>
                    <? }?> 
                    <? if($result_list2['copy3']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>ส่งไปรษณีย์</span>
                    <? }?> 
                    <? if($result_list2['copy4']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>สมัครผ่านระบบ job2ezy</span>
                    <? }?> 
                       </p>
                    </div>
			    			<div class="form-group">
						
						<span id="error_military" class="text-danger"></span>
					</div>
                    <div align="center">
					<? if($_SESSION['m_username']!=''){ ?>
					<button id="submit" type="submit" value="submit" class="btn btn-success center">สมัครงาน</button>
                    <? }else{?>
          			<button type="button" class="btn btn-warning btn-lg active" disabled>กรุณาลงทะเบียนสมาชิก</button>
          			<? }?>                    
					</div>
                    <br>
				</form>
           
         
          
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