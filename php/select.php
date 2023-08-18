<?php
	include 'connect.php';
	
	$member = "SELECT * FROM Members JOIN News ON";
	
	$members_query = mysql_query($member);
	
	echo '<table border="1">';
		echo '<tr>';
			echo '<td>ID</td>';
			echo '<td>Name</td>';
			echo '<td>Age</td>';
			echo '<td>Description</td>';
			echo '<td>News Name</td>';
		echo '</tr>';
		
	while($row = mysql_fetch_array($members_query,MYSQL_ASSOC))
	{
		echo '<tr>';
			echo '<td>'.$row['ID'].'</td>';
			echo '<td>'.$row['Name'].'</td>';
			echo '<td>'.$row['Age'].'</td>';
			echo '<td>'.$row['Description'].'</td>';
			echo '<td>'.$row['Title'].'</td>';
			
		echo '</tr>';
	}
	echo '</table>';
	mysql_free_result($members_query);
?>