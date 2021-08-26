
<?php
session_start();
$_SESSION = [];
?><script>

          window.location = 'login.php';
          </script>
          <?php
header('Location:login.php');
?>