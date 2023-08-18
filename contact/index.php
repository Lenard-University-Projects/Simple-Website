<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/header.css" rel="stylesheet" type="text/css" />
<link href="../css/contact_content.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/buttons.css" rel="stylesheet" type="text/css" />
<title>TCAT Games Club Contact</title>
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
<div class="header" id="header"><img src="../boo_images/header.png" width="960" height="40" id="top" alt="header" />
    <div id="navigation"><img src="../boo_images/logo.png" id="logo" alt="logo" />
		<?php include "../php/navigation.php" ?>
  </div> 
</div>
<div class="content" id="content">
<form method="post" action = "index.php" id="name">
  <div id="notification">
	<?php
	if (isset($_POST['send'])) {
		if($_POST['name'] || $_POST['email'] || $_POST['message'] || $_POST['messagetitle'] != ''){
			if(isset($_POST['agree'])){
				mail($_POST['recipient'], "Message from your webpage",$_POST['name']." ". $_POST['email']." ". $_POST['message']);
	 			echo "Message has been sent successfully."; 
			}else{
				echo "Please agree with our conditions."; 
			}
		}else{
			echo "You got and error, please check all the fields and make sure are correct."; 
		}
	}
	?>
</div>
  <input type="hidden" name="recipient" value="boowman.work@gmail.com" />
  <p>Your Name:
    <input type="text" name="name" id="namebar" />
  </p>
  <p> Your Email:
    <input type="text" name="email" id="emailbar" />
  </p>
  <p>Message Title:
    <input type="text" name="name" id="titlebar" />
  </p>
  <div id="messagetext">Message:</div>
  <p>
    <textarea id="messagebar" name="message" rows="10" cols="50" ></textarea>
  </p>
  <p></p>
  <div id="aggree_send">
    <input type="checkbox" name="agree" id="agreebox" />
    I agree to the terms and conditions !!
  <input type="submit" name="send" id="send" value="Submit" />
  </div>
  <p></p>
</form>
  <p>&nbsp;</p>
</div>
<div class="footer" id="footer">
  <div id="footer_content"></div>
  <img src="../boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" /></div>
</div>
</body>
</html>
