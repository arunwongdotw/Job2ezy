<?  
session_save_path("./session/");
session_start();
$username = $_SESSION['m_username'];
//$username = "admin";
	include "connect.php";
	include "fchangdate.php";

//------------------- ข้อความวิ่ง --------------
	$sql2 = "select * from maquee where maquee_id='1'";
 	$query2 = mysql_query($sql2);
	$result2 = mysql_fetch_array($query2);
//------------------------------------------

	$sql_pro2 = "select * from province order by PROVINCE_NAME";
	$query_pro2 = mysql_query($sql_pro2);
		
	
 	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);
	
	$sql_typeb = "select * from  type_business";
 	$query_typeb = mysql_query($sql_typeb);

	$sql_list2 = "select * from post";
 	$query_list2 = mysql_query($sql_list2);

	$rows=15;
	$page=$_GET["page"];
	if($page==""){
		$page=1;
	}
	
	$total_data=mysql_num_rows(mysql_query($sql_list2));
	$total_page=ceil($total_data/$rows);
	$start=($page-1)*$rows;
	
	
	$sql_list = "select * from post limit $start,$rows";
 	$query_list = mysql_query($sql_list);
	
	
		$province_id = $_GET['province_id'];
		$type_id = $_GET['type_id'];
		$keyword = $_GET['keyword'];
		//echo $_GET['GEO_ID'];
		if($_GET['GEO_ID']!=''){ 
			/*if($_GET['GEO_ID']==1){ $num1 = ; $num2 = 10;
			}else if($_GET['GEO_ID']==2){ $num1 = 1; $num2 = 10;}
			}else if($_GET['GEO_ID']==3){ $num1 = 1; $num2 = 10;}
			}else if($_GET['GEO_ID']==4){ $num1 = 1; $num2 = 10;}
			}else if($_GET['GEO_ID']==5){ $num1 = 1; $num2 = 10;}
			}else if($_GET['GEO_ID']==6){ $num1 = 1; $num2 = 10;}*/
		$sql_list = "select * from post p,province p2 where p2.GEO_ID = '".$_GET['GEO_ID']."' and p.province_id = p2.PROVINCE_ID limit $start,$rows";
		$sql_list3 = "select * from post p,province p2 where p2.GEO_ID = '".$_GET['GEO_ID']."' and p.province_id = p2.PROVINCE_ID";
		
		}else if($province_id=='' and $type_id==''){ 
		$sql_list = "select * from post p,province v where p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID limit $start,$rows";
		$sql_list3 = "select * from post p,province v where p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID";
		}else if($province_id==''){ 
		$sql_list = "select * from post p,province v where p.type_id = '$type_id' and p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID limit $start,$rows";
		$sql_list3 = "select * from post p,province v where p.type_id = '$type_id' and p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID";
		}else if($type_id==''){		
		$sql_list = "select * from post p,province v where p.province_id = '$province_id' and p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID limit $start,$rows";
		$sql_list3 = "select * from post p,province v where p.province_id = '$province_id' and p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID";
		}else{		
		$sql_list = "select * from post p,province v where p.province_id = '$province_id' and p.type_id = '$type_id' and p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID limit $start,$rows";
		$sql_list3 = "select * from post p,province v where p.province_id = '$province_id' and p.type_id = '$type_id' and p.position LIKE '%$keyword%' and p.province_id = v.PROVINCE_ID"; 		
		}
		$query_list = mysql_query($sql_list);
		$total_data=mysql_num_rows(mysql_query($sql_list3));
		$total_page=ceil($total_data/$rows);
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
<!--font-Awesome-->
</head>
<body>
<? include "topmenu.php";?>
<div class="banner_1">
	<div class="container">
    </br>
    <p style="font-size:14px">
        <a href="search_jobs.php?GEO_ID=1" style="color: white;"><input type="submit" class="btn btn-primary btn-xs" value="หางานภาคกลาง"></input></a>
        <a href="search_jobs.php?GEO_ID=2" style="color: white;"><input type="submit" class="btn btn-primary btn-xs" value="หางานภาคตะวันตก"></input></a>
        <a href="search_jobs.php?GEO_ID=3" style="color: white;"><input type="submit" class="btn btn-primary btn-xs" value="หางานตะวันออก"></input></a>
        <a href="search_jobs.php?GEO_ID=4" style="color: white;"><input type="submit" class="btn btn-primary btn-xs" value="หางานภาคเหนือ"></input></a>
        <a href="search_jobs.php?GEO_ID=5" style="color: white;"><input type="submit" class="btn btn-primary btn-xs" value="หางานอีสาน"></input></a>
        <a href="search_jobs.php?GEO_ID=6" style="color: white;"><input type="submit" class="btn btn-primary btn-xs" value="หางานภาคใต้"></input></a>
     
    </p>
     

		<div id="search_wrapper1">
	      <div id="search_form" class="clearfix">
         
		    <h1>ค้นหางานที่คุณต้องการ</h1>
		    <p>
            <form action="search_jobs.php" method="GET">
             
            <table><tr><td colspan="2">
            <select class="form-control jb_1" name="province_id">
                                        <option value="">ทุกจังหวัด</option>
                                        <? while($result_pro2 = mysql_fetch_array($query_pro2)){?>
                                        <option value="<? echo $result_pro2['PROVINCE_ID'];?>" <? if($result_pro2['PROVINCE_ID']==$province_id){ echo "selected";}?>><? echo $result_pro2['PROVINCE_NAME'];?></option>
                                        <? }?>
            </select>
            </td></tr>
            <tr>
            <td colspan="2">
            <select  class="form-control jb_1" name="type_id">
        <option value="">ทุกประเภท</option>
                            <? while($result_type = mysql_fetch_array($query_type)){?>
                                <option value="<? echo $result_type['type_id'];?>" <? if($result_type['type_id']==$type_id){ echo "selected";}?>><? echo $result_type['type_name'];?></option>
                            <? }?>
            </select>
            </td>
            </tr>
            <tr>
              <td><input type="text" class="text" name="keyword" placeholder="ตำแหน่งงานที่เกี่ยวข้อง"></td>
              <td><label class="btn2 btn-2 btn2-1b"><input type="submit" value="ค้นหางาน"></label></td>
            </tr>
            </table></br></br>
             
			 
			 
			
            </form>             
             
			</p>
            
           </div>
		</div>
   </div> 
