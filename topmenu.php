<? 
	include "connect.php";
	date_default_timezone_set("Asia/Bangkok");
	$busername = $_SESSION['b_username'];
	$sql_pk = "select * from business where b_username='".$_SESSION['b_username']."'";
 	$query_pk = mysql_query($sql_pk);
	$result_pk = mysql_fetch_array($query_pk);
	$bid = $result_pk['b_id'];
	$usernameref = $result_pk['username_ref'];
	// Get packageid, status, current date and expire date
	$sqlenddate = "select package_id, status, end_date from business_package where b_id = '$bid'";
	$queryenddate = mysql_query($sqlenddate);
	$resultbp = mysql_fetch_array($queryenddate);
	$enddate = $resultbp['end_date'];
	$status = $resultbp['status'];
	$packageid = $resultbp['package_id'];
	$currentdate = date("Y-m-d");
	// Get current post find employee from username
	$sqlcountpost = "select * from post where b_username = '$busername'";
	$querycountpost = mysql_query($sqlcountpost);
	$countpost = mysql_num_rows($querycountpost);
	// Get limit post find employee, limit search employee from package
	$sqlfind = "select package_name, package_find, package_search from package where package_id = '$packageid'";
	$queryfind = mysql_query($sqlfind);
	$resultfind = mysql_fetch_array($queryfind);
	$maxpost = $resultfind['package_find'];
	$maxsearch = $resultfind['package_search'];
	$packagename = $resultfind['package_name'];
	// Get amount of search from username
	$sqlsearch = "select sum(num) as countsearch from tb_daily where b_username = '$busername'";
	$querysearch = mysql_query($sqlsearch);
	$resultsearch = mysql_fetch_array($querysearch);
	$countsearch = $resultsearch['countsearch'];
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="index.php"><img src="images/logo1.png" alt=""/></a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
		        <li>
		            <a href="index.php" class="dropdown-toggle" >หน้าแรก</a>                    		            
		        </li>
                
                <? if($_SESSION['b_username']!=""){?>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ค้นหาผู้สมัคร<b class="caret"></b></a>
		            <ul class="dropdown-menu">
                    <? if($status == 1){?>
                    	<?if($currentdate < $enddate){?>
	                    	<?if($maxsearch == 99){?>
	                    		<li><a href="search_member.php">หาผู้สมัครงาน</a></li>
					            <li><a href="mymember.php">ใบสมัครที่เลือกไว้</a></li>
	                    	<?}else{?>
	                    		<?if($countsearch < $maxsearch){?>
	                    			<li><a href="search_member.php">หาผู้สมัครงาน</a></li>
					            	<li><a href="mymember.php">ใบสมัครที่เลือกไว้</a></li>
	                    		<?}else{?>
	                    			<li><a href="#" onClick="alert('จำนวนการค้นหาผู้สมัครงานของคุณหมดแล้ว กรุณาซื้อแพ็กเกจ!')">หาผู้สมัครงาน</a></li>
	                    			<li><a href="mymember.php">ใบสมัครที่เลือกไว้</a></li>
	                    		<?}?>
	                    	<?}?>   
				        <?}else{?>
				        	<li><a href="#" onClick="alert('แพ็กเพจของคุณหมดอายุการใช้งาน กรุณาซื้อแพ็กเกจ!')">หาผู้สมัครงาน</a></li>
			            	<li><a href="mymember.php">ใบสมัครที่เลือกไว้</a></li>
			            	<?
			            		$sqlupdatestatus = "update business_package set status = '0' where b_id = '$bid'";
			            		$queryupdatestatus = mysql_query($sqlupdatestatus);
			            	?>
				        <?}?>
					<? }else{ ?>
                    	<li><a href="#" onClick="alert('คุณยังไม่มีแพ็กเกจ กรุณาซื้อแพ็กเกจ!')">หาผู้สมัครงาน</a></li>
			           <li><a href="mymember.php">ใบสมัครที่เลือกไว้</a></li>
                     <? }?>   	
			            <!--<li><a href="#">ผู้ส่งในสมัคร</a></li>-->
			            
		            </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ประกาศงาน<b class="caret"></b></a>
		            <ul class="dropdown-menu">
                    <? if($status == 1){?>
                    	<?if($currentdate < $enddate){?>
                    		<?if($maxpost == 99){?>
                    			<li><a href="post.php">ลงประกาศงาน</a></li>
			            		<li><a href="post_list.php">รายการประกาศงาน</a></li>
                    		<?}else{?>
                    			<?if($countpost < $maxpost){?>
                    				<li><a href="post.php">ลงประกาศงาน</a></li>
			            			<li><a href="post_list.php">รายการประกาศงาน</a></li>
                    			<?}else{?>
	                    			<li><a href="#" onClick="alert('จำนวนการลงประกาศงานของคุณเต็มแล้ว')">ลงประกาศงาน</a></li>
				            		<li><a href="post_list.php">รายการประกาศงาน</a></li>
                    			<?}?>
                    		<?}?>
                    	<?}else{?>
				        	<li><a href="#" onClick="alert('แพ็กเพจของคุณหมดอายุการใช้งาน กรุณาซื้อแพ็กเกจ!')">ลงประกาศงาน</a></li>
			            	<li><a href="post_list.php">รายการประกาศงาน</a></li>
			            	<?
			            		$sqlupdatestatus = "update business_package set status = '0' where b_id = '$bid'";
			            		$queryupdatestatus = mysql_query($sqlupdatestatus);
			            	?>
				        <?}?>
                    <? }else{ ?>
                        <li><a href="#" onClick="alert('คุณยังไม่มีแพ็กเกจ กรุณาซื้อแพ็กเกจ!')">ลงประกาศงาน</a></li>
                        <li><a href="post_list.php">รายการประกาศงาน</a></li>
			            <!-- <li><a href="#" onClick="alert('คุณยังไม่มีแพ็กเกจ กรุณาซื้อแพ็กเกจ!')">รายการประกาศงาน</a></li> -->
                    <? }?>  
		            </ul>
		        </li>
                <? }?>
                <? if($_SESSION['b_username']==""){?>
		        <li>
		            <a href="search_jobs.php" class="dropdown-toggle" >หางาน</a>		            
		        </li>
                <? }?>
                
                <? if($_SESSION['m_username']=="" and $_SESSION['b_username']==""){?>
                <li>
		            <a href="login2.php" class="dropdown-toggle" >ประกาศงาน</a>		            
		        </li>
                <? }?>
                
                <? if($_SESSION['m_username']==""){?>
                <li>
		            <a href="package.php" class="dropdown-toggle" >แพ็กเกจ</a>		            
		        </li>
                <li>
		            <a href="pay.php" class="dropdown-toggle" >การชำระเงิน</a>		            
		        </li>
                <? }?>
                <li>
		            <a href="news.php" class="dropdown-toggle" >วาไรตี้</a>		            
		        </li>
                <li><a href="contact.php">ติดต่อเรา</a></li>
                
		         
                <? if($_SESSION['m_username']!=""){?>
		        <li>
		            <a href="myjob.php" class="dropdown-toggle" >รายการที่สมัคร</a>
		            
		        </li>
		        <li>
		            <a href="resume1.php" class="dropdown-toggle" >ฝากประวัติ</a>		            
		        </li>
		        
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><? echo $_SESSION['m_username'];?></strong><b class="caret"></b></a>
		             <ul class="dropdown-menu">
			            <li><a href="repassword.php">เปลี่ยนรหัสผ่าน</a></li>
			            <li><a href="login.php?action=logout">ออกจากระบบ</a></li>
			            
		             </ul>
		        </li>
		        <? }?>
                <? if($_SESSION['b_username']!=""){?>		        
                <li class="dropdown">
                	<?if($status == 1){?>
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#FFD801"><strong><? echo $_SESSION['b_username'].' ('.$packagename.')';?></strong></font><b class="caret"></b></a>
                	<?}else{?>
		            	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#FFD801"><strong><? echo $_SESSION['b_username'];?></strong></font><b class="caret"></b></a>
		            <?}?>
		            <ul class="dropdown-menu">
			            <li><a href="business.php">ข้อมูลบริษัท</a></li>
			            <?if($usernameref == 1){?>
			            	<li><a href="manage_user.php">จัดการผู้ใช้งาน</a></li>
			            <?}?>
			            <li><a href="repassword2.php">เปลี่ยนรหัสผ่าน</a></li>
			            <li><a href="login2.php?action=logout">ออกจากระบบ</a></li>
		            </ul>
		        </li>
                <? }?>               
    
                <? if($_SESSION['m_username']=="" and $_SESSION['b_username']==""){?>
                
                
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">เข้าสู่ระบบ<b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="login.php">เข้าสู่ระบบ : ผู้สมัครงาน</a></li>
			            <li><a href="login2.php">เข้าสู่ระบบ : ผู้ประกอบการ</a></li>
                        <li><a href="register.php">ลงทะเบียน : ผู้สมัครงาน</a></li>
			            <li><a href="register2.php">ลงทะเบียน : ผู้ประกอบการ</a></li>
		            </ul>
		        </li>
		        <? }?>
	        </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
	</nav>