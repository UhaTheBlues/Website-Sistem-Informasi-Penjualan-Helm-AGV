<?php
  include('db.php');   
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AGV Helm</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Sweet Alert-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
    </head>
    <body id="page-top">
        <!-- Sweet Alert Jika Password salah -->
        <?php if (isset($error)) { ?>
            <script>                
                swal("Username atau Password yang ada masukan salah!");
            </script>
        <?php } ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">AGV Helm</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#galleri">Galleri Helm</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#listharga">List Harga</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#infopemesanan">Info Pemesanan</a></li>
                    </ul>
                </div> 
            </div>
        </nav>
        <!-- Masthead-->
        
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets\img\helm\agvlogo.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">AGV Helm</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Sistem Informasi Helm AGV</p>
            </div>
        </header>
      
        <!-- Galleri Section-->
        <section class="page-section galleri" id="galleri">
            <div class="container">
                <!-- Galleri Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Galleri Helm AGV</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Galleri Grid Items-->
                <div class="row justify-content-center">
                    <?php
                    $sql="select * from datamodal order by id asc";
                    $hasilDataModal=mysqli_query($conn,$sql);         
                    while ($data = mysqli_fetch_array($hasilDataModal)) { ?>
                        <!-- Galleri Item-->
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="galleri-item mx-auto" data-bs-toggle="modal" data-bs-target="#galleriModal<?php echo $data["id"];?>">
                                <div class="galleri-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="galleri-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?php echo $data["img"];?>" alt="..." />
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>   
            </div>
        </section>
        <!-- List Harga Section-->
        <section class="page-section bg-primary text-white mb-0" id="listharga">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">List Harga Helm AGV</h2>
                                    <div class="card-body"> 
                                        <table id="example" class="table table-striped " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Tipe Helm</th>
                                                    <th>Harga Helm</th>
                                                    <th>Ukuran</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            include('db.php');
                                            $batas   = 10;
                                            $halaman = @$_GET['halaman'];
                                                if(empty($halaman)){
                                                    $posisi  = 0;
                                                    $halaman = 1;
                                                }
                                                else{
                                                    $posisi  = ($halaman-1) * $batas;
                                                }

                                            $id = $posisi+1;
                                            $sql="select * from datahelm order by id asc limit $posisi,$batas";
                                            $hasil=mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                ?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $data["tipehelm"];   ?></td>
                                                <td><?php echo "Rp".number_format($data["harga"], 0, '', '.');   ?></td>
                                                <td><?php echo $data["ukuran"];   ?></td>
                                                <td><?php echo $data["status"];   ?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                                $id++;
                                            }
                                            ?>
                                        </table>
                                            <hr>
                                            <?php
                                                $query2     = mysqli_query($conn, "select * from datahelm");
                                                $jmldata    = mysqli_num_rows($query2);
                                                $jmlhalaman = ceil($jmldata/$batas);
                                            ?>
                                            
                                            <ul class="pagination">
                                                <?php
                                                for($i=1;$i<=$jmlhalaman;$i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link' href='index.php?halaman=$i#listharga'>$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                                                    }
                                                }
                                                ?>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Info Pemesanan Section-->
        <section class="page-section" id="infopemesanan">
            <div class="container">
                <!-- Info Pemesanan Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Info Pemesanan</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Info Pemesanan Section Form-->
                
            <div class="row icon-boxes">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="https://wa.me/62816732457" target="_blank" class="icon-box">
                        <div class="icon"><i class="fa fa-whatsapp"></i></div>
                        <h4 class="title">Whats App</h4>
                    </a>
           
                    <a href="https://www.instagram.com/raditya.c.s/" target="_blank" class="icon-box">
                        <div class="icon"><i class="fa fa-instagram"></i></div>
                        <h4 class="title">Instagram</h4>
                    </a>
                </div>
            </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            Perumahan Wahana Pondok Gede
                            <br />
                            Blok B3 no 22
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Social Media</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/raditya.c.s/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/adiet.race" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/raditya_cs" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Raditya C.S 2022</small></div>
        </div>
        <?php
            $sql="select * from datamodal order by id asc";
            $hasilDataModal=mysqli_query($conn,$sql);         
            while ($data = mysqli_fetch_array($hasilDataModal)) { ?>

            <div class="galleri-modal modal fade" id="galleriModal<?php echo $data["id"];?>" tabindex="-1" aria-labelledby="galleriModal<?php echo $data["id"];?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Galleri Modal - Title-->
                                        <h2 class="galleri-modal-title text-secondary text-uppercase mb-0"><?php echo $data["title"];?></h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Galleri Modal - Image-->
                                        <img class="img-fluid rounded mb-5" src="<?php echo $data["img"];?>" alt="..." />
                                        <!-- Galleri Modal - Text-->
                                        <p class="mb-4"><?php echo $data["deskripsi"];?></p>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">
                                            <i class="fas fa-xmark fa-fw"></i>
                                            Close Window
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
      
      
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
