<? session_save_path("../session/");
session_start();
include "../connect.php";

if($_REQUEST['action']=='insert'){
    $username = $_POST['user_login'];
    $password = $_POST['pass_login'];
    
    $sql1 = "SELECT * FROM admin where a_username = '$username' and a_password = '$password'";
    $query1 = mysql_query($sql1);
    $count1 = mysql_num_rows($query1);
    $result1 = mysql_fetch_array($query1);
    
    if($count1>0){
        
        $result1['a_username'];

       $_SESSION['a_username']= $result1['a_username'];

        session_register("a_username");
        //$_SESSION['b_username']="";
        ?><script>window.location="admin.php";</script><?
        }else{ 
            ?><script>alert("Username หรือ Password !!");</script><?
            }
    }
 //------------------LOGOUT
    if($_REQUEST['action']=='logout'){
session_destroy();
?>
<script>
alert('ออกจากระบบผู้สมัครงานสำเร็จ');
window.location="login_admin.php";
</script><?
}   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin </title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
<link href="styles/login.css" rel="stylesheet" type="text/css" />
<!-- Theme Start -->
<link href="themes/blue/styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->

</head>
<body>
	<div id="logincontainer">
    	<div id="loginbox">
        	<div id="loginheader">
            	<img SRC="themes/blue/img/cp_logo_login.png" alt="Control Panel Login" />
            </div>
            <div id="innerlogin">
            	<form method="post" action="login_admin.php?action=insert">
                	<p>Enter your username:</p>
                	<input name="user_login" type="text" class="logininput" />
                    <p>Enter your password:</p>
                	<input name="pass_login" type="password" class="logininput" />
                   
                   	<input type="submit" class="loginbtn" value="Login" /><br />
                </form>
            </div>
        </div>
    </div>
</body>
</html>