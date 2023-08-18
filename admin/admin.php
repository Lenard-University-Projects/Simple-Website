<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/header.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/admin_content.css" rel="stylesheet" type="text/css" />
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
    <div id="content">
    	<div id="text">
			<script>
            
            /*---------------------------------------------------------------------------
                Date: 28/02/2014 10:08Am
                Developer: Denis Pop(Boowma)
                Script Name: Display user current resolution and browser name and version.
            ----------------------------------------------------------------------------*/
            
            // Display the current screen Resolution
            document.write("<h1>This is done by JavaScript</h1>");
			document.write("Screen Resolution: ");
            document.write(screen.width + "*" + screen.height);
            document.write("<br/>");
            
            // Local variablres
            // browserAgent is assignetd and user-agent header sent by the browser to the server
            var browserAgent = navigator.userAgent;	
            
            // browserName it is used to display the browser name	
            var browserName  = navigator.appName;	
            
            // fullVersion it is used to display the browser version	
            var fullVersion  = navigator.appVersion;  
            
            // It will check if the user-agent Chrom is not equal to -1 
            // If it's not then browserName it is assigned to "Chrome"
            if ((browserAgent.indexOf("Chrome"))!=-1) {
                browserName = "Chrome";
            }
            else
            {
                browserName = navigator.appName;
                fullVersion = navigator.appVersion;
            }
            
            // Display on the screen Browser Name and the actual browser name
            document.write("Browser Name: ");
            document.write(browserName);
            document.write("<br/>");
            
            // Display on the screen Browser Version and the actual browser version
            document.write("Browser Version: ");
            document.write(fullVersion);
            document.write("<br/>");
            </script>
            <?php
            	$server_http = $_SERVER['HTTP_USER_AGENT'];
				
				echo '<h1>This is done by PHP</h1>';
				echo 'Browsers Version: '.$server_http;
				
				echo '<h1>Got the width and height using $_GET</h1>';
				echo 'Width: '.$_GET['w'];
				
				echo '<br>';
				
				echo 'Height: '.$_GET['h'];
			?>
            
        </div>
    </div>
    <div class="footer">
        <div id="footer_content"></div>
        <img src="../boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" />
    </div>
</div>
</body>
</html>