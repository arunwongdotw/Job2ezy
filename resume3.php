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
	
	/*$sql_type2 = "select * from type";
 	$query_type2 = mysql_query($sql_type2);

 	$sql_type3 = "select * from type";
 	$query_type3 = mysql_query($sql_type3);	*/
	

	$sql_typeb = "select * from  type_business";
 	$query_typeb = mysql_query($sql_typeb);
	
	$sql_list = "select * from info2 where username = '$username'";
 	$query_list = mysql_query($sql_list);
	$count = mysql_num_rows($query_list);
	
	//----------------------------------------------
	$position1 = $_POST['position1'];
	$type_id = $_POST['type_id'];
	$salary = $_POST['salary'];
	$province = $_POST['province'];
	$datetime = date("Y-m-d H:i:s");
	$info2_id = $_POST['info2_id'];	
if($_REQUEST['action']=='insert') {
	$sql1 = "insert into info2 (position1,type_id,salary,PROVINCE_ID,datetime,username) values('$position1','$type_id','$salary','$province','$datetime','$username')";	
	$query = mysql_query($sql1);
	
		if($query)
		{
			?>
			<script>
			alert("บันทึกลักษณะงานที่สนใจเรียบร้อย");
            window.location="resume3.php";
            </script>
		
			<?
		}
}
	if($_REQUEST['action']=='update'){
 		$sql2 = "update info2 set position1='$position1',type_id='$type_id',salary='$salary',PROVINCE_ID ='$province',datetime='$datetime' where info2_id = '$info2_id'";	
		$query2 = mysql_query($sql2);		
		if($query2)
		{
			?>
			<script>
			alert("อัพเดทลักษณะงานที่สนใจเรียบร้อย");
            window.location="resume3.php";
            </script>		
			<?
		}
	}
	 if($_REQUEST['action']=='delete'){
   		$info2_id = $_REQUEST['info2_id'];
   		$sql_delete = "delete from info2 where info2_id = '$info2_id' and username = '$username'";
 		$query_delete = mysql_query($sql_delete); 
	?><script> window.location="resume3.php"; </script><?
   }
//---------------------------------------------
	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ลักษณะงาน</title>
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
		    <p>บันทึกข้อมูลลักษณะงานที่ต้องการ</p>
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
				$resume = "resume3";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ลักษณะงาน
			</div>
			<div class="panel-body">
			
			<!-------------------------   edit   ------------------------------>
            <? 
			if($_REQUEST['action']=='edit'){
				$info2_id = $_REQUEST['info2_id'];
 				$sql4 = "select * from info2 i2,province p,type t where i2.username = '$username' and i2.PROVINCE_ID = p.PROVINCE_ID and i2.type_id = t.type_id and info2_id = '$info2_id'";
 				$query4 = mysql_query($sql4);
				$result4 = mysql_fetch_array($query4);
			?>
				<form name="myform" action="resume3.php?action=update" method="post">
					<input name="info2_id" type="hidden" value="<? echo $info2_id;?>">
					<div class="form-group">
						<label for="status">ประเภทงานที่สนใจ * </label>
						<br>
						<select class="form-control" name="type_id">
							<option value="">ทุกประเภท</option>
                          	<? while($result_type = mysql_fetch_array($query_type)){?>
                                <option value="<? echo $result_type['type_id'];?>" <? if($result_type['type_id']==$result4['type_id']){ echo "selected";}?>><? echo $result_type['type_name'];?></option>
                            <? }?>

              			 </select>                        
						<span id="error_type_id" class="text-danger"></span>
					</div>

				<div class="form-group">
						<label for="Position">ตำแหน่งที่สนใจ *</label>
						<input id="position" name="position1" class="form-control" type="text" value="<? echo $result4['position1'];?>">
						<span id="error_Position" class="text-danger"></span>
					</div>

				<div class="form-group">
							<label for="Salary">เงินเดือนที่ต้องการ</label>
                            <input id="salary" name="salary" class="form-control" type="text" value="<? echo $result4['salary'];?>">                          
                            </div> 
                            
                            
               <div class="form-group">
							<label for="Salary">สถานที่</label>
                            <select class="form-control" name="province">
                                        <option value="">-- ทุกจังหวัด --</option>
                                        <? while($result_pro2 = mysql_fetch_array($query_pro2)){?>
                                        <option value="<? echo $result_pro2['PROVINCE_ID'];?>" <? if($result_pro2['PROVINCE_ID']==$result4['PROVINCE_ID']){ echo 'selected';}?>><? echo $result_pro2['PROVINCE_NAME'];?></option>
                                        <? }?>
                           </select>                           
              </div>
              <br>
					
					<div class="clearfix"> </div>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">อัพเดทข้อมูล</button>
                    <a href="resume3.php"><button type="button" class="btn btn-primary center">ยกเลิก</button></a>
			
				</form>
                <? }?>
			<!------------------------- insert ------------------------------>
			<? if($count<3 and $_REQUEST['action']!='edit'){?>
				<form name="myform" action="resume3.php?action=insert" method="post">
					
					<div class="form-group">
						<label for="status">ประเภทงานที่สนใจ * </label>
						<br>
						<select class="form-control" name="type_id">
							<option value="">ทุกประเภท</option>
                          	<? while($result_type = mysql_fetch_array($query_type)){?>
                                <option value="<? echo $result_type['type_id'];?>"><? echo $result_type['type_name'];?></option>
                            <? }?>

              			 </select>                        
						<span id="error_type_id" class="text-danger"></span>
					</div>

				<div class="form-group">
						<label for="Position">ตำแหน่งที่สนใจ *</label>
						<input id="position" name="position1" class="form-control" type="text" placeholder="ตำแหน่งที่สนใจ">
						<span id="error_Position" class="text-danger"></span>
					</div>

				<div class="form-group">
							<label for="Salary">เงินเดือนที่ต้องการ</label>
                            <input id="salary" name="salary" class="form-control" type="text" placeholder="เงินเดือนที่ต้องการ">                          
                            </div> 
                            
                            
               <div class="form-group">
							<label for="Salary">สถานที่</label>
                            <select class="form-control" name="province">
                                        <option value="">-- ทุกจังหวัด --</option>
                                        <? while($result_pro2 = mysql_fetch_array($query_pro2)){?>
                                        <option value="<? echo $result_pro2['PROVINCE_ID'];?>"><? echo $result_pro2['PROVINCE_NAME'];?></option>
                                        <? }?>
                           </select>                           
              </div>
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
		$sql3 = "select * from info2 i2,province p,type t where i2.username = '$username' and i2.PROVINCE_ID = p.PROVINCE_ID and i2.type_id = t.type_id";
 		$query3 = mysql_query($sql3);		
		$i=0;
		if($_REQUEST['action']!='edit'){
		while($result3 = mysql_fetch_array($query3)){
			$i++;
			?>
        <hr>    
        <div class="alert alert-success">
  		<strong><? echo $i.". ตำแหน่ง : ".$result3['position1'];?></strong>
        <br>ประเภท : <? echo $result3['type_name'];?>
        <br>เงินเดือน : <? echo $result3['salary'];?>
        <br>สถานที่ : <? echo $result3['PROVINCE_NAME'];?>
        <br>
        <a href="resume3.php?action=edit&info2_id=<? echo $result3['info2_id'];?>"> <button type="button" class="class="btn btn-primary btn-sm"">แก้ไข</button></a>
        
        <a href="resume3.php?action=delete&info2_id=<? echo $result3['info2_id'];?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" ><button type="button" class="btn btn-primary btn-sm">ลบ</button></a>
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