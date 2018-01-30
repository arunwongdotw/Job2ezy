<?
	session_save_path("./session/");
	session_start();
	include "connect.php";
	include "fchangdate.php";
	$username = $_SESSION['b_username'];
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
          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">ชำระค่าบริการ</p></font></strong>
           </div>
        </div>
   </div> </div>

		<div class="container">
			<div class="content-events">

				<div class="grid_1"><h3>แจ้งชำระเงิน</h3></div ><div class="col-sm-2"></div>
				<div class="col-sm-9">
			<div class="experience_1">
				
				<dt><h6><span style="color: red; ">* </span>คุณ <?echo $username;?> ได้ซื้อแพ็กเกจ <?echo $package_name;?> ต้องชำระเงินทั้งหมด <?echo $package_price*1.07;?> บาท สามารถชำระได้ตามบัญชีธนาคารที่ระบุด้านล่าง</h6></dt>
				<form action="success.php" method="POST">
					<dt><h6>Username : <span style="color:#641E16;font-size: 20px "><?echo $username;?> </span></h6></dt> </br>
					<strong><p style="color:#6E2C00;font-size: 18px ">ธนาคารที่ชำระเงิน : </p></strong><br><input type="radio" name="bank" value="scb" checked><img src="images/scb.png" style="vertical-align: middle; width: 3%; height: 3%; border-radius: 50%" hspace="10"><font color="#582584">ธนาคารไทยพาณิชย์</font>
					<p style="color: #003399;"><input type="radio" name="bank" value="bkb"><img src="images/bkb.png" style="vertical-align: middle; width: 3%; height: 3%; border-radius: 50%" hspace="10">ธนาคารกรุงเทพ</p>
					<p style="color: #00A950;"><input type="radio" name="bank" value="kb"><img src="images/kb.png" style="vertical-align: middle; width: 3%; height: 3%; border-radius: 50%" hspace="10">ธนาคารกสิกรไทย</p></br>
					วัน เดือน ปี ที่โอน : <input type="date" name="date" required></br></br>
					เวลาที่โอน : <input type="time" name="time" required></br></br>
					จำนวนเงิน : <input type="text" name="totalprice" required></br></br>
					<input type="hidden" name="package_id" value="<?echo $package_id;?>">
					<input type="hidden" name="username" value="<?echo $username;?>">
					<input type="submit" name="submit" value="ยืนยันการแจ้งชำระเงิน" class="btn btn-primary btn-sm">
				</form>
			</div></div>
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
		<?include "footer.php";?>
	</body>
</html>