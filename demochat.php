    <?php
         include 'connection.php';
         $username=$_SESSION['username'];
         $timeout = 60; // Number of seconds until it times out.
      if(isset($_SESSION['timeout'])) {
      $duration = time() - (int)$_SESSION['timeout'];
      if($duration > $timeout) {
       include 'logout.php';
    }
}
    $_SESSION['timeout'] = time();