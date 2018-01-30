<? 
session_save_path("./session/");
session_start();
	$b_username = $_SESSION['b_username'];
	include "connect.php";
	include "fchangdate.php";

	$sql_pro = "select * from province order by PROVINCE_NAME";
	$query_pro = mysql_query($sql_pro);
	
	
	
	$sql_typeb = "select * from  type_business";
 	$query_typeb = mysql_query($sql_typeb);
	
	$sql_list = "select * from business where b_username = '$b_username'";
 	$query_list = mysql_query($sql_list);
	$result_list = mysql_fetch_array($query_list);
	
	$province_id = $result_list['province_id'];
	$rstTemp = mysql_query("select * from amphur where PROVINCE_ID ='$province_id'");
	
	$amphur_id = $result_list['amphur_id'];
	$query_district = mysql_query("select * from district where AMPHUR_ID ='$amphur_id'");
		
	if($_REQUEST['action']=='update') {	
	$type = $_POST['type_id'];
	$admin = $_POST['admin'];
	$name = $_POST['name'];
	$detail = $_POST['detail'];
	$address = $_POST['address'];
	$province = $_POST['province'];
	$amphur = $_POST['amphur'];
	$district = $_POST['district'];
	$code = $_POST['code'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$fax = $_POST['fax'];
	$website = $_POST['website'];
	$security = $_POST['security'];
	move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]);
	$sql2 = "update business set
			type_b_id='$type',
			admin='$admin',
			name='$name',
			detail ='$detail',
			address='$address',
			province_id ='$province',
			amphur_id ='$amphur',
			district_id ='$district',
			code ='$code',
			email ='$email',
			fax ='$fax',
			website ='$website',
			security ='$security',
			logo = '".$_FILES["filUpload"]["name"]."' ,
			phone ='$phone' where b_username = '$b_username'";
	$query2 = mysql_query($sql2);	
	if($query2)
		{
			?>
			<script>
			alert("บันทึกข้อมูลบริษัทเรียบร้อย");
            window.location="business.php";
            </script>
			
			<?
		}
		
	}

	$strSQL = "SELECT * FROM files where FilesID='2'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

	$strSQL1 = "SELECT * FROM files where FilesID='6'";
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");

	$strSQL2 = "SELECT * FROM files where FilesID='4'";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");


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
	       	
			<h1>สร้าง/แก้ไขข้อมูลบริษัท</h1>

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ข้อมูลบริษัท

			</div>
			<div class="panel-body">
				<form action="business.php?action=update" method="POST" enctype="multipart/form-data">				
					<div class="form-group">
                    
                        โลโก้บริษัท : 
                          <img src="myfile/<? echo $result_list['logo'];?>" width="200"><span><input type="file" name="filUpload"></span>
                        <hr>
                    	<label for="myName">ประเภทธุรกิจ *</label>
                        <select name="type_id" class="form-control">
                                        <option value="">-- ประเภท --</option>
                                        <? while($result_typeb = mysql_fetch_array($query_typeb)){?>
                                        <option value="<? echo $result_typeb['type_b_id'];?>" <? if($result_typeb['type_b_id']==$result_list['type_b_id']){ echo 'selected';}?>><? echo $result_typeb['type_b_name'];?></option>
                                        <? }?>
                                        </select>
                    	<label for="status">ชื่อผู้ติดต่อ *</label>
						<input type="text" name="admin" id="admin" class="form-control" placeholder="ชื่อผู้ติดต่อ" value="<? echo $result_list['admin'];?>">
                    	<label for="nationality">ชื่อบริษัท *</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="ชื่อบริษัท" value="<? echo $result_list['name'];?>">
                    	<label for="status">รายละเอียดของบริษัท *</label>
						<textarea name="detail" id="detail" cols="45" rows="3" class="form-control" placeholder="รายละเอียดของบริษัท" style="resize: vertical;"><? echo $result_list['detail'];?></textarea>
                    	<label for="nationality">ที่อยู่ *</label>
						<input type="text" name="address" id="address" class="form-control" placeholder="ที่อยู่" value="<? echo $result_list['address'];?>">
                    	<label for="status">จังหวัด *</label>
						<select name='province' id='province' onChange="data_show(this.value,'amphur');" class="form-control">
                                        <option value="">-- จังหวัด --</option>
                                        <? while($result_pro = mysql_fetch_array($query_pro)){?>
                                        <option value="<? echo $result_pro['PROVINCE_ID'];?>" <? if($result_pro['PROVINCE_ID']==$result_list['province_id']){ echo 'selected';}?>><? echo $result_pro['PROVINCE_NAME'];?></option>
                                        <? }?>
                        </select>
                    	<label for="nationality">อำเภอ *</label>
						<select name='amphur' id='amphur' onChange="data_show(this.value,'district');" class="form-control">   
                        <option value="">-- อำเภอ--</option>
                        <?	
						if($result_list['province_id']!=''){
						while($arr_2=mysql_fetch_array($rstTemp)){?>
						<option value="<?=$arr_2['AMPHUR_ID']?>" <? if($arr_2['AMPHUR_ID']==$result_list['amphur_id']){ echo 'selected';}?>><?=$arr_2['AMPHUR_NAME']?></option>
						<? }}?>               
                		</select>
						<label for="status">ตำบล *</label>
                        
						<select name='district' id='district'  onchange="data_show(this.value,'code_p');" class="form-control">
                        <option value="">-- ตำบล--</option>
                        <?	
						if($result_list['amphur_id']!=''){
						while($result_district=mysql_fetch_array($query_district)){?>
						<option value="<?=$result_district['DISTRICT_ID']?>" <? if($result_district['DISTRICT_ID']==$result_list['district_id']){ echo 'selected';}?>><?=$result_district['DISTRICT_NAME']?></option>
						<? }}?> 
                        </select>
                        <label for="nationality">รหัสไปรษณีย์ *</label>
						<input type="text" name="code" class="form-control" placeholder="รหัสไปรษณีย์" value="<? echo $result_list['code'];?>">
                        <label for="nationality">โทรศัพท์ *</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="โทรศัพท์" value="<? echo $result_list['phone'];?>">
                        <label for="nationality">อีเมล์ *</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="อีเมล์" value="<? echo $result_list['email'];?>">
                        <label for="nationality">Fax *</label>
                        <input type="text" name="fax" id="fax" class="form-control" placeholder="Fax" value="<? echo $result_list['fax'];?>">
                        <label for="nationality">Website *</label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<? echo $result_list['website'];?>">
                        <label for="nationality">สวัสดิการ *</label>
                        <input type="text" name="security" id="security" class="form-control" placeholder="สวัสดิการ" value="<? echo $result_list['security'];?>">
						<span id="error_nationality" class="text-danger"></span>
					</div>
			    			<div class="form-group">
						
						<span id="error_military" class="text-danger"></span>
					</div>
					
					<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
            </div>
        </div>
			
				</form>

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