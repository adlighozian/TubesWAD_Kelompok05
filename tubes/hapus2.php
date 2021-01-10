<?php

require 'koneksi.php';

$id = $_GET["id"];

if (hapus2($id)>0){

    echo " 
<script> 
document.location.href = 'index.php';
</script>";

}else{ echo " 
    ";
}


?>