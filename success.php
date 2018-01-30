<?
	session_save_path("./session/");
	session_start();
	include "connect.php";
	include "fchangdate.php";
	$username = $_SESSION['m_username'];
	$package_id = $_POST['package_id'];
	$bank = $_POST['bank'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$totalprice = $_POST['totalprice'];
	$sql = "insert into payment values('','$username', '$package_id', '$bank',
			'$date', '$time', '$totalprice', ' ')";
	$query = mysql_query($sql);
?>
<!DOCTYPE HTML>
<html>
	<head>
    	<title>JOB2EZY :: ชำระเงินเสร็จสิ้น</title>
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
		<?if($query){?>
			<?echo 'คุณแจ้งชำระเงินสำเร็จ กรุณารอทางระบบตรวจสอบ ก่อนจะสามารถใช้งานได้';?>
		<?}else?>
			<?echo 'คุณแจ้งชำระเงินไม่สำเร็จ กรุณาแจ้งชำระเงินใหม่';?>
		<?include "footer.php";?>
	</body>
</html>