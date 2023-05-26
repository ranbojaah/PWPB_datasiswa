<?php
  include 'lib/library.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $nis = $_POST ['NIS'];
      $nama_lengkap = $_POST ['nama_lengkap'];
      @$jenis_kelamin = $_POST ['jenis_kelamin'];
      $kelas = $_POST['id_kelas'];
      $jurusan = $_POST['jurusan'];
      $alamat = $_POST['alamat'];
      $golongan_darah = $_POST['golongan_darah'];
      $nama_ibu = $_POST['nama_ibu'];
      $foto =$_FILES['foto'];

      if (empty($nis)) {
        flash('error', 'Mohon masukan NIS dengan benar!');
    } else if (empty($nama_lengkap)) {
        flash('error', 'Mohon masukan Nama Lengkap dengan benar!');
    } else{
        if (!empty($foto) AND $foto['error'] == 0) {
        $path = './asset/';
        $upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

             // Check file size
        if ($foto["size"] > 3000000) {
            flash("alert", "warning", "Ukuran file melebihi batas 3mb");
            header('location: index.php');
            return;
        }

        if (!$upload) {
            flash("alert", "error", "upload file gagal");
            header('location: index.php');
            return;
        } 
        $file = $foto['name'];

    }

      $sql = "INSERT INTO siswa (NIS, nama_lengkap, jenis_kelamin, id_kelas, jurusan, alamat, golongan_darah, nama_ibu, file) VALUES
      ('$nis', '$nama_lengkap', '$jenis_kelamin', '$kelas', '$jurusan', '$alamat', '$golongan_darah', '$nama_ibu', '$file')";

      $mysqli -> query($sql) or die ($mysqli -> error);

      header('location: index.php');
  }
  }
    $success = flash('success');
    $error = flash('error');
     //ambil data kelas
     $sql = "SELECT * FROM kelas";
     $dataKelas = $mysqli->query($sql) or die($mysqli->error);
  include 'views/v_tambah.php';
?>

