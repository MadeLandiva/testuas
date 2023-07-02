<?php
    session_start();
    include 'koneksi.php';

    $nama = '';
    $nidn = '';
    $matkul = '';

    if(isset($_GET['tambah'])){
        $id_dosen = $_GET['tambah'];

        $query = "SELECT * FROM tb_dosen WHERE id_dosen = '$id_dosen';";
        $sql = mysqli_query($koneksi, $query);
       

        $result = mysqli_fetch_assoc($sql);

        $nama = $result['nama'];
        $nidn = $result['nidn'];
        $matkul = $result['matkul'];

        echo $id_dosen;
    }
?>




<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Saran</title>
    
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    
    <link rel="stylesheet" href="assets/css/shared/iconly.css">

</head>

<body>
    <div id="app">
        <div id="main">

            
            <div class="page-heading">
                <h3>Masukkan Kritik dan Saran anda</h3>
            </div>

            <div class="page-content">
                <section class="section">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambahkan Data</h4>
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="proses.php" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div>
                                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Kkritik dan Saran</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea id="saran" name="saran" class="form-control" rows="5" required placeholder="Masukkan kritik dan saran" value=""></textarea>
                                                </div>
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    
                                                    <button type="submit" name="kirimsaran" class="btn btn-primary me-1 mb-1">Kirim</button>
                                                    
                                                    <a href="index.php" type="button" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['kirimsaran'])){
                                        echo
                                        $id_mahasiswa = $_SESSION['data']['id_mahasiswa'];
                                        $namamhs = $_SESSION['data']['nama'];
                                        $tgl = date('Y-m-d');
                                        $saran = $_POST['saran'];

                                        $query = "INSERT INTO tb_saran VALUES(NULL, '$id_dosen', '$id_mahasiswa', '$tgl',  '$saran')";
                                        $sql = mysqli_query($koneksi, $query);

                                        echo $sql;
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
                                            header("location: index.php");
                                        }else {
                                            echo $query;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>


</body>

</html>
