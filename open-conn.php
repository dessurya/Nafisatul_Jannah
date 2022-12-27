<?php

function openConn()
{
    $conn = mysqli_connect('localhost', 'root', '', 'db_test') or die("<h2 align=\"center\">Gagal mengakses database db_test</h2>");
    return $conn;
}