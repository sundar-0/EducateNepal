<?php
session_start();
$u=$_SESSION['username'];
$s="loggedout";
include 'connection.php';
$sql="update login set status='$s' where username='$u'";
$result=$conn->query($sql);
if($result==true)
{
session_destroy();

header('Location:index.php');
}

?>