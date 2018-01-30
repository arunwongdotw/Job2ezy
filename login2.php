<?
session_save_path("./session/");
session_start();

include "connect.php";
if($_REQUEST['action']=='insert'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	echo $sql1 = "SELECT * FROM business where b_username = '$username' and b_password = '$password'";
	$query1 = mysql_query($sql1);
	$count1 = mysql_num_rows($query1);
	$result1 = mysql_fetch_array($query1);
	if($count1>0){
		
		$result1['b_username'];
		$_SESSION['b_username']= $result1['b_username'];
  		session_register("b_username");
		//$_SESSION['m_username']="";
		
		?><? if($package_ids!=0){?><script>window.location="search_member.php";</script><? }else{ ?><script>window.location="package.php";</script><? }?><?
		}else{ 
			?><script>alert("Username หรือ Password !!"); window.location="login2.php";</script><?
			}
	}
//-------------------- LOGOUT -------------------
if($_REQUEST['action']=='logout'){
//$_SESSION['b_username']=='';
//$_SESSION['username']=='';
session_destroy();
?>
<script>
alert('ออกจากระบบผู้ประกาศงานสำเร็จ');
window.location="index.php";
</script><?
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | Login :: ผู้ประกอบการ</title>
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
<!----font-Awesome----->
</head>
<body>
<!--
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""/></a>
	    </div>
	   
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs<b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="location.html">Contract Jobs</a></li>
			            <li><a href="location.html">Walkin Jobs</a></li>
			            <li><a href="location.html">Jobs by Location</a></li>
			            <li><a href="location.html">Jobs by Function</a></li>
			            <li><a href="location.html">Jobs by Industry</a></li>
			            <li><a href="location.html">Jobs by Company</a></li>
		            </ul>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a href="services.html">Action</a></li>
						            <li><a href="services.html">Another action</a></li>
						            <li><a href="services.html">Something else here</a></li>
						            <li class="divider"></li>
						            <li><a href="services.html">Separated link</a></li>
						            <li class="divider"></li>
						            <li><a href="services.html">One more separated link</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a href="services.html">Action</a></li>
						            <li><a href="services.html">Another action</a></li>
						            <li><a href="services.html">Something else here</a></li>
						            <li class="divider"></li>
						            <li><a href="services.html">Separated link</a></li>
						            <li class="divider"></li>
						            <li><a href="services.html">One more separated link</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a href="services.html">Action</a></li>
						            <li><a href="services.html">Another action</a></li>
						            <li><a href="services.html">Something else here</a></li>
						            <li class="divider"></li>
						            <li><a href="services.html">Separated link</a></li>
						            <li class="divider"></li>
						            <li><a href="services.html">One more separated link</a></li>
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recruiters<b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="login.html">Recruiter Updates</a></li>
			            <li><a href="recruiters.html">Recruiters you are following</a></li>
			            <li><a href="codes.html">Shortcodes</a></li>
		            </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More<b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="jobs.html">Walk-ins</a></li>
			            <li><a href="jobs.html">Bpo Jobs</a></li>
			            <li><a href="jobs.html">Teaching Jobs</a></li>
			            <li><a href="jobs.html">Diploma Jobs</a></li>
			            <li><a href="jobs.html">Tech Support</a></li>
			            <li><a href="jobs.html">Finance Jobs</a></li>
			            <li><a href="jobs.html">Part time Jobs</a></li>
			            <li><a href="jobs.html">Health Care</a></li>
			            <li><a href="jobs.html">Hospitality</a></li>
			            <li><a href="jobs.html">Internships</a></li>
			            <li><a href="jobs.html">Research Jobs</a></li>
			            <li><a href="jobs.html">Defence Jobs</a></li>
		            </ul>
		        </li>
		        <li><a href="login.html">Login</a></li>
		        <li><a href="resume.html">Upload Resume</a></li>
	        </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	   
	</nav>
-->	
<? include "topmenu.php";?>

<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
	      <div id="search_form" class="clearfix">
		               
             
			
           </div>
		</div>
   </div> 
</div>	
<div class="col-md-12">
  <marquee><font color="red" size="8em" face="AngsanaUPC">โฆษณาฟรี!! ค้นหาประวัติฟรี !! พร้อมรับของที่ระลึกสุดหรู **** ข้อมูลเพิ่มเติม ติดต่อฝ่ายบริการลูกค้า</font></marquee>  
</div>
<div class="container">
    <div class="single">  
	   <div class="col-md-4">
	   	  <div class="col_3">
	   	  	 <div class="jb-accordion-wrapper">
	   	  	<div class="jb-accordion-title">ผู้ประกาศงาน หรือบริษัท</div>
	   	  	<div class="panel-body">
	   	  	<ul class="list_1">
	   	  		<li><a ><span><i class="fa fa-user"></i></span> เข้าสู่ระบบผู้ประกอบการหรือผู้ประกาศงาน</a></li>
	   	  		<li><a ><span><i class="fa fa-key"></i></span> ด้วยชื่อผู้ใช้งาน และรหัสผ่าน</a></li>
	   	  		<li><a href="register2.php"><span><i class="fa fa-pencil-square-o"></i></span> สามารถลงทะเบียนเพื่อเข้าสู่ระบบได้</a></li>
	   	  								
	   	  	</ul>
	   	  </div></div>
	   	  </div>
          <!--
	   	  <div class="col_3">
	   	  	<h3>Jobs by Category</h3>
	   	  	<ul class="list_2">
	   	  		<li><a href="#">Railway Recruitment</a></li>
	   	  		<li><a href="#">Air Force Jobs</a></li>		
	   	  		<li><a href="#">Police Jobs</a></li>
	   	  		<li><a href="#">Intelligence Bureau Jobs</a></li>		
	   	  		<li><a href="#">Army Jobs</a></li>
	   	  		<li><a href="#">Navy Jobs</a></li>		
	   	  		<li><a href="#">BSNL Jobs</a></li>
	   	  		<li><a href="#">Software Jobs</a></li>	
	   	  		<li><a href="#">Research Jobs</a></li>								
	   	  	</ul>
	   	  </div>
	   	  <div class="widget">
	        <h3>Take The Seeking Poll!</h3>
    	        <div class="widget-content"> 
                 <div class="seeking-answer">
			    	<span class="seeking-answer-group">
		    			<span class="seeking-answer-input">
		    			   <input class="seeking-radiobutton" type="radio">
		    			</span>
		    			<label for="" class="seeking-input-label">
		    				<span class="seeking-answer-span">Frequently</span>
		    			</label>
		    		</span>
			    	<span class="seeking-answer-group">
		    			<span class="seeking-answer-input">
		    			   <input class="seeking-radiobutton" type="radio">
		    			</span>
		    			<label for="" class="seeking-input-label">
		    				<span class="seeking-answer-span">Interviewing</span>
		    			</label>
		    		</span>
			        <span class="seeking-answer-group">
		    			<span class="seeking-answer-input">
		    			   <input class="seeking-radiobutton" type="radio">
		    			</span>
		    			<label for="" class="seeking-input-label">
		    				<span class="seeking-answer-span">Leaving a familiar workplace</span>
		    			</label>
		    		</span>
		    		<div class="seeking_vote">
		    		  <a class="seeking-vote-button">Vote</a>
		    		</div>
			     </div>
    	       </div>
    	</div>
        -->
	 </div>
	 <div class="col-md-8 single_right">
	 	   <div class="login-form-section">
                <div class="login-content">
                    <form action="login2.php?action=insert" method="post">
                        <div class="section-title">
                            <h3>เข้าระบบผู้ประกาศงาน</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text"  placeholder="Username" name="username" class="form-control" required>						
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-key"></i></span>
                                <input type="password"  placeholder="Password" name="password" class="form-control" required>                                
                            </div>
                        </div>
                     
                     <!--
                     <div class="forgot">
						 <div class="login-check">
				 			<label class="checkbox1"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
				         </div>
				 		  <div class="login-para">
				 			<p><a href="#"> Forgot Password? </a></p>
				 		 </div>
					     <div class="clearfix"> </div>
			        </div>-->
					<div class="login-btn" style="text-align: center;">
					   <input type="submit" value="เข้าสู่ระบบ">
					   <div class="login-bottom">
						<div class="button">
						</div>
						<h4>ลงทะเบียนเป็นผู้ประกาศงานกับ JOB2EZY.COM<a href="register2.php"> ลงทะเบียนผู้ประกาศงาน</a></h4>
					 
		           </div>
					</div>

                    </form>
					

                    <!--
					<div class="login-bottom">
					 <p>With your social media account</p>
					 <div class="social-icons">
						<div class="button">
							<a class="tw" href="#"> <i class="fa fa-twitter tw2"> </i><span>Twitter</span>
							<div class="clearfix"> </div></a>
							<a class="fa" href="#"> <i class="fa fa-facebook tw2"> </i><span>Facebook</span>
							<div class="clearfix"> </div></a>
							<a class="go" href="#"><i class="fa fa-google-plus tw2"> </i><span>Google+</span>
							<div class="clearfix"> </div></a>
							<div class="clearfix"> </div>
						</div>
						<h4>หากยังไม่เป็นสมาชิก? <a href="register.html"> ลงทะเบียนที่นี่!</a></h4>
					 </div>
		           </div>
                   -->
                </div>
         </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>


<? include "footer.php";?>
</body>
</html>	