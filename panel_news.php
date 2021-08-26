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
            
          <form name="confgure" action="admin_update_panel.php" method="GET">
<table align="center" border="1" bordercolor="#FF00CC">
<tbody>
<tr>
<td> Enter News </td> <td><input name="uidu" id="uidu" type="text"></td>

</tr>
<tr><td colspan="2" align="center"><input name="Configure" value="Update News" type="submit"></td></tr>
</tbody></table>


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

     