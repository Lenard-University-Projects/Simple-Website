<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/header.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/news_content.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="../boo_images/logo.png" />
<title>TCAT Games Club News</title>
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
	width: auto;
	position: relative;
	display: block;
	height: 30px;
	font-size: 12px;
	font-family: Tahoma, Geneva, sans-serif;
	border: 0px solid #000000;
	color: #FFF;
	margin-top: -45px;
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
	<p/>
  <div id="archive">Archive</div>
  <div id="fill_info">
    <?php
    include "../php/connect.php";
	
	$title = $_POST['title'];
	$image = $_POST['image'];
	$date = $_POST['date'];
	$description = $_POST['description'];
		
	if(isset($_POST['add_news']))
	{
		if($_POST['title'] and $_POST['image'] and $_POST['date'] and $_POST['description'])
		{
			$tit = 	mysqli_real_escape_string($link,$title);
			$img = 	mysqli_real_escape_string($link,$image);
			$dat = 	mysqli_real_escape_string($link,$date);
			$desc = mysqli_real_escape_string($link,$description);
			
			$add_news = "INSERT INTO News ( ";
			$add_news .= "Title, ";
			$add_news .= "Image, ";
			$add_news .= "Date, ";
			$add_news .= "Description ";
			$add_news .= ") ";
			
			$add_news .= "VALUES ";
			{
				$add_news .= "(";	
				$add_news .= "'$tit', ";
				$add_news .= "'$img', ";
				$add_news .= "'$dat', ";
				$add_news .= "'$desc' ";
				$add_news .= ") ";		
			}
		}
		
		if(isset($add_news))
		{
			if(mysqli_query($link,$add_news))
			{
				echo '<div id="message">Record with Title: '.$_POST['title'].' has been added.</div>';
				echo '<meta http-equiv="refresh" content="0" >';
			}
		}
		else
		{
			echo '<div id="message">There is a problem.</div>';
		}
	}

	date_default_timezone_set('UTC');
	$input_text = true;
	
	if(isset($_POST['edit_btn']))
	{
		$input_text = false;
		
	}elseif(isset($_POST['cancel_update']))
	{
		$input_text = true;		
	}
	
	if($input_text == true or isset($_POST['cancel_update']))
	{
		echo '	
			<form action="" method="post" id="news_form">
				<label for="register_email">Title:</label>
				<input type="text" name="title" />
				<label for="register_password_confirmation">Image Link:</label>
				<input type="text" name="image" />
				<label for="register_password_confirmation">Date: <div id="date">'.date('M d o h:i').' </label></div><br>
				<input type="hidden" name="date" value="'.date('M d o').'">
				<label for="register_password_confirmation">Description:</label>
				<textarea cols="45" rows="10" type="text" spellcheck="true" name="description" id="description" ></textarea>
				<div id="prevseparator"></div>
				<input name="add_news" type="submit" value="Submit" id="submit" />
				<input type="reset" value="Reset" id="reset" />
			</form>
		';
	}
	elseif($input_text == false)
	{
		$edit_news = $_POST['edit'];
		$query = "SELECT * FROM News WHERE ID = $edit_news";
		$result = mysqli_query($link,$query);
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{	
			echo '
				<form action="" method="post" id="news_form">
					<label for="register_email">Title:</label>
					<input type="text" name="update_title" value="'.$row{'Title'}.'"/>
					<label for="register_password_confirmation">Image Link:</label>
					<input type="text" name="update_image" value="'.$row{'Image'}.'"/>
					<label for="register_password_confirmation">Date: <div id="date">'.$row{'Date'}.'</label></div><br>
					<input type="hidden" name="update_date" value="'.$row{'Date'}.'">
					<label for="register_password_confirmation">Description:</label>
					<textarea cols="45" rows="10" type="text" spellcheck="true" name="update_description" id="description" >'.$row{'Description'}.'</textarea>
					<div id="prevseparator"></div>
			<input name="update_news" type="submit" value="Submit" id="submit" /> 
			<input name="cancel_update" type="submit" value="Cancel" id="reset" />
				</form>
			';
		}
	}
  ?>
  </div>
  <?php 
           
	$query = "SELECT * FROM News ORDER BY Date DESC";
	$result = mysqli_query($link,$query);
      
	if(!$result)
	{
		echo "Error getting info from table.";
	}
	if(isset($_POST['delete']))
	{
		$news = $_POST['delete'];
		$delete_news = mysqli_query($link,"DELETE FROM News WHERE ID = $news");
		
		if($delete_news)
		{
			echo '<div id="message2">News "'.$_POST['Title'].'" has been removed</div>';
			echo '<meta http-equiv="refresh" content="1" >';
		}
	}
	
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{	
		echo '<li class="prev_news"><div id="news">
				<form action="" method="post">
					<div id="title"><input name="Title" type="hidden" value="'.$row{'Title'}.'" /><label>'.$row{"Title"}.'</label><label></div>
					<div id="image"><input name="image" width="128" height="80" type="image" src="'.$row{"Image"}.'" /></div>
					<div id="delete_news">
					<input name="delete" type="hidden" value="'.$row{'ID'}.'" />
					<input name="delete_btn" type="submit" value="Delete" id="btn" />
					</div>
				</form>
				<form action="" method="post">
					<input name="edit" type="hidden" value="'.$row{'ID'}.'"/>
					<input name="edit_btn" type="submit" value="Edit" id="btn" />
				</form>
			</div></li>
		';	
	}
  ?>
</div>
</div>
<div class="footer" id="footer">
  <div id="footer_content"></div>
  <img src="../boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" /></div>
</div>
</body>
</html>