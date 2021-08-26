
<?php 
include('config.php'); 
include('super_login_validate.php'); 
?>
<?php


include('config.php'); 

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sn=$_GET["sn"];
$panelid=$_GET["uid"];
$num=$_GET["num"];
$credit19= 0;
$sn =  $con->real_escape_string($sn);
$id =  $con->real_escape_string($id);

 $reg_date=time();

 $sql19 = "SELECT * FROM super where s_id='".$_SESSION['info']['s_id']."'";
 $result19= $con->query($sql19);
 while($row = $result19->fetch_assoc()) {
    $credit19= $row["payment"];

 }


if($num>$credit19){
  
    header('location:super_home.php?id=error');
      ?><script>
           window.location = 'super_home.php?id=';
           </script>
           <?php
     exit;
 
}
 $sql17 = "SELECT * FROM userinfo where p_id='$panelid' AND user_wallet = '$sn' AND super_name='".$_SESSION['info']['s_id']."'";
 $result17= $con->query($sql17);
 while($row = $result17->fetch_assoc()) {
    $credit= $row["user_credit"];

 }
 $newcredit = $credit-$num;
 
 $sql = "update userinfo set user_credit = '$newcredit'  where p_id='$panelid' AND user_wallet = '$sn' AND super_name='".$_SESSION['info']['s_id']."'";
$sql12 = "insert into credit_log (transaction_by, transaction_for, credit_amount, mode) VALUES ('".$_SESSION['info']['s_id']."','".$panelid."','".$num."','DEDUCT')";

$newcreditt = $credit19+$num;
$sqlt = "update super set payment = '$newcreditt' where s_id='".$_SESSION['info']['s_id']."'";

 
//$sqlt12 = "insert into credit_log (transaction_by, transaction_for, credit_amount, mode) VALUES ('".$_SESSION['info']['admin_id']."','".$panelid."','".$num."','ADD')";



if ($con->query($sql) === TRUE AND $con->query($sql12) === TRUE AND $con->query($sqlt) === TRUE) {
    header('location:super_home.php?id=success');
      ?><script>
          window.location = 'super_home.php?id=';
          </script>
          <?php
		exit;
} else {
   header('location:super_home.php?id=error');
     ?><script>
          window.location = 'super_home.php?id=';
          </script>
          <?php
		exit;
}

?>