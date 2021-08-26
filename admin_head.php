<?php 
include('config.php'); 
include('admin_login_validate.php');
$home = '';
$change_password = '';
$transaction_log ='';
$show_all_key = '';
$msg = '';
$name12 = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>sparkpro.xyz</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPARKPRO <sup>xyz</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      
<?php
      if(isset($_SESSION['info']['admin_id']))
{
  $name12 = $_SESSION['info']['username'];
?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="admin_transaction.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transaction</span></a>
      </li>
     <!-- Nav Item - Charts -->
     <li class="nav-item">
        <a class="nav-link" href="admin_id.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>All ID</span></a>
      </li>
      <!-- Nav Item - Charts -->
     <li class="nav-item">
        <a class="nav-link" href="admin_extend_days.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>Extend ID</span></a>
      </li>
      <!-- Nav Item - Charts -->
     <li class="nav-item">
        <a class="nav-link" href="admin_seller.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>All Seller</span></a>
      </li>
       <!-- Nav Item - Charts -->
       <li class="nav-item">
        <a class="nav-link" href="admin_self_change_password.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>Change Password</span></a>
      </li>
       <!-- Nav Item - Charts -->
       <li class="nav-item">
        <a class="nav-link" href="panel_news.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>Panel News</span></a>
      </li>
       <!-- Nav Item - Charts -->
       <li class="nav-item">
        <a class="nav-link" href="superpanel_news.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>Super Panel News</span></a>
      </li>

     
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Logout</span></a>
      </li>

<?php
}
$sql = "SELECT home_news FROM `news`";
          $i=0;
          //$sql = "SELECT * FROM details";
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //  echo "id: " . $row["sn"]. $row["agent_user"] . $row["user_id"]. $row["client_name"] . $row["status"].$row["user_type"].$row["mac"].$row["registration"].$row["admin_msg"].$row["payment"].$row["expiry_date"].$row["activated"]."<br>";
                  $i=$i+1;
                  $msg= "Welcome Admin";

}}

  ?>  
   <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

       

          <!-- Topbar Search -->
         
            <div class="input-group">
            <marquee><?php echo "$msg";?></marquee>
            </div>
        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Welcome <?php echo $name12  ?> !</span>
               </a>
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->