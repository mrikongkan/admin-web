<?php 
include('config.php'); 
include('super_login_validate.php');
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
   $pass="jgc".md5($pass); 
  
  $status=0;
  //$days = abs($reg_date - $expiry_date)/60/60/24;


  //$pwd=md5($pwd);
       // $pwd=md5($pwd);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$nameck=$_SESSION['info']['s_id'];
//echo "stringCK";
echo $nameck;
echo "$id";
echo "$uname";
echo "$pass";
include('config1.php'); 
 if (!empty($nameck) && !empty($uname)) {
  $user_wallet =  uniqid();
$sql = "insert into userinfo (super_name,name, p_id,password,status,user_wallet) values('" . $nameck. "','" . $uname . "','" . $id . "','" . $pass . "','" . $status . "','" . $user_wallet . "')";

} else {
    echo "LOGIN AGAIN";
}

if ($con->query($sql) === TRUE) {

    header('location:super_home.php?id=SUCCESSFULLY_REGISTERED');
     ?><script>

          window.location = 'super_home.php?id=SUCCESSFULLY_REGISTERED';
          </script>
          <?php
    exit;
} else {
   header('location:super_home.php?id=ID_EXISTS_TRY_DIFFERENT_ID');
     ?><script>

          window.location = 'super_home.php?id=ID_EXISTS_TRY_DIFFERENT_ID';
          </script>
          <?php
    exit;
}

  }


?>

