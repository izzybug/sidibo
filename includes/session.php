<?php
session_start();

// Periksa apakah variabel sesi SESS_MEMBER_ID ada dan tidak kosong
if (!isset($_SESSION['alogin']) || empty($_SESSION['alogin'])) {
    header("Location: ../index.php");
    exit();
}

$session_id = $_SESSION['alogin'];
$session_depart = $_SESSION['arole'];
?>