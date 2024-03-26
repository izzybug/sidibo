<?php

// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','siparti');

// $conn = mysqli_connect('localhost','root','','siparti');

// // Establish database connection.
// try
// {
// $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
// }
// catch (PDOException $e)
// {
// exit("Error: " . $e->getMessage());
// }

?>

<?php
$host = "adimsaraf-do-user-14642497-0.c.db.ondigitalocean.com";
$port = "25060";
$database = "simdefraf";
$username = "doadmin";
$password = "AVNS_LRtarBbfNBHfTE5S_iZ";

// Membuat koneksi MySQLi
$conn = mysqli_connect($host, $username, $password, $database, $port);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi ke database MySQLi gagal: " . mysqli_connect_error());
}

// PDO (yang sudah ada)
try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$database;sslmode:require", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database MySQL PDO gagal: " . $e->getMessage();
}
?>
