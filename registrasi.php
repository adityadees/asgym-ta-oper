<?php include'layout/header.php'; ?>

<style type="text/css">
.box{
  padding: 50px 45px;
  width: 35em;
}
</style>

<div class="container">
  <div class="row">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Registrasi AS - GYM</h3>
        <hr>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php 
      include'Admin/lib/connect.php';
      $carikode = mysqli_query($db, "SELECT idmember from tblmember") or die (mysqli_error());
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
       $kode_otomatis = "C".str_pad($kode, 2, "0", STR_PAD_LEFT);
     } else {
       $kode_otomatis = "C01";
     }
     if (isset($_POST['simpan'])) {
      $pass=md5($_POST['password']);
  
        $sql= $db->query("INSERT INTO tblmember VALUES('$_POST[idmember]','$_POST[nmmember]','$_POST[alamat]','$_POST[nohp]','$_POST[idpaket]','$_POST[jns]','$_POST[tglmasuk]','0','$_POST[user_mbr]','$pass','nonaktif')");
    
      if ($sql) {
        echo"<label class='alert alert-success'>Data member berhasil di registrasi ! Silakan lanjut <a href='index.php'>login</a></label>";
      }else{
        echo"Gagal";
      }
    }
    ?>
    <form role="form" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="nmmember" placeholder="Nama Lengkap">
          <input type="hidden" name="idmember" value="<?=$kode_otomatis?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">No HP</label>
          <input type="text"  class="form-control" id="exampleInputEmail1" name="nohp" placeholder="Nomor Hp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Paket</label>
          <select name="idpaket" onchange="pilih_kota(this.value);" class="form-control">
            <option selected="">Pilih Paket</option>
            <?php 
            $no=1;
            $sql=$db->query("SELECT * FROM tblpaket");
            foreach ($sql as $data) {
              ?>
              <option value="<?=$data['idpaket'];?>"><?=$data['nm_paket'];?></option>
            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <label for="exampleInputPassword1">Jenis</label>
          <select name="jns" id="gjenis"  class="form-control" >
            <option value="0" readonly>Pilih Jenis</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masuk</label>
          <input type="date" class="form-control" id="exampleInputEmail1" name="tglmasuk" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="user_mbr" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" name="simpan" class="btn btn-primary">Registrasi</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php include'layout/footer.php';?>

<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
  function pilih_kota(idpaket)
  {
    $.ajax({
      url: 'jenis.php',
      data : 'idpaket='+idpaket,
      type: "post", 
      dataType: "html",
      timeout: 10000,
      success: function(response){
        $('#gjenis').html(response);
      }
    });
  }
</script>