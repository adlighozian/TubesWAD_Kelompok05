<html>

<?php

require 'koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$ambil = mysqli_fetch_assoc($ambilid);

$id = $_SESSION["nama"];
$idd = $_GET['id'];

?>

<Style>
    #card {
        background: white;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 470px;
        margin: 6rem auto 8.1rem auto;
        width: 400px;
    }

    body {
        height: 80vh;
        background: lightseagreen;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    #card-content {
        padding: 12px 44px;
    }

    #card-title {
        font-family: times new roman;
        padding-bottom: 23px;
        padding-top: 13px;
        text-align: center;
    }

    #menu {
        margin-left: 1050px;
    }
</Style>

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
                    <a href="koalisi.php" class="active">
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

            <?php if ($idd ==  1) : ?>
                <div id="card">
                    <div id="card-content">
                        <div id="card-title">
                            <h2>Divisi Pubdok</h2>
                            <br>
                            <p>Divisi Publikasi dan Dokumentasi atau yang biasa disebut Divisi Pubdok merupakan divisi yang bertugas untuk mempublikasikan acara dan juga mendokumentasikannya. Adapun tugas divisi pubdok yaitu:</p>
                            <ul>
                                <li>Menyediakan dan mengedarkan surat izin pameran</li>
                                <li>Menyediakan dan mengedarkan surat-surat undangan</li>
                                <li>Menyebarkan informasi pelaksanaan pameran dan pagelaran, baik melalui media elektronik maupun media cetak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($idd ==  2) : ?>
                <div id="card">
                    <div id="card-content">
                        <div id="card-title">
                            <h2>Divisi Konsumsi</h2>
                            <br>
                            <p>Menyediakan konsumsi saat acara berlangsung</p>
                            
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($idd ==  3) : ?>
                <div id="card">
                    <div id="card-content">
                        <div id="card-title">
                            <h2>Divisi Logistik</h2>
                            <br>
                            <p>Divisi yang bertugas untuk menyediakan peralatan dan perlengkapan yang dibutuhkan selama acara
                             dan bertanggung jawab terhadap barang-barang tersebut.</p>
                            
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($idd ==  4) : ?>
                <div id="card">
                    <div id="card-content">
                        <div id="card-title">
                            <h2>Divisi Acara</h2>
                            <br>
                            <p>Divisi yang bertanggung jawab atas seluruh rangkaian acara dan membuat konsep dan rangkaian acara</p>
                            
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($idd ==  5) : ?>
                <div id="card">
                    <div id="card-content">
                        <div id="card-title">
                            <h2>Divisi Pubdok</h2>
                            <br>
                            <p>divisi yang bertugas dalam menyampaikan informasi mengenai organisasi kepada stakeholder yang terkait dan kepada publik.</p>
                           
                        </div>
                    </div>
                </div>
            <?php endif; ?>


        </div>
    </div>



</body>




</html>