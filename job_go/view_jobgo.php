<? 
session_save_path("../session/");
session_start();
include "../connect.php";
include "../fchangdate.php";
date_default_timezone_set("Asia/Bangkok");

if($_REQUEST['action']=='del')
{    
	$strSQL = "DELETE FROM tb_jobgo ";
	$strSQL .="WHERE jobgo_id = '".$_GET["jobgo_id"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Delete [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

/*if($_REQUEST['action']=='insert'){

	$h1 = $_POST['news_Name'];
	$h2 = $_POST['txtDescription1'];
	$h3 = $_POST['content_news'];
	move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]);
	$datetime = date("Y-m-d");
	$sql = "insert into tb_news values('','$h1','$h2','$h3','".$_FILES["filUpload"]["name"]."','$datetime')";
	$query = mysql_query($sql);
	echo "บันทึกสำเร็จ";
}*/
 
 
?>

<html>
<head>
	<title>Admin : เพิ่มข่าว</title>
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
	<?php
	
	$strSQL = "SELECT * FROM tb_jobgo";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>


<?

?>
	<script src="ckeditor.js"></script>


		<!-- Sample 1 -->
		

<div class="container">
    <div class="single">  
	   <div class="form-container">
        <h2><a href="jobgo_manag.php">เพิ่มงานราชการ  |</a> ดูงานราชการทั้งหมด</h2>
		   <table class="table table-bordered">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>หัวข้อข่าว</th>
        <th>เนื้อหาย่อ</th>
        <th>เนื้อหา</th>
        <th>รูป</th>
        <th>วันที่</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    		$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i=$i+1;
?>
      <tr>
        <td><? echo $i;?></td>
        <td><?php echo $objResult["jobgo_h1"];?></td>
        <td><?php echo $objResult["jobgo_h2"];?></td>
        <td><?php echo $objResult["jobgo_h3"];?></td>
        <td><img src="myfile/<?php echo $objResult["pic"];?>" width='50%';></td>
        <td><?php echo $objResult["date"];?></td>
        <td><a href="jobgo_manag.php?jobgo_id=<?php echo $objResult["jobgo_id"];?>">แก้ไข</a></td>
        <td><a href="view_jobgo.php?action=del&jobgo_id=<?echo $objResult["jobgo_id"]; ?>" onClick="return confirm('ลบข่าว')">ลบ</a></td>
        
      </tr>
      <?php
	}
?>
      
    </tbody>
  </table></div></div></div>
		
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
