<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Tugas</title>
    <style>
        /* table,
        th,
        td {
            border: 1px solid black;
        } */
        body{
            margin: 0;
            padding: 0;
        }
        h3{
            padding: 10px;
            background-color: rgb(255, 218, 5);
            padding-left: 50px;
        }
        .data-table{
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <?php
    $j = file_get_contents('data.json');
    $data = json_decode($j, true);
    // echo $data['tanggal_lahir'];
    ?>

    <section class="header">
        <div class="content">
            <h3>Daftar Nilai</h3>
        </div>
    </section>
    <section class="data-table">
        <div class="cotent">
            <div class="container" style="max-width: 60%">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Nilai</th>
                        <th>Hasil</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($data as $d) {
                        $str = substr($d['tanggal_lahir'], 0, 4);
                        $int = (int)$str;
                        $umur = date('Y') - $int;
                        $tg = $d['tanggal_lahir'];
                        $tgl = date('d F Y', strtotime($tg));

                        echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $d['nama'] . "</td>
                    <td>" . $tgl . "</td>
                    <td>" . $umur . "Tahun " . "</td>
                    <td>" . $d['alamat'] . "</td>
                    <td>" . $d['kelas'] . "</td>
                    <td>" . $d['nilai'] . "</td>";
                        echo "<td>";
                        if ($d['nilai'] <= 70) {
                            echo "D";
                        } elseif ($d['nilai'] <= 80) {
                            echo "C";
                        } elseif ($d['nilai'] <= 90) {
                            echo "B";
                        } elseif ($d['nilai'] <= 100) {
                            echo "A";
                        } else {
                            echo "Kategori Nilai Tidak Ditemukan";
                        }
                        "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

</body>

</html>