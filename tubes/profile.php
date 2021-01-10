<html>

<?php

require 'koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$idd = $_SESSION["nama"];

$result = mysqli_query($conn, "SELECT * FROM user WHERE nama = '$idd' ");
$row = mysqli_fetch_assoc($result);

?>

<head>

    <link rel="shortcut icon" href="1.jpg">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Profile</title>
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

                    <a href="index.php">
                        <i class="fas fa-qrcode"></i>
                        <span>Home</span>
                    </a>
                    <a href="profile.php" class="active">
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

            <div class="d-flex justify-content-center mt-3">
                <div class="card w-75">
                    <div class="card-body">
                        <h3 class="card-title text-center">Profile</h3>

                        <div class="row">
                            <div class="col-sm">
                                <img src="3.png" width="120" height="120" class="d-inline-block align-top" alt="" loading="lazy">
                            </div>
                            <div class="col-sm-10">
                                <strong>Nama : </strong><?= $row['nama'] ?><br>
                                <strong>Jabatan : </strong><?= $row['divisi'] ?><br>
                                <strong>Email : </strong><?= $row['email'] ?> <br>
                                <strong>No. HP : </strong><?= $row['hp'] ?> <br>
                                <strong>Alamat : </strong><?= $row['alamat'] ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>

            <form action="" method="post">
                <div class="form-group row" style="margin-left: 150px;">
                    <label for="email anda" class="col-sm-2 col-form-label"><strong>Nama </strong></label>
                    <div class="col-sm-10">
                        <strong>: </strong> <?= $row['nama'] ?>
                    </div>
                </div>
                <div class="form-group row" style="margin-left: 150px;">
                    <label for="email anda" class="col-sm-2 col-form-label"><strong>Jabatan </strong></label>
                    <div class="col-sm-10">
                        <strong>: </strong> <?= $row['divisi'] ?>
                    </div>
                </div>
                <div class="form-group row" style="margin-left: 150px;">
                    <label for="nama" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama" name="email" value="<?= $row['email'] ?>">
                    </div>
                </div>
                <div class="form-group row" style="margin-left: 150px;">
                    <label for="nama" class="col-sm-2 col-form-label"><strong>No.HP</strong></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama" name="hp" value="<?= $row['hp'] ?>">
                    </div>
                </div>
                <div class="form-group row" style="margin-left: 150px;">
                    <label for="nama" class="col-sm-2 col-form-label"><strong>Alamat</strong></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama" name="alamat" value="<?= $row['alamat'] ?>">
                    </div>
                </div>


                <div class="form-group row" style="margin-left: 400px;">
                    <button type="submit" class="btn btn-success col-sm-2" name="submit2">Update</a>
                </div>
            </form>




        </div>
    </div>



</body>




</html>