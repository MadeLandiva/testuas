<?php
    include '../koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "tambah"){
            echo 
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $pass = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            $query = "INSERT INTO tb_mahasiswa VALUES(null, '$nama', '$nim', $pass, '$jurusan')";
            $sql = mysqli_query($koneksi, $query);

            if($sql){
                echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data user berhasil diperbaharui',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>";
                header("location: datamahasiswa.php");
            }else {
                echo $query;
            }

        } else if(($_POST['aksi'] == "edit")){
            $id_mahasiswa = $_POST['id_mahasiswa'];
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $pass = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            $query = "UPDATE tb_mahasiswa SET nama='$nama', nim='$nim', pass='$pass', jurusan='$jurusan' WHERE id_mahasiswa = '$id_mahasiswa';";
            $sql = mysqli_query($koneksi, $query);

            if($sql){
                
                header("location: datamahasiswa.php");
            }else{
                echo $query;
            }

        }
    }

    if(isset($_GET['hapus'])){
        $id_mahasiswa = $_GET['hapus'];
        $query = "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
        $sql = mysqli_query($koneksi, $query);

        if($sql){
            header("location: datamahasiswa.php");
        }else {
            echo $query;
        }
    }

?>