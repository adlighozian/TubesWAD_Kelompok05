<?php
include ('koneksi.php');
if(isset($_POST['submit'])){
    $proker = $_POST['proker'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $jam = $_POST['jam'];
    $link = $_POST['link'];

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $temp = $_FILES['gambar']['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
  
if(!in_array($ext,$ekstensi) ) {
    header("location:tambahprogramkerja.php?alert=gagal_ekstensi");
}else{
    $xx = $rand.'_'.$filename;
    $xx = basename($xx);
    $path = "gambar/$xx";
    move_uploaded_file($temp,$path);

    $query = "INSERT INTO program_kerja VALUES(NULL,'$nama','$proker','$xx','$keterangan','$tanggal','$jam','$link')";
            
    mysqli_query($conn, $query);

    echo "<script> document.location.href = 'index.php'; </script>";
    } 
  }
?>