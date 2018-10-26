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
                  <th>Poin</th>
                  <th>Reward</th>
                  <th>Reward History</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $sql=$db->query("SELECT * FROM tblmember a, tblreward b WHERE a.idmember=b.idmember");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['nmmember'];?></td>
                  <td><?php
                  $dt=$data['poin'];
                  echo"$dt";
                  ?></td>
                  <td>
                     <?php
                    if ($dt=="100") {
                      echo"Air Minum Kemasaran";
                    }elseif ($dt=="500") {
                      echo"Handuk Kecil";
                    }elseif ($dt=="1000") {
                      echo"Kaos";
                    }elseif ($dt=="1500") {
                      echo"Gratis 1 bulan";
                    }elseif ($dt=="1800") {
                      echo"Voucher Belanja";
                    }
                    ?>
                  </td>
                  <td>
                    <?=$data['time_ward']?>
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