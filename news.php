<? 
session_save_path("./session/");
session_start();
include "connect.php";

	$sql1 = "select * from tb_news order by news_id desc";
 	$query1 = mysql_query($sql1);
	
	$sql2 = "select * from tb_jobgo order by jobgo_id desc";
 	$query2 = mysql_query($sql2);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: วาไรตี้</title>
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
<!---font-Awesome-->
</head>
<body>
<? include "topmenu.php";?>	
<div class="banner_1">
    <div class="container">
        <div id="search_wrapper1">
          <div id="search_form" class="clearfix">
                       
             
            
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
    </div>
    
    <!--
    <ul class="pagination jobs_pagination">
		<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
		<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
	</ul>
    -->
   </div>
   <!----
   <div class="col-md-3">
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
	   </div>-->
  <div class="clearfix"> </div>
 </div>
</div>

<? include "footer.php";?>
</body>
</html>	