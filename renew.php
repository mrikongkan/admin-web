<?php 
include('config.php'); 
include('seller_login_validate.php'); 
?>
<?php



if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 



date_default_timezone_set("Asia/Kolkata");
 $reg_date=time();
$sn=$_GET["sn"];
$id=$_GET["id"];

$status=0;
	$reg_date=time();
	$payment=0;
	$expiry_date=strtotime('+30 day', $reg_date);
	$payment=0;
	$admin_pay=0;
	$super_pay=0;


	$sn =  $con->real_escape_string($sn);
	$id =  $con->real_escape_string($id);

	$sql17 = "SELECT * FROM userinfo where p_id='".$_SESSION['info']['p_id']."'";
	$result17= $con->query($sql17);
	while($row = $result17->fetch_assoc()) {
	   $credit= $row["user_credit"];
   
	}
   
   if($credit<1){
	
	  header('location:home.php?id=nobalance');
		?><script>
			 window.location = 'home.php?id=';
			 </script>
			 <?php
	   exit;
   
   }



$sql = "UPDATE details SET payment=0,registration='$reg_date',expiry_date='$expiry_date',admin_pay=0, super_pay=0 WHERE  sn=$sn AND user_id='$id' ";

if ($con->query($sql) === TRUE) {


	$newcredit = $credit-1;
 
    $sql = "update userinfo set user_credit = '$newcredit'  where p_id='".$_SESSION['info']['p_id']."'";
   $sql12 = "insert into credit_log (transaction_by, transaction_for, credit_amount, mode) VALUES ('".$_SESSION['info']['p_id']."','".$id."','".$num."','DEDUCT')";
   if ($con->query($sql ) === TRUE AND $con->query($sql12) === TRUE) {}
   
    header('location:home.php?id=success');
		exit;
} else {
  header('location:home.php?id=fail');
		exit;
}






?>

