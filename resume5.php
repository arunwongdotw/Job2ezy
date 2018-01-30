<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";
	$sql_pro2 = "select * from province order by PROVINCE_NAME";
 	$query_pro2 = mysql_query($sql_pro2);
	
 	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);


//----------------------------------------------
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$namebusiness = $_POST['namebusiness'];
	$contact = $_POST['contact'];
	$position = $_POST['position'];
	$salary4 = $_POST['salary4'];
	$description = $_POST['description'];	
	$datetime = date("Y-m-d H:i:s");
		
if($_REQUEST['action']=='insert') {
	$sql1 = "insert into info4 (startdate,enddate,namebusiness,contact,position,salary4,description,datetime,username) values('$startdate','$enddate','$namebusiness','$contact','$position','$salary4','$description','$datetime','$username')";	
	$query = mysql_query($sql1);
	
		if($query)
		{
			?>
			<script>
			alert("บันทึกประวัติการทำงานเรียบร้อย");
            window.location="resume5.php";
            </script>
		
			<?
		}
}

	if($_REQUEST['action']=='update'){
		$info4_id = $_POST['info4_id'];
 		echo $sql2 = "update info4 set startdate='$startdate',enddate='$enddate',namebusiness='$namebusiness',contact ='$contact',position ='$position',salary4 ='$salary4',description='$description',datetime='$datetime' where info4_id = '$info4_id'";	
		$query2 = mysql_query($sql2);		
		if($query2)
		{
			?>
			<script>
			alert("อัพเดทประวัติการทำงานเรียบร้อย");
            window.location="resume5.php";
            </script>	
			<?
		}
	}
	 if($_REQUEST['action']=='delete'){
   		$info4_id = $_REQUEST['info4_id'];
   		$sql_delete = "delete from info4 where info4_id = '$info4_id' and username = '$username'";
 		$query_delete = mysql_query($sql_delete); 
	?><script> window.location="resume5.php"; </script><?
   }	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ประวัติการทำงาน</title>
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
		    <p>บันทึกข้อมูลประวัติการทำงาน</p>
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
				$resume = "resume5";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ประวัติการทำงาน
			</div>
			<div class="panel-body">
			
			<!-------------------------   edit   ------------------------------>
           <? 
			if($_REQUEST['action']=='edit'){
				$info4_id = $_REQUEST['info4_id'];
 				$sql4 = "select * from info4 where username = '$username' and info4_id = '$info4_id'";
 				$query4 = mysql_query($sql4);
				$result4 = mysql_fetch_array($query4);
			?>
				<form action="resume5.php?action=update" method="post">
					<input name="info4_id" type="hidden" value="<? echo $info4_id;?>">
					  					
						<p>เริ่มต้น</p>
						<input name="startdate" class="form-control" type="date" value="<? echo $result4['startdate'];?>">
                        <p>สิ้นสุด</p>
						<input name="enddate" class="form-control" type="date" value="<? echo $result4['enddate'];?>">
			    		<p>บริษัท</p>
			    		<input name="namebusiness" class="form-control" type="text" value="<? echo $result4['namebusiness'];?>">
			    		<p>ที่อยู่บริษัท</p>
			    		<textarea name="contact" class="form-control" type="text"> <? echo $result4['contact'];?></textarea>
			    		<p>ตำแหน่ง</p>
			    		<input name="position" class="form-control" type="text" value="<? echo $result4['position'];?>">
			    		<p>เงินเดือน (บาท)</p>
			    		<input name="salary4" class="form-control" type="text" value="<? echo $result4['salary4'];?>">
			    		<p>ลักษณะงานที่ทำ</p>
			    		<textarea name="description" class="form-control" type="text"><? echo $result4['description'];?></textarea>
					<div class="clearfix"> </div><br>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">อัพเดทข้อมูล</button>
                    <a href="resume5.php"><button type="button" class="btn btn-primary center">ยกเลิก</button></a>
			
				</form>
                <? }?>
			<!------------------------- insert ------------------------------>
            <? if($count<3 and $_REQUEST['action']!='edit'){?>
			<form name="myform" action="resume5.php?action=insert" method="post">
						<p>เริ่มต้น</p>
						<input name="startdate" class="form-control" type="date">
                        <p>สิ้นสุด</p>
						<input name="enddate" class="form-control" type="date">
			    		<p>บริษัท</p>
			    		<input name="namebusiness" class="form-control" type="text" placeholder="ชื่อบริษัท">
			    		<p>ที่อยู่บริษัท</p>
			    		<textarea name="contact" class="form-control" type="text" placeholder="ที่อยู่บริษัท" style="resize: vertical;"></textarea>
			    		<p>ตำแหน่ง</p>
			    		<input name="position" class="form-control" type="text" placeholder="ตำแหน่ง">
			    		<p>เงินเดือน (บาท)</p>
			    		<input name="salary4" class="form-control" type="text" placeholder="เงินเดือน">
			    		<p>ลักษณะงานที่ทำ</p>
			    		<textarea name="description" class="form-control" type="text" placeholder="ลักษณะงานที่ทำ" style="resize: vertical;"></textarea>
					<div class="clearfix"> </div><br>
					<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            </div>
        </div>
			</form>
            <? }?>
            <? 
		$sql3 = "select * from info4 where username = '$username'";
 		$query3 = mysql_query($sql3);		
		$i=0;
		if($_REQUEST['action']!='edit'){
		while($result3 = mysql_fetch_array($query3)){
			$i++;
			?>
        <hr>    
        <div class="alert alert-success">
  		<strong><? echo $i.". บริษัท : ".$result3['namebusiness'];?></strong>
        <br>ที่อยู่บริษัท : <? echo $result3['contact'];?>
        <br>เริ่มต้น : <? echo $result3['startdate'];?>
        <br>สิ้นสุด : <? echo $result3['enddate'];?>
        <br>ตำแหน่ง : <? echo $result3['position'];?>
        <br>เงินเดือน : <? echo $result3['salary4'];?>
        <br>ลักษณะงานที่ทำ : <? echo $result3['description'];?>
        <br>
        <a href="resume5.php?action=edit&info4_id=<? echo $result3['info4_id'];?>"> <button type="button" class="btn-primary btn-sm">แก้ไข</button></a>
        
        <a href="resume5.php?action=delete&info4_id=<? echo $result3['info4_id'];?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" ><button type="button" class="btn-primary btn-sm" >ลบ</button></a>
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