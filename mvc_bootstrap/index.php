<?php
session_start();
include 'common/header.php';
include 'controller/controller.php';?>

<?php  
include 'common/siderbar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      My User
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <?php 
    $controller = new Controller();
    $controller->handleRequest();
    ?>   
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'common/footer.php';
?>


