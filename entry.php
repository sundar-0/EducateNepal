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
   
    <title>Entry</title>
  </head>
  <body>
    <?php
  session_start();
if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }
?>
<?php
$username=$_SESSION['username'];
include 'connection.php'; 
$query="SELECT COUNT(userB) AS requests FROM friendrequest where  userB='$username' and status='pending'";
$queryresult=$conn->query($query);
$row=mysqli_fetch_object($queryresult);
$no_of_req=$row->requests;
        
?>
       
  <!--nav start-->
 <nav class="navbar navbar-expand-md navbar-light bg-info fixed-top">
   <a class="navbar-brand text-light">Welcome</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mymenu" aria-controls="mymenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mymenu">
    <ul class="navbar-nav ml-2">
      <li class="nav-item active abc" >
        <a class="nav-link text-light" href="entry.php"><i class="fa fa-home"> Home</i></a>
      </li>
    <form class="form-inline  my-lg-0 ml-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search By Category" aria-label="Search">
      <button class="btn btn-light my-2 my-sm-0" type="submit"><i class="fa fa-search text-info"> Search</i></button>
    </form>
        <li class="nav-item ml-2 abc">
        <a class="nav-link text-light" href="chat.php"><i class="fa fa-envelope-square"> Message</i></a>
      </li>
          <li class="nav-item ml-2 abc">
        <a class="nav-link text-light " href="profile.php"><i class="fa fa-user-circle"> Profile</i></a>
      </li>
      <li class="nav-item ml-2 abc">
        <a class="nav-link text-light" href="#contact"><i class="fa fa-question-circle"> Quiz</i> </a>
      </li>
       <li class="nav-item dropdown ml-2 mt-0 abc">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Friends
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="showfriendreq.php"><i class="fa fa-bell"></i> Request<span class="badge badge-light"><?php echo $no_of_req;?></span></a>
          <a class="dropdown-item" href="findfriends.php"><i class="fa fa-users"></i> Find friends</a>
        </div>
         </li>       
    <li class="nav-item dropdown ml-2 abc mt-0">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Drop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="setting.php"><i class="fa fa-cog"></i> Setting</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a>
        </div>
         </li>       
         </ul>
  </div>
</nav><br><br>
<!--nav end-->
    <div class="container" id="discussionboard">
    <div class="card mt-2 bg-secondary">
    <div class="card-body">
    <div class="row">
    <div class="col mt-3">
    <li class="list-group-item text-dark display-4 bg-primary">Trending</li>
    <?php
    $sql="SELECT catname FROM (SELECT catname,count(catidfk) as catcount from post join category on post.catidfk=category.catid GROUP BY catidfk) AS tbl1 where catcount>=2";
     $result=$conn->query($sql);
     $i=0;
     while($row=mysqli_fetch_array($result))
     { ?>

    <a href="categorylike.php?category=<?php echo $row['catname']?>" class="list-group-item list-group-item-action bg-light">#<?php echo $row['catname'];?></a>
    <?php
  }
    $i++;
    ?>
 
   </div>
    <div class="col-md-8">
    <form action="checkpost.php" name="formpost" method="POST" onsubmit="return validatepost()" enctype="multipart/form-data">
  <div class="form-group text-light display-4">
  <label for="comment">Post Something:</label>

  <textarea class="form-control" rows="5" id="comment" name="posttext"></textarea></div>
     <div class="invalid-feedback text-warning" id="validate_post"  style="display: none;font-size:16px">Your post seems to be empty!</div><br>
  
  <div class="form-group text-light">
    <label for="category">Please Select Category</label>
    <select class="form-control" id="category" name="category">
      <?php
    
      $sql="SELECT * FROM category";
      $result=$conn->query($sql);
      $i=0;
      while($row=mysqli_fetch_array($result))
      {
        ?>
      <option   value="<?php echo $row['catid']; ?>"><?php echo $row['catname'];?></option>
    <?php $i++;}
        ?>
    </select>
  </div>
  <div class="form-group text-light">
    <label for="image">Upload</label>
    <input type="file" class="form-control" id="image" name="image">
    </div>
    <input type="submit" name="submit" value="Post" class="btn btn-primary">
  </form>
<h2 class="mt-5 display-4 text-light">Recent Post:</h2><br>
<?php

   $sql="SELECT * FROM registration Join post on registration.username=post.username JOIN category  ON post.catidfk=category.catid order by postid desc limit 10";
      $result=$conn->query($sql);
      $i=0;
      while($row=mysqli_fetch_array($result))
      {
        if(is_null($row['image']))
          {?>
<div class="container bg-light border border-additive">
   <h5 class="mt-2"><a href="visitprofile.php?userid=<?php echo $row['userid']?>"><?php echo  $row['username'];?></a>&nbsp;posted an update.</h5>
  <p class="text-black text-justify p-2 "><?php echo $row['post'];?></p>
   <span class="text-info border border-additive p-2">Category:<a href="searchresult.php?category=<?php echo $row['catname']?>"><?php echo $row['catname'];?></a></span><br><br>
   <a href="like.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Like <span class="badge badge-light">4</span></button></a>
   <a href="reply.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Reply</button></a>
  <a href="share.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Share</button></a>
  <br><br>
</div><br>
     <?php 
        }
        else
        {?>
          <div class="container bg-light border border-additive">
     <h5 class="mt-2"><a href="visitprofile.php?userid=<?php echo $row['userid']?>"><?php echo  $row['username'];?></a>&nbsp;posted an update.</h5>
     <p class="text-black  text-justify p-2"><?php echo $row['post'];?></p>
    <figure class="figure">
    <img src="post/<?php echo $row['image']?>" class="img-fluid" width="200" height="200" style="border:4px solid #F8F6F6">
    </figure><br>
     <span class="text-info border border-additive p-2">Category:<a href="searchresult.php?category=<?php echo $row['catname']?>"><?php echo $row['catname'];?></a></span><br><br>
       <a href="like.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Like <span class="badge badge-light">4</span></button></a>
   <a href="reply.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Reply</button></a>
  <a href="share.php?postid=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary mr-1">Share</button></a>
  <br><br>
</div><br>
    <?php }
        $i++;
      }
      ?>
     
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
</div><br><br><br>
 <nav class="navbar-nav navbar-expand-lg bg-info fixed-bottom">
  <p class="text-center text-light p-2">&copy Educate Nepal 2019 All Rights Reserved</p>
  </nav> 

  <!--optional javascript-->
  <script>
  function validatepost()
    {
    if(document.getElementById('comment').value==="") 
         {      
         document.getElementById('validate_post').style.display = "block";
        return false;       
        }

}
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>