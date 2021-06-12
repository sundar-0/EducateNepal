
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom css-->
    <link rel="stylesheet" type="text/css" href="custom.css">

    <title>Registration</title>
  </head>
  <body>
       <div class="container-col">
     <div class="card">
  <div class="card-header bg-info">
   <span class="text-center lead text-light">Registration</span>
   <a href="index.php"><button type="button" class="btn btn-primary float-right">Back</button></a>
   
  </div>
  <div class="card-body bg-light text-primary">
    <form action="registercheck.php" name="myform" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control is-invalid" id="email" name="email" placeholder="name@example.com" required value="">
    <div class="invalid-feedback" id="validate_email" style="display:none">please choose your email.</div>
  </div>
   <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control is-invalid" id="username" name="username" aria-describedby="usernameHelp" required>
    <div class="invalid-feedback" id="validate_username" style="display:none;">please choose your username.</div>
  </div>
  <div class="form-group">
    <label for="gender">Please Select Gender</label>
    <select class="form-control is-invalid" id="gender" name="gender" required>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="none">None</option>
    </select>
    <div class="invalid-feedback" id="validate_gender" style="display: none;">please select your gender.</div>
  </div>
     <div class="form-group">
    <label for="date">Date Of Birth:</label>
    <input type="date" class="form-control is-invalid" id="date" name="date" min="1910-12-12" max="<?php echo date('Y-m-d')?>" required>
    <div class="invalid-feedback" id="validate_dob" style="display: none;">please choose your date of birth.</div>
  </div>
   <div class="form-group">
    <label for="image">help us to identify you</label>
    <input type="file" class="form-control" id="image" name="image">
    </div>
   <div class="form-group">
    <label for="password">Enter Your Password</label>
    <input type="password" class="form-control is-invalid" id="password"  name="password" required value="">
    <div class="invalid-feedback" id="validate_password"  style="display: none;">please choose your password.</div><br>
    <button type="button" class="btn btn-primary" onclick="viewpassword()" id="button"> view password</button>
    <span id="demo" class="text-warning"></span>
  </div>
     <div class="form-group">
    <label for="confirm_password">Re-enter Your Password</label>
    <input type="password" class="form-control is-invalid" id="confirm_password" required>
    <div class="invalid-feedback" id="validate_confirmpassword" style="display: none;">password do not match.</div>
  </div>
  <input type="submit" name="submit" value="submit" class="btn btn-primary" onclick="registercheck()">
</form>

</div>
</div>


    <!-- Optional JavaScript -->
    <script type="text/javascript">
    
  function registercheck() {
     var x =['validate_email','validate_username','validate_gender','validate_dob','validate_password'];
      var y=['email','username','gender','date','password']; 
    
   for (var i = 0; i < x.length; i++)
  {
 if (document.getElementById(y[i]).value=== "") {
    document.getElementById(x[i]).style.display = "block";
  } else {
    document.getElementById(x[i]).style.display= "none";
  }
}

}
function validate()
{
var p=document.getElementById("password").value;
var a=document.getElementById("username").value;

if (p.length!=0&&p.length<8) 
  {
    alert("Your password is too weak.")
     return false;
   
  }

if(!isNaN(a))
{
  alert("Username can't be numeric.")
  return false;
}
if ((a.length < 5) || (a.length > 15))
{
alert("username must be of 5 to 15 length")
return false;
}
 if(document.getElementById("password").value!==document.getElementById("confirm_password").value)
  {
    document.getElementById("validate_confirmpassword").style.display="block";
    return false;
  }
}
</script>

<script type="text/javascript">
  function viewpassword()
  {
      var pass=document.getElementById("password").value;
       document.getElementById("demo").innerHTML=pass;
  }
</script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>