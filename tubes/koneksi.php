<?php

$conn = mysqli_connect("localhost", "root", "", "tubes");

session_start();


//register

function registrasi($data)
{
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $email = ($data["email"]);
    $hp = ($data["hp"]);
    $divisi = ($data["divisi"]);
    $alamat = ($data["alamat"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT nama FROM user WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($result)) {

        return false;
    }

    if ($password !== $password2) {
        echo "<script> alert ('konfirmasi password tidak sesuai !'); </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES ('','$nama','$password','$email','$divisi','$hp','$alamat')");

    return mysqli_affected_rows($conn);
}

//menampilkan tabel

$ambilid = mysqli_query($conn, "SELECT * FROM user");

//fuction hapus

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM ambil_event WHERE id = $id");

    return mysqli_affected_rows($conn);
}

//fuction hapus2

function hapus2($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM program_kerja WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// function ubah

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $id_status = $data["status"];

    $query = "UPDATE keluarga SET
        nama = '$nama',
        id_status = '$id_status'

        WHERE id = $id
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//submit ubah




function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah1($data)
{

    global $conn;
    $nama = $data["nama"];
    $tema = $data["tema"];
    $deskripsi = $data["deskripsi"];
    $info1 = $data["info1"];
    $info2 = $data["info2"];
    $info3 = $data["info3"];

    $query = "INSERT INTO event VALUES ('','$nama','$tema','$deskripsi','$info1','$info2','$info3')";
    mysqli_query($conn, $query);
}

// tambah

if (isset($_POST["submita"])) {

    if (tambah2($_POST) > 0) {

        echo " ";
    } else {
        echo "";
    }
}

function tambah2($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $proker = $data["proker"];
    $gambar = $data["gambar"];
    $keterangan = $data["keterangan"];
    $tanggal = $data["tanggal"];
    $jam = $data["jam"];
    $link = $data["link"];
    
    
    
    $query = "INSERT INTO ambil_event VALUES ('$id','$nama','$proker','$gambar','$keterangan','$tanggal','$jam','$link')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// tambah

if (isset($_POST["submite"])) {

    if (tambah3($_POST) > 0) {

        echo "";
    } else {
        echo "";
    }
}

function tambah3($data)
{
    global $conn;

    $nama = $data["nama"];
    $isi = $data["isi"];
    $waktu = $data["waktu"];
    $idpro = $data["proker"];
    
    $query = "INSERT INTO chat VALUES ('','$nama','$isi','$waktu','$idpro')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// tambah

if (isset($_POST["submit1"])) {

    if (tambah4($_POST) > 0) {

        echo "";
    } else {
        echo "";
    }
}

function tambah4($data)
{
    global $conn;

    $isi = $data["isi"];
    $idpro = $data["idpro"];
    
    $query = "UPDATE notulensi SET isi = '$isi' WHERE idpro = $idpro ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// tambah

if (isset($_POST["submit2"])) { 

    if (tambah7($_POST) > 0) {

        echo " ";
    } else {
        echo "";
    }
}

function tambah7($data)
{
    global $conn;

    $idd = $_SESSION["nama"];
    $email = $data["email"];
    $hp = $data["hp"];
    $alamat = $data["alamat"];

    $query = "UPDATE user SET email = '$email', hp = '$hp', alamat = '$alamat' WHERE nama = '$idd' ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// tambah

if (isset($_POST["submita"])) {

    if (tambah5($_POST) > 0) {

        echo "";
    } else {
        echo "";
    }
}

function tambah5($data)
{
    global $conn;

    $isi = $data["isi"];
    $idpro = $data["id"];
    
    $query = "INSERT INTO notulensi VALUES ('','$isi','$idpro')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// tambah

if (isset($_POST["submita"])) {

    if (tambah6($_POST) > 0) {

        echo " ";
    } else {
        echo "";
    }
}

function tambah6($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $proker = $data["proker"];
    $gambar = $data["gambar"];
    $keterangan = $data["keterangan"];
    $tanggal = $data["tanggal"];
    $jam = $data["jam"];
    $link = $data["link"];
    
    
    
    $query = "INSERT INTO history VALUES ('','$id','$nama','$proker','$gambar','$keterangan','$tanggal','$jam')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}