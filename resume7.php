<? 
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin2";
include "connect.php"; 
include "fchangdate.php";
$sql_pro2 = "select * from province order by PROVINCE_NAME";
 $query_pro2 = mysql_query($sql_pro2);
	
 	$sql_level = "select * from level_pasa";
 	$query_level = mysql_query($sql_level);
	
	$sql_level2 = "select * from level_pasa";
 	$query_level2 = mysql_query($sql_level2);
	
	$sql_value3 = "select * from info6  where username='$username'";
	$query_value3 = mysql_query($sql_value3);
	$count3 = mysql_num_rows($query_value3);
	$result_value3 = mysql_fetch_array($query_value3);
	$th1 = $result_value3['th'];
	$en1 = $result_value3['en'];
	
	$sql_th = "select * from level_pasa where level_id = '$th1'";
	$query_th = mysql_query($sql_th);	
	$result_th = mysql_fetch_array($query_th);
	$level_th = $result_th['level_name'];
	
	$sql_en = "select * from level_pasa where level_id = '$en1'";
	$query_en = mysql_query($sql_en);	
	$result_en = mysql_fetch_array($query_en);
	$level_en = $result_en['level_name'];
	
//----------------------------------------------
	$th = $_POST['th'];
	$en = $_POST['en'];
	$keyth = $_POST['keyth'];
	$keyen = $_POST['keyen'];
	$d1 = $_POST['d1'];
	$d2 = $_POST['d2'];
	$d3 = $_POST['d3'];
	$c1 = $_POST['c1'];
	$c2 = $_POST['c2'];
	$c3 = $_POST['c3'];
	$special1 = $_POST['special1'];	
	$datetime = date("Y-m-d H:i:s");
	$info6_id0 = $_REQUEST['info6_id0'];
if($_REQUEST['action']=='insert') {
		
	if($count3<1){
		$sql1 = "insert into info6 values('','$th','$en','$keyth','$keyen','$d1','$d2','$d3','$c1','$c2','$c3','$special1','$datetime','$username')";
		$query = mysql_query($sql1);
	
		if($query)
		{
			?>
			<script>
			alert("บันทึกความสามารถด้านต่างๆเรียบร้อย");
            window.location="resume7.php";
            </script>
		
			<?
		}
	}else{		
		$info6_id = $_POST['info6_id'];
 		$sql2 = "update info6 set th='$th',en='$en',keyth ='$keyth',keyen='$keyen',d1 ='$d1',d2='$d2',d3 ='$d3',c1='$c1',c2 ='$c2',c3='$c3',special1='$special1',datetime ='$datetime' where username = '$username'";	
		$query2 = mysql_query($sql2);		
		if($query2)
		{
			?>
			<script>
			alert("อัพเดทความสามารถด้านต่างๆเรียบร้อย");
            window.location="resume7.php";
            </script>	
			<?
		}
	}
}


	 if($_REQUEST['action']=='delete'){
   		$info6_id = $_REQUEST['info6_id'];
   		$sql_delete = "delete from info6 where info6_id = '$info6_id' and username = '$username'";
 		$query_delete = mysql_query($sql_delete); 
	?><script> window.location="resume7.php"; </script><?
   }	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY | เรซูเม่ :: ความสามารถ</title>
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
		    <p>บันทึกข้อมูลความสามารถด้านต่างๆ</p>
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
				$resume = "resume7";
			?>
			<? include "menu_resume.php";?>
		<div  class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active">
		    <div class="tab_grid">
			       <div class="row">
    <div class="col-md-12 col-sm-6 col-lg-8 col-md-offset-2">
		<div class="jb-accordion-wrapper">
			<div class="jb-accordion-title">ความสามารถ
			</div>
			<div class="panel-body">
			
			<!-------------------------   edit   ------------------------------>
            <? if($count3<1 or $_REQUEST['action']=='edit'){?>
				<form action="resume7.php?action=insert" method="post">
                <input name="info6_id" type="hidden" value="<? echo $info6_id0;?>">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="dob" style="color:Green; font-weight: bold; ">ความสามารถทางภาษา</label>
								 <p style="color: #0000FF; font-weight: bold;">ภาษาไทย</p>
								<div class="form-group">
							
							<select name="th" class="form-control">
							<option selected>-- ระดับ --</option>
							<? while($result_level = mysql_fetch_array($query_level)){?>
                                <option value="<? echo $result_level['level_id'];?>" <? if($result_level['level_id']==$result_value3['th']){ echo "selected";}?>><? echo $result_level['level_name'];?></option>
                            <? }?>
							</select>
							</div>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><br>
			    						<p style="color: #0000FF; font-weight: bold;">ภาษาอังกฤษ</p>
			    			<select name="en" class="form-control">
							<option selected>-- ระดับ --</option>
							<? while($result_level2 = mysql_fetch_array($query_level2)){?>
                                <option value="<? echo $result_level2['level_id'];?>" <? if($result_level2['level_id']==$result_value3['en']){ echo "selected";}?>><? echo $result_level2['level_name'];?></option>
                            <? }?>
							</select>
			    					</div>
			    				</div>
			    		</div>
			    		
			    		<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="dob" style="color:Green; font-weight: bold;">พิมพ์ดีด</label>
								
								 <p style="color: #0000FF; font-weight: bold;">ภาษาอังกฤษ</p>
								<div class="form-group">
									 <input name="keyth" class="form-control" type="number" placeholder="คำ/นาที" value="<? echo $result_value3['keyth'];?>"><br>
							</div>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><br>
			    						<p style="color: #0000FF; font-weight: bold;">ภาษาไทย</p>
								<div class="form-group">
									 <input name="keyen" class="form-control" type="number" placeholder="คำ/นาที"  value="<? echo $result_value3['keyen'];?>"><br>
								</div>
			    			</div>
			    		</div>
			    				
			    		</div>
			    		<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="dob" style="color:Green; font-weight: bold;">ความสามารถในการขับขี่</label>
								
								<div>
                             <label class="radio-inline">
							 <input type="checkbox" id="d1" name="d1" <? if($result_value3['d1']=='on'){ echo "checked";}?>> รถจักรยานยนต์<br>
                             <input type="checkbox" id="d2" name="d2" <? if($result_value3['d2']=='on'){ echo "checked";}?>> รถยนต์<br>
                             <input type="checkbox" id="d3" name="d3" <? if($result_value3['d3']=='on'){ echo "checked";}?>> รถบรรทุก</label>
							</div>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div>
			    						<label for="dob" style="color:Green; font-weight: bold;">ใบอนุญาติขับขี่</label><br>
			    			 <label class="radio-inline">
							 <input type="checkbox" id="c1" name="c1" <? if($result_value3['c1']=='on'){ echo "checked";}?>> รถจักรยานยนต์<br>
                             <input type="checkbox" id="c2" name="c2" <? if($result_value3['c2']=='on'){ echo "checked";}?>> รถยนต์<br>
                             <input type="checkbox" id="c3" name="c3" <? if($result_value3['c3']=='on'){ echo "checked";}?>> รถบรรทุก</label>
			    					</div>
			    				</div>
			    		</div>
			    	</br>
		
		<label for="dob" style="color: green; font-weight: bold;">ความสามารถพิเศษอื่น ๆ</label>
						<textarea name="special1" class="form-control" type="text" style="resize: vertical;"><? echo $result_value3['special1'];?></textarea>

					<div class="clearfix"> </div><br>
			  <div class="row">
				  <div class="form-actions floatRight">

					<input type="submit" value="บันทึกข้อมูล" class="btn btn-primary btn-sm">
                   <a href="resume7.php"><input type="submit" value="ยกเลิก" class="btn btn-primary btn-sm"></a>
                  </div>
              </div>
</form>
<? }?>

