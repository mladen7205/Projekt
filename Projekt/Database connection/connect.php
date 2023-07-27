<?php
    header('Content-Type: text/html; charset=utf-8');

    $dbc = mysqli_connect("localhost", "root", "", "pwa_projekt") or die("Error connecting to MySQL server! ". mysqli_connect_error());

    mysqli_set_charset($dbc, "utf8");
?>