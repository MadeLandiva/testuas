

<?php

include 'koneksi.php';


    if(isset($_GET['hapus'])){
        $id_saran = $_GET['hapus'];
        $query = "DELETE FROM tb_saran WHERE id_saran = '$id_saran';";
        $sql = mysqli_query($koneksi, $query);

        if($sql){
            header("location: index.php?#table");
        }else {
            echo $query;
        }
    }

?>