<html>

<?php

include('koneksi.php');


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$id = $_SESSION["nama"];
$result = mysqli_query($conn, "SELECT * FROM program_kerja");

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
            padding: 100px 250px;
            margin-top: 50px;

        }
    </style>

    <div class="row">
        <div class="col-sm">

            <div class="merah">

                <div class="sidebar">

                    <div class="user">
                        <header><img src="2.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
                            <p><?= $_SESSION["nama"]; ?></p>
                            <p>Jabatan : <?= $_SESSION["divisi"]; ?></p>

                        </header>
                    </div>

                    <a href="index.php" class="active">
                        <i class="fas fa-qrcode"></i>
                        <span>Home</span>
                    </a>
                    <a href="#">
                        <i class="fas fa-link"></i>
                        <span>Profile</span>
                    </a>
                    <a href="program_kerja.php" >
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
                <h1>Tambah Program Kerja</h1>
            </div>

            <div class="container mt-3">


                <form action="create.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="hidden" name="nama" value="<?= $id ?>">
                    </div>

                    <div class="form-group">
                        <label for="proker">Nama Proker</label>
                        <input type="proker" class="form-control" id="proker" name="proker" required>
                    </div>

                    <label for="gambar">Upload gambar</label>
                    <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" id="gambar" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                    <div class="form-group mt-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="" name="tanggal" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal">Jam</label>
                                <input type="time" class="form-control" id="" name="jam" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="proker">Link Meet</label>
                        <input type="proker" class="form-control" id="proker" name="link" required>
                    </div>

                    <button class="btn btn-primary mr-2" name="submit" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>









</body>




</html>