<?php
include'layout2/header.php';
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
            $sql=$db->query("SELECT * FROM tblmisi WHERE idmisi='$_GET[id]'");
            foreach ($sql as $data);
            if (isset($_POST['update'])) {
            $sql= $db->query("INSERT INTO tmpmisi VALUES('','$_POST[idmember]','$_POST[idmisi]','$_POST[tmp_stts]')");
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
                  <label for="exampleInputEmail1">ID Misi</label>
                  <input type="text" class="form-control" name="idmisi"  value="<?=$data['idmisi']?>">
                  <input type="hidden" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
          
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Misi</label>
                  <select class="form-control" name="tmp_stts">
                    <option selected="">Pilih</option>
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                  </select>
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
include'layout2/footer.php';
?>