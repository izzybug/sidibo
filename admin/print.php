<?php include('../includes/config.php') ?>

<?php

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Informasi Data.xls");

// Define the SQL query based on the id parameter
$sqlQuery = "SELECT * FROM informasiData";

$result = mysqli_query($conn, $sqlQuery);

if ($result > 0) {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            h2 {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <center>
            <h2>INFORMASI  DATA</h2>
        </center>
        <br>
        <table>
            <tr>
                <th width='1%'>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Pendidikan Terakhir</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>Hasil Deteksi</th>
            </tr>";

    $no = 1;
    while ($data = mysqli_fetch_array($result)) {
        echo "
        <tr>
            <td>{$no}</td>
            <td>{$data['nama']}</td>
            <td>{$data['jenisKelamin']}</td>
            <td>{$data['umur']}</td>
            <td>{$data['pendTerakhir']}</td>
            <td>{$data['pekerjaan']}</td>
            <td>{$data['alamat']}</td>
            <td>{$data['hasilDeteksi']}</td>
        </tr>";
        $no++;
    }

    echo "
        </table>
    </body>
    </html>";
}
?>