<? 
	session_save_path("./session/");
	session_start();
	$b_username = $_SESSION['b_username'];
	include "connect.php";
	include "fchangdate.php";

	$sqlgetuserid = "select b_id from business where b_username = '$b_username'";
	$querygetuserid = mysql_query($sqlgetuserid);
	$resultgetuserid = mysql_fetch_array($querygetuserid);
	$bid = $resultgetuserid['b_id'];

	$sqlgetpackageid = "select package_id from business_package where b_id = '$bid'";
 	$querygetpackageid = mysql_query($sqlgetpackageid);
 	$resultgetpackageid = mysql_fetch_array($querygetpackageid);
 	$packageid = $resultgetpackageid['package_id'];

 	$sqlgetpackageuser = "select package_user from package where package_id = '$packageid'";
 	$querygetpackageuser = mysql_query($sqlgetpackageuser);
 	$resultgetpackageuser = mysql_fetch_array($querygetpackageuser);
 	$packageuser = $resultgetpackageuser['package_user'];

	$sql_list = "select * from business where username_ref = '$b_username'";
 	$query_list = mysql_query($sql_list);$countrow = mysql_num_rows($query_list);
		
	$sql_list2 = "select * from business where b_id = '".$_REQUEST['id']."' and username_ref = '$b_username'";
 	$query_list2 = mysql_query($sql_list2);
	$result_list2 = mysql_fetch_array($query_list2);
		
	if($_REQUEST['action']=='insert'){
	$id = $_REQUEST['id'];
    $username_ref = $_POST['$username_ref'];
	$username = $_POST['username'];
    $password = $_POST['password'];
	$admin = $_POST['admin'];
    
    $date = date("Y-m-d H:i:s");
    
	if($_REQUEST['id']!=''){
		$sql3="update business set admin = '$admin',b_password='$password' where b_id = '$id'";
        $query3 = mysql_query($sql3);        
        ?><script> alert('อัพเดทข้อมูล User เรียบร้อย!!'); window.location="manage_user.php";</script><?
	}else{
	
    $sql1 = "SELECT * FROM business where b_username = '$username'";
    $query1 = mysql_query($sql1);
    $count1 = mysql_num_rows($query1);
    $result1 = mysql_fetch_array($query1);
    	if($count1<1){
        $sql2="insert into business (b_username,b_password,admin,username_ref,date) values('$username','$password','$admin','$b_username','$date')";
        $query2 = mysql_query($sql2);        
        ?><script>alert('เพิ่ม User เรียบร้อย!!'); window.location="manage_user.php";</script><?    
	 	}else{
        ?><script>alert('username หรือ password ไม่ถูกต้อง!!'); window.location="manage_user.php";</script><?
     	}
   }
}
	

?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: ข้อมูลบริษัท</title>
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
	        <p align="center">*สามารถเพิ่ม ได้ <?echo $packageuser;?> User</p>
			
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">กำหนด Username และ Password ให้ User

			</div>
			<div class="panel-body">
            
				<form action="manage_user.php?action=insert&id=<? echo $_REQUEST['id'];?>" method="POST">				
					<div class="form-group">
                    
                        
                    	<label for="nationality">ชื่อนามสกุล *</label>
						<input type="text" name="admin" class="form-control" placeholder="ชื่อนามสกุล" value="<? echo $result_list2['admin'];?>" required>
                    	
                        <label for="nationality">Username *</label>
						<input type="text" name="username" class="form-control" placeholder="Username" value="<? echo $result_list2['b_username'];?>" <? if($_REQUEST['id']!=''){ echo "disabled";}else{ echo "required";}?>>
                        <label for="nationality">Password *</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" value="<? echo $result_list2['b_password'];?>" required>
                        
						<span id="error_nationality" class="text-danger"></span>
					</div>
			    			<div class="form-group">
						
						<span id="error_military" class="text-danger"></span>
					</div>
					
					<div class="row">
			<?if(($countrow < $packageuser) && ($_REQUEST['id']=='')){?>
            	<div class="form-actions floatRight">
                	<input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            	</div>
            <?}elseif($_REQUEST['id']!=''){?>
            	<div class="form-actions floatRight">
                	<input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            	</div>
            <?}else{?>
            	<div class="form-actions floatRight">
                	<input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm" disabled>
            	</div>
            <?}?>
        </div>
			
				</form>

			</div>
		</div>
<table width="100%" border="2" cellspacing="0" bordercolor="#6633CC">
  <tr align="center" bgcolor="#9E7BFF">
  	<td>No.</td>
    <td>ชื่อ</td>
    <td>username</td>
    <td>password</td>
    <td>password</td>
  </tr>
  <? 
  $i=0;
  while($result_list = mysql_fetch_array($query_list)){
  $i++; 	  
?>
  <tr>
    <td align="center"><? echo $i;?></td>
    <td> <? echo $result_list['admin'];?></td>
    <td> <? echo $result_list['b_username'];?></td>
    <td> <? echo $result_list['b_password'];?></td>
    <td align="center">
    <a href="manage_user.php?id=<? echo $result_list['b_id'];?>">
    <button type="button" class="btn btn-warning btn-xs">แก้ไข</button>
    </a>
    </td>
  </tr>
  <? }?>
</table>

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