<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];

include "connect.php";
include "fchangdate.php";
$post_id = $_REQUEST['post_id'];

	$sql_list2 = "select * from post where position_id = '$post_id'";
 	$query_list2 = mysql_query($sql_list2);
	$result_list2= mysql_fetch_array($query_list2);
	$province_id = $result_list2['province_id'];
	
	$sql_pro = "select * from province where PROVINCE_ID = '$province_id'";
 	$query_pro = mysql_query($sql_pro);
	$result_pro = mysql_fetch_array($query_pro);

	$b_name = $result_list2['b_username'];
	$sql_list3 = "select * from business where b_username = '$b_name'";
 	$query_list3 = mysql_query($sql_list3);
	$result_list3= mysql_fetch_array($query_list3);


	$sql1 = "SELECT * FROM info1 where username = '$username'";
$query1 = mysql_query($sql1);
//$count1 = mysql_num_rows($query1);
$result1 = mysql_fetch_array($query1);

if($result1['sex']=='1'){ "ชาย";}else{ "หญิง";}
echo $result1['name'];
echo $result1['email'];
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

  $th1 = $result6['th'];
  $en1 = $result6['en'];
  
  $sql_th = "select * from level_pasa where level_id = '$th1'";
  $query_th = mysql_query($sql_th); 
  $result_th = mysql_fetch_array($query_th);
  $level_th = $result_th['level_name'];
  
  $sql_en = "select * from level_pasa where level_id = '$en1'";
  $query_en = mysql_query($sql_en); 
  $result_en = mysql_fetch_array($query_en);
  $level_en = $result_en['level_name'];

if($result1['sex']=='1'){ $sex =  "ชาย";}else{ $sex = "หญิง";}
$birthday = dmy($result1['birthday']);
$startdate = dmy($result4['startdate']);
$enddate = dmy($result4['enddate']);
$year = mount_thai($result3['year']);
$salary4 = number_format($result4['salary4']);
$salary = number_format($result2['salary']);

if($result1['seller']=='1'){  "ผ่านเกณฑ์";}else{  "ยังไม่ผ่านเกณฑ์";}
if($result6['d1']=='on'){  $d1= "checked";}
if($result6['d2']=='on'){  $d2= "checked";}
if($result6['d3']=='on'){  $d3= "checked";}
if($result6['c1']=='on'){  $c1= "checked";}
if($result6['c2']=='on'){  $c2= "checked";}
if($result6['c3']=='on'){  $c3= "checked";}
	//------------------------***-----------------------