<? if($count3>0 and $_REQUEST['action']!='edit'){?>
<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="dob" style="color:Green; font-weight: bold;">ความสามารถทางภาษา</label>
								 <p style="color: #0000FF; font-weight: bold;">ภาษาไทย</p>
								<div class="form-group">
							<? echo $level_th;?>
							</div>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><br>
			    						<p style="color: #0000FF; font-weight: bold;">ภาษาอังกฤษ</p>
			    			<? echo $level_en;?>
			    					</div>
			    				</div>
			    		</div>
			    		
			    		<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="dob" style="color:Green; font-weight: bold;">พิมพ์ดีด</label>
								
								 <p style="color: #0000FF; font-weight: bold;">ภาษาอังกฤษ</p>
								<div class="form-group">
									<? echo $result_value3['keyth'];?> คำ/นาที"><br>
							</div>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><br>
			    						<p style="color: #0000FF; font-weight: bold;">ภาษาไทย</p>
								<div class="form-group">
									 <? echo $result_value3['keyen'];?> คำ/นาที"><br>
								</div>
			    			</div>
			    		</div>
			    				
			    		</div>
			    		<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="dob" style="color:Green; font-weight: bold;">ความสามารถในการขับขี่</label>
								
								<div class="form-group">
                             <label class="radio-inline">
							 <input type="checkbox" id="d1" name="d1" <? if($result_value3['d1']=='on'){ echo "checked";}?> disabled> รถจักรยานยนต์<br>
                             <input type="checkbox" id="d2" name="d2" <? if($result_value3['d2']=='on'){ echo "checked";}?> disabled> รถยนต์<br>
                             <input type="checkbox" id="d3" name="d3" <? if($result_value3['d3']=='on'){ echo "checked";}?> disabled> รถบรรทุก</label>
							</div>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label for="dob" style="color:Green; font-weight: bold;">ความสามารถในการขับขี่</label><br>
			    			 <label class="radio-inline">
							 <input type="checkbox" id="c1" name="c1" <? if($result_value3['c1']=='on'){ echo "checked";}?> disabled> รถจักรยานยนต์<br>
                             <input type="checkbox" id="c2" name="c2" <? if($result_value3['c2']=='on'){ echo "checked";}?> disabled> รถยนต์<br>
                             <input type="checkbox" id="c3" name="c3" <? if($result_value3['c3']=='on'){ echo "checked";}?> disabled> รถบรรทุก</label>
			    					</div>
			    				</div>
			    		</div>
                        <label for="dob" style="color: green; font-weight: bold;">ความสามารถพิเศษอื่น ๆ</label><br>
						<? echo $result_value3['special1'];?><br><br>
<div class="form-actions floatRight">
        <a href="resume7.php?action=edit&info6_id0=<? echo $result_value3['info6_id'];?>"> <button type="button" class="btn btn-primary btn-sm">แก้ไข</button></a>        
       </div>
<? }?>	
		
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