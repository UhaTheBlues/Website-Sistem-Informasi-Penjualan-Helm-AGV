<?php
require_once 'db.php';

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
        $sql = "insert into datahelm(tipehelm, harga, ukuran, status)
        values('".$tipehelm."', '".$harga."','".$ukuran."', '".$status."')";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <!-- Sweet Alert Jika Berhasil Tambah Data -->
    <?php if (isset($succesMsg)) { ?>
        <script>                
            swal("Data Berhasil Ditambahkan")
            .then(() => {
                window.history.go(-1)
            });
        </script>
    <?php } ?>
    <!-- Sweet Alert Jika Tidak Berhasil Tambah Data -->
    <?php if (isset($errorMsg)) { ?>
        <script>                
            swal("Mohon Lengkapi Data")
            .then(() => {
                window.history.go(-1)
            });
        </script> 
    <?php } ?>

</body>
</html>