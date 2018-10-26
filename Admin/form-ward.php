<?php
include'layout2/header.php';
include'lib/connect.php';
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Form Perpanjang  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">Data Misi</li>
      </ol>
    </section>
  
    <section class="content">
            <?php 
            include'lib/connect.php';
            $sql=$db->query("SELECT * FROM tblmember WHERE idmember='$_GET[id]'");
            foreach ($sql as $data);
            if (isset($_POST['simpan'])) {
            $sql= $db->query("INSERT INTO tblreward VALUES('','$_POST[idmember]','$_POST[poin]',NOW())");
            if ($sql) {
              echo"<label class='alert alert-success'>Data  berhasil di simpan</label>";
            }else{
              echo"Gagal";
            }
            }
            ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Member</label>
                  <input type="hidden" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
                 <input type="text" name="nmmember" value="<?=$data['nmmember']?>" class="form-control" readonly="">
                </div>
                <div class="form-group">
                <div class="col-md-12">
                  <div class="row">
                  <div class="col-3">
                    <label>Air Minum Kemasaran</label><br>
                    <i class="fa fa-star"></i> 100 Point<br>
                    <input type="radio" name="poin" value="100">
                  </div>
                    <div class="col-3">
                    <label>Handuk Kecil</label><br>
                    <i class="fa fa-star"></i> 500 Point<br>
                    <input type="radio" name="poin" value="500">
                  </div>
                    <div class="col-3">
                    <label>Kaos</label><br>
                    <i class="fa fa-star"></i> 1000 Point<br>
                    <input type="radio" name="poin" value="1000">
                  </div>                  
                  <div class="col-3">
                    <label>Gratis 1 bulan</label><br>
                    <i class="fa fa-star"></i> 1500 Point<br>
                    <input type="radio" name="poin" value="1500">
                  </div>
                  <div class="col-3">
                    <label>Voucher Belanja</label><br>
                    <i class="fa fa-star"></i> 1800 Point<br>
                    <input type="radio" name="poin" value="1800">
                  </div>
                  </div>

                  </div>
                  </div>
               </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-star"></i> Tukar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
  </div>
  </div>
</div>
<?php
include'layout2/footer.php';
?>