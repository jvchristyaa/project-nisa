<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Asisten Dosen</title>
</head>
<body>
<article>
        <div class="container">
            <h1>Daftar Asisten Praktikum</h1>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas Praktikum</th>
                    <th scope="col">IPK</th>
                  </tr>
                </thead> 
                <tbody>
                <?php  $db = \Config\Database::connect();
                       $query = $db->query('Select * from asisten');

                       $row = $query->getRow();
                       foreach ($query->getResult('array') as $row) {
                            if (isset($row)) {?>
                                <tr>
                                <td><?php echo $row['NIM']; ?></td>
                                <td><?php echo $row['NAMA']; ?></td>
                                <td><?php echo $row['PRAKTIKUM']; ?></td>
                                <td><?php echo $row['IPK']; ?></td>
                                </tr>
                    <?php  } }?>
                </tbody>
              </table>
        </div>
        
    </article>
</body>
</html>