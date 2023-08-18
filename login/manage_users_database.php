<?php
	//This is the way to secure it to make sure only logged in users
	//can view the page and access it.
	session_start();

	if($_SESSION['rank'] != 1)
	{	
		die("You can't access this page through the url");
	}
	
	//Include connect.php file
	include "../php/connect.php";
	
	//Assign variables from the form inputs	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$access_level = $_POST['rank'];
	
	//It stores the button state
	$submit_btn = $_POST['submit_registration'];
	
	//If the variable is valid run the code
	if(isset($submit_btn))
	{
		//Escapes the variable so certain symbols can't be used.
		$user = mysqli_real_escape_string($link,$username);
		$pass = mysqli_real_escape_string($link,$password);
		$rank = mysqli_real_escape_string($link,$access_level);
		
		$select_user = "SELECT * FROM Members ";
		$select_user_query = mysqli_query($link,$select_user);
		
		while($row = mysqli_fetch_array($select_user_query,MYSQLI_ASSOC))
		{		
			$db_users = $row{'username'};
		}
		
		if(!empty($user) and $username != $db_users)
		{
			//******INSERT data into Members table**********
			$add_user = "INSERT INTO Members ( ";
			$add_user .= "username, ";
			$add_user .= "password, ";
			$add_user .= "rank ";
			$add_user .= ") ";
		
			$add_user .= "VALUES ";
			{
				$add_user .= "(";
				$add_user .= "'$user', ";
				$add_user .= "'$pass', ";
				$add_user .= "'$rank'";
				$add_user .= ") ";		
			}
			
			//If the values have been inserted then do this code
			if(mysqli_query($link,$add_user))
			{
				echo header("refresh:0; url=index.php");
			}
			//If the values has not been inserted then display this
			else
			{
				echo 'There is a problem.';
				echo mysqli_error($link);
			}
		}
		else
		{
			echo '<div id="login_form">';
				echo 'User already exists !!';
			echo '</div>';
		}
	}
		//Create the form
		echo '<form name="registration" action="" method="post">
			<div id="register">
				<div id="register_title">Registration Form</div>
				<div id="registration_form">
					<label>Username:</label>
					<input type="text" name="username" maxlength="20" />
					<label>Password:</label>
					<input type="password" name="password" maxlength="20" />
					<label>Access Level:</label>
					<select id="select_rank" name="rank">
					  <option value="1">Administrator</option>
					  <option value="0">Guest</option>
					</select>
				  <div id="submit_reg" ><input name="submit_registration" type="submit" /></div>    
				</div>
			</div>      
	  </form>';
	
      echo '<div id="delete">';
      	echo '<div id="register_title">Delete Users Form</div>';
		
			//Select everything from Members table
        	$select_user = "SELECT * FROM Members ";
			$select_user_query = mysqli_query($link,$select_user);
			
			echo '<table width="370" border="1">
				<tr>
				<th scope="col">Delete</th>
				<th scope="col">Name</th>
				<th scope="col">Rank</th>
				</tr>';
			echo '<form action="" method="POST" enctype="multipart/form-data">';
			
			//While there exists rows in the database display them in the table.	
			while($row = mysqli_fetch_array($select_user_query,MYSQLI_ASSOC))
			{		
				echo'<tr>';
				echo'<td>';
					echo '<label>Delete ID:</label>';
					echo '<input name="deleteID" type="submit" value="'.$row{'ID'}.'" />';
				echo'</td>';
				echo'<td>'.$row{'username'}.'</td>';
				if($row{'accessLevel'} == 1)
				{
					echo'<td>Administrator</td>';	
				}
				elseif($row{'accessLevel'} == 0)
				{
					echo'<td>Guest</td>';	
				}
				echo'</tr>';
			}
			echo '</form>';
			echo '</table>';
			
			//If the deleteID button has been clicked then run the below code.s
			if(isset($_POST['deleteID']))
			{
				//Stores the button value.
				$delete_user_ID = $_POST['deleteID'];
				
				//It delets from Members where the ID is the same.
				$delete_user = "DELETE FROM Members ";
				$delete_user.= "WHERE ID = $delete_user_ID";
				
				//If the values have been inserted then do this code.	
				if(mysqli_query($link,$delete_user))
				{
					echo header("refresh:0; url=index.php");
				}
				//If the values has not been inserted then display this.
				else
				{
					echo 'There is a problem.';
					echo mysqli_error($link);
				}
			}
      echo '</div>';
	  
	  //Close the connection
	  mysqli_close($link);
?>