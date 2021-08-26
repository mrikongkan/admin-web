<?php 
include('admin_head.php'); 
?>
       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        
        <p class="mb-4">	<form action="id_add.php" method="post">
          <input type="text" name="userName" required placeholder="CLIENT NAME">
          <input type="text" name="userid" required placeholder="Spark Pro ID">
          <select name="UserType" id="UserType" style="width:120px;">
          <option  value="1">Full Version</option>
          select>	<span> &nbsp;    </span>	
          <input type="submit" value="ADD ID"> 
        </form></p>
        <?PHP
        //$me=$_SESSION['info']['s_id'];
        //$sql = "SELECT * FROM details where agent_user='$me'";
       
        ?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Time</th>
                    <th>Owner</th>
                    <th>Customer</th>
                    <th>Credit</th>
                    <th>Mode</th>
                    
                </thead>
                <tfoot>
                  <tr>
                    <th>Time</th>
                    <th>Owner</th>
                    <th>Customer</th>
                    <th>Credit</th>
                    <th>Mode</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php

//include('config.php'); 


//$name123=$_SESSION['info']['s_id'];

$sql = "SELECT * FROM `credit_log` ORDER by transaction_timestamp DESC";
$result = $con->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $con->error);
}
$i=0;
//$sql = "SELECT * FROM details";
//$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["sn"]. $row["agent_user"] . $row["user_id"]. $row["client_name"] . $row["status"].$row["user_type"].$row["mac"].$row["registration"].$row["admin_msg"].$row["payment"].$row["expiry_date"].$row["activated"]."<br>";
        $i=$i+1;
        $time= $row["transaction_timestamp"];
        $user_id=$row["transaction_by"];
        $agent_user=$row["transaction_for"];
        $credit=$row["credit_amount"];
        $status=$row["mode"];

//   

?>
          

                <tr>
                <td ><?php echo $time ?></td>
                <td><?php echo $user_id ?></td>
                <td><?php echo $agent_user ?></td>
                <td><?php echo $credit ?></td>
                <td><?php echo $status ?></td>
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

     