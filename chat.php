<?php
session_start();
 if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }

?>

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


    <title>Chat</title>
  </head>
  <body>
 <!--nav start-->
 <nav class="navbar navbar-expand-lg  navbar-light bg-info fixed-top">
  <a class="navbar navbar-brand text-light">Chat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mymenu" aria-controls="mymenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mymenu">
    <ul class="navbar-nav ml-2">
      <li class="nav-item  abc" >
        <a class="nav-link text-light" href="entry.php"><i class="fa fa-home"> Home</i></a>
      </li>
    <form class="form-inline  my-0 my-lg-0 ml-3">
      <input class="form-control mr-sm-2" type="search" placeholder="Search By Category" aria-label="Search">
      <button class="btn btn-light my-2 my-sm-0" type="submit"><i class="fa fa-search text-info"> Search</i></button>
    </form>
        <li class="nav-item ml-2 abc">
        <a class="nav-link text-light active" href="chat.php"><i class="fa fa-envelope-square"> Message</i></a>
      </li>
          <li class="nav-item ml-2 active abc">
        <a class="nav-link text-light " href="profile.php"><i class="fa fa-user-circle"> Profile</i></a>
      </li>
      <li class="nav-item ml-2 abc">
        <a class="nav-link text-light" href="#contact"><i class="fa fa-question-circle"> Quiz</i> </a>
      </li>
    <li class="nav-item dropdown ml-2 abc">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Drop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="setting.php"><i class="fa fa-cog"></i> Setting</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
         </li>     
     
    </ul>
  </div>
</nav>

  <div class="container-sm bg-dark" style="height:100%"><br>
     <div class="card mt-5">
  <div class="card-header bg-light">
    <span class="text-danger" style="font-size:20px;font-family: sans-serif;">Who is Online?</span>
  <a class="float-right abc list-item" href="entry.php"> <i class="fa fa-sign-out"></i>Back</a>

  </div>
    <?php
$username=$_SESSION['username'];
$maxlifetime = ini_get("session.gc_maxlifetime");
include 'connection.php';
  $sql="SELECT userid,image,username FROM registration NATURAL JOIN login WHERE login.status='logedin' and registration.username IN(SELECT userB FROM friendrequest where userA='$username' AND status='Approved' UNION SELECT userA FROM friendrequest where userB='$username' AND status='Approved')";
  $result=$conn->query($sql);
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {?>
<p class="border border-additive  text-primary p-4 abc mt-5">None of your friend is online.</p>
 <?php }
  else
  {
    $i=0;
    while($row=mysqli_fetch_array($result))
    {?>  
  <div class="card-body bg-light">
<div class="row">
    <div class="col-12 col-sm-8 col-md-6 list-group" id="list-tab" role="tablist">
      <button type="button" class="list-group-item list-group-item-action btn btn-info pqr text-primary"><?php echo $row['username'];?>&nbsp;<span class="badge badge-pill badge-info">Active now</span> 

      </button>
      
    </div>
</div>
</div>
</div>
  <?php }$i++;
}?>
  

</div>
</div>
</div><br><br>
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-bottom">
    <p class="text-light text-center">&copy;Educate Nepal 2019 All Rights Reserved</p>
</nav>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

