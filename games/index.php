<?php
	session_start();
	
	if($_SESSION['rank'] != 1)
	{
		die("You can't access this page through the url");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/header.css" rel="stylesheet" type="text/css" />
<link href="../css/gallery_content.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/buttons.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="../boo_images/logo.png" />
<title>TCAT Games Club Gallery</title>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
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
<body onload="MM_preloadboo_images('../boo_images/gface.png','../boo_images/crytek.png','../boo_images/steam2.png','../boo_images/youtube.png','img/btn_hover/img_btn_hover.png','img/bf4.jpg','img/add/addp_hover.png','img/add/addp.png','img/add/addg.png','img/add/addg_hover.png')">

<div id="container">
    <div class="header" id="header"><img src="../boo_images/header.png" width="960" height="40" id="top" alt="header"/>
    <div id="navigation"><img src="../boo_images/logo.png" id="logo" alt="logo" />
		<?php include "../php/navigation.php" ?>
    </div>
    </div>
    <div class="content" >
      <div id="recent">&nbsp;&nbsp;Popular Game
          <div id="prevseparator"></div>
          <form action="" method="post" >
		  		<input name="addp_game" type="submit" value="Add games" id="add_games" />
          </form>
      </div>   
      	 <div id="recent_image">
            <img src="img/ass4.jpg" width="940" height="529" alt="ass4" />
          <div id="game_name">
            <img src="../boo_images/game_name.png" width="940" height="30" alt="game_name" /> 
             <div id="popular_game_text">Assassin's Creed 4</div>
        </div>
     </div>	
			
        <?php	
		include "../php/connect.php";
		
		$description = $_POST['Description'];
		$file_name = $_POST['Name'];
		
        if(isset($_POST['addp_game']))
		{	
			echo '
     		<div id="add_games_text">
				<div id="prevseparator"></div>
				<div id="add_game">
					<form action="" method="POST" enctype="multipart/form-data">
						<p><label for="file">Description:</label><br>
						<input name="Description" type="text" /></p>
						<p><label for="file">File Name:</label><br>
						<input name="Name" type="text" /></p>
						<p><label for="file">Image:</label><br>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
						<input type="file" name="uploaded_file" id="file"></p>
						<input name="submit_game" type="submit" value="Insert Game"/>
					</form>
				</div>
			</div>
			';	
			echo '
				<div id="delete_game">
					<form action="" method="POST" enctype="multipart/form-data">
						<p><label for="file">Enter ID:</label><br>
						<input name="IdToDelete" type="text" /></p>
						<input name="deleteID" type="submit" value="Delete"/>
					</form>
				</div>
			';			
		}
		
		if(isset($_POST['submit_game']) && $_POST['Name'] && $_POST['Description'])
		{	
			include "InsertToGames.php";
		}
		if(isset($_POST['deleteID']) && $_POST['IdToDelete'])
		{	
			include "DeleteFromGames.php";
		}
        ?>

      	<div id="recent">&nbsp;&nbsp;Previous Game
      	<div id="prevseparator"></div>
		<?php	
		$query = "SELECT * FROM Games ORDER BY ID";
		$result = mysqli_query($link,$query);
		
		if(!$result)
		{
			echo "Error getting info from table.";
		}
		echo '<p></p>';
		echo '<table width="800" border="1" id="games_table">
			  <tr>
			  	<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th scope="col">Image</th>
			  </tr>';
			  
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			  echo'<tr>';
			  echo'<td>'.$row{'ID'}.'</td>';
			  echo'<td>'.$row{'FileName'}.'</td>';
			  echo'<td>'.$row{'Description'}.'</td>';
			  echo'<td><img src="'.$row{'ImageLink'}.'" width="200"/> </td>';
			  
			 echo'</tr>';
		}
		echo '</table>';
		
		mysqli_close($link);
		?>
        </div>
</div>
    <div class="footer" >
      <div id="footer_content"></div>
      <img src="../boo_images/footer.png" width="960" height="40" id="bottom" alt="footer" />
    </div>
</body>
</html>
