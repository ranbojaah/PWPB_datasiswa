<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Data Siswa</title>
  <!-- TOASTR  -->
    	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
<div style="display: flex; justify-content: space-between; margin-right:10px; margin-left:10px">
  <a class="btn btn-primary bi bi-clipboard2-plus btn-hover mt-3 mb-1.5" href="tambah.php" role="button" title="tambah data"></a>
  <a class="btn btn-danger bi bi-door-open btn-hover mt-3 mb-1.5 " href="logout.php" role="button" title="logout"></a>
</div>
<form action="index.php" method="GET">
  <div class="position-absolute top-0 start-50 translate-middle-x mt-3">
  <a class="btn btn-outline-warning bi bi-arrow-clockwise btn-hover " href="?" role="button" title="reset"></a>
  <input class="mt-2" type="text" name="search" value="<?= @$search?>">
  <button type="submit" class="btn btn-outline-primary bi bi-search btn-hover "></button>
  </div>
</form>
<div id="jarak" class="p-2 mt-3">
<div class="table-responsive">
    <table border = "1" class="table table-striped table-hover">
      <thead>
        <tr class="bg-info text-light">
          <th class="text-center">#</th>
          <th class="text-center">Foto</th>
          <th class="text-center">NIS
            <a href="index.php?sort=NIS&order=asc">▲</a>
            <a href="index.php?sort=NIS&order=desc">▼</a>
          </th>
          <th class="text-center">Nama Lengkap
            <a href="index.php?sort=nama_lengkap&order=asc">▲</a>
            <a href="index.php?sort=nama_lengkap&order=desc">▼</a>
          </th>
          <th class="text-center">Jenis Kelamin
            <a href="index.php?sort=jenis_kelamin&order=asc">▲</a>
            <a href="index.php?sort=jenis_kelamin&order=desc">▼</a>
          </th>
          <th class="text-center">Kelas
            <a href="index.php?sort=kelas&order=asc">▲</a>
            <a href="index.php?sort=kelas&order=desc">▼</a>
          </th>
          <th class="text-center">Jurusan
            <a href="index.php?sort=jurusan&order=asc">▲</a>
            <a href="index.php?sort=jurusan&order=desc">▼</a>
          </th>
          <th class="text-center">Alamat
            <a href="index.php?sort=alamat&order=asc">▲</a>
            <a href="index.php?sort=alamat&order=desc">▼</a>
          </th>
          <th class="text-center">Golongan Darah
            <a href="index.php?sort=golongan_darah&order=asc">▲</a>
            <a href="index.php?sort=golongan_darah&order=desc">▼</a>
          </th>
          <th class="text-center">Nama Ibu Kandung
            <a href="index.php?sort=nama_ibu&order=asc">▲</a>
            <a href="index.php?sort=nama_ibu&order=desc">▼</a>
          </th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
          $i = 1;
          while ($siswa = $listsiswa -> fetch_array()){  
        ?>
        <tr>
          <td class ="bg-info-subtle text-center "><?= $i++?></td>
          <td>
            <img src="<?php echo base_url() ?>/asset/<?= $siswa['file']?>" width="80px" alt="foto">
          </td>
          <td class="text-center"><?= $siswa ['NIS']?></td>
          <td><?= $siswa ['nama_lengkap']?></td>
          <td class="text-center"><?= $siswa ['jenis_kelamin']?></td>
          <td class="text-center"><?= $siswa ['nama_kelas']?></td>
          <td class="text-center"><?= $siswa ['jurusan']?></td>
          <td><?= $siswa ['alamat']?></td>
          <td class="text-center"><?= $siswa ['golongan_darah']?></td>
          <td><?= $siswa ['nama_ibu']?></td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="edit.php?nis=<?= $siswa['NIS'] ?>" class="btn btn-outline-warning bi bi-pencil-square me-2" title="edit"></a>
              <a href="delete.php?nis=<?= $siswa['NIS'] ?>" class="btn btn-outline-danger bi bi-trash3 btnDelete" title="delete"></a>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"></h4>
          </div>
            <div class="modal-body">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary btnYa">Ya</button>
              <button type="button" class="btn btn-danger btnTidak" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    <!-- JS BOOTSTRAP  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
    <!-- JQUERY  -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- JS TOASTR  -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script type="text/javascript">
        $(function() {
            $(".btnDelete").on("click", function(e) {
                e.preventDefault();
                var nama = $(this).parent().parent().parent().children()[3];
                console.log(nama);
                nama = $(nama).html();
                var tr = $(this).parent().parent();

                $(".modal").modal('show');
                $(".modal-title").html('Konfirmasi');
                $(".modal-body").html('Anda yakin ingin menghapus data <b>' + nama + '</b> ?');

                var href = $(this).attr('href');
                $(".btnTidak").on('click',function(){
                $('.modal').modal('hide')
                 })
                $('.modal .btnYa').off()
                $('.modal .btnYa').on('click', function() {
                    $.ajax({
                        'url': href,
                        'type': 'GET',
                        'success': function(data) {
                            if (data == 1) {
                                $('.modal').modal('hide')
                                tr.fadeOut()
                                setTimeout(() => {
                                  location.reload();
                                }, 1000);
                                toastr.success(`Data ${nama} berhasil dihapus`,
                                    'BERHASIL')
                            } else {
                                toastr.error(`Data ${nama} gagal dihapus`, 'GAGAL')
                            }
                        }
                    })
                });
            });
        });
        
    </script>
</body>
</html>