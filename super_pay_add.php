<?php 
include('super_head.php'); 
?>
<?php



$sn=$_GET["sn"];
$id=$_GET["id"];
?>
       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            
          </div>
          <div class="card-body">
          <form name="confgure" action="super_add_credit.php" method="get">
<table align="center" border="1" bordercolor="#FF00CC">
<tbody><tr>
<td>PANEL ID </td> <td><input name="uid" readonly="readonly" value="<?php echo "$id"; ?>" type="text">
<input name="sn" readonly="readonly" value="<?php echo "$sn"; ?>" type="hidden"></td>
</tr>
<tr>
<td> Enter Number of Credit(s) </td> <td><input name="num" id="uidu" type="text"></td>

</tr>
<tr><td colspan="2" align="center"><input name="Configure" value="Update Credit" type="submit"></td></tr>
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

     