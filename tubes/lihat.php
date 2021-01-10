<html>

<?php

require 'koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$idd = $_SESSION["nama"];
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM ambil_event WHERE id=$id");
$row = mysqli_fetch_assoc($data);

$data1 = mysqli_query($conn, "SELECT * FROM ambil_event WHERE id=$id");
$ambil = mysqli_fetch_assoc($data1);

$pro = $ambil['proker'];

$komen = mysqli_query($conn, "SELECT * FROM chat WHERE idpro='$id'");

$notulensi = mysqli_query($conn, "SELECT * FROM notulensi WHERE idpro='$id'");
$row1 = mysqli_fetch_assoc($notulensi);


?>

<head>

    <link rel="shortcut icon" href="1.jpg">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>program kerja</title>
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
            <li><a class="active" href="program_kerja.php">PROGRAM KERJA</a></li>
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
                    <a href="program_kerja.php" class="active">
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

        <!-- style="text-align: center; -->

        <div class="col-sm-10">
            <div class="text-center mt-3">
                <h1>P R O G R A M K E R J A</h1>
            </div>


            <div class=" mt-5 d-flex justify-content-center">
                <div class="card w-75">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="gambar/<?= $row["gambar"]; ?>" class="card-img" alt="gambar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $row["proker"]; ?></h3>
                                    <p class="card-text"><?= $row["keterangan"]; ?></p>
                                    <p class="card-text">dilaksanakan pada : <?= $row["tanggal"]; ?>,<?= $row["jam"]; ?></p>
                                    <br>
                                    <p class="card-text">Link meet : <a href="<?= $row["link"]; ?>"> <?= $row["link"]; ?> </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center mt-3">
                <div class="card w-75">
                    <div class="card-body">
                        <h3 class="card-title text-center">Notulensi</h3>
                        <p><?= $row1["isi"]; ?></p>

                        <?php if ($_SESSION["divisi"] ==  'Pengurus') : ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <textarea class="form-control" id="keterangan" name="isi" rows="3" required></textarea>
                                    <input type="hidden" name="idpro" value="<?= $id ?>">
                                </div>

                                <button type="submit" class="btn btn-success" name="submit1">Update</a>
                            </form>
                        <?php endif; ?>

                        <?php if ($_SESSION["divisi"] ==  'admin') : ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <textarea class="form-control" id="keterangan" name="isi" rows="3" required></textarea>
                                    <input type="hidden" name="idpro" value="<?= $id ?>">
                                </div>

                                <button type="submit" class="btn btn-success" name="submit1">Update</a>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <div class="card w-75">
                    <div class="card-body">
                        <h3 class="card-title text-center">Forum Chat</h3>

                        <?php while ($row = mysqli_fetch_assoc($komen)) : ?>
                            <div class="card w-75">
                                <div class="card-body">
                                    <strong><?= $row['nama']; ?></strong><br>
                                    <p><?= $row['isi']; ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="keterangan">Tulis komentar</label>
                                <textarea class="form-control" id="keterangan" name="isi" rows="3" required></textarea>
                                <input type="hidden" name="nama" value="<?= $idd ?>">
                                <input type="hidden" name="waktu" value="<?= date('d/m/Y') ?>">
                                <input type="hidden" name="proker" value="<?= $id ?>">
                            </div>

                            <button type="submit" class="btn btn-success" name="submite">kirim pesan</a>
                        </form>

                    </div>
                </div>
            </div>



            <div class="d-flex justify-content-center mt-3">
                <div class="card w-75">
                    <div class="card-body">
                        <h3 class="card-title text-center">File</h3>
                        <form>
                            <div class="form-group">
                                <label for="file">Upload File</label>
                                <input type="file" class="form-control-file" id="file">
                            </div>

                        </form>

                    </div>
                </div>
            </div>



        </div>
    </div>




</body>




</html>