<?php 
			$path = "registration/"; 
			$maxSize =2097152;
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
			
			$username=$_POST['username'];
			$pass=md5($_POST['password']);
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			$dob=$_POST['date'];
			include 'connection.php';	
			$user=mysqli_query($conn,"SELECT username FROM registration WHERE username='$username'");
  			$count=mysqli_num_rows($user);
  			if($count>0)
 			 {
   				echo "<script>alert('Username Already Exists.')</script>";
   				echo "<script>window.location='register.php'</script>";
   				 die();
   				}
   			if (is_uploaded_file($_FILES['image']['tmp_name'])) {
	 			if (($_FILES['image']['type'] != "image/jpeg") && ($_FILES['image']['type'] != "image/gif") && ($_FILES['image']['type'] != "image/jpg") && ($_FILES['image']['type'] != "image/png")) {
				      echo"<script>alert('Invalid file');</script>";
			   		 } else if ($_FILES['image']['size'] > $maxSize) {
				    echo"<script>alert('Extra large File');</script>";
			  		  } else {
	                        $target_file = basename($_FILES["image"]["name"]);
	                        $extention = pathinfo($target_file,PATHINFO_EXTENSION);
				  	 	 $filename = time().'.'.$extention;
						$result = move_uploaded_file($_FILES['image']['tmp_name'],$path .$filename);
				   		 if ($result == 1) {
					  	$sql="INSERT INTO registration VALUES('','$username','$email','$pass','$dob','$gender','$filename')";
	                                    if($conn->query($sql)==TRUE)
							{
						    echo"<script>alert('registered successfully')</script>";
						      echo "<script>window.location='register.php'</script>";
					
							}
							}
                 	else
                       	{
					echo"<script>alert('error')</script>";
                        }
						}
					}
					else
					{
					$sql="INSERT INTO registration VALUES('','$username','$email','$pass','$dob','$gender',NULL)";
                                    if($conn->query($sql)==TRUE)
					{
					    echo"<script>alert('registered successfully')</script>";
					    echo "<script>window.location='register.php'</script>";
					}
					else
					{
						echo"<script>alert('error')</script>";
						echo "<script>window.location='register.php'</script>";
					}
					}
				}
			?>


