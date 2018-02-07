<? 
session_save_path("./session/");
session_start();
	$username = $_SESSION['b_username'];
	//username = "admin";
	include "connect.php";
	include "fchangdate.php";


	
	
	$sql_pro = "select * from province order by PROVINCE_NAME";
	$query_pro = mysql_query($sql_pro);
		
	
 	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);
	
	
	$sql_list2 = "select * from info2";
 	$query_list2 = mysql_query($sql_list2);

	$rows=3;
	$page=$_GET["page"];
	if($page==""){
		$page=1;
	}
	
	$total_data=mysql_num_rows(mysql_query($sql_list2));
	$total_page=ceil($total_data/$rows);
	$start=($page-1)*$rows;
	
	
	$sql_list = "select * from info2 limit $start,$rows";

 	$query_list = mysql_query($sql_list);
	
	
		$province_id = $_GET['province_id'];
		$type_id = $_GET['type_id'];
		$keyword = $_GET['keyword'];
		
		if($province_id=='' and $type_id==''){ 
		 $sql_list = "select * from info2 where position1 LIKE '%$keyword%' limit $start,$rows";
		$sql_list3 = "select * from info2 where position1 LIKE '%$keyword%'";
		}else if($province_id==''){ 
		$sql_list = "select * from info2 where type_id = '$type_id' and position1 LIKE '%$keyword%' limit $start,$rows";
		$sql_list3 = "select * from info2 where type_id = '$type_id' and position1 LIKE '%$keyword%'";
		}else if($type_id==''){		
		$sql_list = "select * from info2 where PROVINCE_ID= '$province_id' and position1 LIKE '%$keyword%' limit $start,$rows";
		$sql_list3 = "select * from info2 where PROVINCE_ID = '$province_id' and position1 LIKE '%$keyword%'";
		}else{		
		$sql_list = "select * from info2 where PROVINCE_ID = '$province_id' and type_id = '$type_id' and position1 LIKE '%$keyword%' limit $start,$rows";
		$sql_list3 = "select * from info2 where PROVINCE_ID = '$province_id' and type_id = '$type_id' and position1 LIKE '%$keyword%'"; 		
		}
		$query_list = mysql_query($sql_list);
		$total_data=mysql_num_rows(mysql_query($sql_list3));
		$total_page=ceil($total_data/$rows);
		
	$strSQL = "SELECT * FROM files where FilesID='2'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

	$strSQL1 = "SELECT * FROM files where FilesID='6'";
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");

	$strSQL2 = "SELECT * FROM files where FilesID='4'";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");


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
<!----font-Awesome----->
</head>
<body>
<? include "topmenu.php";?>

<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
	      <div id="search_form" class="clearfix">
		    <h1>ค้นหาพนักงานที่คุณต้องการ</h1>
		    <p>
            <form action="search_member.php" method="GET">
             
            <table><tr><td colspan="2">
            <select name="type_id" class="form-control jb_1">
						<option value="">ทุกอาชีพ</option>
                                        <? while($result_type = mysql_fetch_array($query_type)){?>
                                        <option value="<? echo $result_type['type_id'];?>"><? echo $result_type['type_name'];?></option>
                                        <? }?>
            </select>
            </td></tr>
            <tr>
            <td colspan="2">
            <select name="province_id" class="form-control jb_1">
						<option value="">ทุกจังหวัด</option>
                            <? while($result_pro = mysql_fetch_array($query_pro)){?>
                            <option value="<? echo $result_pro['PROVINCE_ID'];?>"><? echo $result_pro['PROVINCE_NAME'];?></option>
                            <? }?>
            </select>
            </td>
            </tr>
            <tr>
              <td><input  name="keyword" type="text" placeholder="ตำแหน่งงานที่เกี่ยวข้อง"></td>
              <td><label class="btn2 btn-2 btn2-1b"><input type="submit" value="ค้นหา"></label></td>
            </tr>
            </table>
            </br></br>
             
			 
			 
			
            </form>             
             
			</p>
           </div>
		</div>
   </div> 
</div>	


