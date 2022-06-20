<?php
require_once 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from datahelm where id=".$id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }else {
    $errorMsg = 'Could not Find Any Record';
  }
}

if (isset($_POST['Submit'])) {

    $tipehelm = $_POST['tipehelm'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $status = $_POST['status'];
    
    if(empty($tipehelm)){
        $errorMsg = true;
    }elseif(empty($harga)){
        $errorMsg = true;
    }elseif(empty($ukuran)){
        $errorMsg = true;
    }elseif(empty($status)){
      $errorMsg = true;
    }

    if(!isset($errorMsg)){
        $sql = "update datahelm set tipehelm='".$tipehelm."', harga='".$harga."', ukuran='".$ukuran."', status='".$status."' where id=".$id;
        $result = mysqli_query($conn, $sql);
        if($result){
            $succesMsg = true;
        }else{
            $errorMsg = 'Error '.mysqli_error($conn);
        }
    }
}

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
            swal("Data Berhasil Diedit")
            .then(() => {
                window.history.go(-1)
            });
        </script>
    <?php } ?>
    <!-- Sweet Alert Jika Tidak Berhasil Tambah Data -->
    <?php if (isset($errorMsg)) { ?>
        <script>                
            swal("Data Tidak Berhasil Diedit")
            .then(() => {
                window.history.go(-1)
            });
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
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">edit data helm</h2>
            </div>
            <div class="card-body">
              <form class="" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="tipehelm">Tipe Helm</label>
                    <input type="text" class="form-control" name="tipehelm"  placeholder="masukan tipe helm" value="<?php echo $row['tipehelm']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" class="form-control" name="harga" placeholder="masukan harga helm" value="<?php echo $row['harga']; ?>">
                        <div class="input-group-append">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="number" class="form-control" name="ukuran"  placeholder="masukan ukuran helm" value="<?php echo $row['ukuran']; ?>">
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
                    <button type="submit" name="Submit" class="btn btn-primary waves">Edit</button>
              </form>
                    <a class="btn btn-outline-danger" href="admin.php">Kembali <i class="fa fa-sign-out-alt"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>