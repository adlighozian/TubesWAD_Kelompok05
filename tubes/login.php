<!Doctype html>
<html>

<?php



if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

if (isset($_POST["login"])) {

    $nama = $_POST["nama"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE nama = '$nama'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;

            $_SESSION["nama"] = $_POST["nama"];

            //cookie
            if (isset($_POST['remember'])) {

                setcookie('login', 'true', time() + 43200);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

// $id =$_GET["id"];
// $profile = query("SELECT * FROM user WHERE id = $id");
// var_dump($profile);

?>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet" type="text/css" />

</head>


<body>

    <?php if (isset($error)) : ?>

        <nav class="navbar navbar-light " style="background-color:#fffa99;">
            <p class="navbar-brand" href="#" style="color: #7d781b; text-align:center">Akun Tidak Ditemukan</p>

        </nav>

    <?php endif; ?>

    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col-sm">


                <img src="gb.jpeg">

            </div>
            <div class="col-sm">

                <form action="" method="post">
                    <div class="form-group col-10" style="left: 30px;">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Anda" name="nama">

                        <div class="form-group  col-15 ">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary" name="login">Login</button>

                </form>

            </div>
        </div>
    </div>




</body>


</body>

</html>