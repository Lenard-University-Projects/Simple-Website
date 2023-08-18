<?php	
if(!empty($_FILES["uploaded_file"]) && ($_FILES['uploaded_file']['error'] == 0)) 
{

	$filename = basename($_FILES['uploaded_file']['name']);
	$ext = substr($filename, strrpos($filename, '.') + 1);
	if 
	(
		($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") &&
		($_FILES["uploaded_file"]["size"] < 10000000)
	){
		$newname = $filename;
		if (!file_exists($newname)) 
		{
			if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) 
			{
			} 
			else 
			{
				echo "Error: A problem occurred during file upload!";
			}
		} 
		else 
		{
			echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
		}
	}
	else 
	{
		echo "Error: Only .jpg images under 1000Kb are accepted for upload";
	}
}
else 
{
	echo "Error: No file uploaded";
}
	
	$desc = mysqli_real_escape_string($link,$description);
	$name = mysqli_real_escape_string($link,$file_name);
	
	$add_post = "INSERT INTO Games ( ";
	$add_post .= "Description, ";
	$add_post .= "Name, ";
	$add_post .= "Image ";
	$add_post .= ") ";

	$add_post .= "VALUES ";
	{
		$add_post .= "(";	
		$add_post .= "'$desc', ";
		$add_post .= "'$name', ";
		$add_post .= "'$newname'";
		$add_post .= ") ";		
	}
	
	if(mysqli_query($link,$add_post))
	{
		header("refresh:0; url=index.php");
	}
	else
	{
		echo 'There is a problem.';
		echo mysqli_error($link);
	}	
?>  