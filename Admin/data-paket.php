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
              <h3 class="box-title">Data Paket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Paket</th>
                  <th>Nama Paket</th>
                  <th>Harga</th>
                  <th>Masa Berlaku</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $sql=$db->query("SELECT * FROM tblpaket");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['idpaket'];?></td>
                  <td><?=$data['nm_paket'];?></td>
                  <td><?=$data['harga'];?></td>
                  <td><?=$data['masa_berlaku'];?></td>
                  <th>
                    <a href=""><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                    <a href=""><button class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                  </th>
                </tr>
      <?php } ?>
                </tbody>
              </table>
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