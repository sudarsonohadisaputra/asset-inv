<?php 
include '../koneksi.php';

mysqli_query($koneksi,"UPDATE mutasi SET mu_print='1' WHERE mu_print='0'");

        echo '<script language="javascript">';
        echo 'alert("Successful!")';
        echo '</script>';
        echo "<script>window.close();</script>";

?>

