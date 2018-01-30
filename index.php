<?
session_save_path("./session/");
session_start();
	
	include "connect.php";

	$sql_pro = "select * from province order by PROVINCE_NAME";
	$query_pro = mysql_query($sql_pro);
		
	
 	$sql_type = "select * from type";
 	$query_type = mysql_query($sql_type);
 	
	
	$sql_typeb = "select * from  type_business limit 10";
 	$query_typeb = mysql_query($sql_typeb);
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>JOB2EZY :: หน้าหลัก</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="หางาน,สมัครงาน,ลงประกาศงาน,Job2Ezy.com" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->
</head>
<body>

<? include "topmenu.php";?>
<div class="banner">
	<div class="container">
		<div id="search_wrapper">
		 <div id="search_form" class="clearfix">
		 <!--h1>Start your job search</h1>
		    <p>
			 <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
			 <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
			</p-->
            <h2 class="title">หางานตามสาขาอาชีพ &amp; จังหวัด</h2>
         </div>
		 <div id="city_1" class="clearfix">
         			 
         <ul class="orange" style="font-size:14px">
			 <li>
			 <a href="search_jobs.php?keyword=โปรแกรมเมอร์">โปรแกรมเมอร์</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=บัญชี" title="Kenya Jobs">บัญชี</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=โรงแรม" title="Australia Jobs">โรงแรม</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ธุรการ" title="Poland Jobs">ธุรการ</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ในห้าง" title="Oman Jobs">ในห้าง</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ท่องเที่ยว" title="Pakistan jobs">ท่องเที่ยว</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ธุรการ" title="Saudi Arbia Jobs">จัดซื้อ</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=การขาย" title="Doha Jobs">การขาย</a>
			 </li>
			 </ul>

			 <ul class="orange" style="font-size:14px">
			 <li>
			 <a href="search_jobs.php?keyword=คีย์ข้อมูล" title="Russia Jobs">คีย์ข้อมูล</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=บุคคล" title="Germany Jobs">บุคคล</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=วิศวกร" title="Canada Jobs">วิศวกร</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ขับรถ" title="Hong Kong Jobs">พนักงานขับรถ</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=รปภ" title="Spain Jobs">เจ้าหน้าที่ รปภ.</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ผู้ดูแลระบบ" title="Thailand Jobs">ผู้ดูแลระบบ</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=ผู้จัดการ" title="Norway Jobs">ผู้จัดการ</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?keyword=โลจิสติกส์" title="Srilanka Jobs">โลจิสติกส์</a>
			 </li>
			 </ul>

			 <ul class="blue" style="font-size:14px">
             <li>
			 <a href="search_jobs.php?GEO_ID=1" title="Finance Jobs">ภาคกลาง</a>
			 </li>
             <li>
			 <a href="search_jobs.php?GEO_ID=2" title="Data Entry">ตะวันตก</a>
			 </li>
             <li>
			 <a href="search_jobs.php?GEO_ID=3" title="Data Entry">ตะวันออก</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?GEO_ID=4" title="Teaching">ภาคเหนือ</a>
			 </li>
             <li>
			 <a href="search_jobs.php?GEO_ID=5" title="Accounting">อีสาน</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?GEO_ID=6" title="Software">ภาคใต้</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?province_id=1" title="Information Technology">กรุงเทพมหานคร</a>
			 </li>
			 <li>
			 <a href="search_jobs.php?province_id=66" title="Fresher">ภูเก็ต</a>
			 </li>
			 <!--
             <li>
			 <a href="#" title="Engineering">สงขลา</a>
			 </li>
             
			 <li>
			 <a href="#" title="Finance Jobs">ชลบุรี</a>
			 </li>
			 <li>
			 <a href="#" title="Teaching">สุราษฏ์</a>
			 </li>
			 <li>
			 <a href="#" title="Software">ภูเก็ต</a>
			 </li>
			 <li>
			 <a href="#" title="Accounting">พระนครศรีอยุธยา</a>
			 </li>
			 <li>
			 <a href="#" title="Data Entry">ระยอง</a>
			 </li>-->
			 </ul>
