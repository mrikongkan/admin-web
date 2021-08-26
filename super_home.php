<?php 
include('super_head.php'); 
?>
       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        
        <p class="mb-4">	

        <form action="panel_add.php" method="post">
  <input type="text" name="username" required placeholder="AGENT NAME">
  <input type="text" name="userid" required placeholder="PANEL ID">
  <input type="text" name="pass" required placeholder="PANEL PASSWORD">
  <input type="submit" value="ADD NEW PANEL" id="popUpYes"> 
</form>
      
      
      </p>
        <?PHP
$name=$_SESSION['info']['s_id'];
//echo "string";
//echo $name;
$reg_date=time();
$sql11 = "SELECT * FROM details where activated=0 AND expiry_date >= '$reg_date' AND agent_user in (select p_id from userinfo where super_name='$name')";
 $result11= $con->query($sql11);
 $rowcount11=mysqli_num_rows($result11);
//echo $rowcount11;
 $sql12 = "SELECT * FROM details where activated=1 AND expiry_date >= '$reg_date' AND agent_user in (select p_id from userinfo where super_name='$name')";
 //"SELECT * FROM details where agent_user in (select p_id from userinfo where super_name='$name')" $name=$_SESSION['info']['s_id'];
 $result12= $con->query($sql12);
 $rowcount12=mysqli_num_rows($result12);



 $sql16 = "SELECT * FROM details where expiry_date >= '$reg_date' AND agent_user in (select p_id from userinfo where super_name='$name')";
 $result16= $con->query($sql16);
 $rowcount16=mysqli_num_rows($result16);
 $credit19=0;
 $sql19 = "SELECT * FROM super where s_id='".$_SESSION['info']['s_id']."'";
 $result19= $con->query($sql19);
 while($row = $result19->fetch_assoc()) {
    $credit19= $row["payment"];

 }


?>




        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><font size="+2">All ID: <?php echo $rowcount16 ?></font> | <font size="+2">Activate ID: <?php echo $rowcount11 ?></font> | <font size="+2">Deactivate ID: <?php echo $rowcount12 ?></font> | <font size="+2">Credit Balance: <?php  echo $credit19 ?></font></h4>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>PANEL NO.</th>
                    <th>AGENT USER</th>
                    <th>PANEL ID</th>
                    <th>PASSWORD</th>
                    <th>CHANGE PASSWORD</th>
                    <th>STATUS</th>
                    <th>TOTAL KEYS</th>
                    <th>Credit Left</th>
                    <th>Credit Add</th>
                    <th>Credit Deduct</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>PANEL NO.</th>
                    <th>AGENT USER</th>
                    <th>PANEL ID</th>
                    <th>PASSWORD</th>
                    <th>CHANGE PASSWORD</th>
                    <th>STATUS</th>
                    <th>TOTAL KEYS</th>
                    <th>Credit Left</th>
                    <th>Credit Add</th>
                    <th>Credit Deduct</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php

$m=$_SESSION['info']['s_id'];
//echo $m;
//echo "mad";
$sql = "SELECT * FROM userinfo where super_name='$m'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $i=1;
    while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["sn"]. $row["agent_user"] . $row["user_id"]. $row["client_name"] . $row["status"].$row["user_type"].$row["mac"].$row["registration"].$row["admin_msg"].$row["payment"].$row["expiry_date"].$row["activated"]."<br>";
        $sn= $row["sn"];
        $sn1= 'PANEL'.$i;
        $wallet=$row["user_wallet"];
        $i=$i+1;
        $p_id=$row["p_id"];
        $client_name=$row["name"];
        $pass=$row["password"];
        $activated=$row["status"];
        //diff time stamp giving same time
       $sql1="SELECT * FROM details where agent_user='$p_id'";
$rowcount=0;
if ($result1=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
 
  // Free result set
  mysqli_free_result($result1);
  }

//super unpaid
$sql17 = "SELECT * FROM details where agent_user='$p_id' AND status=0";
 $result17= $con->query($sql17);
 $rowcount17=mysqli_num_rows($result17);
 //receive amount
$sql18 = "SELECT * FROM details where agent_user='$p_id' AND super_pay=0";
 $result18= $con->query($sql18);
 $rowcount18=mysqli_num_rows($result18);





     if ($activated == 0) {
        //$o='activated';
        $o='<center><img src="img/active.png"></center>';
        $ol='deactivate';
        $url='super_deactivate.php?sn='.$sn.'&id='.$p_id ;
        ;
        } else {
         //$o='deactivated';
         $o='<center><img src="img/deactive.png"></center>';
         $ol='activate';
         $url='super_activate.php?sn='.$sn.'&id='.$p_id;
      } 
/* if ($activated == 0) {
        $o='ACTIVATED';
        $ol='DEACTIVE';
        $url='super_deactivate.php?sn='.$sn.'&id='.$p_id ;
        ;
        } else {
         $o='DEACTIVATED';
         $ol='ACTIVATE';
         $url='super_activate.php?sn='.$sn.'&id='.$p_id;
      }
*/
?>

<tr><td><?php echo $sn1 ?></td><td><?php echo $client_name?></td><td > <?php echo $p_id ?></td><td><?php echo "**********" ?></td><td align="center"><a href="change_pass.php?id=<?php echo $p_id ?>&sn=<?php echo $sn?>">CHANGE PASSWORD</a></td><td><a href="<?php echo $url ?>"><?php echo $o ?></a></td><td><?php echo $rowcount ?></td><td><?php echo $row["user_credit"] ?></td><td><a href="super_pay_add.php?id=<?php echo $p_id ?>&sn=<?php echo $wallet?>">Add Credit</a></td><td><a href="super_pay_deduct.php?id=<?php echo $p_id ?>&sn=<?php echo $wallet?>">Deduct Credit</a></td></tr>

<?php


    }

//agent_user, user_id, client_name, status, user_type,mac, registration, admin_msg, payment, expiry_date, activated

} else {
    echo "0 results";
}

?>
          

             
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php 
include('footer.php'); 
?>

     