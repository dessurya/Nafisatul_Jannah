<?php
    if(session_id() == '') { session_start(); }
    $redirect =false;
    if (!isset($_SESSION['userLog'])) {
        $redirect =true;
        $pesan = 'anda harus login';
        $direct = 'admin-login.php';
    }

    include('open-conn.php');

    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $info = $_POST['info'];
        $id = $_POST['id'];
        if ($id == '' or $id == null) {
            mysqli_query(openConn(), "INSERT INTO `event`
            (nama,tanggal,info)
            VALUES ('$nama','$tanggal','$info')");
            $pesan = 'berhasil menambahkan event';
        } else{
            mysqli_query(openConn(), "UPDATE `event`
            SET nama='$nama',tanggal='$tanggal',info='$info'
            WHERE id = $id");
            $pesan = 'berhasil menubah event';
        }
        $redirect = true;
        $direct = 'admin-data-event.php';
    }else{
        $data = [];
        $query = mysqli_query(openConn(), "SELECT * FROM `event` ORDER BY id DESC");
        while ($row=mysqli_fetch_array($query)){ $data[] = $row; }
    
        $title = 'Add Event';
        $event = [
            'nama' => null, 'tanggal' => null, 'id' => null, 'info' => null, 
        ];
    
        if (isset($_GET['action'])) {
            $getId = $_GET['id'];
            if ($_GET['action'] == 'edit') {
                $query = mysqli_query(openConn(), "SELECT * FROM `event` WHERE id = $getId");
                $event=mysqli_fetch_array($query);
                $title = 'Update Event '.$event['nama'];
            }else if ($_GET['action'] == 'hapus') {
                $query = mysqli_query(openConn(), "DELETE FROM `event` WHERE id = $getId");
                $pesan = 'berhasil menghapus event';
                $redirect = true;
                $direct = 'admin-data-event.php';
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
    <title>Admin Area - Data Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</head>
<body class="pt-2 pb-2">
    <?php if ($redirect == true) { ?>
    <script>
        alert('<?php echo $pesan; ?>')
        window.location.href = "<?php echo $direct; ?>";
    </script>
    <?php } ?>

    <div class="container">
        <a href="admin-logout.php" class="btn btn-primary">logout</a>
        <a href="admin-data-pendaftar.php" class="btn btn-primary">Data Pendaftar</a>
        <hr>
        <h1>Data Event</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>nama</th>
                    <th>tanggal</th>
                    <th>info</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['info']; ?></td>
                        <td>
                            <a href="admin-data-event.php?action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="admin-data-event.php?action=hapus&id=<?php echo $row['id'] ?>" class="btn btn-primary">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?></h5>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10"><input required value="<?php echo $event['nama']; ?>" type="text" name="nama" class="form-control" id="nama"></div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10"><input required value="<?php echo $event['tanggal']; ?>" type="date" name="tanggal" class="form-control" id="tanggal"></div>
                    </div>
                    <div class="mb-3 row">
                        <label for="info" class="col-sm-2 col-form-label">Info</label>
                        <div class="col-sm-10"><input value="<?php echo $event['info']; ?>" type="text" name="info" class="form-control" id="info"></div>
                    </div>
                    <div class="mb-3 row">
                        <input type="hidden" name="id" value="<?php echo $event['id'] ?>">
                        <button class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>