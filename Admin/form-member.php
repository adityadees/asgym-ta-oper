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
            <form method="post" >
            <div class="box-body">
              <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="text" class="form-control" name="tanggal_hadir" id="datepicker">
                </div>
              </div>
            </div>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">ID Member</th>
                  <th rowspan="2">Nama Member</th>
                  <th colspan="2">Keterangan</th>
                </tr>
                <tr>
                <th>H</th>
                <th>A</th>
                </tr>
                </thead>
                <tbody>
      <?php 
      $no=1;
      $sql=$db->query("SELECT * FROM tblmember");
      foreach ($sql as $data) {
      ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['idmember'];?></td>
                  <td><?=$data['nmmember'];?></td>
                  <td><input type="checkbox" name="H[]" value="<?=$data['idmember'];?>"> </td>
                  <td><input type="checkbox" name="A[]" value="<?=$data['idmember'];?>"></td>

                </tr>
      <?php } ?>
                </tbody>
              </table>
               <input type="hidden" name="idmember" value="<?=$data['idmember'];?>">
              <p></p>
              <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
            </div>

            </form>
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

<?php
if (isset($_POST['save'])) {
  
  if (!empty($_POST['H'])) {
    $idmember=$_POST['H'];
    $jml=count($idmember);

    for ($i=0; $i < $jml; $i++) { 
        $hadir=$db->query("INSERT INTO tblhadir VALUES('','$_POST[tanggal_hadir]','$idmember[$i]','H','N')");
    }
  }

  if (!empty($_POST['A'])) {
    $idmember=$_POST['A'];
    $jml=count($idmember);

    for ($i=0; $i < $jml; $i++) { 
        $hadir=$db->query("INSERT INTO tblhadir VALUES('','$_POST[tanggal_hadir]','$idmember[$i]','A','N')");
    }
  }  

}

?>