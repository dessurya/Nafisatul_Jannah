<?php
    include('open-conn.php');

    if (isset($_POST['event_date'])) {
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $tanggallahir = $_POST['tanggallahir'];
        $alamat = $_POST['alamat'];
        $event = $_POST['event'];
        $event_date = $_POST['event_date'];
        mysqli_query(openConn(), "INSERT INTO pendaftaran ");
    }

    if (!isset($_GET['id'])) {
        echo 'Halaman Tidak ditemuakan!'; die();
    }
    $event = $_GET['id'];
    $query = mysqli_query(openConn(), "SELECT * FROM event WHERE id = $event");
    $event=mysqli_fetch_array($query)
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body class="pt-2 pb-2">

    <div class="container">
        <h1>Pendaftaran</h1>
        <form action="POST">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10"><input type="email" name="email" class="form-control" id="staticEmail"></div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10"><input type="text" name="nama" class="form-control" id="nama"></div>
            </div>
            <div class="mb-3 row">
                <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10"><input type="date" name="tanggallahir" class="form-control" id="tanggallahir"></div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10"><input type="text" name="alamat" class="form-control" id="alamat"></div>
            </div>
            <div class="mb-3 row">
                <input type="hidden" name="event" value="<?php echo $event['nama'] ?>">
                <input type="hidden" name="event_date" value="<?php echo $event['tanggal'] ?>">
                <button class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>