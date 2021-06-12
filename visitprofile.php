<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--font awesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <title>Profile</title>
  </head>
  <body>
          <!--nav start-->
 <nav class="navbar navbar-expand-lg  navbar-light bg-info fixed-top">
  <a class="navbar navbar-brand text-light">Profile</a>
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
        <a class="nav-link text-light" href="chat.php"><i class="fa fa-envelope-square"> Message</i></a>
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
      <?php
session_start();
 if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }?>
           <?php
        $userid=$_GET['userid'];
        include 'connection.php';
       $sql="SELECT username,dob,gender,image FROM registration where userid='$userid'";
      $result=$conn->query($sql);
      $i=0;
      while($row=mysqli_fetch_array($result))
         {
            $user=$row['username'];
            $dob=$row['dob'];
            $gender=$row['gender'];
            $image=$row['image'];
           $i++;
          }
          ?> 
    <?php
          $sqlcount="select count(userB) as friendsno FROM friendrequest where status='Approved' and userB='$user' or userA='$user' and status='Approved'";
          $sqlcountresult=$conn->query($sqlcount);
          $rowcount=mysqli_fetch_object($sqlcountresult);
          $no_of_friend=$rowcount->friendsno;
          ?>
   <br>
    <div class="container">
     <div class="card mt-4">
  <div class="card-body bg-secondary">
  <div class="row">
  <div class="col-12 col-sm-8 col-md-8 col-lg-5">
    <?php
     if(is_null($image))
     {?>
      <span class="d-block"><i class="fa fa-user" style="font-size:100px;color:black"></i><p class="text-light">@<?php echo $user?></p></span> 
    <?php }
    else
    {?>
    <figure class="figure">
  <img src="registration/<?php echo $image?>" class="img-fluid  border border-additive" width="74" height="74" >
   <figcaption class="figure-caption text-light">@<?php echo $user?></figcaption>
  </figure>
<?php }?>
    <ul class="list-group">
    <li class="list-group-item pqr">Born On:&nbsp;<?php echo $dob ?></li>
    <li class="list-group-item pqr">Gender:&nbsp;<?php echo $gender?></li>
    <li class="list-group-item pqr">Address:&nbsp;Nawalpur</li>
    <li class="list-group-item pqr">Friends:&nbsp;<?php echo $no_of_friend;?>&nbsp;<a href="viewfriends.php"><button class="btn btn-secondary">View</button></a></li>
    <li class="list-group-item pqr">Total Likes:2444</li>
    <li class="list-group-item pqr"> Total Shares:21</li>
    </ul>
    </div>
  </div>

<h3 class="mt-5 ml-1 text-light"><?php echo $user?>'s Post:</h6><br>

   <?php
 
   $sql="SELECT * FROM post JOIN category ON post.catidfk=category.catid where username='$user' order by postid desc limit  10";
      $result=$conn->query($sql);
      if(mysqli_num_rows ( $result )==0)
      {?>
        <p class="text-warning p-4 border border-additive bg-light">This Person Has not posted anything yet.</p>
     <?php }
      while($row=mysqli_fetch_array($result))
      {
        if(is_null($row['image']))
          {?>

<div class="container bg-light border border-additive">
   <h5 class="mt-2"><a href="#"><?php echo  $row['username'];?></a>&nbsp;posted an update.</h5>
  <p class="text-black text-justify p-2 "><?php echo $row['post'];?></p>
   <span class="text-info border border-additive p-2">Category:<a href="searchresult.php?category=<?php echo $row['catname']?>"><?php echo $row['catname'];?></a></span><br><br>
   <a href="like.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Like <span class="badge badge-light">4</span></button></a>
  <a href="reply.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Reply</button></a>
  <br><br>
</div><br>
     <?php 
        }
        else
        {?>
          <div class="container bg-light border border-additive">
     <h5 class="mt-2"><a href="#"><?php echo  $row['username'];?></a>&nbsp;posted an update.</h5>
      
     <p class="text-black  text-justify p-2"><?php echo $row['post'];?></p>
    <figure class="figure">
    <img src="post/<?php echo $row['image']?>" class="img-fluid" width="74" height="74">
    </figure><br>
    <span class="text-info border border-additive p-2">Category:<a href="searchresult.php?category=<?php echo $row['catname']?>"><?php echo $row['catname'];?></a></span><br><br>
       <a href="like.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Like<span class="badge badge-light">4</span></button></a>
  <a href="reply.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Reply</button></a>
  <br><br>
</div><br>
    <?php }
        $i++;
      }
      ?><br><br>
  <nav aria-label="Page navigation">
    <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>
</div>
</div>
</div>
</div>
<br><br>

  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-bottom">
    <p class="text-light text-center">&copy;Educate Nepal 2019 All Rights Reserved</p>
</nav>
      <!--optional javascript-->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
