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
                  <th rowspan="2">No</th>
                  <th rowspan="2">ID Misi</th>
                  <th rowspan="2">Nama Member</th>
                  <th rowspan="2">Jenis  Misi</th>
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
      $sql=$db->query("SELECT * FROM tblmisi a, tblmember b, tbljenis c WHERE a.id_jenis=c.id_jenis and a.idmember=b.idmember");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['idmisi'];?></td>
                  <td><?=$data['nmmember'];?></td>
                  <td><?=$data['nmjenis'];?></td>
                  <td><?=$data['poinmisi'];?></td>
                  <td><?=$data['tgl_misi']?></td>
                  <td><?=$data['time_misi']?> </td>
                  <td>
                    <a href="form-misi.php?upd&id=<?=$data['idmisi']?>"><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                    <a href="form-misi.php?id=<?=$data['idmisi']?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                    <?php 
                    $dd=$data['sttss'];
                    if($dd=="Y") { ?>
                    <a href="form-check.php?upd&id=<?=$data['idmisi']?>"><button class="btn btn-primary"><i class="fa fa-check"></i> Check List Misi</button></a>
                    <?php }elseif($dd=="V") {
                      echo"<label class='label label-success'>Telah selesao Check</label>";
                    }elseif($dd=="P") {
                      echo"<label class='label label-success'>Misi Tidak Terlaksanakan</label>";
                    } ?>

                  </td>
                
                </tr>
      <?php } ?>
                </tbody>
              </table>
<p></p>
 <a href="form-misi.php?inst"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add Misi</button></a>
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