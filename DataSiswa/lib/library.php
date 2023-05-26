<?php
include 'lib/helper.php';

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'db_pwbp18';

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

  $mysqli = mysqli_connect ($host, $user, $pass, $db) 
            or die ('Tidak dapat koneksi ke Database');
?>