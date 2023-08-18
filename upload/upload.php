<?php
if(!empty($_FILES["uploaded_file"]) && ($_FILES['uploaded_file']['error'] == 0)) 
{
	$filename = basename($_FILES['uploaded_file']['name']);
	$ext = substr($filename, strrpos($filename, '.') + 1);
	if 
	(
		($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") || 
		($ext == "html") && ($_FILES["uploaded_file"]["type"] == "text/html") &&
		($_FILES["uploaded_file"]["size"] < 1000000)
	){
		$newname = $filename;
		if (!file_exists($newname)) 
		{
			if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) 
			{
				echo "It's done! The file has been saved as: <br/>".$newname; 
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
echo "<br/><a href='$newname'>$newname</a>";	
?>