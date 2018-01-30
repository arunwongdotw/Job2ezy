<? include "connect.php"; ?>

<? if($_GET['result33']=='name1'){ 
$select_id = $_GET['select_id'];
	$rstTemp=mysql_query("select * from tb_hotel2 where name ='$select_id'");
	$arr_2=mysql_num_rows($rstTemp);
	if($arr_2>0){ echo "<font color='red' size='2'><b>***ชื่อโรงแรมซ้ำ!^^<b></font>";
	}
	}
?>

<? if($_GET['result33']=='email1'){ 
$select_id = $_GET['select_id'];
	$rstTemp=mysql_query("select * from tb_hotel2 where email ='$select_id'");
	$arr_2=mysql_num_rows($rstTemp);
	if($arr_2>0){ echo "<font color='red' size='2'><b>***อีเมล์มีอยู่แล้ว!^^<b></font>";
	}
	}
?>

<? if($_GET['result33']=='phone4'){ 
$select_id = $_GET['select_id'];
	$rstTemp=mysql_query("select * from tb_hotel2 where phone1 ='$select_id'");
	$arr_2=mysql_num_rows($rstTemp);
	if($arr_2>0){ echo "<font color='red' size='2'><b>***เบอร์โทนี้มีอยู่แล้ว!^^<b></font>";}
	//else{	echo "<font color='green' size='2'><b>***เบอร์โทรนี้ใช้ได้คับ^^<b></font>";
	}
?>
	


<? if($_GET['result33']=='amphur'){ 
$select_id = $_GET['select_id'];
	$rstTemp=mysql_query("select * from amphur where PROVINCE_ID ='$select_id'");
	?> <option value="">--- อำเภอ ---</option><?
	while($arr_2=mysql_fetch_array($rstTemp)){
?>
	<option value="<?=$arr_2['AMPHUR_ID']?>"><?=$arr_2['AMPHUR_NAME']?></option>
<? }}?>

<? if($_GET['result33']=='district'){ 
	$select_id = $_GET['select_id'];
	$rstTemp=mysql_query("select * from district where AMPHUR_ID ='$select_id'");
	?> <option value="">--- ตำบล ---</option><?
	while($arr_2=mysql_fetch_array($rstTemp)){
?>
	<option value="<?=$arr_2['DISTRICT_ID']?>"><?=$arr_2['DISTRICT_NAME']?></option>
<? }}?>

<? if($_GET['result33']=='postcode1'){ 
	$select_id = $_GET['select_id'];
	echo $rstTemp=mysql_query("select * from district where DISTRICT_ID ='$select_id'");
	$arr_2=mysql_fetch_array($rstTemp);
?>
	<input id="postcode1" name="postcode1" class="form-control" type="text" value="555<? //echo $arr_2['DISTRICT_CODE'];?>">
<? }?>