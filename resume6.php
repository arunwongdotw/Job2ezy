<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";

//----------------------------------------------
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$place = $_POST['place'];
	$corse = $_POST['corse'];	
	$datetime = date("Y-m-d H:i:s");
		
if($_REQUEST['action']=='insert') {
	$sql1 = "insert into info5 (startdate,enddate,place,corse,datetime,username) values('$startdate','$enddate','$place','$corse','$datetime','$username')";	
	$query = mysql_query($sql1);
	
		if($query)
		{
			?>
			<script>
			alert("บันทึกประวัติการฝึกอบรมเรียบร้อย");
            window.location="resume6.php";
            </script>
		
			<?
		}
}

	if($_REQUEST['action']=='update'){
		$info5_id = $_POST['info5_id'];
 		echo $sql2 = "update info5 set startdate='$startdate',enddate='$enddate',place='$place',corse ='$corse',datetime='$datetime' where info5_id = '$info5_id'";	
		$query2 = mysql_query($sql2);		
		if($query2)
		{
			?>
			<script>
			alert("อัพเดทประวัติการฝึกอบรมเรียบร้อย");
            window.location="resume6.php";
            </script>	
			<?
		}
	}
	 if($_REQUEST['action']=='delete'){
   		$info5_id = $_REQUEST['info5_id'];
   		$sql_delete = "delete from info5 where info5_id = '$info5_id' and username = '$username'";
 		$query_delete = mysql_query($sql_delete); 
	?><script> window.location="resume6.php"; </script><?
   }	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ประวัติการอบรม</title>
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
		    <h1>สร้างเรซูเม่</h1>
		    <p>บันทึกข้อมูลประวัติการอบรม</p>
           </div>
		</div>
   </div> 
</div>	
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
	       	<? 
				$resume = "resume6";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ประวัติการฝึกอบรม
			</div>
			<div class="panel-body">
			
			<!-------------------------   edit   ------------------------------>
            <? 
			if($_REQUEST['action']=='edit'){
				$info5_id = $_REQUEST['info5_id'];
 				$sql4 = "select * from info5 where username = '$username' and info5_id = '$info5_id'";
 				$query4 = mysql_query($sql4);
				$result4 = mysql_fetch_array($query4);
			?>
				<form name="myform" action="resume6.php?action=update" method="post">
					<input name="info5_id" type="hidden" value="<? echo $info5_id;?>">					
						<p style="font-weight: bold;">เริ่มต้น</p>
						<input name="startdate" class="form-control" type="date" value="<? echo $result4['startdate'];?>">
                        <p style="font-weight: bold;">สิ้นสุด</p>
						<input name="enddate" class="form-control" type="date" value="<? echo $result4['enddate'];?>">
			    		<p style="font-weight: bold;">สถาบัน</p>
			    		<input name="place" class="form-control" type="text" value="<? echo $result4['place'];?>">			    		
			    		<p style="font-weight: bold;">หลักสูตร</p>
			    		<input name="corse" class="form-control" type="text" value="<? echo $result4['corse'];?>">			    		
					<div class="clearfix"> </div><br>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">อัพเดทข้อมูล</button>
                    <a href="resume6.php"><button type="button" class="btn btn-primary center">ยกเลิก</button></a>
			
				</form>
                <? }?>
			<!------------------------- insert ------------------------------>
            <? if($count<3 and $_REQUEST['action']!='edit'){?>
			<form name="myform" action="resume6.php?action=insert" method="post">
						<p style="font-weight: bold;">เริ่มต้น</p>
						<input name="startdate" class="form-control" type="date">
                        <p style="font-weight: bold;">สิ้นสุด</p>
						<input name="enddate" class="form-control" type="date">
			    		<p style="font-weight: bold;">สถาบัน</p>
			    		<input name="place" class="form-control" type="text" placeholder="สถาบัน">			    		
			    		<p style="font-weight: bold;">หลักสูตร</p>
			    		<input name="corse" class="form-control" type="text" placeholder="หลักสูตร">			    		
					<div class="clearfix"> </div><br>
					<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            </div>
        </div>
			</form>
            <? }?>
            <? 
		$sql3 = "select * from info5 where username = '$username'";
 		$query3 = mysql_query($sql3);		
		$i=0;
		if($_REQUEST['action']!='edit'){
		while($result3 = mysql_fetch_array($query3)){
			$i++;
			?>
        <hr>    
        <div class="alert alert-success">
  		<strong><? echo $i.". สถาบัน : ".$result3['place'];?></strong>
        <br>หลักสูตร : <? echo $result3['corse'];?>
        <br>เริ่มต้น : <? echo $result3['startdate'];?>
        <br>สิ้นสุด : <? echo $result3['enddate'];?>       
        <br>
        <a href="resume6.php?action=edit&info5_id=<? echo $result3['info5_id'];?>"> <button type="button" class="btn-primary btn-sm">แก้ไข</button></a>        
        <a href="resume6.php?action=delete&info5_id=<? echo $result3['info5_id'];?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" ><button type="button" class="btn-primary btn-sm" >ลบ</button></a>
		</div>
		<? }?>
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