if($_REQUEST['action']=='insert'){
    $position_id = $_POST['position_id'];
    
    $sql_job = "select * from job_list where position_id = '$position_id' and m_username = '$username'";
    $query_job = mysql_query($sql_job); 
    $count_job = mysql_num_rows($query_job);

$strTo = "sssss.modaw@gmail.com";
//$strTo = $result_list3['email'];
//$strTo = "".$result_list3['email']."";

$strSubject = " สมัครงานตำแหน่ง:  ".$result_list2['position']." ";
$strHeader = "Content-type: text/html; charset=UTF-8\n"; // or UTF-8 //
//$strHeader .= "From: ".$result1['email']."\nReply-To: ".$result1['email']."";
$strHeader .= "From: ".$result1['email']."\nReply-To: ".$result1['email']."";
$strMessage = "	
    <h4>ข้อมูลส่วนตัวผูสมัครงานตำแหน่ง:  ".$result_list2['position']."</h4>

    <center>
    <table width='70%'; border='1px'  bordercolor='#CC003' cellpadding='10'>
    <tr><td align='left' valign='bottom' >
        <center><p style='font-size:20px;'><strong> ".$result1['name']." </strong></p></center><hr>
    
		 	        
	       <div> <h4><font> ลักษณะงานที่ต้องการ</font></h4></div>
						            <table width='70%' border='0'>                          
                          <tr>
                            <td width='20%' align='left' ><p>ตำแหน่ง :</p></td>
                            <td width='20%' >
                            <p>  ". $result2['position1']."</p>
                            <p>  ". $result2['position2']."</p>
                            <p> ". $result2['position3']."</p>
                           </td>
                          </tr>
                           <tr>
                             <td align='left'><p>ประเภท :</p></td>
                             <td><p> ". $result2['type_name']."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>เงินเดือน :</p></td>
                             <td><p> ". $salary."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>สถานที่:</p></td>
                             <td><p> ". $result2['PROVINCE_NAME']."</p></td>
                           </tr>                          
                        </table> 
            	        
	                            <hr>
		 	         
	          <h4> ข้อมูลการศึกษา</h4>	        
	        		           	<table width='70%' border='0'>                         
                           <tr>
                             <td width='20%' align='left'><p>ระดับ :</p></td>
                             <td width='20%'><p> ".$result_level['edu_name']."</p></td>
                           </tr>
                           <tr>
                             <td><p align='left'>ชื่อสถานศึกษา :</p></td>
                             <td><p> ".$result3['school']."</p></td>
                           </tr>
                           <tr>
                             <td><p align='left' >คณะ:</p></td>
                             <td><p> ".$result3['depart']."</p></td>
                           </tr>
                           <tr>
                             <td align='left' ><p>วุฒิการศึกษา:</p></td>
                             <td><p> ".$result3['edu']."</p></td>
                           </tr>
                           <tr>
                             <td align='left' ><p>สาขาวิชา:</p></td>
                             <td><p> ". $result3['branch']."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ปีที่สำเร็จ:</p></td>
                             <td><p> ".$year."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>เกรดฉลี่ย:</p></td>
                             <td><p> ".$result3['grade']."</p></td>
                           </tr>                           
                        </table>
	                    <hr>
		 	         
	          <h4> ประสบการณ์ทำงาน</h4>

				                	<table width='70%' border='0'>                          
                           <tr>
                             <td width='20%' align='left'><p>ระยะเวลา :</p></td>
                             <td width='20%' >
                             <p> ".$startdate." ถึง 
                              ".$enddate."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ชื่อบริษัท :</td>
                             <td ><p> ".$result4['namebusiness']."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ที่อยู่-ติดต่อ:</p></td>
                             <td><p> ".$result4['contact']."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>เงินเดือน:</p></td>
                             <td><p> ".$salary4."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ตำแหน่ง:</p></td>
                             <td><p> ".$result4['position']."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ระดับ:</p></td>
                             <td><p> ".$result4['level4']."</p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>หน้าที่ความรับผิดชอบ:</p></td>
                             <td><p> ".$result4['role']."</p></td>
                           </tr>
                        </table>
	                       <hr>
		 	         
	                 <h4> ทักษะและความสามารถ</h4>

	                         <table width='70%' border='0'>                          
                           <tr>
                             <td width='50%' align='left'><p>ภาษา :</p></td>
                             <td width='50%' colspan='2'>
                             <p>ไทย  ".$level_th."</p>
                             <p>อังกฤษ ".$level_en."</p>  
                             </td>
                           </tr>
                           <tr>
                             <td align='left'><p>พิมพ์ดีด :</p></td>
                             <td><p>ไทย  ".$result6['keyth']."<span> คำ/นาที</span></p></td>
                             <td><p>อังกฤษ  ".$result6['keyen']."<span> คำ/นาที</span></p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ความสามารถในการขับขี่:</p></td>
                             <td colspan='2'>
                             <p>
                             <input type='checkbox' id='d1'name='d1'  ".$d1." disabled> รถจักรยานยนต์
                             <input type='checkbox' id='d2' name='d2'  ".$d2." disabled> รถยนต์
                             <input type='checkbox' id='d3' name='d3'  ".$d3." disabled> รถบรรทุก
                              </p>
                             </td>
                           </tr>
                           <tr>
                             <td align='left'><p>มีพาหนะส่วนตัว:</p></td>
                             <td colspan='2'>
                             <p>
                             <input type='checkbox' id='c1' name='c1' ".$c1." disabled> รถจักรยานยนต์
                             <input type='checkbox' id='c2' name='c2' ".$c2." disabled> รถยนต์
                             <input type='checkbox' id='c3' name='c3' ".$c3." disabled> รถบรรทุก
                             </p></td>
                           </tr>
                           <tr>
                             <td align='left'><p>ความสามารถพิเศษอื่นๆ: </p></td>
                             <td colspan='2'>
                             <p> ".$result6['special1']."</p>
                             <p> ".$result6['special2']."</p>
                             <p> ".$result6['special3']."</p>
                             </td>
                           </tr>
                           <tr>
                             <td align='left'><p>โครงการ ผลงานเกียรติประวัติ และประสบการณ์อื่นๆ:</p></td>
                             <td colspan='2'><p> ".$result6['project']."</p></td>
                           </tr>
                           
                        </table>
	                        <hr>
		 	         
	                  <h4>ข้อมูลการฝึกอบรม</h4>
        	         			<table width='70%' border='0'>                          
                           <tr>
                             <td width='50%' align='left'><p>สถาบัน/หน่วยงาน/บริษัท :</p></td>
                             <td width='50%'><p> ".$result5['place']."</p></td>
                           </tr>
                           <tr>
                             <td><p align='left'>หลักสูตร/ตำแหน่ง :</p></td>
                             <td><p> ".$result5['corse']."</p></td>
                           </tr>                           
                        </table>
	      

          </td></tr>
           </table></center>
		 
";



	//--------------------------***---------------------
	
	
	
	
			
		$date = date("Y-m-d H:i:s");
		if($count_job<1){	
      $flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader); 		
			$sql2 = "insert into job_list values('','$position_id','$username','$date')";		
			$query2 = mysql_query($sql2);
			?><script>window.location="myjob.php";</script><?
		}else{		
			?><script>alert("คุณสมัครตำแหน่งนี้แล้ว"); window.location="myjob.php";</script><?
		}
		} 



