<?php if(isset($_GET['inst'])){ ?>
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
            $sql=$db->query("SELECT * FROM tblmember WHERE user_mbr='$_SESSION[user_mbr]'");
            foreach ($sql as $data);
            if (isset($_POST['simpan'])) {
            $file = $_FILES['file_foto']['name'];
            $size = $_FILES["file_foto"]["size"];
            $type = $_FILES["file_foto"]["type"];
            $tmp = $_FILES['file_foto']['tmp_name'];
            $target = "images/".$file;
            if (!file_exists($target)) {
                if ($size <= 2000000) {
                    if($type == "application/pdf" || $type == "application/word" || $type == "image/jpeg" || $type == "image/png" ) {

            if (move_uploaded_file($tmp, $target)) {
              $sql= $db->query("INSERT INTO tblpembayaran VALUES('','$_POST[idmember]','$_POST[tgl_byr]','$_POST[rek_ning]','$_POST[ats_nm]','$file','N')");
            if ($sql==true) { ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  Berhasil Diupload dan Disimpan dalam database (<?php echo $file ?>);
                                </div>
                                <?php
                            } else{
                                ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  File belum disimpan kedalam database
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              Sorry, there was an error uploading your file.
                            </div>
                            <?php
                        }
                    } else{
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Sorry, only JPG, JPEG, PNG & GIF files are allowed.
                        </div>
                        <?php
                    }
                } else{
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Sorry, your file is too large.
                    </div>
                    <?php
                }
            } else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Sorry, file already exists.
                </div>
                <?php
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
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Member</label>
                  <input type="hidden" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
                  <input type="text" class="form-control"   value="<?=$data['nmmember']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Bayar</label>
                  <input type="text" class="form-control" name="tgl_byr" id="datepicker">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NO Rek</label>
                  <input type="text" class="form-control" name="rek_ning">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Atas Nama</label>
                  <input type="text" class="form-control" name="ats_nm" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">File Foto</label>
                  <input type="file" class="form-control" name="file_foto" >
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
include'layout2/footer.php';
?>

<?php }elseif (isset($_GET['upd'])) { ?>

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
            $sql=$db->query("SELECT * FROM tblpembayaran WHERE idbayar='$_GET[id]'");
            foreach ($sql as $data);
            if (isset($_POST['update'])) {
            $sql= $db->query("UPDATE  tblpembayaran SET sttsp='$_POST[sttsp]' WHERE idbayar='$_POST[idbayar]' ");
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
                  <label for="exampleInputEmail1">ID Bayar</label>
                  <input type="text" class="form-control" name="idbayar"  value="<?=$data['idbayar']?>">
                  <input type="hidden" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Bayar</label>
                  <select class="form-control" name="sttsp">
                    <option selected="">Pilih</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
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
include'layout/footer.php';
?>
<?php } else { 
include'lib/connect.php';
$sql=$db->query("DELETE FROM tblperpanjang WHERE idper='$_GET[id]'");
if($sql){
?>
<script type="text/javascript">location.href='view-pembayaran.php'</script>
<?php } }?>