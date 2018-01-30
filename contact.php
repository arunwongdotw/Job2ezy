<?
session_save_path("./session/");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: ติดต่อเรา</title>
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
<? include "topmenu.php";?>
<div class="banner_1">
	<!--<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
		    <h1>Start your job search</h1>
		    <p>
			 <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
			 <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
			</p>
           </div>
		</div>
   </div> -->
</div>	
<div class="container">
    <div class="single">  
       <div class="box_1">
       	<h3>ติดต่อเรา</h3>


        <div class="col-md-6">
        	<div class="col_3">
	   	  	 <div class="jb-accordion-wrapper">
	   	  	<div class="jb-accordion-title">ติดต่อ</div>
	   	  	<div class="panel-body">
	   	  	<ul class="list_1">
	   	  		<form action="#" method="post">
          <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="firstName"></label>
                <div class="col-md-9">
                    <input type="hidden" name="action" value="submit">
                </div>
            </div>
         </div>
         <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="firstName">Username</label>
                <div class="col-md-9">
                    <input type="text" name="name" placeholder="" required class="form-control input-sm"/>
                </div>
            </div>
         </div>

         <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="firstName">E-mail</label>
                <div class="col-md-9">
                    <input type="email" name="email" placeholder="" required class="form-control input-sm"/>
                </div>
            </div>
         </div>

         <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="firstName">Message</label>
                <div class="col-md-9">
                    <textarea name="message" placeholder="" required class="form-control input-sm" style="resize: vertical;"> </textarea>
                </div>
            </div>
         </div>
         <div class="clearfix">  </div><br>
         <div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="ส่งข้อความ" class="btn btn-primary btn-sm">
            </div>
        </div>
        <?
			$strTo = "rujira5790@gmail.com";
			$strSubject = $_POST["message"];
			$strHeader = "Content-type: text/html; charset=windows-874\r\n"; // or UTF-8 //
			$strHeader .= "From: ".$_POST["name"]."<".$_POST["email"].">\r\nReply-To: ".$_POST["email"]."";
			$strMessage = nl2br($_POST["message"]);
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
			//if($flgSend){
			//echo "Email Sending.";
			//}else {
		    //  echo "Email Can Not Send.";
		  	//} ?>
     		</form>
	   	  		<div class="clearfix"> </div><br>
	   	  </div></div>
	   	  </div>
        </div>
        <div class="col-md-6 service_box1">

			<div class="col_3">
	   	  	 <div class="jb-accordion-wrapper">
	   	  	<div class="jb-accordion-title">ติดต่อ แนะนำ สอบถามบริการ</div>
	   	  	<div class="panel-body">
	   	  	<ul class="list_1">
	   	  		<li><h4 ><span><i class="fa fa-map-marker"></i></span>  Address</h4></li>
	   	  		<li><p style="font-size: 16px;"><span>22/14 หมู่ที่ 3 ถ.เอเชีย ต.นาเคียน อ.เมือง จ.นครศรีธรรมราช 80000</span></p></li>
	   	  		<li><h4><span><i class="fa fa-phone"></i></span>  Call Us</h4></li>
	   	  		<li><p style="font-size: 16px;"><span>075-419210, 081-893-1717</span></p></li>
	   	  		<li><h4><span><i class="fa fa-envelope"></i></span>  Email</h4></li>
	   	  		<li><a style="font-size: 16px" href="mailto:rujira5790@gmail.com"><span>rujira5790@gmail.com</span></a></li>						
	   	  	</ul>
	   	  </div></div>
	   	  </div>
        <div class="clearfix"> </div>
       </div>
       </ul></div>
</div></div></div>
<? include "footer.php";?>
</body>
</html>	