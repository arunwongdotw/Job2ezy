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
<title>JOB2EZY :: งานราชการ</title>
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
          	<strong><font  face="AngsanaUPC"><p style="font-size: 5em">งานราชการ</p></font></strong>
           </div>
        </div>
   </div> </div>

<div class="container">
    <div class="single">  <center></center>
	   <div class="col-md-12 single_right">
	       <center><p><img src="images/f11.jpg" class="img-responsive" alt=""/></p></center>
	       <dl class="experience">
	       	 <div class="experience_content experience_content1">
	       	   <!--div class="experience_period"> 
	       		 <small>From:</small><br><span>2005</span><br><small>To:</small><br><span>2010</span>
	       	   </div-->
	       	   <div class="experience_1"><dt><h6>บริษัทท่าอากาศยานไทยจำกัดเปิดรับสมัครลูกจ้าง 330 อัตรา</h6></dt>
	       		 <dd>
	       		 	<p>บริษัท ท่าอากาศยานไทย จำกัด เปิดรับสมัครสอบเพื่อคัดเลือกเป็นลูกจ้าง จำนวน 330 อัตรา รับสมัครด้วยตนเอง ตั้งแต่วันที่ 15 มกราคม - 9 กุมภาพันธ์ 2561

ประกาศบริษัท ท่าอากาศยานไทย จำกัด (มหาชน) เรื่อง การรับสมัครบุคคล

ตำแหน่งที่เปิดรับสมัคร
1. ลูกจ้างชั่วคราว ปฏิบัติงานขับเคลื่อนสะพานเทียบเครื่องบิน จำนวน 297 อัตรา (ปวช. ทุกสาขาวิชา)
2. ลูกจ้างชั่วคราว ปฏิบัติงานตรวจค้น จำนวน 1 อัตรา (ปวช. ทุกสาขาวิชา)
3. ลูกจ้างชั่วคราว ปฏิบัติงานรักษาความปลอดภัย จำนวน 20 อัตรา (วุฒิ ม.3)
4. ลูกจ้างชั่วคราว ปฏิบัติงานดับเพลิงและกู้ภัย จำนวน 3 อัตรา (วุฒิ ม.3)
5. ลูกจ้างชั่วคราว ปฏิบัติงานจัดการอาคารและลานจอดรถยนต์ จำนวน 9 อัตรา (ปวช. ทุกสาขาวิชา)

การรับสมัครสอบ
ผู้สมัครต้องยื่นเอกสารและหลักฐานประกอบการสมัครด้วยตนเอง ตั้งแต่วันที่ 15 มกราคม - 9 กุมภาพันธ์ 2561 ในวันและเวลาทำการ ณ สถานที่ที่กำหนดในแต่ละตำแหน่ง</p>
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
          
          <? while($result1 = mysql_fetch_array($query1)){?>
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="thumb"><a href="jobs_single.html"><img src="images/<? echo $result1['pic'];?>" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date">30 <span>Jul</span></div>
						<div class="date_desc"><h6 class="title"><a href="jobs_single.html"><? echo $result1['h1'];?></a></h6>
						  <span class="meta"><? echo $result1['h2'];?></span>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							<li><a href="#" class="fa fa-plus toggle"></a></li>
							<li><a href="#" class="fa fa-star"></a></li>
							<li><a href="#" class="fa fa-link"></a></li>
						</ul>
						<p class="description"><? echo $result1['h3'];?>. <a href="jobs_single.html" class="read-more">Read More</a></p>
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
				    <div class="thumb"><a href="jobs_single.html"><img src="images/<? echo $result2['pic'];?>" class="img-responsive" alt=""/></a></div>
				    <div class="jobs_right">
						<div class="date">30 <span>Jul</span></div>
						<div class="date_desc"><h6 class="title"><a href="jobs_single.html"><? echo $result2['jobgo_h1'];?></a></h6>
						  <span class="meta"><? echo $result2['jobgo_h2'];?></span>
						</div>
						<div class="clearfix"> </div>
                        <ul class="top-btns">
							<li><a href="#" class="fa fa-plus toggle"></a></li>
							<li><a href="#" class="fa fa-star"></a></li>
							<li><a href="#" class="fa fa-link"></a></li>
						</ul>
						<p class="description"><? echo $result2['jobgo_h3'];?>.<a href="jobs_single.html" class="read-more">Read More</a></p>
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