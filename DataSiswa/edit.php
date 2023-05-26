<?php
    include 'lib/library.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nis = $_POST['NIS'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $kelas = $_POST['id_kelas'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $golongan_darah = $_POST['golongan_darah'];
        $nama_ibu = $_POST['nama_ibu'];
        $file = $_POST['foto'];

        $foto = $_FILES['foto'];


            if(!empty($foto) && $foto['eror'] == 0 ) {
                $path = './asset/';
                $upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

                if (!$upload) {
                    flash('eror', "Upload File gagal!");
                    header('location:index.php');
                }
                $file = $foto['name'];
        }


        $sql = "UPDATE siswa SET NIS = '$nis', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', id_kelas = '$kelas', jurusan = '$jurusan', alamat = '$alamat', golongan_darah = '$golongan_darah', nama_ibu = '$nama_ibu', file = '$file' WHERE NIS = '$nis'";

        $mysqli->query($sql) or die ($mysqli->error);

        header('location: index.php');
    }

    $nis = $_GET['nis'];

    if(empty($nis)) header('location: index.php');

    $dataKelas = $mysqli -> query("SELECT * FROM kelas") or die($mysqli->error);

    $sql = "SELECT * FROM siswa WHERE NIS = '$nis'";
    $query = $mysqli->query($sql);
    $siswa = $query->fetch_array();

    if(empty($siswa)) header('location: index.php');

    include 'Views/v_tambah.php';
?>


