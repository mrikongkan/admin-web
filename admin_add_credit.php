<?php 
include('config.php'); 
include('admin_validate_login.php');


if(empty($_SESSION['info']['admin_id']))
{

  ?><script>

          window.location = 'counterlogin.php?err=Session has been expired';
          </script>
          <?php
    exit;
}
?>
<?php

include('config.php'); 

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sn=$_GET["sn"];
$panelid=$_GET["uid"];
$num=$_GET["num"];
$credit=0;
 $reg_date=time();
 
 $sql17 = "SELECT * FROM super where admin_name='$sn' AND s_id='$panelid'";
 $result17= $con->query($sql17);
 while($row = $result17->fetch_assoc()) {
    $credit= $row["payment"];

 }
 $newcredit = $credit+$num;
 
 //$sql = "UPDATE super SET status=0,admin_pay=1,admin_pay_date='$reg_date' WHERE super_pay=1 AND agent_user in(select p_id from userinfo where super_name='$panelid') limit $num ";
 $sql = "update super set payment = '$newcredit' where admin_name='$sn' AND s_id='$panelid'";

 
 $sql12 = "insert into credit_log (transaction_by, transaction_for, credit_amount, mode) VALUES ('".$_SESSION['info']['admin_id']."','".$panelid."','".$num."','ADD')";
// echo $sql;
// echo $sql12;
if ($con->query($sql) === TRUE AND $con->query($sql12) === TRUE) {
  header('location:admin_home.php?id=success');
  exit;
} else {
 header('location:admin_home.php?id=error');
  exit;
}

?>