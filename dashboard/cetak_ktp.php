<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
  header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysql_query($sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysql_query("SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysql_fetch_array($query);
?>
<head>
  <title>Halo, <?php echo $data['fullname']; ?> - SI Kependudukan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/datatables/css/jquery.dataTables.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
  -->
</head>
<body class="sidebar-mini fixed">
  <div class="wrapper">
    <header class="main-header hidden-print"><a class="logo" href="index.php" style="font-size:13pt">Sistem Informasi Desa Politeknik</a>
      <nav class="navbar navbar-static-top">
        <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
        <div class="navbar-custom-menu">
          <ul class="top-nav">
            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
              <ul class="dropdown-menu settings-menu">
                <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar hidden-print">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
          <div class="pull-left info">
            <p style="margin-top:-5px;"><?php echo $data['fullname']; ?></p>
            <p class="designation"><?php echo $data['job_title']; ?></p>
            <p class="designation" style="font-size:6pt;">Aktivitas Terakhir: <?php echo $data['last_activity'] ?></p>
          </div>
        </div>
        <ul class="sidebar-menu">
          <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <?php
          $v = $_SESSION['username'];
          $query = mysql_query("SELECT * FROM users WHERE username='$v'");
          $users = mysql_fetch_array($query);
          echo "";

          ?>
          <!-- <li><a href="history.php"><i class="fa fa-list-alt"></i><span>Daftar List</span></a></li> -->
          <li class="treeview"><a href="#"><i class="fa fa-database"></i><span>Data</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="list_penduduk.php"><i class="fa fa-circle-o"></i>Data Penduduk</a></li>
              <li><a href="list_kelahiran.php"><i class="fa fa-circle-o"></i>Data Kelahiran</a></li>
              <li><a href="list_kematian.php"><i class="fa fa-circle-o"></i>Data Kematian</a></li>

            </ul>
          </li>
          <li><a href="about.php"><i class="fa fa-info"></i><span>Tentang</span></a></li>
          <li><a href="help.php"><i class="fa fa-question-circle"></i><span>Bantuan</span></a></li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <div class="page-title">
        <div>
          <h1><i class="fa fa-table"></i>  Sistem Informasi Kependudukan Desa</h1>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li><a href="index.php">Dashboard</a></li>
            <li>Edit Penduduk</li>
          </ul>
        </div>
      </div>
      <!-- Modal Edit -->
      <div class="modal-body">
        <div class="modal-content">
          <div class="container-fluid" style="margin-bottom: 30px">
            <b><h2>Edit Penduduk</h2></b> 
            <hr>
            <?php
        //jika sudah mendapatkan parameter GET id dari URL
            if(isset($_GET['id'])){
            //membuat variabel $id untuk menyimpan id dari GET id di URL
              $id = $_GET['id'];

            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
              $select = mysql_query("SELECT * FROM data_penduduk WHERE id='$id'") or die(mysql_error($koneksi));

            //jika hasil query = 0 maka muncul pesan error
              if(mysql_num_rows($select) == 0){
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            //jika hasil query > 0
              }else{
                //membuat variabel $data dan menyimpan data row dari query
                $data = mysql_fetch_assoc($select);
              }
            }
            ?>
            <?php
        //jika tombol simpan di tekan/klik
            if(isset($_POST['submit'])){
              $NIK            = $_POST['NIK'];
              $nama           = $_POST['nama'];
              $tempat_lahir   = $_POST['tempat_lahir'];
              $tanggal_lahir  = $_POST['tanggal_lahir'];
              $jenis_kelamin  = $_POST['jenis_kelamin'];
              $gol_darah = $_POST['gol_darah'];
              $alamat = $_POST['alamat'];
              $RT_RW = $_POST['RT_RW'];
              $desa = $_POST['desa'];
              $kecematan = $_POST['kecematan'];
              $agama = $_POST['agama'];
              $status_perkawinan = $_POST['status_perkawinan'];
              $pekerjaan = $_POST['pekerjaan'];
              $kewarganegaraan = $_POST['kewarganegaraan'];
              $foto = $_POST['foto'];

              $sql = mysql_query("UPDATE data_penduduk SET NIK='$NIK', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', gol_darah='$gol_darah', alamat='$alamat', RT_RW='$RT_RW', desa='$desa', kecematan='$kecematan', agama='$agama', status_perkawinan='$status_perkawinan', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan', foto='$foto' WHERE id='$id'") or die(mysql_error($koneksi));

              if($sql){
                echo '<script>alert("Berhasil Edit Data."); document.location="list_penduduk.php?id='.$id.'";</script>';
              }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
              }
            }
            ?>

            <form action="KTP.php?id=<?php echo $id; ?>" method="post">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" name="NIK" class="form-control" size="10" value="<?php echo $data['NIK']; ?>" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
                <div class="col-sm-10">
                  <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                <div class="col-sm-10">
                  <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" <?php if($data['jenis_kelamin'] == 'LAKI-LAKI'){ echo 'checked'; } ?> required>
                    <label class="form-check-label">LAKI-LAKI</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" <?php if($data['jenis_kelamin'] == 'PEREMPUAN'){ echo 'checked'; } ?> required>
                    <label class="form-check-label">PEREMPUAN</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">GOL DARAH</label>
                <div class="col-sm-10">
                  <input type="text" name="gol_darah" class="form-control" value="<?php echo $data['gol_darah']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">ALAMAT</label>
                <div class="col-sm-10">
                  <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">RT/RW</label>
                <div class="col-sm-10">
                  <input type="text" name="RT_RW" class="form-control" value="<?php echo $data['RT_RW']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">DESA</label>
                <div class="col-sm-10">
                  <input type="text" name="desa" class="form-control" value="<?php echo $data['desa']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">KECAMATAN</label>
                <div class="col-sm-10">
                  <input type="text" name="kecematan" class="form-control" value="<?php echo $data['kecematan']; ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">AGAMA</label>
                <div class="col-sm-10">
                  <input type="text" name="agama" class="form-control" value="<?php echo $data['agama']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">STATUS PERKAWINAN</label>
                <div class="col-sm-10">
                  <input type="text" name="status_perkawinan" class="form-control" value="<?php echo $data['status_perkawinan']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">PEKERJAAN</label>
                <div class="col-sm-10">
                  <input type="text" name="pekerjaan" class="form-control" value="<?php echo $data['pekerjaan']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">KEWARGANEGARAAN</label>
                <div class="col-sm-10">
                  <input type="text" name="kewarganegaraan" class="form-control" value="<?php echo $data['kewarganegaraan']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">FOTO</label>
                <div class="col-sm-10">
                  <input type="file" name="foto" class="form-control" value="<?php echo $data['foto']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                  <input type="submit" name="submit" class="btn btn-primary pull-left fa fa-floppy" value="SIMPAN">
                  <a href="list_penduduk.php" class="btn btn-primary fa fa-back">KEMBALI</a>
                </div>
              </div>
            </form>

          </div>
          <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
          <!-- Bootstrap Js CDN -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="../assets/js/jquery-2.1.4.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              $('#file').dataTable({
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": true,
                "order": [0, "asc"]
              });
            });
          </script>
          <script src="../assets/js/essential-plugins.js"></script>
          <script src="../assets/js/bootstrap.min.js"></script>
          <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
          <script src="../assets/js/plugins/pace.min.js"></script>
          <script src="../assets/js/main.js"></script>

        </body>
        </html>