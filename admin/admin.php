<? 
session_save_path("../session/");
session_start();
	//$username = $_SESSION['b_username'];*/
	include "../connect.php";
	include "../fchangdate.php";

 	/*$sql1 = "select * from maquee";
 	$query1 = mysql_query($sql1);
	$result1 = mysql_fetch_array($query1);*/
	
if($_REQUEST['action']=='update'){
	$strSQL = "UPDATE files  SET NAME = '".$_POST['txtName']."',Url = '".$_POST['txtUrl']."' WHERE FilesID = '".$_GET['FilesID']."'";
	$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/banner/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("../myfile/banner/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE files ";
			$strSQL .=" SET FilesName = '".$_FILES["filUpload"]["name"]."' WHERE FilesID = '".$_GET["FilesID"]."' ";
			$objQuery = mysql_query($strSQL);		

			//echo "Copy/Upload Complete<br>";
			?><script>window.location="admin.php";</script><?
		}
	}	
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>ผู้ดูแลระบบ || Job2ezy</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--menu-->
<script src="../js/scripts.js"></script>
<link href="../css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--//menu-->
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Real Home Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<? include "admin_menu.php";?>


<div class="about"> 
<div class="container">
    <div class="about-head">
  <center><h1>จัดการ ฺBanner</h1></center>
 <br>
<!--
  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'1')">รูปภาพหลัก</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'2')">Banner</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'3')">ข้อความวิ่ง</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'4')">แพ็คเกจ</button>
  </div>
-->
  
 <!-- <div id="1" class="w3-container w3-border city">-->
    <div class="about-in">
<?    	
	$strSQL = "SELECT * FROM files";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="100%" border="3">
<tr>
<th width="50"> <div align="center">Files ID </div></th>
<th width="150"> <div align="center">Picture</div></th>
<th width="150"> <div align="center">Name</div></th>
<th width="150"> <div align="center">Url</div></th>
<th width="150"> <div align="center">Edit</div></th>
</tr>
<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<? if($_REQUEST['action']=='edit' and $objResult["FilesID"]==$_REQUEST['FilesID']){?>
<form name="form1" method="post" action="admin.php?action=update&FilesID=<?php echo $_GET["FilesID"];?>" enctype="multipart/form-data">
<tr>
<td><div align="center"><?php echo $objResult["FilesID"];?></div></td>
<td>
<center><img src="../myfile/banner/<?php echo $objResult["FilesName"];?>" width='70%';></center>
<br>

	
	<input type="file" name="filUpload" class="btn btn-primary btn-sm"><br>
	<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["FilesName"];?>">

</td>
<td><center><input type="text" name="txtName" value="<?php echo $objResult["Name"];?>" class="form-control" autofocus></center></td>
<td><center><input type="text" name="txtUrl" value="<?php echo $objResult["Url"];?>" class="form-control"></center></td>
<td>

<center>
<a href="admin.php?action=edit&FilesID=<?php echo $objResult["FilesID"];?>"><button type="submit" class="btn btn-success btn-sm">อัพเดท</button></a>
</center>

</td>
</tr>
</form>
<? }else{?>
<tr>
<td><div align="center"><?php echo $objResult["FilesID"];?></div></td>
<td><br><center><img src="../myfile/banner/<?php echo $objResult["FilesName"];?>" width='70%';></center><br></td>
<td><center><?php echo $objResult["Name"];?></center></td>
<td><center><?php echo $objResult["Url"];?></center></td>
<td>
<center>
<a href="admin.php?action=edit&FilesID=<?php echo $objResult["FilesID"];?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
</center>

</td>
</tr>
<? }?>

<?	} ?>
</table>      <!--<h6 >ข่าว.....</h6>-->
    </div>
  </div>

<!--
  <div id="3" class="w3-container w3-border city" style="display:none">
    <div class="about-in">
    <form action="" method="post">
    <textarea name="maquee" class="form-control"><? echo $result1['maquee_name'];?></textarea>
    <br>
    <button type="submit" class="btn btn-success btn-sm">อัพเดท</button>
    </form>               
        <h6 >..</h6>
        <br>
    </div>
  </div>
  -->

  
   <div class="clearfix"></div>
</div></div></div><br>


<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

<? //include "footer.php";?>
</body>
</html>