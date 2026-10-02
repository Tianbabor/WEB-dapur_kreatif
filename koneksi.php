<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "dapur_kreatif"
);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>