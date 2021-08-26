<?php 
include('admin_head.php'); 
?>
       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        
        <p class="mb-4">	

        <form action="superpanel_add.php" method="post">
  <input type="text" name="username" required placeholder="SUPER AGENT NAME">
  <input type="text" name="userid" required placeholder="SUPER ID">
  <input type="text" name="pass" required placeholder="SUPER PASSWORD">
  <input type="submit" value="ADD SUPER PANEL"> 
</form>
      
      
      </p>
      <?PHP

$reg_date=time();
$name=$_SESSION['info']['username'];
//$name=$_SESSION['info']['s_id'];
//echo "string";
//echo $name;
$sql11 = "SELECT * FROM details where activated=0 AND expiry_date >= '$reg_date'";

//select s-id where admin_name
$result11= $con->query($sql11);
$rowcount11=mysqli_num_rows($result11);
//echo $rowcount11;
$sql12 = "SELECT * FROM details where activated=1 AND expiry_date >= '$reg_date' ";
//"SELECT * FROM details where agent_user in (select p_id from userinfo where super_name='$name')" $name=$_SESSION['info']['s_id'];
$result12= $con->query($sql12);
$rowcount12=mysqli_num_rows($result12);



$sql16 = "SELECT * FROM details where expiry_date >= '$reg_date'";
$result16= $con->query($sql16);
$rowcount16=mysqli_num_rows($result16);

?>








        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><font size="+2">All ID: <?php echo $rowcount16 ?></font> | <font size="+2">Activate ID: <?php echo $rowcount11 ?></font> | <font size="+2">Deactivate ID: <?php echo $rowcount12 ?></font></h4>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>PANEL NO.</th>
                    <th>AGENT USER</th>
                    <th>PANEL ID</th>
                   
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


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$a_name=$_SESSION['info']['username'];
$sql = "SELECT * FROM super ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $i=1;
    while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["sn"]. $row["agent_user"] . $row["user_id"]. $row["client_name"] . $row["status"].$row["user_type"].$row["mac"].$row["registration"].$row["admin_msg"].$row["payment"].$row["expiry_date"].$row["activated"]."<br>";
        $sn= $row["sn"];
        $wallet= $row["admin_name"];
        $sn1= 'SUPERPANEL'.$i;
        $i=$i+1;
        $p_id=$row["s_id"];
        $client_name=$row["name"];
        $pass=$row["password"];
        $activated=$row["status"];
        $payment=$row["payment"];
        //diff time stamp giving same time
       $sql1="SELECT * FROM userinfo where super_name='$p_id'";
$rowcount=0;
if ($result1=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
 
  // Free result set
  mysqli_free_result($result1);
  }
      

$sqllb = "SELECT * FROM details where agent_user in (select p_id from userinfo where super_name='$p_id')";
 $resultlb= $con->query($sqllb);
 $rowcountlb=mysqli_num_rows($resultlb);
//echo $rowcountlb;
//echo "string";


if ($activated == 0) {
        //$o='activated';
        $o='<center><img src="img/active.png"></center>';
        $ol='deactivate';
        $url='admin_home_deactivate.php?sn='.$sn.'&id='.$p_id ;
        ;
        } else {
         //$o='deactivated';
         $o='<center><img src="img/deactive.png"></center>';
         $ol='activate';
         $url='admin_home_activate.php?sn='.$sn.'&id='.$p_id;
      } 



      if ($payment == 1) {
        $n='bgcolor="#00FF00"';
        $ns='PAID';
        $url1='admin_payment_due.php?sn='.$sn.'&id='.$p_id ;
        } else {
         $n='bgcolor="#F00"';
         $ns='DUE';
         $url1='admin_payment_paid.php?sn='.$sn.'&id='.$p_id ;
      }



     // $name=$_SESSION['info']['s_id'];
//echo "string";
//echo $name;
$sql18 = "SELECT * FROM details where admin_pay=0 AND agent_user in (select p_id from userinfo where super_name='$p_id')";
 $result18= $con->query($sql18);
 $rowcount18=mysqli_num_rows($result18);

 $sql19 = "SELECT * FROM details where super_pay=1 AND agent_user in (select p_id from userinfo where super_name='$p_id')";
 $result19= $con->query($sql19);
 $rowcount19=mysqli_num_rows($result19);

?>

<tr><td><?php echo $sn1 ?></td><td><?php echo $client_name?></td><td > <?php echo $p_id ?></td><td><a href="super_change_pass.php?id=<?php echo $p_id ?>&sn=<?php echo $sn?>">CHANGE PASSWORD</a></td><td><a href="<?php echo $url ?>"><?php echo $o ?></a><td><?php echo $rowcountlb?></td><td><?php echo $payment?></td><td><a href="admin_add.php?id=<?php echo $p_id ?>&sn=<?php echo $wallet?>">Add Credit</a></td><td><a href="admin_deduct.php?id=<?php echo $p_id ?>&sn=<?php echo $wallet?>">Delete Credit</a></td></tr>

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

     