<?php 
include('config.php'); 
include('admin_login_validate.php');


?>
    

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //include('config1.php'); 

//$name = preg_replace('/\s\s+/', ' ', $name);
  $id=strtoupper($_POST["userid"]);
  $uname=strtoupper($_POST["username"]);
  $status=0;
  $pass=$_POST["pass"];
  //$day_remaining=1;
  $pass="jgc".md5($pwd);
  
  $status=0;
  //$days = abs($reg_date - $expiry_date)/60/60/24;

   
    $payment=0;
    
    $activated=0;
    $a_name=$_SESSION['info']['username'];
  //$pwd=md5($pwd);
       // $pwd=md5($pwd);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 


//echo "stringCK";
echo $a_name;
echo "$id";
echo "$uname";
echo "$pass";
include('config1.php'); 
 if (!empty($uname) && !empty($a_name)) {
  $uname =  $con->real_escape_string($uname);
  $pass =  $con->real_escape_string($pass);
  $a_name = uniqid();
$sql = "insert into super (name, admin_name, password, s_id, payment,status) values('" . $uname . "','" . $a_name . "','" . $pass . "','" . $id . "','" . $payment . "','" . $activated. "')";

} else {
    echo "LOGIN AGAIN";
}


if ($con->query($sql) === TRUE) {

   header('location:admin_home.php?id=SUCCESSFULLY_Added_Super_User');
        exit;
} else {
    header('location:admin_home.php?id=OOPS_TRY_AGAIN_LATER');
        exit;
}

  }


?>

