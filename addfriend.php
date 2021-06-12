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
        $sql="select username from registration where userid='$userid'";
        $result=$conn->query($sql);
        $row=mysqli_fetch_object($result);
		    $username=$row->username;
       $sql1="select * from friendrequest where userA='$session_user' and userB='$username' and status='pending'";
       $result=$conn->query($sql1);
       if(mysqli_num_rows($result)>0)
       {
        echo "<script>alert('You have already sent friend request to this person.')</script>";
        echo "<script>window.location='findfriends.php'</script>";
       }
       else
       {
		   $sql2="insert into friendrequest values('$session_user','$username','pending')";
		$result1=$conn->query($sql2);
		if($result1==TRUE)
		{
			echo "<script>alert('friend request sent')</script>";
			 echo "<script>window.location='findfriends.php'</script>";
		
			

		}
  }



       
        ?>