</font>
<!--
			 <ul class="blue">
			 <li>
			 <a href="#" title="Marketing Jobs">นครศรีธรรมราช </a>
			 </li>
			 <li>
			 <a href="#" title="Freelancer">สุราษฏ์ธานี</a>
			 </li>
			 <li>
			 <a href="#" title="Internet Jobs">ภูเก็ต</a>
			 </li>
			 <li>
			 <a href="#" title="Sales">สงขลา</a>
			 </li>
			  <li>
			 <a href="#" title="Legal">กระบี่</a>
			 </li>
			 <li>
			 <a href="#" title="HR">พังงา</a>
			 </li>
			 <li>
			 <a href="#" title="MBA">ร้อยเอ็ด</a>
			 </li>
			 <li>
			 <a href="#" title="Pharma">ข่อนแก่น</a>
			 </li>
			 </ul>-->
	     </div>
       </div>
   </div> 
</div>	

<div class="container">
	<div class="col-md-7">
		<div class="grid_1">
    <div class="jb-accordion-wrapper">
 
    	<div class="jb-accordion-title">ค้นหางาน</div>
  <div class="panel-body">
  
  <form action="search_jobs.php" method="GET">
<div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">จังหวัด</label>
                <div class="col-md-9">
                    <select class="form-control input-sm" name="province_id">
                        <option value="">ทุกจังหวัด</option>
                                        <? while($result_pro = mysql_fetch_array($query_pro)){?>
                                        <option value="<? echo $result_pro['PROVINCE_ID'];?>"><? echo $result_pro['PROVINCE_NAME'];?></option>
                                        <? }?>
                    </select>
               </div>
            </div>
        </div>


  <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">ประเภทงาน</label>
                <div class="col-md-9">
                    <select class="form-control input-sm" name="type_id">
                        <option value="">ทุกประเภท</option>
                            <? while($result_type = mysql_fetch_array($query_type)){?>
                                <option value="<? echo $result_type['type_id'];?>"><? echo $result_type['type_name'];?></option>
                            <? }?>
                    </select>
               </div>
            </div>
        </div>


   <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="key">คำค้น</label>
                <div class="col-md-9">
                    <input type="text" id="keyword" class="form-control input-sm" name="keyword"/>
                </div>
            </div>
        </div>

<div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="ค้นหา" class="btn btn-primary btn-sm">
            </div>
        </div>
  <!--p><a href="job_list.php"><span class="glyphicon glyphicon-search">หางาน</span> </a></p-->
</form>
  </div>
</div>
</div>
</div>
	<div class="col-md-4">
		<div class="grid_1">
    <div class="box_1">
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
<div class="clearfix"> </div>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/b2.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          
        </div>      
      </div>

      <div class="item">
        <img src="images/b2.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          
        </div>      
      </div>
    
      <div class="item">
        <img src="images/b2.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          
      </div>
    </div>

    <!-- Left and right controls -->
</div>
	<!--<img src="images/1.png" class="img-responsive" alt=""/-->
</div></div>
</div><div class="clearfix"> </div></div>

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
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="jobs_single.html"><img src="images/a2.jpg" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date">30 <span>Jul</span></div>
						<div class="date_desc"><h6 class="title"><a href="news_detail.php">หัวข้อหลัก</a></h6>
						  <span class="meta">คำอธิบาย</span>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							<li><a href="#" class="fa fa-plus toggle"></a></li>
							<li><a href="#" class="fa fa-star"></a></li>
							<li><a href="#" class="fa fa-link"></a></li>
						</ul>
						<p class="description">รายละเอียด. <a href="news_detail.php" class="read-more">Read More</a></p>
                    </div>
					<div class="clearfix"> </div><br>
					<div class="jobs-item with-thumb">
				    <div class="thumb"><a href="jobs_single.html"><img src="images/a2.jpg" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date">30 <span>Jul</span></div>
						<div class="date_desc"><h6 class="title"><a href="news_detail2.php">หัวข้อหลัก</a></h6>
						  <span class="meta">คำอธิบาย</span>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							<li><a href="#" class="fa fa-plus toggle"></a></li>
							<li><a href="#" class="fa fa-star"></a></li>
							<li><a href="#" class="fa fa-link"></a></li>
						</ul>
						<p class="description">รายละเอียด. <a href="news_detail2.php" class="read-more">Read More</a></p>
                    </div>
					<div class="clearfix"> </div>
				</div>
				</div>

			 </div>
		  </div>
          
          
		  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="jobs_single.html"><img src="images/a3.jpg" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date">30 <span>Jul</span></div>
						<div class="date_desc"><h6 class="title"><a href="jobs_single.html">หัวข้อหลัก</a></h6>
						  <span class="meta">คำอธิบาย</span>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							<li><a href="#" class="fa fa-plus toggle"></a></li>
							<li><a href="#" class="fa fa-star"></a></li>
							<li><a href="#" class="fa fa-link"></a></li>
						</ul>
						<p class="description">รายละเอียด. <a href="jobs_single.html" class="read-more">Read More</a></p>
                    </div>
					<div class="clearfix"> </div>
				</div>
			 </div>	
		  </div>
		  
	  </div>
     </div>
    </div>

   </div><div class="col-md-3">
    <img src="images/b1.jpg" class="img-responsive" alt=""/><br>
    <img src="images/b1.jpg" class="img-responsive" alt=""/><br>
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
</div>

 </div>
