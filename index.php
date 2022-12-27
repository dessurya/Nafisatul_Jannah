<?php
    include('open-conn.php');
    $data = [];
    $query = mysqli_query(openConn(), "SELECT * FROM event ORDER BY tanggal DESC");
    while ($row=mysqli_fetch_array($query)){ $data[] = $row; }
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
        <h1>Selamat Datang Di Dashboar Event</h1>
        <div class="row row-cols-3">
            <?php foreach ($data as $key => $row) { ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['tanggal'] ?></h6>
                            <p class="card-text"><?php echo $row['info'] ?></p>
                            <a href="daftar.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>