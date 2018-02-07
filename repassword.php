<?
session_save_path("./session/");
session_start();
$m_username = $_SESSION['m_username'];

include "connect.php";
if($_REQUEST['action']=='check'){
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$password3 = $_POST['password3'];
	
	$sql1 = "SELECT * FROM member where m_username = '$m_username' and m_password = '$password1'";
	$query1 = mysql_query($sql1);
	$count1 = mysql_num_rows($query1);
	$result1 = mysql_fetch_array($query1);
	if($count1>0 and $password2==$password3){
		
		$sql2 = "update member set m_password = '$password2' where m_username = '$m_username'";
		mysql_query($sql2); 
		?><script>
		alert("แก้ไขรหัสผ่านเรียบร้อย");
		window.location="job_list.php";
        </script><?
		}else{ 
			?><script>alert("รหัสผ่านเดิมหรือรหัสผ่านใหม่ไม่ถูกต้อง !!");</script><?
			}
	}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Seeking an Job Portal Category Flat Bootstrap Responsive Website Template | Location :: w3layouts</title>
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
	       	
			<!--<h1>รายการประกาศงาน</h1>-->

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">แก้ไขรหัสผ่าน</div>
			<div class="panel-body">								
            	
					<form action="repassword.php?action=check" method="post">
                    	<div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-key"></i></span>
                                <input type="password"  placeholder="รหัสผ่านเดิม" name="password1" class="form-control" required>                                
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-key"></i></span>
                                <input type="password" minlength="6" maxlength="12" placeholder="รหัสผ่านใหม่ 6-12 ตัวอักษร" name="password2" class="form-control" required>                                
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-key"></i></span>
                                <input type="password"  placeholder="ยืนยันรหัสผ่านใหม่" name="password3" class="form-control" required>                                
                            </div>
                        </div>						
						 <div class="login-btn" style="text-align: center;">
					   <input type="submit" value="ยืนยัน">
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