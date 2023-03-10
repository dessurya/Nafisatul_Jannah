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
    $query = mysqli_query(openConn(), "SELECT * FROM pendaftaran ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)){ $data[] = $row; }
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
        <a href="admin-data-event.php" class="btn btn-primary">Data Event</a>
        <hr>
        <h1>Data Pendaftar</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>nama</th>
                    <th>email</th>
                    <th>tanggal lahir</th>
                    <th>event</th>
                    <th>event date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tanggal_lahir']; ?></td>
                        <td><?php echo $row['event']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>