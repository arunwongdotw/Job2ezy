<?
session_save_path("./session/");
session_start();

include "connect.php";
if($_REQUEST['action']=='insert'){
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$date = date("Y-m-d H:i:s");
	
	$sql1 = "SELECT * FROM member where m_username = '$username'";
	$query1 = mysql_query($sql1);
	$count1 = mysql_num_rows($query1);
	$result1 = mysql_fetch_array($query1);
	if($count1<1 and $password1==$password2){
		$sql2="insert into member values('','$username','$password1','$date')";
		$query2 = mysql_query($sql2);
		
		$sql3 = "SELECT * FROM member where m_username = '$username' and m_password = '$password1'";
		$query3 = mysql_query($sql3);
		$result3 = mysql_fetch_array($query3);
		$_SESSION['m_username']= $result3['m_username'];
  		session_register("m_username");
		?><script>window.location="index.php";</script><?
		}else{ 
			 ?><script>alert('username or password incorrect!!'); window.location="register.php";</script><?
			}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | ลงทะเบียน :: สมัครงาน</title>
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
	   <div class="form-container">
        <h2>ลงทะเบียนผู้สมัครงาน</h2>
        <form action="register.php?action=insert" method="post">
          <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="firstName">Username</label>
                <div class="col-md-9">
                    <input type="text" minlength="6" maxlength="12" placeholder="Username 6-12 characters" name="username"  class="form-control input-sm" required>
                </div>
            </div>
         </div>
         <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="lastName">Password</label>
                <div class="col-md-9">
                    <input type="password" minlength="6" maxlength="12" class="form-control input-sm" placeholder="Password 6-12 characters" name="password1" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="lastName">Confirm Password </label>
                <div class="col-md-9">
                    <input type="password" class="form-control input-sm"  placeholder="Confirm Password" name="password2" required>
                </div>
            </div>
        </div>
        
        <div class="login-btn" style="text-align: center;">
                       <input type="submit" value="สมัครสมาชิก" class="btn btn-primary btn-sm">
                       <div class="login-bottom">
                        <div class="button">
                        </div>
                        <h4>เป็นสมาชิกอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></h4>
                     
                   </div>
                    </div>
       
        <!-- <div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="สมัครสมาชิก" class="btn btn-primary btn-sm">
            </div>
        </div> -->
    </form>
    <!-- <p>เป็นสมาชิกอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p> -->
    </div>
 </div>
</div>
<? include "footer.php";?>
</body>
</html>	