<?php
include'layout/header.php';
include'lib/connect.php';
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Konfirmasi Misi  
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
            $sql=$db->query("SELECT * FROM tmpmisi a, tblmember b  WHERE a.idmember=b.idmember and a.idmisi='$_GET[id]'");
            foreach ($sql as $data);
            if (isset($_POST['update'])) {
            $sql= $db->query("UPDATE  tblmisi SET sttss='$_POST[sttss]' WHERE idmisi='$_POST[idmisi]' ");
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
                  <label for="exampleInputEmail1">Nama Member</label>
                  <input type="hidden" class="form-control" name="idmisi"  value="<?=$data['idmisi']?>">
                  <input type="hidden" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
                  <input type="hidden" class="form-control" name="poin_mbr"  value="<?=$data['poinmisi']?>">
                  <input type="text" name=""  class="form-control" value="<?=$data['nmmember']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Misi</label> <br>
                  <input type="radio" name="sttss" value="V" checked=""> Melaksanakan Misi<br>
                  <input type="radio" name="sttss" value="P" >  Misi Tidak Terlaksanakan
              </div>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
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