<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!--font awesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- custom css-->
    <link rel="stylesheet" type="text/css" href="custom.css">
   
    <title>Friend Requests.</title>
  </head>
  <body>
    <?php
  session_start();
if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }?>
     <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
   <a class="navbar-brand text-light" href="entry.php">Go to Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mymenu" aria-controls="mymenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mymenu">
  </div>
</nav>


<div class="container-fluid  mt-5 bg-secondary" style="height:100%">
	<?php
include 'connection.php';
$username=$_SESSION['username'];
$sql="SELECT userid,userA,image from registration join friendrequest on registration.username=friendrequest.userA where userB='$username' and status='pending'";
$result=$conn->query($sql);
if(mysqli_num_rows($result)==0)
{?>
	<br><br>
		<div class="card bg-dark">
		<div class="card-header"><a href="entry.php"><button class="btn btn-light">Back</button></a></div>
		<div class="card-body">
	  <p class="text-warning p-4 bg-dark">There is no new friend request.</p>
	  </div>
	</div>

<?php
}?>
<br>
<?php
$i=0;
while($row=mysqli_fetch_array($result))
      {?>
    	<?php
      	if(is_null($row['image']))
          {?>
      <div class="container mt-2">
	<ul class="list-group">
  <li class="list-group-item bg-dark"><span class="d-block"><i class="fa fa-user" style="font-size:100px;color:white"></i><h4 class="text-white"><?php echo $row['userA'];?></h4><p class="text-white">Sent You a Friend Request.</p></span> 
  	<a href="confirmrequest.php?userid=<?php echo $row['userid']?>">
  		<button id="button<?php echo $i;?>" onclick="return confirm('confirm request')" type="button" class="btn btn-primary mr-1"  style="">Confirm</button></a>
 <a href="deleterequest.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1" onclick="return confirm('delete request')">Delete</button></a>
  <a href="visitprofile.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1">Check Profile</button></a>
</li>
</ul>
</div>
 <?php }
 	else
        {?>
       <div class="container mt-3">
	<ul class="list-group">
  <li class="list-group-item bg-dark"><span class="d-block"><img  class="img-fluid border border-additive" src="registration/<?php echo $row['image'];?>" alt="logo" width="100" height="100"><h4 class="text-white"><?php echo $row['userA'];?></h4><p class="text-white">Sent You a Friend Request.</p></span>
   <a href="confirmrequest.php?userid=<?php echo $row['userid']?>">
  <button id="button<?php echo $i;?>"   type="button" class="btn btn-primary mr-1"  style="" onclick="return confirm('confirm request')">Confirm</button></a>
  <a href="deleterequest.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1" onclick="return confirm('delete request')">Delete</button></a>
   <a href="visitprofile.php?userid=<?php echo $row['userid']?>"><button type="button" class="btn btn-primary mr-1">Check Profile</button></a>
</li>
</ul>
</div>
  <?php }
      $i++;
  }
      ?>
</div>
 <nav class="navbar-nav navbar-expand-lg bg-info fixed-bottom">
  <p class="text-center text-light p-2">&copy Educate Nepal 2019 All rights Reserved</p>
  </nav> 

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

