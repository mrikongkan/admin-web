<?php 
include('admin_head.php'); 
?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pass=$_POST["pass"];
$pass="jgc".md5($pass);
$sn=$_POST["sn"];
$id=$_POST["id"];
$sn =  $con->real_escape_string($sn);
$id =  $con->real_escape_string($id);


$sql = "UPDATE admin SET password='$pass' WHERE  an=$sn AND admin_id='$id' ";

if ($con->query($sql) === TRUE) {
    header('location:admin_home.php');
    ?><script>

          window.location = 'admin_home.php';
          </script>
          <?php
		exit;
} else {
    //header('location:login.php?');
		exit;
}
}
?>
       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            
          </div>
          <div class="card-body">
            
            <form name="aspnetForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="aspnetForm">	
            Enter New Password<input name="pass" id="ip" class="pendek" type="text">
            <input name="sn" id="ip" style="display:none;"value=<?php echo $_SESSION['info']['an']?>  class="pendek" type="text">
            <input name="id" id="ip" style="display:none;" value=<?php echo $_SESSION['info']['admin_id']?> class="pendek"  type="text">
            <input name="submit" value="Submit" class="button" type="submit">
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php 
include('footer.php'); 
?>

     