</div>	

<div class="col-md-12">
  <marquee><font color="red" size="8em" face="AngsanaUPC"><? echo $result2['maquee_name'];?></font></marquee>  
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
          
          <? 
			$i=0;
			while($result_list = mysql_fetch_array($query_list)){
			$i++;
			$b_username = $result_list['b_username'];
			$sql_b = "select * from business where b_username = '$b_username'";
 			$query_b = mysql_query($sql_b);
			$result_b = mysql_fetch_array($query_b);
			
		?> 
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="company_job.php?busi_id=<? echo $result_b['b_id'];?>">
                    <? if($result_b['logo']==''){?> <img src="myfile/logo.png" class="img-responsive" alt=""/><? }else{?><img src="myfile/<? echo $result_b['logo'];?>" class="img-responsive" alt=""/><? }?></a></div>
				    <div class="jobs_right">
						<div class="date"><?$date = new DateTime($result_list['day']); echo date_format($date, 'd');?><span><?echo date_format($date, 'M');?></span></div>
						<div class="date_desc"><h6 class="title"><a href="job_detail.php?post_id=<? echo $result_list['position_id'];?>"><? echo $result_list['position'];?></a></h6>
						  <span class="meta">บริษัท : <a href="company_job.php?busi_id=<? echo $result_b['b_id'];?>"><? echo $result_b['name'];?></a> | วันที่ : <? echo dmy($result_list['day']);?> | <? echo $result_list['PROVINCE_NAME'];?></span>
						</div>
						<div class="clearfix"> </div>
						<p class="description"><? echo $result_list['feature'];?>. <a href="job_detail.php?post_id=<? echo $result_list['position_id'];?>" class="read-more">รายละเอียดงาน>></a></p>
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
        <li><a href="search_jobs.php?page=<?=$page-1?>&province_id=<?=$province_id?>&type_id=<?=$type_id?>&keyword=<?=$keyword?>&GEO_ID=<?=$_GET['GEO_ID']?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <? }?>

        <? for($i=1;$i<=$total_page;$i++) { ?>

        <li <?if($page==$i){ echo 'class="active"';}?> ><a href="search_jobs.php?page=<?=$i?>&province_id=<?=$province_id?>&type_id=<?=$type_id?>&keyword=<?=$keyword?>&GEO_ID=<?=$_GET['GEO_ID']?>"><? echo $i ?> </a></li>
        
        <? } ?>
        <? if($page==$total_page){ ?>
        <li class="disabled"><a href="#"><span aria-hidden="true">»</span></a></li>
        <? }else{?>
        <li><a href="search_jobs.php?page=<?=($page+1)?>&province_id=<?=$province_id?>&type_id=<?=$type_id?>&keyword=<?=$keyword?>&GEO_ID=<?=$_GET['GEO_ID']?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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
		  </div>-->
          <!--
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
	   	  </div>-->
	   </div>
  <div class="clearfix"> </div>
 </div>
</div></br></br>
<? include "footer.php";?>
</body>
</html>	