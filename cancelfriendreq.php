<?php
  session_start();
if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }?>
  	  <?php
        $userid=$_GET['userid'];
        $session_user=$_SESSION['username'];
        include 'connection.php';
        $sql1="select username from registration where userid='$userid'";
        $result1=$conn->query($sql1);
        $row1=mysqli_fetch_object($result1);
        $touser=$row1->username;
        $sql2="delete from friendrequest where userA='$session_user' and userB='$touser'";
        $result2=$conn->query($sql2);
		if($result2==TRUE)
		{
			echo "<script>alert('friendrequest canceled.')</script>";
			 echo "<script>window.location='findfriends.php'</script>";
		
			

		}



       
        ?>




?>