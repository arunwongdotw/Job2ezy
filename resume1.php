<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";

	$sql3 = "select * from info1 where username='$username'";
	$query3 = mysql_query($sql3);	
	$count = mysql_num_rows($query3);
	$result3 = mysql_fetch_array($query3);
	
if($_REQUEST['action']=='insert') {
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$sex = $_POST['sex'];
	
	$h = $_POST['h'];
	$w = $_POST['w'];
	$nation = $_POST['nation'];
	$religion = $_POST['religion'];
	$status1 = $_POST['status1'];	
	$seller = $_POST['seller'];	
	$datetime = date("Y-m-d");	
	
	$sql1 = "insert into info1 (username,name,birthday,sex,h,w,nation,religion,status,seller,datetime) values('$username','$name','$birthday','$sex','$h','$w','$nation','$religion','$status1','$seller','$datetime')";
	//$query1 = mysql_query($sql1);
	
	$sql2 = "update info1 set
			name='$name',birthday='$birthday',sex='$sex',h ='$h',w ='$w',nation ='$nation',religion ='$religion',seller='$seller' where username = '$username'";
			
	
 	
	if($count<1){
 		$query = mysql_query($sql1);
	}else{
		$query = mysql_query($sql2);
	}
		if($query)
		{
			?>
			<script>
			alert("บันทึกข้อมูลเรียบร้อย");
            window.location="resume1.php";
            </script>
			
			<?
		}
}	
//---------------------------------------------


?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ข้อมูลส่วนตัว</title>
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
		    <p>บันทึกข้อมูลส่วนตัว
			 <!--<input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
			 <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
             -->
			</p>
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
				$resume = "resume1";
			?>
			<? include "menu_resume.php";?>

		<div class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ข้อมูลส่วนตัว

			</div>
			<div class="panel-body">
				<form name="myform" action="resume1.php?action=insert" method="post">
					<div class="form-group">
						<label for="myName">ชื่อ-นามสกุล *</label>
						<input id="name" name="name" class="form-control" type="text" data-validation="required" value="<? echo $result3['name'];?>">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="gender">เพศ *</label>
						<select name="sex" id="sex" class="form-control">
							<option selected>หญิง</option>
							<option>ชาย</option>
						</select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="status">สถานภาพ *</label>
						<select name="status1" id="status1" class="form-control">
							<option selected>โสด</option>
							<option>สมรส</option>
							<option>หย่า</option>
							<option>หม้าย</option>
						</select>
						<span id="error_status" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="nationality">สัญชาติ  *</label>
						<input id="nation" name="nation" class="form-control" type="text" value="<? echo $result3['nation'];?>">
						<span id="error_nationality" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="cult">ศาสนา  *</label>
						<input id="religion" name="religion" class="form-control" type="text" value="<? echo $result3['religion'];?>">
						<span id="error_cult" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="dob">วัน-เดือน-ปี เกิด  *</label>
						<input type="date" name="birthday" id="dob" class="form-control" value="<? echo $result3['birthday'];?>">
						<span id="error_dob" class="text-danger"></span>
					</div>
					
						<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="dob">ส่วนสูง  *</label>
			                <input type="text" name="h" id="h" class="form-control input-sm" value="<? echo $result3['h'];?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="dob">น้ำหนัก *</label>
			    						<input type="text" name="w" id="w" class="form-control input-sm"  value="<? echo $result3['w'];?>">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
						<label for="military">สถานภาพทางทหาร  *</label>
						<input id="seller" name="seller" class="form-control" type="text" value="<? echo $result3['seller'];?>">
						<span id="error_military" class="text-danger"></span>
					</div>
					
					<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            </div>
        </div>
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