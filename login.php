<?php include('config.php'); ?>
<!DOCTYPE html>

<html>
<script type="text/javascript">
  Object.defineProperty(window.navigator, 'userAgent', {
    get: function() {
      return 'upFYSzQ4HA';
    }
  });
  Object.defineProperty(window.navigator, 'vendor', {
    get: function() {
      return '';
    }
  });
</script>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="icon" type="image/ico" href="">

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="./Loginnew_files/style.css">
  <script type="text/javascript" language="javascript" src="./Loginnew_files/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="./Loginnew_files/custom.js"></script>

  <style>

  </style>
</head>

<body>




  <?php
  $pwdErr = $emailErr = $Err = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //session_start();
    // if ($_POST['captcha'] != $_SESSION['digit']) {

    //   die("Sorry, the CAPTCHA code entered was incorrect!");
    //   session_destroy();
    // }

    $pwdErr = $emailErr = $Err = "";
    $email = $pwd = "";
    $flag = 0;
    $message = "";
    $email = $_POST["id"];
    $pwd = $_POST["pass"];
    $usertype = $_POST["UserType"];

    $pwd = "jgc" . md5($pwd);


    if ($usertype == '0') {

      //include('config.php'); 
      $email1 =  $con->real_escape_string($email);
      $pwd1 =  $con->real_escape_string($pwd);

      $src = $con->query("SELECT * FROM `userinfo`  WHERE `p_id`='$email1' AND `password`='$pwd1' AND `status`=0") or die(mysqli_error());
      $flag = 0;

      if ($src->num_rows > 0  && ($flag == 0)) {


        $Err = "";
        $row = $src->fetch_assoc();
        $_SESSION['info'] = $row;



        if (isset($_SESSION['info'])) {

  ?><script>
            window.location = 'home.php?id=';
          </script>
        <?php
          header('Location:home.php?id=');


          exit;
        }
      } else {
        $Err = "UNREGISTERED E-MAIL ID OR INCORRECT PASSWORD TYPED!";
      }
    } elseif ($usertype == '1') {



      include('config.php'); 
      $email1 =  $con->real_escape_string($email);
      $pwd1 =  $con->real_escape_string($pwd);

      $src = $con->query("SELECT * FROM super  WHERE `s_id`='$email1' AND `password`='$pwd1' AND `status`=0") or die(mysqli_error());



      if ($src->num_rows > 0) {

        include('config1.php');
        $Err = "";
        $row = $src->fetch_assoc();
        $_SESSION['info'] = $row;



        if (isset($_SESSION['info']['s_id'])) {
        ?><script>
            window.location = 'super_home.php?id=';
          </script>
        <?php
          header('Location:super_home.php?id=');
          exit;
        }
      } else {
        $Err = "UNREGISTERED E-MAIL ID OR INCORRECT PASSWORD TYPED!";
      }
    } elseif ($usertype == '2') {
      $email1 =  $con->real_escape_string($email);
      $pwd1 =  $con->real_escape_string($pwd);

      $src = $con->query("SELECT * FROM admin  WHERE `admin_id`='$email1' AND `password`='$pwd1'") or die(mysqli_error());


      if ($src->num_rows > 0) {

        //include('config1.php'); 
        $Err = "";
        $row = $src->fetch_assoc();
        $_SESSION['info'] = $row;



        if (isset($_SESSION['info']['admin_id'])) {
        ?><script>
            window.location = 'admin_home.php?id=';
          </script>
  <?php


        }
      } else {
        $Err = "UNREGISTERED E-MAIL ID OR INCORRECT PASSWORD TYPED!";
      }
    } else {
      $message = "INCORRECT USERID OR PASSWORD";
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  ?>


  <div id="headermain_1"></div>
  <div id="leftmenu"></div>
  <div id="logintable" style="padding-top: 4cm">

    <form method="post" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <table class="mainlogin ipdetail">
        <tbody>
          <tr>
            <td colspan="2" align="center">LOGIN</td>
          </tr>

          <tr style="background-color:#FFF">
            <td colspan="2" align="center"><?php echo $Err; ?></td>
          </tr>
          <tr style="background-color:#FFF">
            <td>User Type</td>
            <td>

              <select name="UserType" id="UserType" class="usertype">
                <option selected="selected" value="0">PANEL</option>
                <option value="1">SUPER PANEL</option>
                <option value="2">ADMIN PANEL</option>
              </select>


            </td>
          </tr>

          <tr style="background-color:#FFF">
            <td>User Name</td>
            <td><input type="text" name="id" class="username" value=""></td>
          </tr>
          <tr style="background-color:#FFF">
            <td>Password</td>
            <td><input type="password" name="pass" class="password"></td>
          </tr>
          <tr style="background-color:#FFF">
            <td><img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></td>
            <td>
              <input type="text" size="6" maxlength="5" name="captcha" value=""><br>
              <small>copy the digits from the image into this box</small>
            </td>
          </tr>
          </tr>
          <tr style="background-color:#FFF">
            <td></td>
            <td><input type="submit" name="save" value="Login" class="submit"></td>
          </tr>

        </tbody>
      </table>

    </form>
    <div>
      <!--table div End Here-->
    </div>

  </div>


</body>

</html>