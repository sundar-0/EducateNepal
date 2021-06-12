
  	<?php
  session_start();
if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }?>

	  <?php
        $fromuserid=$_GET['userid'];
        $session_user=$_SESSION['username'];
        include 'connection.php';
        $sql1="select username from registration where userid='$fromuserid'";
        $result1=$conn->query($sql1);
        $row1=mysqli_fetch_object($result1);
        $fromuser=$row1->username;
        $sql2="update friendrequest set status='Approved' where userA='$fromuser' and userB='$session_user'";
        $result2=$conn->query($sql2);
		if($result2==TRUE)
		{
			echo "<script>alert('friendrequest Accepted.')</script>";
			 echo "<script>window.location='entry.php'</script>";
		
			

		}
		?>