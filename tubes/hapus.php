<?php

require 'koneksi.php';

$id = $_GET["id"];

if (hapus($id)>0){

    echo " 
<script> 
document.location.href = 'program_kerja.php';
</script>";

}else{ echo "";
}

