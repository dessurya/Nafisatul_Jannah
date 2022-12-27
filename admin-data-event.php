<?php
    if(session_id() == '') { session_start(); }
    $redirect =false;
    if (!isset($_SESSION['userLog'])) {
        $redirect =true;
        $pesan = 'anda harus login';
        $direct = 'admin-login.php';
    }

    include('open-conn.php');
    $data = [];
    $query = mysqli_query(openConn(), "SELECT * FROM `event` ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)){ $data[] = $row; }

    $title = 'Add Event';
    $event = [
        'name' => null, 'tanggal' => null, 'id' => null, 'info' => null, 
    ];
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
                            <a href="admin-data-event.php?action=editid=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="admin-data-event.php?action=hapusid=<?php echo $row['id'] ?>" class="btn btn-primary">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admin Login</h5>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10"><input type="email" name="email" class="form-control" id="staticEmail"></div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10"><input type="password" name="password" class="form-control" id="staticPassword"></div>
                    </div>
                    <div class="mb-3 row">
                        <button class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>