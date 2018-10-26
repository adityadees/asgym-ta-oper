<?php if (isset($_GET['inst'])){ ?>
  <?php 
  include'layout/header.php';
  include'lib/connect.php';
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Form Misi  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">Data Misi</li>
      </ol>
    </section>

    <section class="content">
      <?php 

      $carikode = mysqli_query($db, "SELECT idmisi from tblmisi") or die (mysqli_error());
  // menjadikannya array
      $datakode = mysqli_fetch_array($carikode);
      $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
      if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
       $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
       $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
       $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
       $kode_otomatis = "M".str_pad($kode, 2, "0", STR_PAD_LEFT);
     } else {
       $kode_otomatis = "M01";
     }
     if (isset($_POST['simpan'])) {
        $sql= mysqli_query($db,"INSERT INTO tblmisi (idmisi,idmember,id_jenis,latihan,poinmisi,tgl_misi,time_misi,sttss) VALUES('$_POST[idmisi]','$_POST[idmember]','$_POST[id_jenis]','$_POST[latihan]','$_POST[poinmisi]','$_POST[tgl_misi]','$_POST[time_misi]','$_POST[sttss]')") or die (mysqli_error($db));

        if ($sql) {
          echo"<label class='alert alert-success'>Data member berhasil di simpan</label>";
        }
        else{
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
              <input type="text" class="form-control" name="idmisi" readonly="" id="exampleInputEmail1" placeholder="ID Misi" value="<?=$kode_otomatis;?>">

              <div class="form-group">
                <label for="exampleInputPassword1">Nama Member</label>
                <select class="form-control" name="idmember" onchange="pilih_kota(this.value);">
                  <option selected="">Pilih</option>
                  <?php 
                  $no=1;
                  $sql=$db->query("SELECT * FROM tblmember");
                  foreach ($sql as $dataz) {
                    ?>
                    <option value="<?=$dataz['idmember'];?>"><?=$dataz['nmmember'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Jenis</label>
                <select class="form-control" name="id_jenis"  id="gjenis" >
                  <option value="0" readonly>Pilih Jenis</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Latihan</label>
                <input type="text" class="form-control"  placeholder="Latihan" name="latihan" id="Latihan">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Poin</label>
                <input type="text" class="form-control"  placeholder="Poin Misi" name="poinmisi" id="Poin Misi">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Misi</label>
                <input type="text" class="form-control"   name="tgl_misi" id="datepicker" >
                <input type="hidden" name="sttss" value="N">
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam Misi:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="time_misi">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
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
  <?php include'layout/footer.php'; ?>

  <script type="text/javascript" src="../jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
    function pilih_kota(idmember)
    {
      $.ajax({
        url: 'jenis.php',
        data : 'idmember='+idmember,
        type: "post", 
        dataType: "html",
        timeout: 10000,
        success: function(response){
          $('#gjenis').html(response);
        }
      });
    }
  </script>
<?php }elseif (isset($_GET['upd'])) { ?>
  <?php 
  include'layout/header.php';
  include'lib/connect.php';
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Form Misi  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">Data Misi</li>
      </ol>
    </section>

    <section class="content">
      <?php
      $sql=$db->query("SELECT * FROM tblmisi WHERE idmisi='$_GET[id]'");
      foreach ($sql as $data);
      if (isset($_POST['update'])) {
        $sql= $db->query("UPDATE tblmisi SET idmember='$_POST[idmember]',id_jenis='$_POST[id_jenis]',poinmisi='$_POST[poinmisi]' WHERE idmisi='$_POST[idmisi]'");
        if ($sql) {
          echo"<label class='alert alert-success'>Data member berhasil di simpan</label>";
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
                  <input type="text" class="form-control" name="idmisi"  value="<?=$data['idmisi']?>" readonly="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Member</label>
                  <select class="form-control" name="idmember" onchange="pilih_kota(this.value);">
                    <option selected="">Pilih</option>
                    <?php 
                    $no=1;
                    $sql=$db->query("SELECT * FROM tblmember");
                    foreach ($sql as $dataz) {
                      ?>
                      <option value="<?=$dataz['idmember'];?>"><?=$dataz['nmmember'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis</label>
                  <select class="form-control" name="id_jenis"  id="gjenis" >
                    <option selected="">Pilih</option>
                    <option value="0" readonly>Pilih Jenis</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Poin</label>
                  <input type="text" class="form-control"  name="poinmisi" value="<?=$data['poinmisi']?>">
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
    <?php include'layout/footer.php'; ?>


    <script type="text/javascript" src="../jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
      function pilih_kota(idmember)
      {
        $.ajax({
          url: 'jenis.php',
          data : 'idmember='+idmember,
          type: "post", 
          dataType: "html",
          timeout: 10000,
          success: function(response){
            $('#gjenis').html(response);
          }
        });
      }
    </script>

  <?php }else{  
    include'lib/connect.php';
    $sql=$db->query("DELETE FROM tblmisi WHERE idmisi='$_GET[id]'");
    if($sql){
      ?>
      <script type="text/javascript">location.href='data-misi.php'</script>
    <?php } }?>

