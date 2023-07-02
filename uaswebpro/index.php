<?php
    session_start();
    error_reporting(0);
    include 'koneksi.php';
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="stylesheet" href="assets/css/shared/iconly.css">

    <style>
        .center{
            text-align: center;
        }
        .benner{
            width: 100%;
            height: 100vh;
            background-image: url("img/2.png");
            background-repeat: repeat;
            /* background-color: #E3F3F5; */
            background-size: cover;
            background-position-y: -100px;
            text-align: center;
        }
        .side{
            padding-top: 25vh;
            color: #fff;
            
        }
        .side h1{
            font-size: 55px;
            padding-bottom: 20px;
        }
        .side p{
            color: #001 !important;
            font-size: 20px;
            padding-bottom: 20px;
        }
        .kotak{
            width: 70%;
            height: 100vh;
            
        }
        .tb{
            background-color: #E3F3F5;
        }
        .right{
            text-align: right;
            
        }
        .right a{
            font-size:1.2rem;
        }
        .ktk{
            padding-top: 15vh;
        }
        
    </style>
</head>

<body>
    <div id="app">
        <div class="benner mb-5">
            <nav class="pt-4 pe-5 right">
                <a class="" href="logout.php"><b>Logout</b></a>
            </nav>
            <div class="side">
                <h1 class="color-primary">Hai! <?php echo ucwords($_SESSION['data']['nama']); ?></h1>
                <p class="color-primary">Tulis kritik dan saranmu di bawah!</p>
                <a href="#addsaran" class="btn btn-primary">Buat kritik dan saran</a>
            </div>
        </div>


        <div class="container kotak mb-5 pb-5" id="addsaran">
        <div class="ktk">
            
            <div class="page-heading center">
                <h3 class="mb-4">Buat Kritik dan Saran anda</h3>
                <p>Kritik dan saran yang konstruktif merupakan langkah awal dalam memperbaiki dan meningkatkan kualitas pendidikan di kampus. Dengan adanya kolaborasi antara mahasiswa, dosen, dan pihak administrasi, kita dapat menciptakan kampus yang inspiratif, inovatif, dan memberikan kontribusi yang lebih besar pada masyarakat dan bangsa.</p>
            </div>

            <div class="page-content form-saran">
                <section class="section">
                    <div class="container">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" method="index.php" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row" >
                                                <div>
                                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Ajukan kritik dan saran anda</label>
                                                </div>
                                                <div class=" form-group">
                                                    <textarea id="saran" name="saran" class="form-control" rows="5" required placeholder="Ketik disini" value=""></textarea>
                                                </div>
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" name="kirimsaran" class="btn btn-primary me-1 mb-1">Kirim</button>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['kirimsaran'])){
                                        $id_mahasiswa = $_SESSION['data']['id_mahasiswa'];
                                        $tgl_saran = date('Y-m-d');
                                        $isi_saran = $_POST['saran'];

                                        $query = "INSERT INTO tb_saran VALUES(null, '$id_mahasiswa', '$tgl_saran', '$isi_saran')";
                                        $sql = mysqli_query($koneksi, $query);

                                        if($sql){
                                            echo "<script>alert('Data berhasil ditambahkan')</script>";
                                            echo "<script>location: 'index.php?#addsaran';</script>";
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

        <div class="tb" id="table">
            <div class="container pt-5 pb-5">
                <div class="page-heading center">
                    <h3>Daftar Kritik dan Saran Anda</h3>
                </div>

                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Tanggal Saran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM tb_saran INNER JOIN tb_mahasiswa ON tb_saran.id_mahasiswa=tb_mahasiswa.id_mahasiswa WHERE tb_saran.id_mahasiswa='".$_SESSION['data']['id_mahasiswa']."' ORDER BY tb_saran.id_saran DESC";
                                        $sql = mysqli_query($koneksi, $query);
                                        $no = 0;
                                        while($result = mysqli_fetch_assoc($sql)){
                                    ?>
                                        <tr>
                                        <th><?php echo ++$no ?>.</th>
                                        <td><?php echo $result['nama']?></td>
                                        <td><?php echo $result['nim']?></td>
                                        <td><?php echo $result['tgl_saran']?></td>
                                        <td><a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail<?php echo $result['id_saran'] ?>">Detail</a> 
                                        <a href="hapussaran.php?hapus=<?php echo $result['id_saran'] ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini???')"><i class="fa-solid fa-user-xmark"></i>&nbsp;Del</a>
                                        </td>

                                        <!--Basic Modal -->
                                        <div class="modal fade text-left" id="detail<?php echo $result['id_saran'] ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Detail Saran</h5>
                                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nana : <?php echo $result['nama']; ?></p>
                                                        <p>NIM : <?php echo $result['nim']; ?></p>
                                                        <p>Tanggal Saran : <?php echo $result['tgl_saran']; ?></p>
                                                        <p>Isi Saran : <?php echo $result['isi_saran']; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <footer data-aos="fade-up" data-aos-duration="1000" class="text-white text-center text-lg-start bg-dark">
            <div class="text-center p-3" style="background-color: #25396f;">
                © 2020 Copyright: Made Landiva
            </div>
        </footer>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>
