<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="description" content="TCAT Games Club" />
<meta name="keywords" content="PC,PS3,Xbox,Tcat" />
<meta name="Robots" content="NOINDEX, NOFOLLOW" />

<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/header.css" rel="stylesheet" type="text/css" />
<link href="css/content.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/buttons.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="boo_images/logo.png" />
<title>TCAT Games Club</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #E6E6E6;
	background-image: url(boo_images/background2.png);
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

<body onLoad="MM_preloadboo_images('boo_images/gface.png','boo_images/crytek.png','boo_images/steam2.png','boo_images/youtube.png','boo_images/register_btn.png','boo_images/login_btn.png','boo_images/login-register/login_hover.fw.png','boo_images/login-register/register_hover.fw.png','boo_images/news/add.png','boo_images/news/add_hover.png')">

<div id="container">
  <div class="header"><img src="boo_images/header.png" width="960" height="40" id="top" alt="header" />
    <div id="navigation"><img src="boo_images/logo.png" id="logo" alt="logo" />
      <div id='cssmenu'>
        <ul>

        	<?php
				if($_SESSION['rank'] == 1)
				{
					echo '<li><a href="upload"><span>Upload</span></a></li>';
				}
            ?>
           	<li><a href='members'><span>Members</span></a></li>
           	<li><a href='contact'><span>Contact</span></a></li>
		   <?php
                if($_SESSION['rank'] == 1)
                {
                    echo '<li><a href="games"><span>Games</span></a></li>';
                }
           ?>
            <li><a href='index.php'><span>Home</span></a></li>
      	   	<li><a href="admin/LinkAdminPage.html"><span>Admin</span></a></li>
       		<li class='active last'><a href="login"><span>Login</span></a></li>
        </ul>
      </div>
    </div>	
    </div>
    <div class="content">
    <div id="add">
<form action="add_news" method="post" id="add_news">
	<input name="add_new_news" type="submit" value="Add News" id="add_new_news" />
</form>
<div id="archive">Archive</div>
    <?php
            include "php/connect.php";
            
            $query = "SELECT * FROM News ORDER BY ID DESC";
            $result = mysqli_query($link,$query);
            
            if(!$result)
            {
                echo "Error getting info from table.";
            }
			
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
				echo '<ul><li class="newsbg"><div id="news_box">';
					echo '<div id="news_title">'.$row{'Title'}.'</div>';
					echo '<div id="news_date">Posted '.$row{'Date'}.'</div>';
					echo '<div id="news_image">';
					echo '<img src="'.$row{'Image'}.'" width="125" height="80" alt="news_img"/>';
					echo '</div>';
					echo '<div id="news_description">'.$row{'Description'}.'</div>';
				echo '</div></li></ul>';
			}
			
            mysqli_close($link);
        ?> 
       </div>
    </div>
    <div class="footer">
        <div id="footer_content"></div>
        <img src="boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" />
    </div>
</div>
</body>
</html>