<? 
session_save_path("./session/");
session_start();
	$b_username = $_SESSION['b_username'];
include "connect.php";
include "fchangdate.php";
 

//$username = $_REQUEST['username']; 
//------- ดึง m_username มาใช้ -------
	$m_id = $_REQUEST['m_id']; 
	$sql_member = "select * from member where member_id = '$m_id'";
 	$query_member = mysql_query($sql_member);
	$result_member = mysql_fetch_array($query_member);
	$username = $result_member['m_username'];

//--------------------------  counter ---------------------------------------
	$strSQL = "SELECT * FROM tb_counter where b_username='$b_username'";
	$objQuery = mysql_query($strSQL);
	//$num_member = mysql_num_rows($objQuery);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult['date']!=date('Y-m-d'))
	{
		//*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
		$date1 = date('Y-m-d',strtotime("-1 day"));
		$sql001 ="SELECT * FROM  tb_counter WHERE b_username='$b_username' AND date = '$date1'";
		$query001 = mysql_query($sql001);
		//$result001 = mysql_fetch_array($query001);
		$num001 = mysql_num_rows($query001);
		$strSQL = " INSERT INTO tb_daily values('','$date1','$num001','$b_username')";
		//$strSQL = " INSERT INTO tb_daily (date,num) SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM  tb_counter WHERE b_username='$b_username' AND date = '".date('Y-m-d',strtotime("-1 day"))."'";
	    mysql_query($strSQL);

		//*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
		$strSQL = " DELETE FROM tb_counter WHERE date != '".date("Y-m-d")."' and b_username='$b_username'";
		mysql_query($strSQL);
	}

	$sql_c = "SELECT * FROM tb_counter where b_username='$b_username'and member_id='$m_id' and date='".date('Y-m-d')."'";
	$query_c = mysql_query($sql_c);
	$num_c = mysql_num_rows($query_c);

	//*** Insert Counter ปัจจุบัน ***//
	if($num_c<1){
	$strSQL02 = "INSERT INTO tb_counter (id,date,b_username,member_id) VALUES ('','".date("Y-m-d")."','$b_username','$m_id')";
	mysql_query($strSQL02);
	}
//------------------------------------------------------

$sql1 = "SELECT * FROM info1 where username = '$username'";
$query1 = mysql_query($sql1);
//$count1 = mysql_num_rows($query1);
$result1 = mysql_fetch_array($query1);

$sql_pro = "select * from province";
$query_pro = mysql_query($sql_pro);

$sql2 = "select * from info2 i2,type t,province p where username = '$username' and i2.type_id=t.type_id and i2.PROVINCE_ID=p.PROVINCE_ID";
$query2 = mysql_query($sql2);
$result2 = mysql_fetch_array($query2);

$sql3 = "select * from info3 where username = '$username'";
$query3 = mysql_query($sql3);
$result3 = mysql_fetch_array($query3);
$edu_id = $result3['level'];

$sql_level = "select * from edu where edu_id = '$edu_id'";
$query_level = mysql_query($sql_level);
$result_level = mysql_fetch_array($query_level);

$sql4 = "select * from info4 where username = '$username'";
$query4 = mysql_query($sql4);
$result4 = mysql_fetch_array($query4);

$sql5 = "select * from info5 where username = '$username'";
$query5 = mysql_query($sql5);
$result5 = mysql_fetch_array($query5);
	
$sql6 = "select * from info6 where username = '$username'";
$query6 = mysql_query($sql6);
$result6 = mysql_fetch_array($query6);
$th = $result6['th'];
$en = $result6['en'];

$sql62 = "select * from level_pasa where level_id = '$th'";
$query62 = mysql_query($sql62);
$result62 = mysql_fetch_array($query62);

$sql63 = "select * from level_pasa where level_id = '$en'";
$query63 = mysql_query($sql63);
$result63 = mysql_fetch_array($query63);

$birthday = dmy($result1['birthday']);
$startdate = dmy($result4['startdate']);
$enddate = dmy($result4['enddate']);
$year = mount_thai($result3['year']);
$salary4 = number_format($result4['salary4'])." บาท";
$salary = number_format($result2['salary'])." บาท";

if($result1['seller']=='1'){  $seller = "ผ่านเกณฑ์";}else{  $seller= "ยังไม่ผ่านเกณฑ์";}
if($result6['d1']=='on'){  $d1= "checked";}
if($result6['d2']=='on'){  $d2= "checked";}
if($result6['d3']=='on'){  $d3= "checked";}
if($result6['c1']=='on'){  $c1= "checked";}
if($result6['c2']=='on'){  $c2= "checked";}
if($result6['c3']=='on'){  $c3= "checked";}
	//------------------------***-----------------------

