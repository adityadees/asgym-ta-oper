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
                  <th>ID Bayar</th>
                  <th>Nama Member</th>
                  <th>Tanggal Bayar</th>
                  <th>No Rekening</th>
                  <th>Atas Nama</th>
                  <th>Gambar</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $sql=$db->query("SELECT * FROM tblpembayaran");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['idbayar'];?></td>
                  <td><?=$data['idmember'];?></td>
                  <td><?=$data['tgl_byr'];?></td>
                  <td><?=$data['rek_ning'];?></td>
                  <td><?=$data['ats_nm'];?></td>
                  <td><img src="images/<?=$data['file_foto'];?>" height="80" > </td>
                  <td><?php

                  $stt=$data['sttsp'];
                  
                  if ($stt=="N") {
                    echo"<label class='label label-warning'>Pembayaran belum dikonfirmasi</label>";
                  }else{
                    echo"<label class='label label-success'>Pembayaran sudah dikonfirmasi</label>";
                  }

                  ?>
                  </td>
                  <td>
                    <a href="form-pembayaran.php?upd&id=<?=$data['idbayar']?>"><button class="btn btn-warning"><i class="fa fa-refresh"></i> </button></a>
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