?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: หางาน</title>
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
		        <br>       
             <h1>รายละเอียด</h1>
			
           </div>
		</div>
   </div> 
</div>		
<div class="container">
    <div class="single">  
	 <div class="col-md-12 single_right">
	      <div class="search_wrapper1">
	       
	       	
			<!--<h1>ลงประกาศงาน</h1>-->

		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" >
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title" style="font-size: 18px">รายละเอียดงาน

			</div>
			<div class="panel-body">
<form name="myform" action="job_detail2.php?action=insert&post_id=<?echo $post_id?>" method="post">
                <input type="hidden" name="position_id" value="<? echo $result_list2['position_id'];?>">
					<div class="form-group">
						<p for="myName" style="font-weight: bolder;font-size: 18px">ตำแหน่งงาน :  <span style="font-size: 16px; font-weight: normal;"><? echo $result_list2['position'];?></span></p>
                        <p></p>
					</div>
                    
					<div class="form-group">
						<p for="status" style="font-weight: bolder;font-size: 18px">สถานที่ปฏิบัติงาน : <span style="font-size: 16px; font-weight: normal;"><? echo $result_pro['PROVINCE_NAME'];?></span></p>
						
					</div>
					<div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">อัตรา : <span style="font-size: 16px; font-weight: normal;"><? echo $result_list2['amount'];?></span></p>						
                        <p></p>
					</div>
                    <div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">เงินเดือน :<span style="font-size: 16px; font-weight: normal;"> <? echo number_format($result_list2['salary']);?> บาท</span> </p>
						
					</div>
                    <div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">คุณสมบัติ : </p>
						<p><? echo $result_list2['property1'];?></p>
                        <p><? echo $result_list2['property2'];?></p>
                        <p><? echo $result_list2['property3'];?></p>
                        <p><? echo $result_list2['property4'];?></p>
                        <p><? echo $result_list2['property5'];?></p>
                        <p><? echo $result_list2['property6'];?></p>
					</div>
					<div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">ลักษณะงาน :  </p>
						<p><? echo $result_list2['feature'];?></p>
					</div>
                    
                    <div class="form-group">
						<p for="nationality" style="font-weight: bolder;font-size: 16px">หมายเหตุ : </p>
                        <p><? echo $result_list2['remark'];?>
					</div>                    
                    <div class="form-group">
                    <p for="nationality" style="font-weight: bolder;font-size: 16px">การรับสมัคร : 
                    <? if($result_list2['copy1']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>สมัครด้วยตนเอง</span>
                    <? }?>    
                    <? if($result_list2['copy2']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>ส่งอีเมล์</span>
                    <? }?> 
                    <? if($result_list2['copy3']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>ส่งไปรษณีย์</span>
                    <? }?> 
                    <? if($result_list2['copy4']=='on'){?>
                    	<span style="font-size: 16px; font-weight: normal;"><input type="checkbox" checked disabled>สมัครผ่านระบบ job2ezy</span>
                    <? }?> 
                       </p>
                    </div>
			    			<div class="form-group">
						
						<span id="error_military" class="text-danger"></span>
					</div>
                    <div align="center">
					<? if($_SESSION['m_username']!=''){ ?>
					<button id="submit" type="submit" value="submit" class="btn btn-success center">สมัครงาน</button>
                    <? }else{?>
          			<button type="button" class="btn btn-warning btn-lg active" disabled>กรุณาลงทะเบียนสมาชิก</button>
          			<? }?>                    
					</div>
                    <br>
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