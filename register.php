<!DOCTYPE html>
<html>
<head>
  <title>Sistem Informasi Kependudukan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=100, initial-scale=1">
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
  -->
</head>
<body>
  <?php
            if(isset($_POST['submit'])){
              $fullname            = $_POST['fullname'];
              $username           = $_POST['username'];
              $email   = $_POST['email'];
              $password  = $_POST['password'];
                         
              $cek = mysql_query("SELECT * FROM users WHERE id='$id'") or die(mysql_error($koneksi));

              if(mysql_num_rows($cek) == 0){
                $sql = mysql_query("INSERT INTO users(fullname,username,email,password) VALUES('$fullname', '$username', '$email', '$password')") or die(mysql_error($koneksi));

                if($sql){
                  echo '<script>alert("Berhasil menambahkan data."); document.location="config.php";</script>';
                }else{
                  echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                }
              }else{
                echo '<div class="alert alert-warning">Gagal, nama sudah terdaftar.</div>';
              }
            }
            ?>

  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Create Account</h1>
    </div>
    <div class="login-box">
      <form class="login-form" action="config.php" method="post">
        <div class="form">
          <label class="control-label">Full Name</label>
          <input class="form-control" type="text" name="fullname" placeholder="Fullname" autofocus autocomplete="off" required>
        </div>
        <div class="form">
          <label class="control-label">Username</label>
          <input class="form-control" type="text" name="username" placeholder="Username" autofocus autocomplete="off" required>
        </div>
        <div class="form">
          <label class="control-label">Email</label>
          <input class="form-control" type="text" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label class="control-label">Password</label>
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block" name="submit">Create Account  <i class="fa fa-sign-in fa-lg"></i></button><br> 
        </div>
      </form>

    </div>
  </section>
</body>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/essential-plugins.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/pace.min.js"></script>
<script src="assets/js/main.js"></script>
</html>