<div class="container">
    <div class="single">  
	   <div class="col-md-9 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">ผลการค้นหา</a></li>
			  <!--<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">งานราชการ</a></li>-->
		   </ul>
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
          
          <? if($total_data<1){ echo "<center><font size=5px; color=red>ไม่พบข้อมูล </font></center>";} ?>
         <? 
			$i=0;
			while($result_list = mysql_fetch_array($query_list)){
			$i++;

		    $PROVINCE_ID = $result_list['PROVINCE_ID'];
			$sql_pro2= "select * from province where PROVINCE_ID = '$PROVINCE_ID'";
			$query_pro2 = mysql_query($sql_pro2);
			$result_pro2 = mysql_fetch_array($query_pro2);

			$username1 = $result_list['username'];
			$sql_user= "select * from info1 where username='$username1'";
			$query_user = mysql_query($sql_user);
			$result_user = mysql_fetch_array($query_user);

			$sql4 = "select * from member where m_username = '$username1'";
 			$query4 = mysql_query($sql4);
			$result4 = mysql_fetch_array($query4);
			$member_id = $result4['member_id'];

		?>  
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="member_detail.php?m_id=<? echo $member_id;?>"><img src="images/jobgo1.jpg" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date"><?$dt = new DateTime($result_list['datetime']); echo date_format($dt, 'd');?><span><?echo date_format($dt, 'M');?></span></div>
						<div class="date_desc"><h6 class="title"><a href="member_detail.php?m_id=<? echo $member_id;?>"><? echo $result_list['position1'];?></a></h6>
						  <span class="meta"><? echo $result_pro2['PROVINCE_NAME'];?></span>
						</div>
						<div class="clearfix"> </div>
                        <p>เงินเดือนที่ต้องการ : <? echo $result_list['salary'];?></p>
						<p>เพศ : <? if($result_user['sex']=='1'){ echo "ชาย";}else{ echo "หญิง";}?></p>
						<p class="description"><a href="member_detail.php?m_id=<? echo $member_id;?>" class="read-more">รายละเอียดผู้สมัคร>></a></p>
                    </div>
                    
					<!--<div class="clearfix"> </div>-->
				</div>
			 </div><hr>
             
           <? }?>  
             
		  </div>
          
          
		 
	  </div>
     </div>
    </div>
    
   
    <ul class="pagination jobs_pagination">
		<!--<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
		<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>-->
		
           <? if($total_data>0){?>
        <? if($page==1){ ?>
        <li class="disabled"><a href="#"><span aria-hidden="true">«</span></a></li>
        <? }else{?>
        <li><a href="search_member.php?page=<?=$page-1?>&province_id=<?=$province_id?>&type_id=<?=$type_id?>&keyword=<?=$keyword?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <? }?>

        <? for($i=1;$i<=$total_page;$i++) { ?>

        <li <?if($page==$i){ echo 'class="active"';}?> ><a href="search_member.php?page=<?=$i?>&province_id=<?=$province_id?>&type_id=<?=$type_id?>&keyword=<?=$keyword?>"><? echo $i ?> </a></li>
        
        <? } ?>
        <? if($page==$total_page){ ?>
        <li class="disabled"><a href="#"><span aria-hidden="true">»</span></a></li>
        <? }else{?>
        <li><a href="search_member.php?page=<?=($page+1)?>&province_id=<?=$province_id?>&type_id=<?=$type_id?>&keyword=<?=$keyword?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        <? }?>
        <? }?>
		<!--<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>-->
	</ul>
    
   </div>


   <div class="col-md-3">
   </div><div class="col-md-3">
    <img src="images/b1.jpg" class="img-responsive" alt=""/><br>
    <img src="images/b1.jpg" class="img-responsive" alt=""/><br>
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
</div>
<!--
	   	  <div class="widget_search">
			<h5 class="widget-title">Search</h5>
			<div class="widget-content">
				<span>I'm looking for a ...</span>
                <select class="form-control jb_1">
					<option value="0">Job</option>
					<option value="">Category</option>
					<option value="">Category</option>
					<option value="">Category</option>
					<option value="">Category</option>
				</select>
                <span>in</span>
                <input type="text" class="form-control jb_2" placeholder="Location">
                <input type="text" class="form-control jb_2" placeholder="Industry / Role">
                <input type="submit" class="btn btn-default" value="Search">
			</div>
		  </div>
	   	  <div class="col_3">
	   	  	<h3>Work Experiance</h3>
	   	  	  <table class="table">
                    <tbody>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Senior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Middle
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Junior
                            </td>
                            <td>
                                (56)
                            </td>
                        </tr>
                </tbody>
             </table>
	   	  </div>
	   	  <div class="col_3">
	   	  	<h3>Work Permit</h3>
	   	  	<table class="table">
                    <tbody>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Full time
                            </td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <input type="checkbox" class="checkbox">
                            </td>
                            <td class="hidden-xs">
                                Parttime
                            </td>
                        </tr>
                    </tbody>
             </table>
	   	  </div>
          -->
	   </div>
  <div class="clearfix"> </div>
 </div>
</div></br></br>
<? include "footer.php";?>
</body>
</html>	