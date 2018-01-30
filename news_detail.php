<? 
session_save_path("./session/");
session_start();
include "connect.php";
	$news_id = $_REQUEST['news_id'];
	$sql_list3 = "select * from tb_news where news_id = '$news_id'";
 	$query_list3 = mysql_query($sql_list3);
	$result_list3= mysql_fetch_array($query_list3);

	$sql1 = "select * from tb_news order by news_id desc";
 	$query1 = mysql_query($sql1);
	
	$sql2 = "select * from tb_jobgo order by jobgo_id desc";
 	$query2 = mysql_query($sql2);
?>

<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: ข่าว</title>
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
          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">ข่าว</p></font></strong>
           </div>
        </div>
   </div> </div>

<div class="container">
    <div class="single">  
	   <div class="col-md-12 single_right">
	       <center><p><img src="new/myfile/<? echo $result_list3['pic'];?>" class="img-responsive" alt="" width="30%" /></p></center>
	       <dl class="experience">
	       	 <div class="experience_content experience_content1">
	       	   
	       	   <div class="experience_1"><dt><h6><? echo $result_list3['h1']; ?></h6></dt><hr>
	       		 <dd>
	       		 	<? echo $result_list3['h2']; ?>
	       		 </dd></div>
	       	   </div>
	       	   <div class="experience_content">
	       	   	
	       	   	
	       	   </div>
	       </dl>
	       
	    
          <div class="candidates-item">
          	 <h5>ข่าว & งานราชการ</h5>	
            <div class="candidate_1"> 	
			  
	      
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">ข่าว</a></li>
			  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">งานราชการ</a></li>
		   </ul>
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
            <?$i=0;?>
          <? while($result1 = mysql_fetch_array($query1)){   $i=$i+1;?>

		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="news_detail.php?news_id=<?php echo $result1["news_id"];?>"><img src="new/myfile/<? echo $result1['pic'];?>" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date"><?echo substr($result1['date'],8,10);?> <span><?echo substr($result1['date'],4,4);?></span></div>
						<div class="date_desc"><h6 class="title"><a href="news_detail.php?news_id=<?php echo $result1["news_id"];?>"><? echo $result1['h1'];?></a></h6>
						  <span class="meta"><? //echo substr($result1['h3'],0,500);?></span>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							
						</ul>
						<p class="description"><? echo substr($result1['h3'],0,500);?>... <a href="news_detail.php?news_id=<?php echo $result1["news_id"];?>" class="read-more">Read More</a></p>



                    </div>
					<div class="clearfix"> </div>
				</div>
			 </div>
           <? }?>  
             
		  </div>
          
          
		  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
          
          <? while($result2 = mysql_fetch_array($query2)){?>
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="news_detail2.php?jobgo_id=<?php echo $result2["jobgo_id"];?>"><img src="job_go/myfile/<? echo $result2['pic'];?>" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date"><?echo substr($result2['date'],8,10);?> <span><?echo substr($result2['date'],4,4);?></span></div>
						<div class="date_desc"><strong><h6 class="title"><a href="news_detail2.php?jobgo_id=<?php echo $result2["jobgo_id"];?>"><? echo $result2['jobgo_h1'];?></a></h6></strong>

						  <p class="description"><? echo  substr($result2['jobgo_h2'],0,500) ;?>...<a href="news_detail2.php?jobgo_id=<?php echo $result2["jobgo_id"];?>" class="read-more">Read More</a></p>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							
						</ul>
						<!--p class="description"><? //echo $result2['jobgo_h3'];?>.<a href="news_detail2.php" class="read-more">Read More</a></p-->
                    </div>
					<div class="clearfix"> </div>
				</div>
			 </div>
		<? }?>
			
		  </div>
	  </div>
     </div>
    
    
    
   
			<div class="clearfix"></div>	
		   </div>
		   
		   
		   
		</div>
       </div>


    
       <div class="clearfix"> </div>
    </div>
</div>    
<? include "footer.php";?>
</body>
</html>	