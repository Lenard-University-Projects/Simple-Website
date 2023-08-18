<?php
	$deleteID = $_POST['IdToDelete'];
	
	$delete_game = "DELETE FROM Games ";
	$delete_game.= "WHERE ID = $deleteID";
	
	if(mysqli_query($link,$delete_game))
	{
		echo header("refresh:0; url=index.php");
	}
	else
	{
		echo 'There is a problem.';
		echo mysqli_error($link);
	}
?>