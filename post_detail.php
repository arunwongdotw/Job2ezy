<?
session_save_path("./session/");
session_start();
//$username = $_SESSION['m_username'];
$username = "admin";
include "connect.php";
include "fchangdate.php";
function getAge($birthday) {
$then = strtotime($birthday);
return(floor((time()-$then)/31556926));
}

//--------------------------------
if($_REQUEST['action']=='update'){
		$position_id = $_POST['position_id'];
		
	$position = $_POST['position'];
	$type_id = $_POST['type'];
	$province = $_POST['province'];
	$amount = $_POST['amount'];
	$salary = $_POST['salary'];
	$property1 = $_POST['property1'];
	$property2 = $_POST['property2'];
	$property3 = $_POST['property3'];
	$property4 = $_POST['property4'];
	$property5 = $_POST['property5'];
	$property6 = $_POST['property6'];
	$feature = $_POST['feature'];
	$remark = $_POST['remark'];
	$copy1 = $_POST['copy1'];
	$copy2 = $_POST['copy2'];
	$copy3 = $_POST['copy3'];
	$copy4 = $_POST['copy4'];	
	$day = date("Y-m-d");
	
		$sql_5 = "update post set 
		position='$position',
		type_id='$type_id',
		province_id='$province',
		amount='$amount',
		salary='$salary',
		property1='$property1',
		property2='$property2',
		property3='$property3',
		property4='$property4',
		property5='$property5',
		property6='$property6', 
		feature='$feature',
		remark='$remark',
		copy1='$copy1',
		copy2='$copy2',
		copy3='$copy3',
		copy4='$copy4'
		where position_id = '$position_id'";
 		$query_5 = mysql_query($sql_5);
		if($query_5){
		?><script>window.location="post_list.php";</script><?
		}
	}
//-----------------------------------	
	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);
	
	$sql_pro = "select * from province order by PROVINCE_NAME";
 	$query_pro = mysql_query($sql_pro);

		$position_id = $_REQUEST['post_id'];
		$sql_edit = "select * from post where position_id = '$position_id' ";
 		$query_edit = mysql_query($sql_edit);
		$result_edit = mysql_fetch_array($query_edit);
			

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Seeking an Job Portal Category Flat Bootstrap Responsive Website Template | Location :: w3layouts</title>
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
          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">แก้ไขประกาศงาน</p></font></strong>
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
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">รายละเอียดงาน</div>
			<div class="panel-body">
				<form name="myform" action="post_detail.php?action=update" method="post">
                <input type="hidden" name="position_id" value="<? echo $position_id;?>">
					<div class="form-group">
						<label for="myName">ตำแหน่งงาน *</label>
                        <input id="position" name="position" class="form-control" type="text"value="<? echo $result_edit['position'];?>">
					</div>
					<div class="form-group">
						<label for="gender">ประเภทงาน *</label>
						<select name="type" id="type" class="form-control">
						<option value="">ทุกประเภท</option>
                                        <? while($result_type = mysql_fetch_array($query_type)){?>
                                        <option value="<? echo $result_type['type_id'];?>" <? if($result_type['type_id']==$result_edit['type_id']){ echo "selected";}?>><? echo $result_type['type_name'];?></option>
                                        <? }?>
                        </select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="status">สถานที่ปฏิบัติงาน  *</label>
						<select name="province" id="province" class="form-control">
						<option value="">ทุกจังหวัด</option>
                            <? while($result_pro = mysql_fetch_array($query_pro)){?>
                            <option value="<? echo $result_pro['PROVINCE_ID'];?>" <? if($result_pro['PROVINCE_ID']==$result_edit['province_id']){ echo "selected";}?>><? echo $result_pro['PROVINCE_NAME'];?></option>
                            <? }?>
                        </select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="nationality">อัตรา *</label>
						<input id="amount" name="amount" class="form-control" type="text" value="<? echo $result_edit['amount'];?>">
						<span id="error_nationality" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="nationality">เงินเดือน *</label>
						<input id="salary" name="salary" class="form-control" type="text" value="<? echo $result_edit['salary'];?>">
						<span id="error_nationality" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="nationality">คุณสมบัติ *</label>
						<input id="property1" name="property1" class="form-control" type="text" value="<? echo $result_edit['property1'];?>">
                        <input id="property2" name="property2" class="form-control" type="text" value="<? echo $result_edit['property2'];?>">
                        <input id="property3" name="property3" class="form-control" type="text" value="<? echo $result_edit['property3'];?>">
                        <input id="property4" name="property4" class="form-control" type="text" value="<? echo $result_edit['property4'];?>">
                        <input id="property5" name="property5" class="form-control" type="text" value="<? echo $result_edit['property5'];?>">
                        <input id="property6" name="property6" class="form-control" type="text" value="<? echo $result_edit['property6'];?>">
						<span id="error_nationality" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="nationality">ลักษณะงาน *</label>
						<textarea name="feature" class="form-control"><? echo $result_edit['feature'];?></textarea> 
						<span id="error_nationality" class="text-danger"></span>
					</div>
                    
                    <div class="form-group">
						<label for="nationality">หมายเหตุ *</label>
						<input id="remark" name="remark" class="form-control" type="text" value="<? echo $result_edit['remark'];?>">
						<span id="error_nationality" class="text-danger"></span>
					</div>                    
                    <div class="form-group">
                    	<input type="checkbox" id="copy1" name="copy1" <? if($result_edit['copy1']=='on'){ echo "checked";}?>><label for="copy1">สมัครด้วยตนเอง</label>
                        <input type="checkbox" id="copy2" name="copy2" <? if($result_edit['copy2']=='on'){ echo "checked";}?>><label for="copy2">ส่งอีเมล์</label>
                        <input type="checkbox" id="copy3" name="copy3" <? if($result_edit['copy3']=='on'){ echo "checked";}?>><label for="copy3">ส่งไปรษณีย์</label>
                        <input type="checkbox" id="copy4" name="copy4" <? if($result_edit['copy4']=='on'){ echo "checked";}?>><label for="copy4">สมัครผ่านระบบ job2u</label> 
                    </div>
			    			<div class="form-group">
						
						<span id="error_military" class="text-danger"></span>
					</div>
					
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">แก้ไข</button>
			
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