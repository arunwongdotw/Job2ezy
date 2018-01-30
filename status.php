<?
	session_save_path("./session/");
	session_start();
	include "connect.php";
	include "fchangdate.php";
	$sqlusername = "select * from business order by b_id";
	$queryusername = mysql_query($sqlusername);
	if(isset($_POST['changestatus'])){
		$packageid = $_POST['package_id'];
		$sqlpackage_period = "select package_period from package where package_id = '$packageid'";
		$querypackage_period = mysql_query($sqlpackage_period);
		$result = mysql_result($querypackage_period, 0);
		$package_period = $result;
		date_default_timezone_set("Asia/Bangkok");
		$startdate = date("Y-m-d");
		$enddate = date("Y-m-d", strtotime($startdate.' + '.$package_period.' month'));
		$bid = $_POST['bid'];
		$sqlcheckdup = "select bp_id from business_package where b_id = '$bid'";
		$querycheckdup = mysql_query($sqlcheckdup);
		$countrow = mysql_num_rows($querycheckdup);
		if($countrow > 0){
			$sqlupdate = "update business_package set package_id = '$packageid', status = '1', start_date = '$startdate', end_date = '$enddate' where b_id = '$bid'";
			$queryupdate = mysql_query($sqlupdate);
			if(($packageid == 4) || ($packageid == 5)){
				$sqlupdateuserref = "update business set username_ref = '1' where b_id = '$bid'";
				$queryupdateuserref = mysql_query($sqlupdateuserref);
			}else{
				$sqlupdateuserref = "update business set username_ref = '0' where b_id = '$bid'";
				$queryupdateuserref = mysql_query($sqlupdateuserref);
			}
			if($queryupdate){
				?>
				<script>
					alert('เปลี่ยนสถานะสำเร็จ');
					window.location="status.php";
				</script>
				<?
			}else{
				?>
				<script>
					alert('เปลี่ยนสถานะไม่สำเร็จ กรุณาลองใหม่');
					window.location="status.php";
				</script>
				<?
			}
		}else{
			$sqlexpire = "insert into business_package values('', '$bid', '$packageid', '1', '$startdate', '$enddate')";
			$queryexpire = mysql_query($sqlexpire);
			if(($packageid == 4) || ($packageid == 5)){
				$sqlupdateuserref = "update business set username_ref = '1' where b_id = '$bid'";
				$queryupdateuserref = mysql_query($sqlupdateuserref);
			}else{
				$sqlupdateuserref = "update business set username_ref = '0' where b_id = '$bid'";
				$queryupdateuserref = mysql_query($sqlupdateuserref);
			}
			if($queryupdate){
				?>
				<script>
					alert('เปลี่ยนสถานะสำเร็จ');
					window.location="status.php";
				</script>
				<?
			}else{
				?>
				<script>
					alert('เปลี่ยนสถานะไม่สำเร็จ กรุณาลองใหม่');
					window.location="status.php";
				</script>
				<?
			}
		}	
	}
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
			<div class="grid_1"><h3>เปลี่ยนสถานะสมาชิก</h3></div>
			<table class="table table-striped" style="width: 700px; margin-right: auto; margin-left: auto;">
				 <thead>
      				<tr>
				        <th>Username</th>
				        <th>Package</th>
				        <th>Status</th>
      				</tr>
    			</thead>
    			<tbody>
    				<?while($result = mysql_fetch_array($queryusername)){?>
    					<tr>
    						<td><?echo $result['b_username'];?></td>
							<form action="" method="POST">
								<input type="hidden" name="bid" value="<?echo $result['b_id'];?>">
								<td>
									<div class="form_group">
										<select class="form-control" name="package_id" style="width: 150px;">
											<option value="1">Starter</option>
											<option value="2">Super Save</option>
											<option value="3">Mini Pack</option>
											<option value="4">Combo Pack</option>
											<option value="5">Gold Pack</option>
										</select>
									</div>
								</td>
								<td><input type="submit" name="changestatus" class="btn btn-primary btn-sm" value="เปลี่ยนสถานะ" style="font-size: 10px"></td>
							</form>
						</tr>
					<?}?>
    			</tbody>
			</table>
		</div>
		</br></br>
		<?include "footer.php";?>
	</body>
</html>