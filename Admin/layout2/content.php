  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <h1>SELAMAT DATANG WEBSITE HALAMAN MEMBERSHIP</h1>
      <p></p>


      <h4>
                  
<?php
include'lib/connect.php';
      $sql=$db->query("SELECT * FROM tblmember WHERE user_mbr='$user' ");
      $cc=mysqli_fetch_array($sql);
      $dt=$cc['stts'];

      if ($dt=="nonaktif") {
        echo"<label class='label label-warning'> Segera Melakukan Pembayaran Agar membership Segera Aktif</label>";
      }else{
        echo"<label class='label label-success'> Akun Anda Telah Aktif!</label>";
      }
?>
        </h4>
    </section>
    <!-- /.content -->
  </div> 