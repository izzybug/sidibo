<?php include('../includes/config.php') ?>

<?php
require '../vendor/autoload.php';
// Define the SQL query based on the id parameter
// $sqlQuery = "SELECT * FROM informasiData";

// $result = mysqli_query($conn, $sqlQuery);
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'NAMA');
$sheet->setCellValue('C1', 'JENIS KELAMIN');
$sheet->setCellValue('D1', 'UMUR');
$sheet->setCellValue('E1', 'PENDIDIKAN TERAKHIR');
$sheet->setCellValue('F1', 'PEKERJAAN');
$sheet->setCellValue('G1', 'ALAMAT');
$sheet->setCellValue('H1', 'HASIL DETEKSI');
 
$data = mysqli_query($conn,"select * from informasiData");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $d['nama']);
    $sheet->setCellValue('C'.$i, $d['jenisKelamin']);
    $sheet->setCellValue('D'.$i, $d['umur']);
    $sheet->setCellValue('E'.$i, $d['pendTerakhir']);    
    $sheet->setCellValue('F'.$i, $d['pekerjaan']);    
    $sheet->setCellValue('G'.$i, $d['alamat']);    
    $sheet->setCellValue('H'.$i, $d['hasilDeteksi']);    
    $i++;
}
 
$writer = new Xlsx($spreadsheet);
$writer->save('Informasi Data.xlsx');
echo "<script>window.location = 'Informasi Data.xlsx'</script>";
// header("Location: informasi.php");
exit;
?>