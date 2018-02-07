<? 
	session_save_path("./session/");
	session_start();
	$b_username = $_SESSION['b_username'];
	include "connect.php";
	include "fchangdate.php";
	$sqlpositionid = "select * from job_list j, post p, info1 i, member m where j.position_id = p.position_id and p.b_username = '$b_username' and j.m_username = i.username and j.m_username = m.m_username";
	$querypositionid = mysql_query($sqlpositionid);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>JOB2EZY :: หาพนักงาน</title>
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
		          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">รายการผู้สมัคร</p></font></strong>
		           </div>
		        </div>
		   </div> 
		</div>
		<div class="container">
			<div class="single">
				<div class="col-md-12 single_right">
					<div class="search_wrapper1">
						<div class="clearfix">
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
									<div class="tab_grid">
										<div class="row">
											<div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
												<div class="jb-accordion-wrapper">
													<div class="jb-accordion-title">รายการผู้สมัคร</div>
													<div class="panel-body">
														<table width="100%" border="0">
															<?while($resultpositionid = mysql_fetch_array($querypositionid)){?>
																<?$i=0; $i++?>
																<tr>
																	<td><a href="member_detail.php?m_id=<?echo $resultpositionid['member_id'];?>"><?echo $i.'. '.$resultpositionid['name'];?></a></td>
																	<td><?echo 'สมัครเมื่อ '.dmy($resultpositionid['date']);?></td>
																</tr>
															<?}?>
														</table>
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