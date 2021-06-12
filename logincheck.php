<?php
$u=$_POST['username'];
$p=$_POST['password'];
$mdpass=md5($p);
include 'connection.php';
$sql="SELECT * FROM registration WHERE username='$u' and password='$mdpass'";
$result=$conn->query($sql);//to check whether the user exists or not in the registration table
if($result->num_rows>0)//if there exists a user with that name and password
{
session_start(); 
$_SESSION['status']='logedin';
$_SESSION['username']=$u;
$sql="select userid from registration where username='$u'";
$uidresult=$conn->query($sql);
$row=mysqli_fetch_object($uidresult);
$uid=$row->userid;
$s= $_SESSION['status'];
$sql1="SELECT * from login where username='$u'";
 $result=$conn->query($sql1);
 if($result->num_rows!=0)
  {
$sql1="update login set status='$s' where username='$u'";
 $result=$conn->query($sql1);
 if($result==true)
 {
   header('Location:entry.php');
 }
 }
   else{
    $sql2="insert into login values('$uid','$u','$s')";
     $result2=$conn->query($sql2);
 if($result2==true)
 {
   header('Location:entry.php');
 }
 }
 }
 
  else{
    echo "<script>alert('invalid username/password')</script>";
    echo "<script>window.location='index.php'</script>";
  }
?>
