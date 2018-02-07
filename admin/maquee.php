<? 
session_save_path("../session/");
session_start();
	include "../connect.php";
	include "../fchangdate.php";

 	$sql1 = "select * from maquee";
 	$query1 = mysql_query($sql1);
	
	
if($_REQUEST['action']=='update'){
	$strSQL = "UPDATE maquee  SET maquee_name = '".$_POST['maquee_name']."' WHERE maquee_id = '".$_GET['maquee_id']."'";
	$objQuery = mysql_query($strSQL);		
	?><script>alert("อัพเดทข้อความเรียบร้อย"); window.location="maquee.php";</script><?	
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
<style>
td {
    height: 50px;
    vertical-align: middle
}
</style>
</head>
<body>
<? include "admin_menu.php";?>


<div class="about"> 
<div class="container">
    <div class="about-head">
  <center><h1>จัดการ ข้อความวิ่ง</h1></center>
 <br>

  </div>


    <div class="about-in">
    <? if($_REQUEST['action']=='edit'){
		$sql2 = "select * from maquee where maquee_id='".$_GET['maquee_id']."'";
 		$query2 = mysql_query($sql2);
		$result2 = mysql_fetch_array($query2);
		?>
     <table width="80%" border="4" bordercolor="#F87217" align="center">
     <tr>
     <th><br>
     <div align="center">
    <form action="maquee.php?action=update&maquee_id=<? echo $_GET['maquee_id'];?>" method="post">
    <textarea name="maquee_name" class="form-control"><? echo $result2['maquee_name'];?></textarea>
    <br><p align="center">
    <button type="submit" class="btn btn-success btn-sm">อัพเดท</button>
    </p><br>
    </form>
    </div>
    </th>
    </tr>
    </table>
    <hr>
    <? }else{?>
   
<table width="80%" border="2" bordercolor="#9900CC" align="center">
  <tr bgcolor="#FFF5EE" >
    <th align="center">No.</th>
    <th align="center">หน้าที่แสดง</th>
    <th align="center">ข้อความ</th>
    <th align="center">จัดการ</th>
  </tr>
  <? while($result1 = mysql_fetch_array($query1)){?>
  <tr>
    <td align="center" ><? echo $result1['maquee_id'];?></td>
     <td align="center" ><? echo $result1['maquee_page'];?></td>
    <td><? echo $result1['maquee_name'];?></td>
    <td align="center">
    <a href="maquee.php?action=edit&maquee_id=<? echo $result1['maquee_id'];?>">
    <button type="button" class="btn btn-warning btn-sm">แก้ไข</button>
    </a>
    </td>
  </tr>
  <? }?>
</table>

 <? }?>   
		
		
                   
  </div>
  </div>
  

  
   <div class="clearfix"></div>
</div></div></div><br>


<? //include "footer.php";?>
</body>
</html>