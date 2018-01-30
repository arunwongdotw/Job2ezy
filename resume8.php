<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";
$sql_pro2 = "select * from province order by PROVINCE_NAME";
 $query_pro2 = mysql_query($sql_pro2);
	
//----------------------------------------------	
	$project = $_POST['project'];
	$senior = $_POST['senior'];	
	$date = date("Y-m-d H:i:s");
		
if($_REQUEST['action']=='insert') {
	$sql1 = "insert into info7 (project,senior,date,username) values('$project','$senior','$date','$username')";	
	$query = mysql_query($sql1);	
		if($query)
		{
			?>
			<script>
			alert("บันทึกผลงานเรียบร้อย");
            window.location="resume8.php";
            </script>
		
			<?
		}
}

	if($_REQUEST['action']=='update'){
		$info7_id = $_POST['info7_id'];
 		$sql2 = "update info7 set project='$project',senior='$senior',date='$date' where info7_id = '$info7_id'";	
		$query2 = mysql_query($sql2);		
		if($query2)
		{
			?>
			<script>
			alert("อัพเดทผลงานเรียบร้อย");
            window.location="resume8.php";
            </script>	
			<?
		}
	}
	 if($_REQUEST['action']=='delete'){
   		$info7_id = $_REQUEST['info7_id'];
   		$sql_delete = "delete from info7 where info7_id = '$info7_id' and username = '$username'";
 		$query_delete = mysql_query($sql_delete); 
	?><script> window.location="resume8.php"; </script><?
   }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ผลงาน</title>
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
		    <p>บันทึกข้อมูลผลงานต่างๆ</p>
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
				$resume = "resume8";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">โครงการ / ผลงาน / เกียรติประวัติ / บุคคลอ้างอิง
			</div>
			<div class="panel-body">
			
			<!-------------------------   edit   ------------------------------>
           <? 
			if($_REQUEST['action']=='edit'){
				$info7_id = $_REQUEST['info7_id'];
 				$sql4 = "select * from info7 where username = '$username' and info7_id = '$info7_id'";
 				$query4 = mysql_query($sql4);
				$result4 = mysql_fetch_array($query4);
			?>
				<form name="myform" action="resume8.php?action=update" method="post">
					<input name="info7_id" type="hidden" value="<? echo $info7_id;?>">					
						<p>โครงการ/ผลงาน</p>
						<textarea name="project" class="form-control" type="text" style="resize: vertical;"><? echo $result4['project'];?></textarea>
                        <p>บุคคลอ้างอิง</p>
						<input name="senior" class="form-control" type="text" value="<? echo $result4['senior'];?>">			    		
					<div class="clearfix"> </div><br>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">อัพเดทข้อมูล</button>
                    <a href="resume8.php"><button type="button" class="btn btn-primary center">ยกเลิก</button></a>
			
				</form>
                <? }?>
			<!------------------------- insert ------------------------------>
            <? if($count<3 and $_REQUEST['action']!='edit'){?>
				<form name="myform" action="resume8.php?action=insert" method="post">					
					<label for="dob">โครงการ/ผลงาน</label>
						<textarea name="project" class="form-control" type="text" placeholder="ชื่อโครงการ/ผลงาน" style="resize: vertical;"></textarea>
			    		<p>บุคคลอ้างอิง</p>
			    		<input name="senior" class="form-control" type="text">		    		
					<br>
					<div class="clearfix"> </div>
					<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            </div>
        </div>
				</form>
 <? }?>
        <? 
		$sql3 = "select * from info7 where username = '$username'";
 		$query3 = mysql_query($sql3);		
		$i=0;
		if($_REQUEST['action']!='edit'){
		while($result3 = mysql_fetch_array($query3)){
			$i++;
			?>
        <hr>    
        <div class="alert alert-success">
  		<strong><? echo $i.". โครงการ/ผลงาน : ".$result3['project'];?></strong>
        <br>โครงการ/ผลงาน : <? echo $result3['senior'];?>        
        <br>
	<div class="row">
            <div class="form-actions floatRight">
                <a href="resume8.php?action=edit&info7_id=<? echo $result3['info7_id'];?>"> <input type="submit" value="แก้ไข" class="btn btn-primary btn-sm"></a>
                <a href="resume8.php?action=delete&info7_id=<? echo $result3['info7_id'];?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" ><input type="submit" value="ลบ" class="btn btn-primary btn-sm"></a>
            </div>
        </div>

        
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