if($_REQUEST['action']=='insert'){
		$m_username = $_POST['m_username'];
		
		$sql_mem = "select * from my_member where m_username = '$m_username' and b_username='$b_username'";
 		$query_mem = mysql_query($sql_mem);	
		$count_mem = mysql_num_rows($query_mem);
			
		$date = date("Y-m-d H:i:s");
		if($count_mem<1){			
			$sql_insert = "insert into my_member values('','$m_username','$b_username','$date')";		
			$query_insert = mysql_query($sql_insert);
			?><script>window.location="mymember.php";</script><?
		}else{		
			?><script>alert("คุณเก็บใบสมัครนี้ไว้แล้ว"); window.location="mymember.php";</script><?
		}
}
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
          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">รายการใบสมัคร</p></font></strong>
           </div>
        </div>
   </div> 
</div>	
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="search_wrapper1">
	       <div class="clearfix">
	       	
			<!--<h1>ลงประกาศงาน</h1>-->

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ประวัติส่วนตัว

			</div>
			<div class="panel-body">
 <h4><a href="#">ข้อมูลส่วนตัว</a></h4>
 <p><strong><? echo $result1['name'];?></strong></p>
<table width="100%" border="0">
  <tr>
    <td width="25%"><p>เพศ</p></td>
    <td width="25%"><p><? if($result1['sex']=='1'){ echo "ชาย";}else{ echo "หญิง";}?></p></td>
    <td width="25%"><p>วันเดือนปีเกิด</p></td>
    <td width="25%"><p><? echo $birthday;?></p></td>
  </tr>
  <tr>
    <td><p>สถานภาพสมรส</p></td>
    <td><p><? echo $result1['status'];?></p></td>
    <td><p>สถานภาพทางทหาร</p></td>
    <td><p><? echo $seller;?></p></td>
  </tr>
  <tr>
    <td><p>สัญชาติ</p></td>
    <td><p><? echo $result1['nation'];?></p></td>
    <td><p>ศาสนา</p></td>
    <td><p><? echo $result1['religion'];?></p></td>
  </tr>
  <tr>
    <td><p>ส่วนสูง</p></td>
    <td><p><? echo $result1['h'];?></p></td>
    <td><p>น้ำหนัก</p></td>
    <td><p><? echo $result1['w'];?></p></td>
  </tr>
  <tr>
    <td><p>ที่อยู่</p></td>
    <td><p><? echo $result1['address'];?></p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>เบอร์โทร</p></td>
    <td><p><? echo $result1['phone'];?></p></td>
    <td><p>ไอดีไลน์</p></td>
    <td><p><? echo $result1['line'];?></p></td>
    </tr>
  <tr>
    <td><p>อีเมล์</p></td>
    <td><p><? echo $result1['email'];?></p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>	    
            	         
	           <hr>
		 	        
	        <h4><a href="#">ลักษณะงานที่ต้องการ</a></h4>
						<table width="100%" border="0">                          
                          <tr>
                            <td width="50%"><p>ตำแหน่ง :</p></td>
                            <td width="50%">
                            <p>1. <? echo $result2['position1'];?></p>
                            <p>2. <? echo $result2['position2'];?></p>
                            <p>3. <? echo $result2['position3'];?></p>
                           </td>
                          </tr>
                           <tr>
                             <td><p>ประเภท :</p></td>
                             <td><p><? echo $result2['type_name'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>เงินเดือน :</p></td>
                             <td><p><? echo $salary;?></p></td>
                           </tr>
                           <tr>
                             <td><p>สถานที่:</p></td>
                             <td><p><? echo $result2['PROVINCE_NAME'];?></p></td>
                           </tr>                          
                           
                        </table> 
            	        
	         <hr>
		 	         
	          <h4><a href="#">ข้อมูลการศึกษา</a></h4>	        
	        			<table width="100%" border="0">                         
                           <tr>
                             <td width="50%"><p>ระดับ :</p></td>
                             <td width="50%"><p><? echo $result_level['edu_name'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>ชื่อสถานศึกษา :</p></td>
                             <td><p><? echo $result3['school'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>คณะ:</p></td>
                             <td><p><? echo $result3['depart'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>วุฒิการศึกษา:</p></td>
                             <td><p><? echo $result3['edu'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>สาขาวิชา:</p></td>
                             <td><p><? echo $result3['branch'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>ปีที่สำเร็จ:</p></td>
                             <td><p><? echo $year;?></p></td>
                           </tr>
                           <tr>
                             <td><p>เกรดฉลี่ย:</p></td>
                             <td><p><? echo $result3['grade'];?></p></td>
                           </tr>                           
                        </table>
	        <hr>
		 	         
	          <h4><a href="#">ประสบการณ์ทำงาน</a></h4>
					<table width="100%" border="0">                          
                           <tr>
                             <td width="50%"><p>ระยะเวลา :</p></td>
                             <td width="50%">
                             <p><? echo $startdate;?> ถึง 
                             <? echo $enddate;?></p></td>
                           </tr>
                           <tr>
                             <td><p>ชื่อบริษัท :</td>
                             <td><p><? echo $result4['namebusiness'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>ที่อยู่-ติดต่อ:</p></td>
                             <td><p><? echo $result4['contact'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>เงินเดือน:</p></td>
                             <td><p><? echo $salary4;?></p></td>
                           </tr>
                           <tr>
                             <td><p>ตำแหน่ง:</p></td>
                             <td><p><? echo $result4['position'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>ระดับ:</p></td>
                             <td><p><? echo $result4['level4'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>หน้าที่ความรับผิดชอบ:</p></td>
                             <td><p><? echo $result4['role'];?></p></td></td>
                           </tr>
                           
                        </table>
	        <hr>
		 	         
	          <h4><a href="#">ทักษะและความสามารถ</a></h4>
	         <table width="100%" border="0">                          
                           <tr>
                             <td><p>ภาษา :</p></td>
                             <td><p>ไทย <span><? echo $result62['level_name'];?></span></p></td>
                             <td><p>อังกฤษ <span><? echo $result63['level_name'];?></span></p></td>
                           </tr>
                           <tr>
                             <td><p>พิมพ์ดีด :</p></td>
                             <td><p>ไทย <? echo $result6['keyth'];?><span> คำ/นาที</span></p></td>
                             <td><p>อังกฤษ <? echo $result6['keyen'];?><span> คำ/นาที</span></p></td>
                           </tr>
                           <tr>
                             <td><p>ความสามารถในการขับขี่:</p></td>
                             <td colspan="2">
                             <p>
                             <input type="checkbox" id="d1" name="d1" <? echo $d1;?> disabled> รถจักรยานยนต์
                             <input type="checkbox" id="d2" name="d2" <? echo $d2;?> disabled> รถยนต์
                             <input type="checkbox" id="d3" name="d3" <? echo $d3;?> disabled> รถบรรทุก
                              </p>
                             </td>
                           </tr>
                           <tr>
                             <td><p>มีพาหนะส่วนตัว:</p></td>
                             <td colspan="2">
                             <p>
                             <input type="checkbox" id="c1" name="c1" <? echo $c1;?> disabled> รถจักรยานยนต์
                             <input type="checkbox" id="c2" name="c2" <? echo $c2;?> disabled> รถยนต์
                             <input type="checkbox" id="c3" name="c3" <? echo $c3;?> disabled> รถบรรทุก
                             </p></td>
                           </tr>
                           <tr>
                             <td><p>ความสามารถพิเศษอื่นๆ: </p></td>
                             <td colspan="2">
                             <p><? echo $result6['special1'];?></p>
                             <p><? echo $result6['special2'];?></p>
                             <p><? echo $result6['special3'];?></p>
                             </td>
                           </tr>
                           <tr>
                             <td><p>โครงการ ผลงาน 
เกียรติประวัติ 
และประสบการณ์อื่นๆ:</p></td>
                             <td colspan="2"><p><? echo $result6['project'];?></p></td>
                           </tr>
                           
                        </table>
	        <hr>
		 	         
	          <h4><a href="#">ข้อมูลการฝึกอบรม</a></h4>
	         			<table width="100%" border="0">                          
                           <tr>
                             <td width="50%"><p>สถาบัน/หน่วยงาน/บริษัท :</p></td>
                             <td width="50%"><p><? echo $result5['place'];?></p></td>
                           </tr>
                           <tr>
                             <td><p>หลักสูตร/ตำแหน่ง :</p></td>
                             <td><p><? echo $result5['corse'];?></p></td>
                           </tr>                           
                        </table>
	        <hr>
		 </div>
           
         
          <div align="center">
          <? if($_SESSION['b_username']!=''){ ?>
          <form action="member_detail.php?action=insert&m_id=<? echo $m_id;?>" method="post">
          <input type="hidden" name="m_username" value="<? echo $username;?>">
          
          <button type="submit" class="btn btn-success btn-sm active">เก็บใบสมัคร</button>
          <a href="export_pdf.php?m_id=<? echo $m_id;?>">
          <button type="button" class="btn btn-info btn-sm active">ไฟล์ PDF</button>
          </a>
          </form>
          <? }else{?>
          <button type="button" class="btn btn-warning btn-sm active" disabled>กรุณาลงทะเบียน</button>
          <? }?>
          <br>
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
    </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>
<? include "footer.php";?>
</body>
</html>	