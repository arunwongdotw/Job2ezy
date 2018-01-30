<!DOCTYPE HTML>

<html>
<head>
<title>จำนวนคลิ๊กใบสมัคร</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>

<?php

	include "connect.php";


	// Today //
	$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM tb_counter WHERE DATE = '".date("Y-m-d")."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strToday = $objResult["CounterToday"];

	// Yesterday //
	$strSQL = " SELECT NUM FROM tb_daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strYesterday = $objResult["NUM"];

	// This Month //
	$strSQL = " SELECT SUM(NUM) AS CountMonth FROM tb_daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strThisMonth = $objResult["CountMonth"];

	// Last Month //
	$strSQL = " SELECT SUM(NUM) AS CountMonth FROM tb_daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m',strtotime("-1 month"))."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strLastMonth = $objResult["CountMonth"];

	// This Year //
	$strSQL = " SELECT SUM(NUM) AS CountYear FROM tb_daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strThisYear = $objResult["CountYear"];

	// Last Year //
	$strSQL = " SELECT SUM(NUM)+200 AS CountYear FROM tb_daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strLastYear = $objResult["CountYear"];
	

	//*** Close MySQL ***//
	mysql_close();
?>
<hr>
<table width="20%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><div align="center"><strong>จำนวนคลิ๊กใบสมัคร</strong></div></td>
  </tr>
  <tr>
    <td width="98">วันนี้</td>
    <td width="75"><div align="center"><?php echo number_format($strToday,0);?></div></td>
  </tr>
  <tr>
    <td>เมื่อวาน</td>
    <td><div align="center"><?php echo number_format($strYesterday,0);?></div></td>
  </tr>
  <tr>
    <td>เดือนนี้</td>
    <td><div align="center"><?php echo number_format($strThisMonth,0);?></div></td>
  </tr>
  <tr>
    <td>เดือนที่แล้ว</td>
    <td><div align="center"><?php echo number_format($strLastMonth,0);?></div></td>
  </tr>
  <tr>
    <td>ปีนี้</td>
    <td><div align="center"><?php echo number_format($strThisYear,0);?></div></td>
  </tr>
  <tr>
    <td>ปีที่ผ่านมา </td>
    <td><div align="center"><?php echo number_format($strLastYear,0);?></div></td>
  </tr>
</table>
<hr>
</body>
<html>