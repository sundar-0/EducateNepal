  <?php
  session_start();
if($_SESSION['status']!='logedin')
        {
            header('Location:index.php');
        }?>
          <?php
        $path = "post/"; 
        $maxSize =2097152;
        if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['submit']))
        {
          $tm=date('y-m-d,h:i:s');
          $uname=$_SESSION['username'];
          $utext=$_POST['posttext'];
          $cidfk=$_POST['category'];
         include 'connection.php';
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
              $sql="INSERT INTO post VALUES('','$uname','$utext','$tm','$filename','$cidfk')";
                  if($conn->query($sql)==TRUE)
              {
                echo"<script>alert('Your post has been submitted.')</script>";
                  echo "<script>window.location='entry.php'</script>";
          
              }
              }
                  else
                  {
                  echo"<script>alert('There was problem on posting your post.')</script>";
                   echo "<script>window.location='entry.php';</script>";
                  }
            }
          }
          else
          {
          $sql="INSERT INTO post VALUES('','$uname','$utext','$tm',NULL,'$cidfk')";
          if($conn->query($sql)==TRUE)
          {
                echo"<script>alert('Your post has been submitted.')</script>";
                  echo "<script>window.location='entry.php'</script>";
          
          }
             else
               {
                  echo"<script>alert('There was problem on posting your post.')</script>";
                   echo "<script>window.location='entry.php'</script>";
              }
          
          }
        }

         
        
 ?>