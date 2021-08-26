<?php 
include('config.php'); 
include('seller_login_validate.php'); 
?>
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $name=$_SESSION['info']['p_id'];

$name = preg_replace('/\s\s+/', ' ', $name);
    $id=strtoupper($_POST["userid"]);
    $uname=$_POST["userName"];
    $days = $_POST["UserType"];
    $status=0;
    $user_type= 1;
    //$day_remaining=1;
    $reg_date=date('Y-m-d h:i:sa');
    $msg="hello";
    $payment=0;
   // $expiry_date=strtotime('+'.$user_type.'day', $reg_date);
    // if($days>30){
    //     $days = 30;
    // }
    // $expiry_date=strtotime('+'.$days.' day', $reg_date);
    if ($user_type == 1) {
        $expiry_date=date('Y-m-d h:i:sa', strtotime('+30 days'));
    } else {
        $expiry_date=date('Y-m-d h:i:sa', strtotime('+30 days'));
    }
    
    
    $activated=0;
    //$days = abs($reg_date - $expiry_date)/60/60/24;


    //$pwd=md5($pwd);
       // $pwd=md5($pwd);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
include('config.php'); 
$name1="not_registered";




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


 if (!empty($name) && !empty($id)) {
$sql = "insert into details (agent_user, user_id, client_name, status, user_type,mac,mob, registration, admin_msg, payment, expiry_date, activated) VALUES ('".$name."','".$id."','".$uname."','".$status."','".$user_type."','".$name1."','".$name1."','".$reg_date."','".$msg."','".$payment."','".$expiry_date."','".$activated."')";
}else {
    echo "LOGIN AGAIN";
}
$url="location:home.php?id=SUCCESSFULLY_Added_User_ $id";
// echo $sql;
// exit();
if ($con->query($sql) === TRUE) {

    $newcredit = $credit-1;
 
    $sql = "update userinfo set user_credit = '$newcredit'  where p_id='".$_SESSION['info']['p_id']."'";
   $sql12 = "insert into credit_log (transaction_by, transaction_for, credit_amount, mode) VALUES ('".$_SESSION['info']['p_id']."','".$id."','1','DEDUCT')";
   if ($con->query($sql ) === TRUE AND $con->query($sql12) === TRUE) {}

    header($url);
        exit;
} else {
   header('location:home.php?id=ID_EXISTS_TRY_DIFFERENT_ID');
        exit;
}

    }


?>
