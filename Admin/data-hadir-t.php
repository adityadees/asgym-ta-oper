<?php 
include'layout/header.php';
include'lib/connect.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Misi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Hadir</th>
                  <th>Tanggal hadir</th>
                  <th>Member</th>
                  <th>Status hadir</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $sql=$db->query("SELECT * FROM tblhadir");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['idhadir'];?></td>
                  <td><?=$data['tanggal_hadir'];?></td>
                  <td><?=$data['idmember'];?></td>
                  <td><?=$data['status_hadir'];?></td>
                </tr>
      <?php } ?>
                </tbody>
              </table>
          <!--  <a href="form-member.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add </button> </a> -->
            </div> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include'layout/footer.php';?>