<div class="grid_1">
	<div class="clearfix"> </div><br>
	 <h3>บริษัทชั้นนำ</h3>
	   <ul id="flexiselDemo3">
	      <li><img src="images/c1.gif"  class="img-responsive" /></li>
		  <li><img src="images/c2.gif"  class="img-responsive" /></li>
		  <li><img src="images/c3.gif"  class="img-responsive" /></li>
		  <li><img src="images/c4.gif"  class="img-responsive" /></li>
		  <li><img src="images/c5.gif"  class="img-responsive" /></li>
		  <li><img src="images/c6.gif"  class="img-responsive" /></li>	
	    </ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay:false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	   </script>
	   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
	 </div>
</div>
<div class="container">
  
	 <div class="single">  
	   <div class="col-md-2">
	   	  <div class="col_3">
	   	  	<h3>ธุรกิจที่เกี่ยวข้อง</h3>
	   	  	<ul class="list_1">
	   	  		<li><a href="#">ธุรกิจการโฆษณา</a></li>
	   	  		<li><a href="#">ธุรกิจการเกษตร</a></li>		
	   	  		<li><a href="#">ธุรกิจยานยนต์</a></li>
	   	  		<li><a href="#">ธุรกิจธนาคาร</a></li>		
	   	  		<li><a href="#">ธุรกิจการเคมี-พลาสติก</a></li>
	   	  		<li><a href="#">ธุรกิจการคอมพิวเตอร์</a></li>		
	   	  		<li><a href="#">ธุรกิจก่อสร้าง-วัสดุก่อสร้าง</a></li>
	   	  		<li><a href="#">ธุรกิจที่ปรึกษา</a></li>	
	   	  		<li><a href="#">ธุรกิจออกแบบ-ตกแต่ง</a></li>		
	   	  		<li><a href="#">ธุรกิจการศึกษา</a></li>
	   	  		<li><a href="#">ธุรกิจอุตสาหกรรมไฟฟ้า</a></li>	

	   	  	<!-- <ul >
			<? //while($result_typeb = mysql_fetch_array($query_typeb)){?>            
				<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i><? //echo $result_typeb['type_b_name'];?></a></li>
            <? //}?>
            </ul>    
            -->					
	   	  	</ul>
	   	  </div>
	   	  <!--div class="col_3">
	   	  	<h3>Jobs</h3>
	   	  	<ul class="list_2">
	   	  									
	   	  	</ul>
	   	  </div-->
	   	  
	 </div>
	   <div class="col-md-10">
	   	
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/></div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div><div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>

	<div class="clearfix"> </div><br>
    
    
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/></div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div><div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>

	<div class="clearfix"> </div>
    <br>
    
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/></div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div><div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>

	<div class="clearfix"> </div>
   <br>

	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/></div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div><div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>

	<div class="clearfix"> </div>
    <br>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/></div>
	<div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div><div class="col-md-3">
	<img src="images/b1.jpg" class="img-responsive" alt=""/>
	</div>
	<div class="clearfix"> </div>
   
	      <!--div class="col_1">
   	        <div class="col-sm-4 row_2">
				<a href="single.html"><img src="images/a1.jpg" class="img-responsive" alt=""/></a>
			</div>
			<div class="col-sm-8 row_1">
				<h4><a href="single.html">It is a long established fact</a></h4>
				<h6>SIt is a long <span class="dot">·</span> Jul. 31, 2015</h6>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
				<div class="social">	
					<a class="btn_1" href="#">
						<i class="fa fa-facebook fb"></i>
						<span class="share1 fb">Share</span>								
					</a>
					<a class="btn_1" href="#">
						<i class="fa fa-twitter tw"></i>
						<span class="share1">Tweet</span>								
					</a>
					<a class="btn_1" href="#">
						<i class="fa fa-google-plus google"></i>
						<span class="share1 google">Share</span>
					</a>
			   </div>
			</div>
			<div class="clearfix"> </div>
		   </div--></div>
	   </div>
	  <div class="clearfix"> </div>
	 </div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div><br>
	
<? include "footer.php";?>
</body>
</html>	