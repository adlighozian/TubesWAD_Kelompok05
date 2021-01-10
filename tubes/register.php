<!Doctype html>
<html>

<?php

require 'koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["daftar"])) {

    if (registrasi($_POST) > 0) {

        echo "<script> alert ('Akun Berhasil Dibuat'); document.location.href = 'register.php'; </script>";
    } else {
        echo mysqli_error($conn);
    }

    $error = true;
}



?>


<head>

    <link rel="shortcut icon" href="1.jpg">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" type="text/css" />


    <nav>

        <div class="gambar" style="margin-left: 50px ">
            <img src="1.jpg" width="70" height="70" class="d-inline-block align-top" alt="" loading="lazy">
        </div>
        <div class="tulisan" style="color : white; margin-left: 10px  ">
        <h5>KOALISI</h5>
        </div>
        <div class="logo">

        </div>
        <ul>

        </ul>

        <!-- <ul>
            <li><a class="active" href="index.php">HOME</a></li>
            <li><a href="program_kerja.php">PROGRAM KERJA</a></li>
            <li><a href="kalender.php">KALENDER</a></li>
            <li><a href="koalisi.php">KOALISI</a></li>

        </ul> -->


        <div class="logout">
            <ul>
                <li><a class="nav-link" href="logout.php" style="color:#65c6f3; font-family: Times New Roman; border: 1px solid #65c6f3;border-radius: 5px">logout</a>
                </li>
            </ul>
        </div>


    </nav>

</head>

<body id="warna">


    <?php if (isset($error)) : ?>

        <nav class="navbar navbar-light " style="background-color:#fffa99;">
            <p class="navbar-brand" href="#" style="color: #7d781b;">username sudah ada</p>

        </nav>

    <?php endif; ?>
    <div class="row">
        <div class="col-sm">

            <div class="merah">

                <div class="sidebar">

                    <div class="user">
                        <header><img src="2.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
                            <p><?php echo $_SESSION["nama"]; ?></p>
                            <p>Jabatan : <?= $_SESSION["divisi"]; ?></p>

                        </header>
                    </div>

                    <a href="index.php">
                        <i class="fas fa-qrcode"></i>
                        <span>Home</span>
                    </a>
                    <a href="profile.php">
                        <i class="fas fa-link"></i>
                        <span>Profile</span>
                    </a>
                    <a href="program_kerja.php">
                        <i class="fas fa-stream"></i>
                        <span>Program kerja</span>
                    </a>
                    <a href="kalender.php">
                        <i class="fas fa-calendar"></i>
                        <span>Kalender</span>
                    </a>
                    <a href="struktur.php">
                        <i class="far fa-question-circle"></i>
                        <span>About KOALISI</span>
                    </a>
                    <a href="register.php" class="active">
                        <i class="fas fa-sliders-h"></i>
                        <span>Tambah Anggota</span>
                    </a>

                </div>
            </div>

        </div>
        <div class="col-sm-10">

            <!-- Isi konten -->


            <div id="warna">
                <div id="box">

                    <div class="card-body">

                        <form action="" method="post">
                            <div class="form-group ">
                                <label for="exampleInputEmail1"><strong>username</strong></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Anda" name="nama" required>
                            </div>
                            <div class="form-group ">
                                <label for="email1"><strong>Email</strong></label>
                                <input type="email" class="form-control" id="email1" placeholder="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"><strong>Jabatan</strong></label>
                                <select class="form-control" id="exampleFormControlSelect1" name="divisi" required>
                                    <option value="Pengurus">Pengurus</option>
                                    <option value="Anggota">Anggota</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="email1"><strong>Alamat</strong></label>
                                <input type="text" class="form-control" id="email1" placeholder="alamat" name="alamat" required>
                            </div>
                            <div class="form-group ">
                                <label for="nohp"><strong>No Handphone</strong></label>
                                <input type="text" class="form-control" id="Nohp" placeholder="No Handphone" name="hp">
                            </div>
                            <div class="form-group ">
                                <label for="password"><strong>Kata Sandi</strong></label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" id="password" required>
                            </div>
                            <div class="form-group ">
                                <label for="password"><strong>Konfirmasi Kata Sandi</strong></label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password2" id="password2" required>
                            </div>
                            <button type="submit" class='btn btn-primary' id="daftar" name="daftar">Buat Akun</button>

                        </form>




                    </div>
                </div>

                <!-- Optional JavaScript; choose one of the two! -->

                <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

                <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
            </div>

        </div>
</body>

</html>