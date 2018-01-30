<?
	session_save_path("./session/");
	session_start();
	include "connect.php";
	include "fchangdate.php";
	$username = $_SESSION['m_username'];
	$sql_package = "select * from package order by package_id";
	$query_package = mysql_query($sql_package);
	$sql_packagesms = "select * from package_sms order by package_sms_id";
	$query_packagesms = mysql_query($sql_packagesms);
?>
<!DOCTYPE HTML>
<html>
	<head>
    	<title>JOB2EZY :: แพ็กเกจ</title>
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
  		<div class="container">
  			<div class="content-events">
  				<div class="grid_1"><h3>JOB2EZY Package</h3></div>
  				<div class="news">
  					<?while($result_package = mysql_fetch_array($query_package)){?>
  						<div class="col-md-4 new-more" style="border-color: #cdcdcd; border-style: solid; border-width: 2px; border-radius: 10px;">
      						<div class="event">
      							</br><h2><?echo $result_package['package_name'];?></h2>
                				<h6><a style="font-weight: bold;">อัตราค่าใช้บริการ <?echo $result_package['package_price'];?> บาท *ไม่รวมภาษีมูลค่าเพิ่ม</a></h6>
              				</div>
              				<?if($result_package['package_period'] != 0){?>
              					<?echo '<p style="font-size: 16px">ระยะการใช้งาน <strong><a style="font-size: 16px; color: red">'.$result_package['package_period'].'</a></strong> เดือน</p>';?>
              				<?}?>
      						<p style="font-size: 16px">ออนไลน์การรับสมัครได้ <strong><a style="font-size: 16px; color: red">
      							<?if($result_package['package_find'] == 99){?>
      								<?echo 'ไม่จำกัด'."</a></strong></p>";?>
      							<?}else{?>
      								<?echo $result_package['package_find'] . "</a></strong> ตำแหน่ง</p>";?>
      							<?}?>
      						<p style="font-size: 16px">ค้นหาประวัติได้ <strong><a style="font-size: 16px; color: red">
      							<?if($result_package['package_search'] == 99){?>
      								<?echo 'ไม่จำกัด'."</a></strong></p>";?>
      							<?}else{?>
      								<?echo $result_package['package_search'] . "</a></strong> ครั้ง</p>";?>
      							<?}?>
      						<?if($result_package['package_sms'] != 0){?>
      							<?echo '<p style="font-size: 16px">รับ SMS แบบลงท้ายด้วยเบอร์ <strong><a style="font-size: 16px; color: red">'.$result_package['package_sms'].'</a></strong> SMS</p>';?>
      						<?}?>
      						<?if($result_package['package_sender'] != 0){?>
      							<?echo '<p style="font-size: 16px">รับ SMS แบบ Sender <strong><a style="font-size: 16px; color: red">'.$result_package['package_sender'].'</a></strong> Account</p>';?>
      						<?}?>
 							<?if($result_package['package_banner'] != 0){?>
      							<?echo '<p style="font-size: 16px">รับ <strong><a style="font-size: 16px; color: red">ฟรี</a></strong> Banner โฆษณา ตลอดอายุ</p>';?>
      						<?}?>
      						<?if($result_package['package_user'] != 0){?>
      							<?echo '<p style="font-size: 16px">Login <strong><a style="font-size: 16px; color: red">'.$result_package['package_user'].'</a></strong> User</p>';?>
      						<?}?>
                			</br>
                			<form action="advise.php" method="POST">
                				<input type="hidden" name="package_id" value="<?echo $result_package['package_id'];?>">
                				<input type="hidden" name="package_name" value="<?echo $result_package['package_name'];?>">
                				<input type="hidden" name="package_price" value="<?echo $result_package['package_price'];?>">
                				<input type="submit" name="submit" value="สั่งซื้อ" class="btn btn-primary btn-sm"></br></br>
                			</form>
      					</div>
  					<?}?>
  					<div class="clearfix"></div><br><br>			
  				</div>
  				
  				<div class="grid_1"><h3>JOB2EZY SMS Package</h3></div>
  				<div class="news">
  					<div class="col-md-4 new-more"></div>
  					<div class="col-md-4 new-more" style="border-color: #cdcdcd; border-style: solid; border-width: 2px; border-radius: 10px;">
            			<div class="event"></br><h2>SMS Service</h2></div>
	            		<?while($result_packagesms = mysql_fetch_array($query_packagesms)){?>
	  						<p style="font-size: 16px">ระยะการใช้งาน <strong><a style="font-size: 16px; color: red"><?echo $result_packagesms['package_sms_period'];?></a></strong> วัน 
	                			<strong><a style="font-size: 16px; color: red"><?echo $result_packagesms['package_sms_amount'];?></a></strong> SMS
	                			<strong><a style="font-size: 16px; color: red"><?echo $result_packagesms['package_sms_price'];?></a></strong> บาท
	              			</p>
  						<?}?></br>
            		</div>
            		<div class="clearfix"></div><br><br>	
  				</div>

  				<div class="grid_1"><h3>วิธีการชำระเงิน</h3></div>
  				<div class="news">
  					<div class="col-md-4 new-more" style="border-color: #cdcdcd; border-style: solid; border-width: 2px; border-radius: 10px;">
              			</br>
              			<img src="images/scb.png" style="float: left; width: 20%; height: 20%; border-radius: 50%;" hspace="20">
			            <p style="color: #582584; font-size: 25px; font-weight: bold;">ธนาคารไทยพาณิชย์</p>
			            <p style="font-weight: bold;">บัญชี : บริษัท เหมือนเพื่อน จำกัด</br>เลขที่บัญชี : XXXXXXXXXX</p>
            			</br>
            		</div>
            		<div class="col-md-4 new-more" style="border-color: #cdcdcd; border-style: solid; border-width: 2px; border-radius: 10px;">
              			</br>
			            <img src="images/bkb.png" style="float: left; width: 20%; height: 20%; border-radius: 50%;" hspace="20"><p style="color: #003399; font-size: 25px; font-weight: bold;">ธนาคารกรุงเทพ</p>
			            <p style="font-weight: bold;">บัญชี : บริษัท เหมือนเพื่อน จำกัด</br>เลขที่บัญชี : XXXXXXXXXX</p>
            			</br>
            		</div>
            		<div class="col-md-4 new-more" style="border-color: #cdcdcd; border-style: solid; border-width: 2px; border-radius: 10px;">
              			</br>
              			<img src="images/kb.png" style="float: left; width: 20%; height: 20%; border-radius: 50%;" hspace="20"><p style="color: #00A950; font-size: 25px; 	font-weight: bold;">ธนาคารกสิกรไทย</p>
              			<p style="font-weight: bold;">บัญชี : บริษัท เหมือนเพื่อน จำกัด</br>เลขที่บัญชี : XXXXXXXXXX</p>
            			</br>
            		</div>
            		<div class="clearfix"></div><br><br>
  				</div>
  			</div>
  			<p><h1 style="text-align: center;">*ข้อความหมายเหตุ</h1></p>
        <div class="clearfix"></div><br><br>
  		</div>
  		<?include "footer.php";?>
  	</body>
</html>