<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <!--font awesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <title>Find Friend</title>
  </head>
  <body>
  	<?php
  session_start();
if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }?>
  	?>
  	  <!--nav start-->
 <nav class="navbar navbar-expand-sm navbar-light bg-info fixed-top">
   <a class="navbar-brand text-light" href="entry.php">Back to Home</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mymenu" aria-controls="mymenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="collapse navbar-collapse" id="mymenu">
    	 <form class="form-inline my-2 my-lg-0 ml-3 text-light">
      <b>Search Friends</b>&nbsp;<input class="form-control mr-sm-2" type="search" placeholder="Search By Name/Email" aria-label="Search">
      <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
      </form>
   </div>
</nav>
<?php
//gives the result of sent friend request of a logged in user
include 'connection.php';
$username=$_SESSION['username'];
$sql="select * from  friendrequest where  status='pending' and userA='$username'";
$queryresult=$conn->query($sql);
$i=0;
while($row=mysqli_fetch_array($queryresult))
{?>
	<?php 
	$userB=$row['userB'];
	$sql1="select userid,image from  registration where  username='$userB'";
	$res=$conn->query($sql1);
	$row=mysqli_fetch_object($res);
	$img=$row->image;
	if (is_null($img)) {?>
	<div class="container">
	<ul class="list-group mt-5">
  <li class="list-group-item bg-dark"><span class="d-block"><i class="fa fa-user" style="font-size:100px;color:white"></i><h4 class="text-white"><?php echo $userB;?></h4></span> 
  	<a href="cancelfriendreq.php?userid=<?php echo $row->userid;?>"><button  onclick="return confirm('Cancel Friend Request')" type="button" class="btn btn-primary mr-1" style="color:black">Undo<i class="fa fa-undo"></i></button></a>
  	<a href="visitprofile.php?userid=<?php echo $row->userid;?>"><button type="button" class="btn btn-primary">Visit Profile</button></a>
  </li>
  	</ul>
</div>
 <?php }
 	else
        {?>
       <div class="container">
	<ul class="list-group mt-5">
  <li class="list-group-item bg-dark"><span class="d-block"><img  class="img-fluid border border-additive" src="registration/<?php echo $img?>" alt="logo" width="100" height="100"><h4 class="text-white"><?php echo $userB;?></h4></span>
   <a href="cancelfriendreq.php?userid=<?php echo $row->userid;?>"><button onclick="return confirm('Cancel Friend Request')" type="button" class="btn btn-primary mr-1" style="color:black">Undo<i class="fa fa-undo"></i></button></a>
    <a href="visitprofile.php?userid=<?php echo $row->userid;?>"><button type="button" class="btn btn-primary">Visit Profile</button></a>
</li>
</ul>
</div>
 <?php }
        $i++;
      }
      ?>


	<?php

$username=$_SESSION['username'];
$sql1="SELECT COUNT(userA) As friendrequestsent FROM friendrequest WHERE userA='$username' AND status='Approved' or userA='$username' AND status='pending'";
$result1=$conn->query($sql1);
$row=mysqli_fetch_object($result1);
$frnreqsent=$row->friendrequestsent;
if ($frnreqsent==0) {
 $sql2="SELECT username,image,userid from registration where username!='$username' and username NOT IN (SELECT userA FROM friendrequest WHERE  userB='$username' and status='Approved' or userB='$username' and status='pending')";
  $result2=$conn->query($sql2);
  $i=0;
  while($row=mysqli_fetch_array($result2))
      {?>
      <?php
        if(is_null($row['image']))
          {?>
      <div class="container">
  <ul class="list-group mt-5">
  <li class="list-group-item bg-dark"><span class="d-block"><i class="fa fa-user" style="font-size:100px;color:white"></i><h4 class="text-white"><?php echo $row['username'];?></h4></span> 
    <a href="addfriend.php?userid=<?php echo $row['userid']?>">
      <button id="button<?php echo $i;?>" onclick="return confirm('Add <?php echo $row['username']?> as friend.')" type="button" class="btn btn-primary mr-1" value="Add Friend" style="">Add Friend</button></a>
 <a href="visitprofile.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1">Visit Profile</button></a>
</li>
</ul>
</div>
 <?php }
  else
        {?>
       <div class="container">
  <ul class="list-group mt-5">
  <li class="list-group-item bg-dark"><span class="d-block"><img  class="img-fluid border border-additive" src="registration/<?php echo $row['image'];?>" alt="logo" width="100" height="100"><h4 class="text-white"><?php echo $row['username'];?></h4></span>
   <a href="addfriend.php?userid=<?php echo $row['userid']?>">
  <button id="button<?php echo $i;?>" onclick="return confirm('Add <?php echo $row['username']?> as friend')"  type="button" class="btn btn-primary mr-1" value="Add Friend" style="">Add Friend</button></a>
  <a href="visitprofile.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1">Visit Profile</button></a>
</li>
</ul>
</div>
  <?php }
      $i++;
  }
      ?>
  
<?php
 }
