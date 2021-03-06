<html>

<?php

require 'koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$ambil = mysqli_fetch_assoc($ambilid);

$id = $_SESSION["nama"];

?>

<style>
    #card {
        position: absolute;
        width: 800px;
        height: 150px;
        left: 250px;
        background: white;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        border-radius: 8px;

        background-position: center;
        background-size: cover;
    }

    #card2 {
        position: absolute;
        width: 800px;
        height: 150px;
        left: 250px;
        background: white;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        border-radius: 8px;
    }

    #card3 {
        position: absolute;
        width: 800px;
        height: 150px;
        left: 250px;
        background: white;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        border-radius: 8px;
    }

    #card4 {
        position: absolute;
        width: 800px;
        height: 150px;
        left: 250px;
        background: white;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        border-radius: 8px;
        background-image: url(acara.jpg);
        background-position: center;
        background-size: cover;
    }

    #card5 {
        position: absolute;
        width: 800px;
        height: 150px;
        left: 250px;
        background: white;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        border-radius: 8px;
        background-image: url(gbr.png);
        background-position: center;
        background-size: cover;
    }

    body {
        height: 80vh;
        background: lightseagreen;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<head>
    <link rel="shortcut icon" href="1.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>koalisi</title>
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
            <li><a href="index.php">HOME</a></li>
            <li><a href="program_kerja.php">PROGRAM KERJA</a></li>
            <li><a href="kalender.php">KALENDER</a></li>
            <li><a class="active" href="koalisi.php">KOALISI</a></li>

        </ul> -->


        <div class="logout">
            <ul>
                <li><a class="nav-link" href="logout.php" style="color:#65c6f3; font-family: Times New Roman; border: 1px solid #65c6f3;border-radius: 5px">logout</a>
                </li>
            </ul>
        </div>


    </nav>

</head>

<body>

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
                    <a href="struktur.php" class="active">
                        <i class="far fa-question-circle"></i>
                        <span>About KOALISI</span>
                    </a>
                    <?php if ($_SESSION["nama"] ==  'admin') : ?>
                        <a href="register.php">
                            <i class="fas fa-sliders-h"></i>
                            <span>Tambah Anggota</span>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

        </div>
        <div class="col-sm-10">

            <div class="d-flex justify-content-center mt-3">
                <div class="card w-75">
                    <div class="card-body">
                        <h3 class="card-title text-center">Tentang Koalisi</h3>

                        Komunitas Sosial Sistem Informasi (KOALISI) merupakan komunitas yang memiliki
                        tujuan untuk meningkatkan rasa peduli pada mahasiswa Sistem Informasi terkait
                        lingkungan sekitar kampus ataupun terhadap suatu bencana yang terjadi.
                        Namun dalam pelaksanaan program kerjanya masih terhambat. Terhambatnya komunitas
                        ini disebabkan oleh komunikasi yang tidak berjalan dengan lancar sehingga memperburuk
                        koordinasi di dalam organisasi. Oleh karena itu, kami berencana membuat suatu sistem
                        berbasis website dimana diharapkan bisa membantu kelancaran komunikasi dari KOALISI tersebut.

                    </div>
                </div>
            </div>

            <a href="koalisi.php">
                <br> <br>
                <div id="card">
                    <br>
                    <h5 style="text-align: center;">Divisi-Divisi yang ada pada KOALISI</h5>

                </div>
            </a>


            <br><br><br><br><br><br><br>
            <div id="card2">
                <br>
                <p style="text-align: center;">Struktur Organisasi Koalisi</p>
                <p style="text-align: center;"> Adapun struktur organisasi KOALISI pada tahun 2018 & 2019 adalah sebagai berikut: </p>
                <button type="button" style="margin-left: 350px;" class="btn btn-dark"><a href="organisasi.php?id=1" style="color: white;">2018</a></button>
                <button type="button" class="btn btn-dark"><a href="organisasi.php?id=2" style="color: white;">2019</a></button>

            </div>


        </div>
    </div>








</body>




</html>