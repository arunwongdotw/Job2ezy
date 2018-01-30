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
	       <center><p><img src="images/f11.jpg" class="img-responsive" alt=""/></p></center>
	       <dl class="experience">
	       	 <div class="experience_content experience_content1">
	       	   <!--div class="experience_period"> 
	       		 <small>From:</small><br><span>2005</span><br><small>To:</small><br><span>2010</span>
	       	   </div-->
	       	   <div class="experience_1"><dt><h6>5 อันดับอาชีพมาแรงปี 2018</h6></dt>
	       		 <dd>
	       		 	<p>อันดับ 8 สายงานการบริการสำนักงาน (Office Service)
ใครที่จะทำตำแหน่งงานนี้ได้ต้องมีความใจเย็น มีการสื่อสารที่ดีกับบุคคลอื่น เพราะขึ้นชื่อว่าเป็นสายานบริการอล้วด้วยนั้น เราต้องคอยดูแล อำนวยความสะดวกต่างๆ ในที่สำนักงานได้เป็นอย่างดี ถึงแม้ว่าครั้งจะเรื่องที่ไม่พอใจบ้าง แต่ก็ต้องอดทนเอาไว้ สำหรับสายงานการบริการสำนักงาน ตำแหน่งที่มีรายได้ดีที่สุด คือ ผู้จัดการฝ่ายบริหาร (Administration Manager) มีรายได้ถึง 152,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 9,000 – 45,000 บาท/เดือน

อันดับ 7 สายงานอาคารและการก่อสร้าง (Building & Construction)
ถึงจะเวลาผ่านไปแค่ไหนแต่สำหรับสายงานอาคารและการก่อสร้าง ก็ยังเป็นสิ่งที่ต้องการของนายจ้างหรือบริษัทต่างๆ อยู่เหมือนเดิม ถึงแม้ว่าจะไม่ได้อยู่ในอันดับต้นๆ ก็ตาม สำหรับตำแหน่งงานนี้ รายได้ของผู้จัดการฝ่ายการก่อสร้าง (Construction Manager) มีรายได้ถึง 250,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 15,000 – 90,000 บาท/เดือน เลยทีเดียว

อันดับ 6 สายงานทรัพยากรมนุษย์ (Human Resources)
สายงานด้านทรัพยากรมนุษย์ ก็เป็นอีกหนึ่งสายงานที่เป็นต้องการของบริษัทต่างๆ สำหรับตำแหน่งในสายงานนี้ ได้แก่ ผู้อำนวยการฝ่ายทรัพยากรบุคคล (Head of HR/ HR Director) มีรายได้ถึง 325,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 12,000 – 40,000 บาท/เดือน

อันดับ 5 สายงานการผลิต (Manufacturing & Production)
สายงานการผลิตก็เป็นอีกสายงาน ที่เป็นต้องการของนายจ้าง เพราะด้วยงานด้านนี้ต้องการบุคคลที่มีความสามารถเฉพาะตัว มีความเชี่ยวชาญในด้านต่างๆ สำหรับตำแหน่งงานที่มีรายได้สูงที่สุด คือ ผู้จัดการการดำเนินงานสายการผลิต (Factory/ Manufacturing/ Operations Manager) มีรายได้ถึง 340,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 18,000 – 80,000 บาท/เดือน

อันดับ 4 สายงาน Supply Chain
เป็นตำแหน่งงานที่ต้องการคนที่มีความอดทน มีมนุษยสมัพันธ์ที่ดีเยี่ยม ติดต่อประสานกับบุคคลอื่นได้เป็นอย่างดี สำหรับตำแหน่งที่มีรายได้ดีที่สุด คือ ตำแหน่ง Supply Chain Manager มีรายได้ถึง 360,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 15,000 – 63,000 บาท/เดือน

อันดับ 3 สายงานเทคโนโลยีสารสนเทศ (Information Technology)
ไม่ว่าจะหันไปทางไหน บริษัทต่างๆ ก็ต้องการเจ้าหน้าที่ทางด้านเทคโนโลยีกันเป็นจำนวนมากยิ่งขึ้น ทั้งในการดูระบบของบริษัท โปรแกรมเมอร์ เป็นต้น และยิ่งเดี๋ยวนี้บริษัทต่างๆ ก็ใช้เทคโนโลยีต่างๆ เข้ามาช่วยในการทำงานเพื่อช่วยให้สะดวกมากยิ่งขึ้นนั้น ก็ต้องการคนที่เรียนรู้ด้านนี้มากเพิ่มขึ้น และตำแหน่งที่มีรายได้ดีที่สุด คือ ผู้อำนวยการโครงการ (Project Director) มีรายได้ถึง 396,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 15,000 – 60,000 บาท/เดือน

อันดับ 2 สายงานการขาย และการตลาด (Sales & Marketing)
น้องๆ คนไหนที่ชอบงานด้านนี้ บอกเลยว่าเรียนจบมาแล้วไม่ตกงานแน่นอน ถึงในปัจจุบันเราจะเห็นได้ว่ามีนักศึกษาเรียนจบมาในด้านนี้มากยิ่งขึ้น แต่ก็ยังเป็นสายงานที่ต้องการมากขึ้นอีกเช่นกัน ดังนั้นก็ส่งผลทำให้ค่าตอบแทนสูงขึ้นไปด้วย สำหรับตำแหน่งที่มีรายได้ดีที่สุด คือ หัวหน้าฝ่ายขายและการตลาด (Head of Sales & Marketing) มีรายได้ถึง 420,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 15,000 – 60,000 บาท/เดือน

อันดับ 1 สายงานการเงิน และการบัญชี (Accounting & Finance)
สำหรับสายงานด้านการเงินและบัญชี ก็ยังสามารถครองแชมป์อยู่ในอันดับ 1 เหมือนเดิม ถือได้ว่าเป็นสาขาวิชาที่มีนักศึกษาเลือกเรียนต่อเยอะเป็นอันดับต้นๆ ของประเทศ แต่ก็เรียนจบยากพอสมควร ดังนั้นจึงทำให้สายงานนี้เป็นที่ต้องการมากที่สุด แถมยังได้ค่าตอบแทนที่ดีมากอีกด้วย ตำแหน่งที่มีรายได้ดีที่สุด คือ หัวหน้าฝ่ายการเงินและการธนาคาร (Head of Finance & Accounting) มีรายได้ถึง 463,000 บาท/เดือน และตำแหน่งระดับปฏิบัติการ มีรายได้เฉลี่ยอยู่ที่ 12,000 – 45,000 บาท/เดือน</p>
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