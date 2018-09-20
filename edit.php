<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Data</title>
  </head>
  <body>
    <?php
      require "siswa.php";
      $id = $_GET['id'];
      $sis  = new siswa();
      $bio  = $sis->editSiswa($id);
      $edit = $bio->fetch(PDO::FETCH_OBJ);
    ?>
    <h2>Edit Data</h2>
    <form class="" action="edit.php" method="post">
      <center>
        <table>
          <input type="hidden" name="id" value="<?php echo $edit->id_siswa; ?>">
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $edit->nama; ?>"></td>
          </tr>
          <tr>
            <td>Tmpt/Tgl Lahir</td>
            <td>:</td>
            <td><input type="text" name="tpt" value="<?php echo $edit->tpt_l; ?>"> / <input type="date" name="tgl" value="<?php echo $edit->tgl_l; ?>"></td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
              <input type="text" name="agama" value="<?php echo $edit->agama; ?>">
            </td>
          </tr>
          <tr>
            <td>No HP</td>
            <td>:</td>
            <td><input type="number" name="hp" value="<?php echo $edit->no_hp; ?>"></td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="kelas" value="<?php echo $edit->kelas; ?>"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
              <textarea name="alamat" rows="8" cols="80">
                <?php echo $edit->alamat; ?>
              </textarea>
            </td>
          </tr>
          <tr>
            <td>Foto</td>
            <td>:</td>
            <td><input type="text" name="foto" value="<?php echo $edit->foto; ?>"></td>
          </tr>
          <tr>
            <td><input type="submit" name="updatesiswa" value="Simpan"></td>
          </tr>
        </table>
      </center>
    </form>
  </body>
</html>

<?php
  if (isset($_POST['updatesiswa'])) {
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $tpt    = $_POST['tpt'];
    $tgl    = $_POST['tgl'];
    $agama  = $_POST['agama'];
    $hp     = $_POST['hp'];
    $kelas  = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $upd = $sis->updateSiswa($id, $nama, $tpt, $tgl, $agama, $alamat, $hp, $kelas);

    if ($upd) {
      header('Location: index.php');
    }
  }
?>
