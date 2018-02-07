<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";
$sql_pro2 = "select * from province order by PROVINCE_NAME";
 $query_pro2 = mysql_query($sql_pro2);
	
 	$sql1 = "select * from edu";
 	$query1 = mysql_query($sql1);	


	$sql_typeb = "select * from  type_business";
 	$query_typeb = mysql_query($sql_typeb);
	
	$sql_list = "select * from post";
 	$query_list = mysql_query($sql_list);
	
	//----------------------------------------------
	$level = $_POST['level'];
	$school = $_POST['school'];
	$branch = $_POST['branch'];
	$edu = $_POST['edu'];
	$grade = $_POST['grade'];
	$year = $_POST['year'];	
	$datetime = date("Y-m-d H:i:s");
		
if($_REQUEST['action']=='insert') {
	$sql1 = "insert into info3 (level,school,branch,edu,grade,year,datetime,username) values('$level','$school','$branch','$edu','$grade','$year','$datetime','$username')";	
	$query = mysql_query($sql1);
	
		if($query)
		{
			?>
			<script>
			alert("บันทึกประวัติการศึกษาเรียบร้อย");
            window.location="resume4.php";
            </script>
		
			<?
		}
}

	if($_REQUEST['action']=='update'){
		$info3_id = $_POST['info3_id'];
 		echo $sql2 = "update info3 set level='$level',school='$school',branch='$branch',edu ='$edu',grade ='$grade',year ='$year',datetime='$datetime' where info3_id = '$info3_id'";	
		$query2 = mysql_query($sql2);		
		if($query2)
		{
			?>
			<script>
			alert("อัพเดทประวัติการศึกษาเรียบร้อย");
            window.location="resume4.php";
            </script>	
			<?
		}
	}
	 if($_REQUEST['action']=='delete'){
   		$info3_id = $_REQUEST['info3_id'];
   		$sql_delete = "delete from info3 where info3_id = '$info3_id' and username = '$username'";
 		$query_delete = mysql_query($sql_delete); 
	?><script> window.location="resume4.php"; </script><?
   }	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: การศึกษา</title>
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
		    <p>บันทึกข้อมูลประวัติการศึกษา</p>
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
				$resume = "resume4";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ประวัติการศึกษา
			</div>
			<div class="panel-body">
			
			<!-------------------------   edit   ------------------------------>
             <? 
			if($_REQUEST['action']=='edit'){
				$info3_id = $_REQUEST['info3_id'];
 				$sql4 = "select * from info3 i3,edu e where i3.username = '$username' and i3.level = e.edu_id and info3_id = '$info3_id'";
 				$query4 = mysql_query($sql4);
				$result4 = mysql_fetch_array($query4);
			?>
				<form name="myform" action="resume4.php?action=update" method="post">
					<input name="info3_id" type="hidden" value="<? echo $info3_id;?>">
					<div class="form-group">
						
						<p style="font-weight: bold;">ระดับการศึกษา</p>
						<select name="level" class="form-control">
							<option selected>-- ระดับการศึกษา --</option>
							<? while($result1 = mysql_fetch_array($query1)){?>
                                <option value="<? echo $result1['edu_id'];?>" <? if($result1['edu_id']==$result4['level']){ echo "selected";}?>><? echo $result1['edu_name'];?></option>
                            <? }?>
						</select>
                        <p style="font-weight: bold;">สถาบัน</p>
						<input name="school" class="form-control" type="text" value="<? echo $result4['school'];?>">					
						<p style="font-weight: bold;">สาขาวิชา</p>
						<input name="branch" class="form-control" type="text" value="<? echo $result4['branch'];?>">
						<p style="font-weight: bold;">วุฒิการศึกษา</p>
						<input name="edu" class="form-control" type="text" value="<? echo $result4['edu'];?>">						
						<p style="font-weight: bold;">เกรดเฉลี่ย (GPA.)</p>
						<input name="grade" class="form-control" type="text" value="<? echo $result4['grade'];?>">
                        <p style="font-weight: bold;">ปีที่จบ</p>
						<input name="year" class="form-control" type="month" value="<? echo $result4['year'];?>">
					</div>				   
					<div class="clearfix"> </div>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">อัพเดทข้อมูล</button>
                    <a href="resume4.php"><button type="button" class="btn btn-primary center">ยกเลิก</button></a>
			
				</form>
                <? }?>
			<!------------------------- insert ------------------------------>
            <? if($count<3 and $_REQUEST['action']!='edit'){?>
			<form name="myform" action="resume4.php?action=insert" method="post">
           
					<div class="form-group">
						
						<p style="font-weight: bold;">ระดับการศึกษา</p>
						<select name="level" class="form-control">
							<option selected>-- ระดับการศึกษา --</option>
							<? while($result1 = mysql_fetch_array($query1)){?>
                                <option value="<? echo $result1['edu_id'];?>"><? echo $result1['edu_name'];?></option>
                            <? }?>
						</select>
                        <p style="font-weight: bold;">สถาบัน</p>
						<input name="school" class="form-control" type="text" placeholder="สถาบัน">					
						<p style="font-weight: bold;">สาขาวิชา</p>
						<input name="branch" class="form-control" type="text" placeholder="สาขาวิชา">
						<p style="font-weight: bold;">วุฒิการศึกษา</p>
						<input name="edu" class="form-control" type="text" placeholder="วุฒิการศึกษา">						
						<p style="font-weight: bold;">เกรดเฉลี่ย (GPA.)</p>
						<input name="grade" class="form-control" type="text" placeholder="เกรดเฉลี่ย (GPA.)">
                        <p style="font-weight: bold;">ปีที่จบ</p>
						<input name="year" class="form-control" type="month">
					</div>				   
					<div class="clearfix"> </div>
					<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            </div>
        </div>
			</form>
        	<? }?>
         <? 
		$sql3 = "select * from info3 i3,edu e where i3.username = '$username' and i3.level = e.edu_id";
 		$query3 = mysql_query($sql3);		
		$i=0;
		if($_REQUEST['action']!='edit'){
		while($result3 = mysql_fetch_array($query3)){
			$i++;
			?>
        <hr>    
        <div class="alert alert-success">
  		<strong><? echo $i.". ระดับ : ".$result3['edu_name'];?></strong>
        <br>สถาบัน : <? echo $result3['school'];?>
        <br>สาขาวิชา : <? echo $result3['branch'];?>
        <br>วุฒิการศึกษา : <? echo $result3['edu_name'];?>
        <br>เกรดเฉลี่ย : <? echo $result3['grade'];?>
        <br>
        <a href="resume4.php?action=edit&info3_id=<? echo $result3['info3_id'];?>"> <button type="button" class="btn btn-primary btn-sm">แก้ไข</button></a>
        
        <a href="resume4.php?action=delete&info3_id=<? echo $result3['info3_id'];?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" ><button type="button" class="btn btn-primary btn-sm" >ลบ</button></a>
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