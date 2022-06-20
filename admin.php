<?php
    session_start();
    require_once 'db.php';
    
    if (!isset($_SESSION['user_logged_in'])) {
        header('Location:index.php');
    }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>AGV Helm</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <!-- Sweet Alert Jika Berhasil Tambah Data -->
    <?php if (isset($succesMsg)) { ?>
        <script>                
            swal("Data Berhasil Ditambahkan");
        </script>
    <?php } ?>
    <!-- Sweet Alert Jika Tidak Berhasil Tambah Data -->
    <?php if (isset($errorMsg)) { ?>
        <script>                
            swal("Mohon Lengkapi Data");
        </script>
    <?php } ?>
   
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto"></ul>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">List Helm AGV</h2>
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Barang  <i class="fa fa-plus"></i></a>
                  <a class="btn btn-outline-danger" href="logout.php">Kembali ke Index  <i class="fa fa-sign-out-alt"></i></a>
                </div>
              </div>
                <div class="card-body">
                  <table id="example" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th>Tipe Helm</th>
                            <th>Harga Helm</th>
                            <th>Ukuran</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                   
                    $batas   = 5;
                    $halaman = @$_GET['halaman'];
                        if(empty($halaman)){
                            $posisi  = 0;
                            $halaman = 1;
                        }else{
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
                          <td>
                              <a href="edit.php?id=<?php echo $data['id'] ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                              <a href="delete.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete barang ini?')"><i class="fa fa-trash-alt"></i></a>
                          </td>
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
                      echo "<li class='page-item'><a class='page-link' href='admin.php?halaman=$i'>$i</a></li>";
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
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header border-0">
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="" action="tambah.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="tipehelm">Tipe Helm</label>
                      <input type="text" class="form-control" name="tipehelm"  placeholder="masukan tipe helm" value="">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="number" class="form-control" name="harga" placeholder="masukan harga helm" value="">
                          <div class="input-group-append">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="ukuran">Ukuran</label>
                      <input type="text" class="form-control" name="ukuran"  placeholder="masukan ukuran helm" value="">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Ready" checked>
                        <label class="form-check-label" for="status">
                          Ready
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Sold Out">
                        <label class="form-check-label" for="status">
                          Sold Out
                        </label>
                      </div>
                    </div>
                    <br>
              </div>
              <div class="modal-footer">
                  <input name="Submit" type="Submit" value="Tambah Data" class="btn btn-primary btn-block">
              </div>
              </form>
          </div>
      </div>
    </div>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
  </body>
</html>
