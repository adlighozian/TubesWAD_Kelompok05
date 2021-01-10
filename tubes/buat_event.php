<html>

<?php

require 'koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit1"])) {

    if (tambah1($_POST) > 1) {

        echo "<script> alert ('Event Berhasil Dibuat'); document.location.href = 'index.php'; </script>";
    } else {
        echo mysqli_error($conn);
    }

    $error = true;
}

$ambil = mysqli_fetch_assoc($ambilid);

$id = $_SESSION["nama"];

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
                            <p>Divisi : <?= $_SESSION["divisi"]; ?></p>

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
                    <a href="program_kerja.php">
                        <i class="fas fa-stream"></i>
                        <span>Program kerja</span>
                    </a>
                    <a href="kalender.php">
                        <i class="fas fa-calendar"></i>
                        <span>Kalender</span>
                    </a>
                    <a href="koalisi.php">
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

        <div class="col-sm-10" style="margin-right: 10px;">

            <br>
            <div class="text-center">
            <h1>BUAT EVENT</h1>
            </div>
            
            <form action="" method="post">

                <div class="form-group">
                    <input type="hidden" name="nama" value="<?= $id ?>">
                </div>

                <div class="form-group">
                    <label for="tempat"><strong>Tema Acara</strong></label>
                    <input type="text" class="form-control" id="tema" placeholder="Tema" name="tema" required>
                </div>

                <div class="form-group">
                    <label for="tempat"><strong>Deskripsi Acara</strong></label>
                    <textarea class="form-control" id="Deskripsi" rows="3" name="deskripsi" required></textarea>
                </div>

                <div class="form-group">
                    <label for="tempat"><strong>Jam </strong></label>
                    <input type="text" class="form-control" id="info1" placeholder="jam mulai - selesai" name="info1">
                </div>
                <div class="form-group"><strong>Hari/Tanggal</strong></label>
                    <input type="text" class="form-control" id="info2" placeholder="hari/tanggal" name="info2">
                </div>
                <div class="form-group"><strong>Tempat </strong></label>
                    <input type="text" class="form-control" id="info3" placeholder="lokasi acara" name="info3">
                </div>


                <div class="text-right">
                    <button type="submit" class="btn btn-primary" name="submit1">Buat Acara</button>
                    <button type="reset" class="btn btn-danger" name="cancel">Cancel</button>
                </div>
            </form>



        </div>
    </div>








</body>




</html>