<?php 
include'layout2/header.php';
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
                  <th rowspan="2">No</th>
                  <th rowspan="2">ID Misi</th>
                  <th rowspan="2">Nama Member</th>
                  <th rowspan="2">Jenis  Misi</th>
                  <th rowspan="2">Latihan</th>
                  <th rowspan="2">Poin Misi</th>
                  <th colspan="2">Jadwal Misi</th>
                  <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                  <th>Tanggal</th>
                  <th>Jam</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $user=$_SESSION['user_mbr'];
      $sql=$db->query("SELECT * FROM tblmisi a, tblmember b WHERE a.idmember=b.idmember and b.user_mbr='$user'");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['idmisi'];?></td>
                  <td><?=$data['nmmember'];?></td>
                  <td><?=$data['idpaket'];?></td>
                  <td><?=$data['latihan'];?></td>
                  <td><?=$data['poinmisi'];?></td>
                  <td><?=$data['tgl_misi']?></td>
                  <td><?=$data['time_misi']?></td>
                  <td>
                    <?php
                    $tt=$data['sttss'];
                    if ($tt=="N") { ?>
                      <a href="form-lmisi.php?&id=<?=$data['idmisi']?>"><button class="btn btn-primary"><i  class="fa fa-plus"></i> Jalankan Misi</button></a>
                    <?php }elseif ($tt=="P") {
                      echo"<label class='label label-success'>Tidak Melakukan Misi</label>";
                    }else{
                      echo"<label class='label label-success'>Telah Melakukan Misi</label>";
                    }
                    ?>
                    
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
  <?php include'layout2/footer.php';?>