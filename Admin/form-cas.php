
<?php
include'layout/header.php';
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
            $sql= $db->query("INSERT INTO tblcas VALUES('','$_POST[idmember]','$_POST[tglbyr]','$_POST[total]')");
            if ($sql) {
              $sql=$db->query("UPDATE tblmember SET stts='aktif' WHERE idmember='$_POST[idmember]'");
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
                 <input type="text" name="nmmember" value="<?=$data['nmmember']?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Bayar</label>
                  <input type="text" name="tglbyr" class="form-control" id="datepicker" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Bayar</label>
                  <input type="text" class="form-control" name="total" >
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
  </div>
  </div>
</div>
<?php
include'layout/footer.php';
?>