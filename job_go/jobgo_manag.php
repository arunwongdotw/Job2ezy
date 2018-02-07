<? 
session_save_path("../session/");
session_start();
include "../connect.php";
include "../fchangdate.php";
date_default_timezone_set("Asia/Bangkok");

$jobgo_id = $_REQUEST["jobgo_id"];

if($_REQUEST['action']=='insert'){
	 $_FILES["filUpload"]["name"];
	$h1 = $_POST['jobgo_Name'];
	$h3 = $_POST['txtDescription1'];
	$h2 = $_POST['content_jobgo'];
	move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]);
	$datetime = date("Y-m-d");
	$sql1 = "insert into tb_jobgo values('','$h1','$h2','$h3','".$_FILES["filUpload"]["name"]."','$datetime')";
	//$query = mysql_query($sql);
	//echo "บันทึกสำเร็จ";
	$sql2 = "update tb_jobgo set	jobgo_h1='$h1',jobgo_h2='$h2',jobgo_h3='$h3',pic ='".$_FILES["filUpload"]["name"]."',date ='$datetime' where jobgo_id = '".$_GET["jobgo_id"]."'";
	$sql3 = "update tb_jobgo set	jobgo_h1='$h1',jobgo_h2='$h2',jobgo_h3='$h3',date ='$datetime' where jobgo_id = '".$_GET["jobgo_id"]."'";

	if($_GET["jobgo_id"]==''){
 		$query = mysql_query($sql1);
	}else if($_GET["jobgo_id"]!='' and $_FILES["filUpload"]["name"]!=''){
		$query = mysql_query($sql2);
	}else{
		$query = mysql_query($sql3);
	}
		if($query)
		{
			?>
			<script>
			alert("บันทึกข้อมูลเรียบร้อย");
            window.location="jobgo_manag.php?jobgo_id=<? echo $_GET["jobgo_id"];?>";
            </script>
			
			<?
		}
}
		
	
 
?>

<html>
<head>
	<title>Admin : เพิ่มงานราชการ</title>
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
	<meta charset="utf-8">
</head>
<body>

	<? include "../admin/admin_menu.php";?>	
	<script src="ckeditor.js"></script>


		<!-- Sample 1 -->
		<?
		$strSQL1 = "SELECT * FROM tb_jobgo WHERE jobgo_id = '".$_GET["jobgo_id"]."' ";
		$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		$objResult1 = mysql_fetch_array($objQuery1);
	
	?>

<div class="container">
    <div class="single">  
	   <div class="form-container">
        <h2><a href="jobgo_manag.php">เพิ่มงานราชการ</a>  <a href="view_jobgo.php"> | รายการงานราชการ</a></h2>
		<form action="jobgo_manag.php?action=insert&jobgo_id=<?echo $jobgo_id; ?>" method="post" enctype="multipart/form-data">
				<div class="row">
			 <div class="form-group col-md-12">
                <p style="font-size: 18px;color: red">รูปหลักของงาน</p>
                <div class="col-md-12">
                    <img src="myfile/<? echo $objResult1["pic"];?>" width="200"><span><input type="file" name="filUpload"></span>
                        <hr>
                </div>
            </div>
         </div>


			<div class="row">
			 <div class="form-group col-md-12">
                <p style="font-size: 18px;color: red">หัวข้องาน</p>
                <div class="col-md-12">
                    <input type="text" name="jobgo_Name" id="firstName" class="form-control input-sm" value="<?php echo $objResult1["jobgo_h1"];?>"/>
                    	
                </div>
            </div>
         </div>
         <div class="row">
			 <div class="form-group col-md-12">
                <p style="font-size: 18px;color: red">ประวัติงานโดยย่อไม่เกิน 500 ตัวอักษร/2 บรรทัด</p>
                <div class="col-md-12">
                    <input type="text" name="content_jobgo" id="firstName" class="form-control input-sm" value="<?php echo $objResult1["jobgo_h2"];?>"/>
                    	
                </div>
            </div>
         </div>
         <div class="row">
			 <div class="form-group col-md-12">
                <p style="font-size: 18px;color: red">วันที่</p>
                <div class="col-md-12">
                   
 <input type="date" name="day" class="form-control input-sm" value="<?php echo $objResult1["date"];?>">

                </div>
            </div>
         </div>
			<div class="row">
            <div class="form-group col-md-12">
                <p style="font-size: 18px;color: red">เนื้อหางานทั้งหมด</p>
                <div class="col-md-12">
                    
                    <textarea cols="80" id="txtDescription1" name="txtDescription1" rows="10" class="form-control input-sm"><?php echo $objResult1["jobgo_h3"];?>
					</textarea>
                </div>
            </div>
         </div>
 <div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="บันทึกข่าว" class="btn btn-primary btn-sm">  
                <input name="submit2" type="reset" id="submit2" class="btn btn-primary btn-sm" value="ยกเลิก"/>
            </div>
        </div>
        
		
		</form></div></div></div>
		<script>

			CKEDITOR.replace( 'txtDescription1');

		</script>
		<br>

		<!-- Sample 2 --
		<textarea cols="80" id="txtDescription2" name="txtDescription2" rows="10">
				ThaiCreate.Com
		</textarea>
		<script>

			CKEDITOR.replace( 'txtDescription2', {
				toolbar: [
					{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
					[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'Image' ],			// Defines toolbar group without name.
					'/',																					// Line break - next group will be placed in new line.
					{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
				]
			});

		</script>-->

</body>
</html>
