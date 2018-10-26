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
              <h3 class="box-title">Data Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Member</th>
                  <th>Alamat Member</th>
                  <th>No Hp</th>
                  <th>Paket</th>
                  <th>Poin</th>
                  <th>Tanggal Member</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $sql=$db->query("SELECT * FROM tblmember a,tblpaket b WHERE a.idpaket=b.idpaket");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['nmmember'];?></td>
                  <td><?=$data['altmember'];?></td>
                  <td><?=$data['nohp'];?></td>
                  <td><?=$data['nm_paket'];?></td>
                  <td><?=$data['poin_mbr'];?></td>
                  <td><?=$data['tglmasuk'];?></td>
                  <td><?=$data['user_mbr'];?></td>
                  <td><?=$data['stts'];?></td>
                  <td>
                    <a href="form-perpanjang.php?inst&id=<?=$data['idmember']?>"><button class="btn btn-primary"><i class="fa fa-refresh"></i> Perpanjang</button></a>
                    <a href="form-cas.php?id=<?=$data['idmember']?>"> <button class="btn btn-primary"><i class="fa fa-paypal"></i> Pembayaran Cash</button></a>
                  </td>
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