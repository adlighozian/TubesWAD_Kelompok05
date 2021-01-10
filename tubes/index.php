<html>

<?php

require 'koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$ambil = mysqli_fetch_assoc($ambilid);

$id = $_SESSION["nama"];

$result = mysqli_query($conn, "SELECT * FROM program_kerja");
$divisi1 = mysqli_query($conn, "SELECT * FROM user WHERE nama = '$id' ");
$divisi = mysqli_fetch_assoc($divisi1);

$i = $divisi["divisi"];

$_SESSION["divisi"] = "$i";

?>

<head>

    <link rel="shortcut icon" href="1.jpg">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" type="text/css" />


    <nav>

        <div class="gambar" style="margin-left: 50px ">
            <img src="1.jpg" width="70" height="70" class="d-inline-block align-top" alt="" loading="lazy">
        </div>
        <div class="tulisan" style="color : white; margin-left: 10px  ">
        <h5>KOALISI</h5>
        </div>

        </div>
        <ul>

        </ul>




        <div class="logout">
            <ul>
                <li><a class="nav-link" href="logout.php" style="color:#65c6f3; font-family: Times New Roman; border: 1px solid #65c6f3;border-radius: 5px">logout</a>
                </li>
            </ul>
        </div>


    </nav>

</head>

<body>



    <style>
        .button,
        button,
        input[type=submit],
        input[type=reset] {
            font-family: sans-serif;
            font-size: 15px;
            background-color: #1b1b1b;
            color: #65c6f3;
            border: white 3px solid;
            border-radius: 5px;
            padding: 10px 50px;
            margin-top: 50px;

        }

        .kotak {
            color: #65c6f3;
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #65c6f3;
            border-radius: 5px;
            margin-right: 500px;

        }
    </style>

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

                    <a href="index.php" class="active">
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
            <div class="text-center mt-3">
                <h1>P R O G R A M K E R J A</h1>
                <?php if ($i ==  'Pengurus') : ?>
                    <a href="tambahprogramkerja.php" class="btn btn-dark">Tambah Program Kerja</a>
                <?php endif; ?>
                <?php if ($i ==  'admin') : ?>
                    <a href="tambahprogramkerja.php" class="btn btn-dark">Tambah Program Kerja</a>
                <?php endif; ?>
            </div>

            <!-- style="text-align: center;" -->

            <div class="container">
                <div class="row">

                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <!-- kolom 1 -->
                        
                        <div class="col-4">
                            <div class=" mt-3">
                                <div class="card card-home">
                                    <img width="150" height="250" src="gambar/<?= $row["gambar"]; ?>" class="card-img-top img-poster" alt="">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h3><?= $row["proker"]; ?></h3>
                                        </div>
                                        <hr>
                                        <p class=" card-text">
                                            <h5><?= $row['keterangan']; ?></h5>
                                            <p>Tanggal : <?= $row['tanggal']; ?></p>
                                            <p>Jam : <?= $row['jam']; ?></p>
                                        </p>
                                        <form action="" method="post">

                                            <div class="form-group">
                                                <input type="hidden" name="nama" value="<?= $id ?>">
                                                <input type="hidden" name="proker" value="<?= $row["proker"]; ?>">
                                                <input type="hidden" name="gambar" value="<?= $row["gambar"]; ?>">
                                                <input type="hidden" name="keterangan" value="<?= $row["keterangan"]; ?>">
                                                <input type="hidden" name="tanggal" value="<?= $row["tanggal"]; ?>">
                                                <input type="hidden" name="jam" value="<?= $row["jam"]; ?>">
                                                <input type="hidden" name="link" value="<?= $row["link"]; ?>">
                                                <input type="hidden" name="id" value="<?= $row["id"]; ?>">

                                                <input type="hidden" name="isi" value=".">
                                            </div>
                                            <div class="tombol text-center">
                                                <button type="submit" class="button-1" name="submita">tambahkan proker</a>

                                                    <?php if ($i ==  'Pengurus') : ?>
                                                        <a href="hapus2.php?id=<?= $row["id"]; ?>" type="submit" name="hapus2" class="btn btn-danger ">Hapus</a>
                                                    <?php endif; ?>
                                                    <?php if ($i ==  'admin') : ?>
                                                        <a href="hapus2.php?id=<?= $row["id"]; ?>" type="submit" name="hapus2" class="btn btn-danger ">Hapus</a>
                                                    <?php endif; ?>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- batas -->
                    <?php endwhile; ?>

                </div>
            </div>



        </div>
    </div>








</body>




</html>