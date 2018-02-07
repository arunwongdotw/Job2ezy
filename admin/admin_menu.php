
<? if($_SESSION['a_username']==''){ ?><script>window.location="http://job2ezy.com/admin/login_admin.php";</script><? }?>
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
            	<li >
		            <a href="#"><font color="#999999"><b><? echo "Login : ".$_SESSION['a_username'];?></b></font></a>	            
		        </li>
		        <li >
		            <a href="http://job2ezy.com/new/News_manag.php"><b>ข่าว</b></a>
		            
		        </li>
		        <li >
		        	<a href="http://job2ezy.com/job_go/jobgo_manag.php"><b>งานราชการ</b></a>
		            
		        </li>
		        <li class="dropdown">
		            <a href="http://job2ezy.com/admin/admin.php" ><b>banner</b></a>
		            
		        </li>
		        <li class="dropdown">
		            <a href="http://job2ezy.com/status.php" ><b>แพ็กเกจ</b></a>
		            
		        </li>
		        <li><a href="http://job2ezy.com/admin/maquee.php"><b>ข้อความวิ่ง</b></a></li>
		        <!--li><a href="">รายงาน</a></li-->
		        <li><a href="http://job2ezy.com/admin/login_admin.php?action=logout"><b>ออกจากระบบ</b></a></li>
	        </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
	</nav>
    <hr>
	