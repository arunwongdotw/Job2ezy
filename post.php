<?
session_save_path("./session/");
session_start();
$b_username = $_SESSION['b_username'];
//$username = "admin";
include "connect.php";
include "fchangdate.php";
function getAge($birthday) {
$then = strtotime($birthday);
return(floor((time()-$then)/31556926));
}
	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);
	
	$sql_pro = "select * from province order by PROVINCE_NAME";
 	$query_pro = mysql_query($sql_pro);

if($_REQUEST['action']=='insert') {
	$position = $_POST['position'];
	$type_id = $_POST['type'];
	$province = $_POST['province'];
	$amount = $_POST['amount'];
	$salary = $_POST['salary'];
	$property1 = $_POST['property1'];
	$property2 = $_POST['property2'];
	$property3 = $_POST['property3'];
	$property4 = $_POST['property4'];
	$property5 = $_POST['property5'];
	$property6 = $_POST['property6'];
	$feature = $_POST['feature'];
	$remark = $_POST['remark'];
	$copy1 = $_POST['copy1'];
	$copy2 = $_POST['copy2'];
	$copy3 = $_POST['copy3'];
	$copy4 = $_POST['copy4'];	
	$day = date("Y-m-d");	
	
	$sql = "insert into post values('','$position','$type_id','$province','$amount','$salary','$property1','$property2','$property3','$property4','$property5','$property6','$feature','$remark','$send','$day','$copy1','$copy2','$copy3','$copy4','$b_username')";
	$query = mysql_query($sql);
	
		if($query)
		{
			?><script>window.location="post_list.php";</script><?
		}
}	

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
	       	
			<h1>ลงประกาศงาน</h1>

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ข้อมูลบริษัท

			</div>
			<div class="panel-body">
				<form name="myform" action="post.php?action=insert" method="post">
					<div class="form-group">
						<label for="myName">ตำแหน่งงาน *</label>
                        <input id="position" name="position" class="form-control" type="text" placeholder="ชื่อตำแหน่งงาน">
					</div>
					<div class="form-group">
						<label for="gender">ประเภทงาน *</label>
						<select name="type" id="type" class="form-control">
						<option value="">ทุกประเภท</option>
                                        <? while($result_type = mysql_fetch_array($query_type)){?>
                                        <option value="<? echo $result_type['type_id'];?>"><? echo $result_type['type_name'];?></option>
                                        <? }?>
                        </select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="status">สถานที่ปฏิบัติงาน  *</label>
						<select name="province" id="province" class="form-control">
						<option value="">ทุกจังหวัด</option>
                            <? while($result_pro = mysql_fetch_array($query_pro)){?>
                            <option value="<? echo $result_pro['PROVINCE_ID'];?>"><? echo $result_pro['PROVINCE_NAME'];?></option>
                            <? }?>
                        </select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="nationality">อัตรา *</label>
						<input id="amount" name="amount" class="form-control" type="text" placeholder="จำนวนที่รับ">
						<span id="error_nationality" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="nationality">เงินเดือน *</label>
						<input id="salary" name="salary" class="form-control" type="text" placeholder="ระบุเงินเดือน">
						<span id="error_nationality" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="nationality">คุณสมบัติ *</label>
						<input id="property1" name="property1" class="form-control" type="text" placeholder="คุณสมบัติข้อที่ 1">
                        <input id="property2" name="property2" class="form-control" type="text" placeholder="คุณสมบัติข้อที่ 2">
                        <input id="property3" name="property3" class="form-control" type="text" placeholder="คุณสมบัติข้อที่ 3">
                        <input id="property4" name="property4" class="form-control" type="text" placeholder="คุณสมบัติข้อที่ 1">
                        <input id="property5" name="property5" class="form-control" type="text" placeholder="คุณสมบัติข้อที่ 2">
                        <input id="property6" name="property6" class="form-control" type="text" placeholder="คุณสมบัติข้อที่ 3">
						<span id="error_nationality" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="nationality">ลักษณะงาน *</label>
						<textarea name="feature" class="form-control" placeholder="ลักษณะงาน" style="resize: vertical;"></textarea> 
						<span id="error_nationality" class="text-danger"></span>
					</div>
                    
                    <div class="form-group">
						<label for="nationality">หมายเหตุ *</label>
						<input id="remark" name="remark" class="form-control" type="text" placeholder="เงื่อนไขหรือข้อมูลเพิ่มเติม">
						<span id="error_nationality" class="text-danger"></span>
					</div>                    
                    <div class="form-group">
                    	<input type="checkbox" id="copy1" name="copy1" <? //if($result_edit['copy1']=='on'){ echo "checked";}?>><label for="copy1">สมัครด้วยตนเอง</label>
                        <input type="checkbox" id="copy2" name="copy2" <? //if($result_edit['copy2']=='on'){ echo "checked";}?>><label for="copy2">ส่งอีเมล์</label>
                        <input type="checkbox" id="copy3" name="copy3" <? //if($result_edit['copy3']=='on'){ echo "checked";}?>><label for="copy3">ส่งไปรษณีย์</label>
                        <input type="checkbox" id="copy4" name="copy4" <? //if($result_edit['copy4']=='on'){ echo "checked";}?>><label for="copy4">สมัครผ่านระบบ job2u</label> 
                    </div>
			    			<div class="form-group">
						
						<span id="error_military" class="text-danger"></span>
					</div>
					
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">ประกาศ</button>
			
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