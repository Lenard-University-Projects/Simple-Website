<?php
	session_start();
?>

<div id='cssmenu'>
    <ul>
	   <?php
           	if($_SESSION['rank'] == 1)
           	{
               	echo '<li><a href="../upload"><span>Upload</span></a></li>';
           	}
       ?>
       <li><a href='../members'><span>Members</span></a></li>
       <li><a href='../contact'><span>Contact</span></a></li>
       <?php
           	if($_SESSION['rank'] == 1)
           	{
               	echo '<li><a href="../games"><span>Games</span></a></li>';
           	}
       ?>
       <li><a href='../index.php'><span>Home</span></a></li>
       <li><a href="../admin/LinkAdminPage.html"><span>Admin</span></a></li>
       <li class='active last'><a href="../login"><span>Login</span></a></li>
    </ul>
</div>