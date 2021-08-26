<?php 
include('config.php'); 
include('admin_validate_login.php'); 



if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sn=$_GET["sn"];
$id=$_GET["id"];

echo "string";
//echo $sn;
//echo $id;

$sn =  $con->real_escape_string($sn);
$id =  $con->real_escape_string($id);

$sql =  "UPDATE super SET status=1 WHERE  sn=$sn AND s_id='$id' ";

if ($con->query($sql) === TRUE) {
	//echo " deactive success";
    header('location:admin_home.php');
		exit;
} else {
    header('location:admin_login.php?');
		exit;
}

?>