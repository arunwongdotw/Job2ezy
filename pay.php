<?
	session_save_path("./session/");
	session_start();
	include "connect.php";
	include "fchangdate.php";
	$username = $_SESSION['m_username'];
	$package_id = $_POST['package_id'];
	$package_name = $_POST['package_name'];
	$package_price = $_POST['package_price'];
?>
<!DOCTYPE HTML>
<html>
	<head>
    	<title>JOB2EZY :: แจ้งชำระเงิน</title>
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
	</head>
	<body>
		<?include "topmenu.php";?>
<div class="banner_1">
    <div class="container">
        <div id="search_wrapper1">
          <div id="search_form" class="clearfix">
          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">การชำระเงิน</p></font></strong>
           </div>
        </div>
   </div> </div>

		<div class="container">
			<div class="content-events">

				
				
					</div></div>

				<div class="grid_1"><h3>บัญชีธนาคาร</h3></div>
  				


  					<div class="col-md-4 single_right" >
              			<div class="experience_1">
              			<img src="images/scb.png" style="float: left; width: 20%; height: 20%; border-radius: 50%;" hspace="20">
              			 
			            <p style="color: #582584; font-size: 25px; font-weight: bold;">ธนาคารไทยพาณิชย์</p>
			            <p style="font-weight: bold;">บัญชี : บริษัท เหมือนเพื่อน จำกัด</br>เลขที่บัญชี : XXXXXXXXXX</p>
            			</br>
            		</div></div>
            		<div class="col-md-4 single_right">
              			<div class="experience_1">
			            <img src="images/bkb.png" style="float: left; width: 20%; height: 20%; border-radius: 50%;" hspace="20"><p style="color: #003399; font-size: 25px; font-weight: bold;">ธนาคารกรุงเทพ</p>
			            <p style="font-weight: bold;">บัญชี : บริษัท เหมือนเพื่อน จำกัด</br>เลขที่บัญชี : XXXXXXXXXX</p>
            			</br>
            		</div></div>

            		<div class="col-md-4 single_right">
              			<div class="experience_1">
              			<img src="images/kb.png" style="float: left; width: 20%; height: 20%; border-radius: 50%;" hspace="20"><p style="color: #00A950; font-size: 25px; 	font-weight: bold;">ธนาคารกสิกรไทย</p>
              			<p style="font-weight: bold">บัญชี : บริษัท เหมือนเพื่อน จำกัด</br>เลขที่บัญชี : XXXXXXXXXX</p>
            			</br>
            		</div></div>
            		<div class="clearfix"></div><br><br>
  				
			</div>
		<? include "footer.php";?>
</body>
</html>