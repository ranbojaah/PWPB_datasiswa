<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Isi Data</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<?php
  $action = 'tambah.php';
  if (!empty($siswa)) $action = 'edit.php';
?>
<div id="text" class="d-flex justify-content-center mb-2">
  <h1>Isi Data</h1>
</div>

<?php if (!empty($success)) { ?>
  <div class="alert alert-success">
    <p><?= $success ?></p>
  </div>
  <?php } ?>

  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger">
      <?= $error?>
    </div>
    <?php } ?>
<div id="jarak" class="d-flex justify-content-center">
  <div class="table-responsive">
      <form action="<?= $action?>" method = "POST" enctype="multipart/form-data">
        <table border="1" class="table bg-info-subtle table-striped" style="width: 400px">
          <tr>
              <td>NIS</td>  
              <td><input type="text" name="NIS" value="<?= @$siswa['NIS']?> "></td>
          </tr>
          <tr>
              <td>Nama Lengkap</td> 
              <td><input type="text" name="nama_lengkap" value="<?= @$siswa['nama_lengkap']?>"></td>
          </tr>
          <tr>
              <td> Jenis Kelamin</td>
              <td>
                  <input type="radio" name="jenis_kelamin" value="L" <?= @$siswa['jenis_kelamin'] == 'L' ? 'checked': ''?>>Laki-Laki
                  <input type="radio" name="jenis_kelamin" value="P" <?= @$siswa['jenis_kelamin'] == 'P' ? 'checked': ''?>>Perempuan
              </td>
          </tr>
          <tr>
              <td><label for="kelas">Kelas</label></td>
              <td> 
                  <select name="id_kelas" class="select1">
                    
                     <option value="">Pilih Kelas</option>
                          <?php while ($murid = @$dataKelas->fetch_array()) { ?>
                            <option value="<?php echo $murid['id_kelas'] ?>"><?php echo @$siswa['id_kelas'] === $murid['id_kelas'] ? 'selected' : ''?>
                              <?php echo $murid['nama_kelas'] ?>
                            </option>
                          <?php } ?>	
                  </select>
              </td>
          </tr>
          <tr>
              <td>Jurusan </td>
              <td><input type="text" name="jurusan" value= "<?= @$siswa['jurusan']?>"> </td>
          </tr>
          <tr>
              <td>Alamat</td> 
              <td><input type="text" name="alamat" value= "<?= @$siswa['alamat']?>"></td>
          </tr>
          <tr>
              <td>Golongan Darah</td>
              <td> 
                <select name="golongan_darah">
                    <option value="A" <?= @$siswa ['golongan_darah'] == 'A' ? 'selected' : ''?>>A</option>
                    <option value="B" <?= @$siswa ['golongan_darah'] == 'B' ? 'selected' : ''?>>B</option>
                    <option value="AB" <?= @$siswa ['golongan_darah'] == 'AB' ? 'selected' : ''?>>AB</option>
                    <option value="O" <?= @$siswa ['golongan_darah'] == 'O' ? 'selected' : ''?>>O</option>
                </select>
              </td>
          </tr>
          <tr>
              <td>Nama Ibu Kandung</td> 
              <td><input type="text" name="nama_ibu" value="<?= @$siswa['nama_ibu']?>"></td>
          </tr>
          <tr>
              <td>Foto</td>
              <td>
              <?php if (@$form == "edit.php") { ?>
              <img src="asset/<?= @$siswa['file']? $siswa['file']: default_picture.jpg ?>" width="50px" height="50px">
              <input type="hidden" name="foto" value="<?= @$siswa['file']?>">
              <?php } ?>
              <input type="file" name="foto" accept="image/*">
              </td>
          </tr>
          <tr>
              <td colspan="2">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info text-light">Submit</button>
                </div>          
              </td>
          </tr>
        </table>
      </form>
  </div>
</div>
</body>
</html>