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
   
    <title>Educate Nepal</title>
  </head>
  <body>
    <!--nav start-->
 <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
  <a class="navbar-brand text-light" href="index.php">Educate Nepal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mymenu" aria-controls="mymenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mymenu">
    <ul class="navbar-nav">
      <li class="nav-item active" >
        <a class="nav-link text-light" href="#home">Home</a>
      </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="#login">Signup/Login</a>
      </li>
         <li class="nav-item">
        <a class="nav-link text-light" href="#newmember">Newly Register Member</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#aboutus">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#contact">Contact</a>
      </li>
   
    </ul>
  </div>
</nav>
<!--nav end-->
    <div class="container-col bg-text" id="home">
    <div class="card">
  <div class="card-header bg-primary mt-5">
  <span class="text-white text-center lead">Home</span>
  </div>
  <div class="card-body bg-light border border-additive">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="Image/banner.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Image/banner.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Image/banner.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</div>
</div>
<!--End of carousel div-->

<br>
<!--login div start-->
 <div class="container-col" id="login">
      <div class="card">
  <div class="card-header bg-primary">
     <span class="text-white text-center lead">Login</span>
    </div>
  <div class="card-body border border-additive bg-secondary text-light">
    <form action="logincheck.php" method="POST">
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
     <div class="invalid-feedback" id="validate_username" style="display: none;">This field is required.</div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
     <input type="password" class="form-control" id="password"name="password" required>
      <div class="invalid-feedback" id="validate_password" style="display: none;">This field is required.</div>
  </div>
  <input type="submit" class="btn btn-primary" value="login" onclick="login()" >
</form><br>
<span class="d-block lead">For New member</span>
<span class="d-block lead">Register here:<a href="register.php" style="text-decoration:none;">Register</a> </span>
</div>
</div>
</div>
<!--login div end-->
<br>

<br>

<!--About us-->

    <div class="container-col" id="aboutus">
     <div class="card">
    <div class="card-header bg-primary">
      <span class="text-white text-center lead">About Us:</span>
    </div>
    <div class="card-body  border border-additive bg-success">
    <span class="d-block lead text-light"><b>What is Educate Nepal?</b></span>
    <span class="d-block lead text-light">Educate nepal is an forum.Basically,It is an online platform for discussing on particular topics.User can share and grab huge knowledge throughout this website.The main motive of this website is to unite all users and have interaction with them.</span><br>
    <span class="d-block lead text-warning"><b>Join Educate Nepal And It's Free.</b></span><br>
     
    <button type="button" class="btn btn-primary" onclick="more()">Learn About our member</button><br>
    <div class="container-col" id="more" style="display:none;">
      <p class="my-3 ml-5 lead text-light"><b>Our member:</b></p>
        <div class="row" style="background:#739FBD;">
        <div class="col-12 col-sm-6 col-md-3 col-sm-6 border border-additive bg-info" ><i class="fa fa-users p-2"></i><span class="d-block text-white">Sundar</span></div>
        <div class="col-12 col-sm-6 col-md-3 col-sm-6 border border-additive bg-info"><i class="fa fa-users p-2"></i><span class="d-block text-white">Yajju</span></div>
        <div class="col-12 col-sm-6 col-md-3 col-sm-6 border border-additive bg-info"><i class="fa fa-users p-2"></i><span class="d-block text-white">Suraj</span></div>
        <div class="col-12 col-sm-6 col-md-3 col-sm-6 border border-additive bg-info"><i class="fa fa-users p-2"></i><span class="d-block text-white">Sudip</span></div>
       </div>  
    </div>
    </div>
  </div>
  </div>
<!--about us end-->
<br>

<!--register member area-->
    <div class="container-col" id="newmember">
     <div class="card">
    <div class="card-header bg-primary">
        <span class="text-light text-center lead">Newly Register Member</span> 
    </div>
    <div class="card-body bg-secondary boder border-additive">
    <div class="row">
  <div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="list-group" style="font-family: sans-serif;font-size:18px">
      <?php
include 'connection.php';
$sql="SELECT * FROM registration ORDER BY userid DESC LIMIT 8";
$result=$conn->query($sql);
while($row=mysqli_fetch_array($result))
{?>
 <a class="list-group-item list-group-item-action" data-toggle="list" role="tab"><i class="fa fa-graduation-cap"></i>&nbsp;<?php echo $row['username']; ?> </a>
<?php
}?>
</div>
  </div>

    </div>
  </div>
  </div>
</div>
<!--end-->
<br>

<!--Contact US-->
  <div class="container-col" id="contact">
     <div class="card">
  <div class="card-header bg-primary">
     <span class="text-light text-center lead">Contact Us:</span>
   </div>
   <div class="card-body bg-dark">
       <div class="row">
         <div class="col-sm col-md text-center">
          <p class="text-info lead">Find Us On:</p>
          <span class="d-block bg-light"><iframe class="col"  src="https://maps.google.com/maps?height=20&amp;hl=en&amp;q=gongabu+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no"><a href="https://www.maps.ie/coordinates.html">gps coordinates finder</a></iframe><br/></span>
         </div>
          <div class="col text-center col-sm-4 col-md-6"><p class="text-info mt-2 lead">Contact Details:</p>
          <span class="d-block text-info bg-light"><i class="fa fa-phone p-2"></i>9804457191</span>
          <span class="d-block text-warning bg-light"><a href="http://www.facebook.com/educatenepal12"><i class="fa fa-facebook p-2"></i>Educatenepal</a></span>
           <span class="d-block text-warning bg-light"><a href="http://www.twitter.com/educatenepal12"><i class="fa fa-twitter p-2"></i>Educatenepal</a></span>
             <span class="d-block text-warning bg-light"><a href="http://www.instagram.com/educatenepal12"><i class="fa fa-instagram p-2"></i>Educatenepal</a></span>
           </div>

      </div>
  </div>    
</div>
</div>
</div>

<!--end of contact us div-->
<br><br>
 <nav class="navbar-nav navbar-expand-lg bg-info fixed-bottom">
  <p class="text-center text-light">&copy Educate Nepal 2019 All rights Reserved</p>
  </nav> 
<!--end of fluid container-->


    <!-- Optional JavaScript -->
    <script type="text/javascript">
        var x =['validate_username','validate_password'];
      var y=['username','password']; 
      function login() {
   for (var i = 0; i < x.length; i++)
  {
 if (document.getElementById(y[i]).value=== "") {
    document.getElementById(x[i]).style.display = "block";
  } else {
    document.getElementById(x[i]).style.display= "none";
  }
}
}
</script>
<script type="text/javascript">
  function more() {
  var x = document.getElementById("more");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>