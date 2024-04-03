<?php
include('../includes/config.php');

$sql = "SELECT nama, jenisKelamin, umur, pendTerakhir, pekerjaan, alamat, hasilDeteksi FROM informasiData";
$result = $conn->query($sql);

$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

echo json_encode(array("data" => $data));
?>