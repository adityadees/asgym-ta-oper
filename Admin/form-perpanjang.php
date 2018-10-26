<?php if(isset($_GET['inst'])){ ?>
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
            $sql= $db->query("INSERT INTO tblperpanjang VALUES('','$_POST[tgl_mulai]','$_POST[tgl_berlaku]','$_POST[idmember]')");
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
                  <label for="exampleInputEmail1">ID Member</label>
                  <input type="text" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Member</label>
                 <input type="text" name="nmmember" value="<?=$data['nmmember']?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Member</label>
                  <input type="text" name="tglmasuk" class="form-control" value="<?=$data['tglmasuk']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Mulai</label>
                  <input type="text" class="form-control" name="tgl_mulai" id="datepicker">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Berlaku</label>
                  <input type="text" class="form-control" name="tgl_berlaku" id="datepicker1">
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
            $sql=$db->query("SELECT * FROM tblperpanjang WHERE idper='$_GET[id]'");
            foreach ($sql as $data);
            if (isset($_POST['update'])) {
            $sql= $db->query("UPDATE  tblperpanjang SET tgl_mulai='$_POST[tgl_mulai]',tgl_berlaku='$_POST[tgl_berlaku]', idmember='$_POST[idmember]' WHERE idper='$_POST[idper]' ");
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
                  <label for="exampleInputEmail1">ID Member</label>
                  <input type="text" class="form-control" name="idmember"  value="<?=$data['idmember']?>">
                  <input type="hidden" class="form-control" name="idper"  value="<?=$data['idper']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Mulai</label>
                  <input type="text" class="form-control" name="tgl_mulai" id="datepicker" value="<?=$data['tgl_mulai']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Berlaku</label>
                  <input type="text" class="form-control" name="tgl_berlaku" id="datepicker1" value="<?=$data['tgl_berlaku']?>">
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
<script type="text/javascript">location.href='data-perpanjang.php'</script>
<?php } }?>