<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/header.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/user_content.css" rel="stylesheet" type="text/css" />
<title>TCAT Games Club Members</title>
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
    <div class="content">
   <?php
		include "../php/connect.php";
		
		$query = "SELECT * FROM Members ORDER BY ID";
		$result = mysqli_query($link,$query);
		
		if(!$result)
		{
			echo "Error getting info from table.";
		}
		
		echo '<table width="961" border="1">
			  <tr>
				<th scope="col">Avatar</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
			  </tr>';
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			  echo'<tr>';
			  echo'<td><img src="'.$row{'Image'}.'" width="64" height="64" alt="image"/></td>';
			  echo'<td>'.$row{'Name'}.'</td>';
			  echo'<td>'.$row{'Description'}.'</td>';
			 echo'</tr>';
		}
		echo '</table>';
		
        mysqli_close($link);
        ?> 
    </div>
    <div class="footer">
        <div id="footer_content"></div>
        <img src="../boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" />
    </div>
</div>
</body>
</html>