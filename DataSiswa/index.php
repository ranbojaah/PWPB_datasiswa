<?php
  include 'lib/library.php';

  $sql = 'SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas';


  //searching
  $search = @$_GET['search'];
  if (!empty($search)) $sql .=" WHERE NIS LIKE '%$search%' OR nama_lengkap LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR kelas LIKE '%$search%' OR jurusan LIKE '%$search%' OR alamat LIKE '%$search%' OR golongan_darah LIKE '%$search%' OR nama_ibu LIKE '%$search%'";

  //ordering
  $order_field = @$_GET['sort'];
  $order_mode = @$_GET['order'];

  if(!empty($order_field) && !empty($order_mode)) $sql .= " ORDER BY $order_field $order_mode";


  cekLogin();

  $listsiswa = $mysqli -> query($sql);
  include 'views/v_index.php';
?>