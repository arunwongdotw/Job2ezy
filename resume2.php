<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";
	$sql_pro2 = "select * from province order by PROVINCE_NAME";
 	$query_pro2 = mysql_query($sql_pro2);
	
 	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);
	
	$sql_type2 = "select * from type";
 	$query_type2 = mysql_query($sql_type2);

 	$sql_type3 = "select * from type";
 	$query_type3 = mysql_query($sql_type3);
	
	

	$sql_typeb = "select * from  type_business";
 	$query_typeb = mysql_query($sql_typeb);
	
	$sql_list = "select * from post";
 	$query_list = mysql_query($sql_list);
	
	$sql3 = "select * from info1 where username='$username'";
	$query3 = mysql_query($sql3);	
	$count = mysql_num_rows($query3);
	$result3 = mysql_fetch_array($query3);
	
	$province_id = $result3['province'];
	$rstTemp = mysql_query("select * from amphur where PROVINCE_ID ='$province_id'");
	
	$amphur_id = $result3['amphur'];
	$query_district = mysql_query("select * from district where AMPHUR_ID ='$amphur_id'");
	
//----------------------------------------------
	
if($_REQUEST['action']=='insert') {
	$address = $_POST['address'];
	$province = $_POST['province'];
	$amphur = $_POST['amphur'];	
	$district = $_POST['district'];
	$postcode1 = $_POST['postcode1'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];		
	
	$sql1 = "insert into info1 (address,province,amphur,district,code,phone,email) values('$address','$province','$amphur','$district','$postcode1','$phone','$email')";
	//$query1 = mysql_query($sql1);
	
	$sql2 = "update info1 set
			address='$address',province='$province',amphur='$amphur',district ='$district',code='$postcode1',phone ='$phone',email ='$email' where username = '$username'";
			
	
 	
	if($count<1){
 		$query = mysql_query($sql1);
	}else{
		$query = mysql_query($sql2);
	}
		if($query)
		{
			?>
			<script>
			alert("บันทึกข้อมูลติดต่อเรียบร้อย");
            window.location="resume2.php";
            </script>
			
			<?
		}
}	
//---------------------------------------------	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ข้อมูลติดต่อ</title>
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
		    <h1>สร้างเรซูเม่</h1>
		    <p>บันทึกข้อมูลติดต่อ</p>
           </div>
		</div>
   </div> 
</div>	
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
	       	<? 
				$resume = "resume2";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ข้อมูลการติดต่อ

			</div>
			<div class="panel-body">
				<form name="myform" action="resume2.php?action=insert" method="post">
					<div class="form-group">
						<label for="address" style="font-weight: bold;">ที่อยู่ <font color="red">*</font></label>
						<input id="address" name="address" class="form-control" type="text" value="<? echo $result3['address'];?>" required>
						<span id="error_address" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="status" style="font-weight: bold;">จังหวัด <font color="red">*</font></label>
						<select class="form-control" name="province" onChange="data_show(this.value,'amphur');">
                                        <option value="">-- ทุกจังหวัด --</option>
                                        <? while($result_pro2 = mysql_fetch_array($query_pro2)){?>
                                        <option value="<? echo $result_pro2['PROVINCE_ID'];?>" <? if($result_pro2['PROVINCE_ID']==$result3['province']){ echo 'selected';}?>><? echo $result_pro2['PROVINCE_NAME'];?></option>
                                        <? }?>
                                </select>
						<span id="error_province" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="amphoe" style="font-weight: bold;">อำเภอ <font color="red">*</font></label>
						<select  class="form-control" name='amphur' id='amphur' onChange="data_show(this.value,'district');">
                        <option value="">--- อำเภอ ---</option>
                        <?	
						if($result3['province']!=''){
						while($arr_2=mysql_fetch_array($rstTemp)){?>
						<option value="<?=$arr_2['AMPHUR_ID']?>" <? if($arr_2['AMPHUR_ID']==$result3['amphur']){ echo 'selected';}?>><?=$arr_2['AMPHUR_NAME']?></option>
						<? }}?>
                        </select>
						<span id="error_amphoe" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="district" style="font-weight: bold;">ตำบล <font color="red">*</font></label>
						<select  class="form-control" name='district' id='district'  onChange="data_show(this.value,'postcode1');">
                        <option value="">--- ตำบล ---</option>  
                        <?	
						if($result3['amphur']!=''){
						while($result_district=mysql_fetch_array($query_district)){?>
						<option value="<?=$result_district['DISTRICT_ID']?>" <? if($result_district['DISTRICT_ID']==$result3['district']){ echo 'selected';}?>><?=$result_district['DISTRICT_NAME']?></option>
						<? }}?>                      
                        </select>
                        
						<span id="error_district" class="text-danger"></span>
					</div>
					
					<div class="form-group">
						<label for="postcode" style="font-weight: bold;">รหัสไปรษณีย์ <font color="red">*</font></label>
						<input class="form-control" type="text" name="postcode1" id="postcode1" placeholder="รหัสไปรษณีย์" value="<? echo $result3['code'];?>" required>
						<span id="error_postcode" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="mail" style="font-weight: bold;">E-mail <font color="red">*</font></label>
						<input id="email" name="email" class="form-control" type="email" data-validation="email" value="<? echo $result3['email'];?>" required>
						<span id="error_mail" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="tel" style="font-weight: bold;">โทรศัพท์ <font color="red">*</font></label>
						<input id="phone" name="phone"  class="form-control" type="number" min="1"   value="<? echo $result3['phone'];?>" required>
						<span id="error_tel" class="text-danger"></span>
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
<script language="javascript">
function uzXmlHttp(){
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlhttp = false;
        }
    }
 
    if(!xmlhttp && document.createElement){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
function data_show(select_id,result33){
	var url = 'data_ampur.php?select_id='+select_id+'&result33='+result33;
	//alert(url);
	
    xmlhttp = uzXmlHttp();
    xmlhttp.open("GET", url, false);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    xmlhttp.send(null);
	document.getElementById(result33).innerHTML =  xmlhttp.responseText;
}
//window.onLoad=data_show(5,'amphur'); 
</script>	