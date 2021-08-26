<?php
include('seller_head.php');
date_default_timezone_set("Asia/Kolkata");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <p class="mb-4">
  <form action="id_add.php" method="post">
    <input type="text" name="userName" required placeholder="CLIENT NAME">
    <input type="text" name="userid" required placeholder="Spark Pro ID">
    <!-- <input type="text" name="UserType" required placeholder="Days"> -->
    <select name="UserType" id="UserType" style="width:120px;">
      <option value="1">Full Version</option>
      select> <span> &nbsp; </span>
      <input type="submit" value="ADD ID" id="popUpYes">
  </form>
  </p>
  <?PHP
  $me = $_SESSION['info']['p_id'];
  $reg_date = date('Y-m-d h:i:sa');
  //$sql = "SELECT * FROM details where agent_user='$me'";
  $sql11 = "SELECT * FROM details where activated=0 AND expiry_date >= '$reg_date' AND agent_user='$me'";
  $result11 = $con->query($sql11);
  $rowcount11 = mysqli_num_rows($result11);
  //echo $rowcount11;
  $sql12 = "SELECT * FROM details where activated=1 AND expiry_date >= '$reg_date' AND agent_user='$me'";
  $result12 = $con->query($sql12);
  $rowcount12 = mysqli_num_rows($result12);

  $sql16 = "SELECT * FROM details where expiry_date >= '$reg_date' AND agent_user='$me'";
  $result16 = $con->query($sql16);
  $rowcount16 = mysqli_num_rows($result16);


  $credit = 0;
  $sql17 = "SELECT * FROM userinfo where p_id='" . $_SESSION['info']['p_id'] . "'";
  $result17 = $con->query($sql17);
  while ($row = $result17->fetch_assoc()) {
    $credit = $row["user_credit"];
  }
  ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary">
        <font size="+2">Total ID: <?php echo $rowcount16 ?></font> | <font size="+2">Activate ID: <?php echo $rowcount11 ?></font> | <font size="+2">Deactivate ID: <?php echo $rowcount12 ?></font> | <font size="+2">Credit: <?php echo $credit ?></font>
      </h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Key</th>
              <th>Customer Name</th>
              <th>MAC</th>
              <th>Mobile</th>
              <th>Reg.Date</th>
              <th>Exp.Date</th>
              <th>Left Days</th>
              <th>Type</th>
              <th>Action</th>
              <th>Action</th>

          </thead>
          <tfoot>
            <tr>
              <th>Key</th>
              <th>Customer Name</th>
              <th>MAC</th>
              <th>Mobile</th>
              <th>Reg.Date</th>
              <th>Exp.Date</th>
              <th>Left Days</th>
              <th>Type</th>
              <th>Action</th>
              <th>Action</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php



            $me = $_SESSION['info']['p_id'];
            $sql = "SELECT * FROM details where agent_user='$me'";
            $i = 0;
            //$sql = "SELECT * FROM details";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                $i = $i + 1;
                $sn = $row["sn"];
                $user_id = $row["user_id"];
                $agent_user = $row["agent_user"];
                $client_name = $row["client_name"];
                $days = 1;
                $status = $row["status"];
                $user_type = $row["user_type"];
                $mac = $row["mac"];
                $mob = $row["mob"];
                $registration = $row["registration"];
                // $timemodified = date("d F Y", $registration);
                // $timemodified = date('d F Y', strtotime($timemodified));
                $timemodified = date('Y-m-d H:i:s', strtotime($registration));
                $admin_msg = $row["admin_msg"];
                $payment = $row["payment"];
                $super_payment = $row["super_pay"];
                $admin_payment = $row["admin_pay"];
                $expiry_date = $row["expiry_date"];
                $activated = $row["activated"];
                //diff time stamp giving same time                    
                // $timemodified1 = date("d F Y", $expiry_date);
                // $timemodified1 = date('d F Y', strtotime($timemodified1));
                $timemodified1 = date('Y-m-d H:i:s', strtotime($expiry_date));
                //echo $timemodified1;
                $ip_reg = date('Y-m-d H:i:s', strtotime($registration));


                $ip_exp = date('Y-m-d H:i:s', strtotime($expiry_date));                
                
                $day_left = strtotime(date('Y-m-d h:i:sa'));
                $days = ceil((strtotime($expiry_date) - $day_left) / 60 / 60 / 24);

                if ($days <= 0) {
                  $m = 'bgcolor="#FFFF00"';
                  $renew = 'renew.php?sn=' . $sn . '&id=' . $user_id;
                } else {
                  $m = 'bgcolor="#FFF"';
                  $renew = "#";
                }
                if ($status == 1) {
                  $n = 'bgcolor="#00FF00"';
                  $ns = 'paid';
                } else {
                  $n = 'bgcolor="#F00"';
                  $ns = 'due';
                }

                if ($user_type == 0) {
                  $k = 'DEMO';
                } else {
                  $k = 'FULL';
                }
                if ($payment == 0) {
                  $l = 'offline';
                } else {
                  $l = 'online';
                }
                if ($activated == 0) {
                  //$o='activated';
                  $o = '<center><img src="img/active.png"></center>';
                  $ol = 'deactivate';
                  $url = 'deactivate.php?sn=' . $sn . '&id=' . $user_id;;
                } else {
                  //$o='deactivated';
                  $o = '<center><img src="img/deactive.png"></center>';
                  $ol = 'activate';
                  $url = 'activate.php?sn=' . $sn . '&id=' . $user_id;
                }

                $payment = $row["payment"];
                $super_payment = $row["super_pay"];
                $admin_payment = $row["admin_pay"];
                if ($payment == 1) {
                  $npay = 'bgcolor="#00FF00"';
                  $timestamp1 = $row["payment_date"];
                  // echo $timestamp1;

                  $nspay = 'paid on_' . date('d-m-Y', $timestamp1);
                  $urlpay = '#';
                } else {
                  $npay = 'bgcolor="#F00"';
                  $nspay = 'due';
                  $urlpay = 'update_payment.php?sn=' . $sn . '&id=' . $user_id;
                }
                if ($super_payment == 1) {
                  $nsuper = 'bgcolor="#00FF00"';
                  $timestamp1 = $row["super_pay_date"];
                  $nssuper = 'paid on_' . date('d-m-Y', $timestamp1);
                } else {
                  $nsuper = 'bgcolor="#F00"';
                  $nssuper = 'due';
                }
                if ($admin_payment == 1) {
                  $nadmin = 'bgcolor="#00FF00"';
                  $timestamp1 = $row["admin_pay_date"];
                  $nsadmin = 'paid on_' . date('d-m-Y', $timestamp1);;
                } else {
                  $nadmin = 'bgcolor="#F00"';
                  $nsadmin = 'due';
                }



                if ($mac === "not_registered") {
                  # code...
                  $show = '<img src="img/mac1.png">';
                  $reset_url = '#';
                } else {
                  # code...
                  $show = '<img src="img/mac.png">';
                  $reset_url = 'reset_id.php?sn=' . $sn . '&id=' . $user_id;
                }


                if ($mob === "not_registered") {
                  # code...
                  $showmob = '<img src="img/mac1.png">';
                  $reset_urlmob = '#';
                } else {
                  # code...
                  $showmob = '<img src="img/mac.png">';
                  $reset_urlmob = 'reset_mob.php?sn=' . $sn . '&id=' . $user_id;
                }





            ?>


                <tr>
                  <td <?php echo $m ?>> <?php echo $user_id ?></td>
                  <td><?php echo $client_name ?></td>
                  <td align="center"><a href="<?php echo $reset_url ?>"><?php echo $show ?></a></td>
                  <td align="center"><a href="<?php echo $reset_urlmob ?>"><?php echo $showmob ?></a></td>
                  <td><?php echo $timemodified; ?></td>
                  <td><?php echo $timemodified1; ?></td>
                  <td <?php echo $m ?>><?php echo $days; ?> </td>

                  <td><?php echo $k ?></td>
                  <!-- <td <?php echo $m ?>><?php echo $rowcount111; ?> </td>
                    <td><?php echo $rowcountc ?></td> -->
                  <td><a href="<?php echo $url ?>"><?php echo $o ?></a></td>
                  <td><a href="<?php echo $renew ?>">RenewID</a></td>
                </tr>
            <?php


              }
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