else
{
$sql="SELECT username,image,userid from registration where username!='$username' and username NOT IN (SELECT userB FROM friendrequest WHERE userA='$username' and status='pending' or userA='$username' AND status='Approved' UNION (SELECT userA FROM friendrequest WHERE userB='$username' and status='pending' or userB='$username' AND status='Approved'))";
$result=$conn->query($sql);
$i=0;
while($row=mysqli_fetch_array($result))
      {?>
    	<?php
      	if(is_null($row['image']))
          {?>
      <div class="container">
	<ul class="list-group mt-5">
  <li class="list-group-item bg-dark"><span class="d-block"><i class="fa fa-user" style="font-size:100px;color:white"></i><h4 class="text-white"><?php echo $row['username'];?></h4></span> 
  	<a href="addfriend.php?userid=<?php echo $row['userid']?>">
  		<button id="button<?php echo $i;?>" onclick="return confirm('Add <?php echo $row['username']?> as friend.')" type="button" class="btn btn-primary mr-1" value="Add Friend" style="">Add Friend</button></a>
 <a href="visitprofile.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1">Visit Profile</button></a>
</li>
</ul>
</div>
 <?php }
 	else
        {?>
       <div class="container">
	<ul class="list-group mt-5">
  <li class="list-group-item bg-dark"><span class="d-block"><img  class="img-fluid border border-additive" src="registration/<?php echo $row['image'];?>" alt="logo" width="100" height="100"><h4 class="text-white"><?php echo $row['username'];?></h4></span>
   <a href="addfriend.php?userid=<?php echo $row['userid']?>">
  <button id="button<?php echo $i;?>" onclick="return confirm('Add <?php echo $row['username']?> as friend')"  type="button" class="btn btn-primary mr-1" value="Add Friend" style="">Add Friend</button></a>
  <a href="visitprofile.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1">Visit Profile</button></a>
</li>
</ul>
</div>
  <?php }
      $i++;
  }
      
}
?>


<br><br><br>
 <nav class="navbar-nav navbar-expand-lg bg-info fixed-bottom">
  <p class="text-center p-2 text-light">&copy; Educate Nepal 2019 All rights Reserved</p>
  </nav>
  </div>

<!--
<script type="text/javascript">
function myFunction(id) { 
			var id=id;
			var value=document.getElementById(id).value;
			
	     	if(document.getElementById(id).value=== "Add Friend")
				 {
                   document.getElementById(id).value = "Undo";
                    document.getElementById(id).style.color="gold";
                    document.getElementById(id).innerHTML = "Request sent";
                   
               	 }
                else {
                     document.getElementById(id).value = "Add Friends";
                    document.getElementById(id).style.color="white";
                    document.getElementById(id).innerHTML = "Add Friend";
      
                    
                }
                alert(value)

	    
            }
</script>
-->



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
