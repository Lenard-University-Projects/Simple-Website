<?php
	session_start();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/header.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/login_content.css" rel="stylesheet" type="text/css" />
<link href="../css/logged_content.css" rel="stylesheet" type="text/css" />
<title>TCAT Games Club</title>
<link rel="icon" href="../boo_images/logo.png" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #E6E6E6;
	background-image: url(../boo_images/background2.png);
	background-repeat: repeat;
}

#container {
	height: auto;
	width: auto;
	position: relative;
}
#cssmenu ul {
	padding: 0;
	list-style-type: none;
	position: relative;
	display: block;
	height: 30px;
	font-size: 12px;
	font-family: Tahoma, Geneva, sans-serif;
	border: 0px solid #000000;
	color: #FFF;
	margin-top: -40px;
}
#cssmenu li {
	display: block;
	padding: 0;
	height: auto;
	width: auto;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 18px;
	font-style: normal;
	float: right;
	color: #FFF;
}
#cssmenu li a {
	display: block;
	float: left;
	color: #FFFFFF;
	text-decoration: none;
	padding: 8px 20px 0 20px;
}
#cssmenu li a:hover {
	color: #00CCFF;
	height: 22px;
}
#cssmenu li.active a {
	display: inline;
	height: 22px;
	float: left;
	margin: 0;
}
</style>
</head>
<body onload="MM_preloadboo_images('../boo_images/gface.png','../boo_images/crytek.png','../boo_images/steam2.png','../boo_images/youtube.png')">
<div id="container">
  <div class="header"><img src="../boo_images/header.png" width="960" height="40" id="top" alt="header" />
        <div id="navigation"><img src="../boo_images/logo.png" id="logo" alt="logo" />
            <?php include "../php/navigation.php" ?>
        </div>	
    </div>
    <div id="content">
    <?php
		include "../php/connect.php";

		$username = $_POST['user'];
		$logout = $_GET['value'];
		$date = date("d-m-Y h:i:s a");
		
		if(isset($username))
		{
			$password = md5($_POST['pass']);
			
			$check_user = "SELECT ID,username,password,rank FROM Members ";
			$check_user .= "WHERE username = '".$username."'";
		
			$checkuser_query = mysqli_query($link,$check_user);
		
			while($row = mysqli_fetch_array($checkuser_query,MYSQL_ASSOC))
			{
				$db_username = $row['username'];
				$db_password = $row['password'];
				$db_rank = $row['rank'];
			}
		
			if(!empty($db_password) and ($password == $db_password))
			{
				$_SESSION['rank'] = $db_rank;
				$_SESSION['username'] = $db_username;
				header("Location: ../index.php?value=confirm");
			}
			else
			{
				echo '<div id="login_form">';
					echo 'Password does not match';
				echo '</div>';
			}		
		}
		if($logout == "LogOut")
		{
			session_start();
			session_destroy();
			header("Refresh: 0; url=index.php");
			exit;
		}
		if($_SESSION['rank'] == 0)
		{
			echo '<div id="login_form">       
				<form action="" method="post">
					<p>Usermane:</p>
					<input name="user" type="text" maxlength="30" id="username"/>
					<p>Password:</p>
					<input name="pass" type="password" maxlength="30" id="password"/>
					<input name="login" type="submit" value="GO!" id="login_button" />
				</form>
				<p></p>
				<div id="demo_account">
					Username: demo<br>
					Password: demo
				</div>
			 </div>';
		}
		
		mysqli_close($link);
		
		if($_SESSION['rank'] == 1)
		{
			echo '<div id="login_form">';
				echo 'Welcome '.$_SESSION['username'].', ';
				echo '<a href="index.php?value=LogOut">Log Out.</a>'; 
			echo '</div>';
			
			include "manage_users_database.php";
		}
	?>
    </div>
    <div class="footer">
        <div id="footer_content"></div>
        <img src="../boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" />
    </div>
</div>
</body>
</html>