<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Data</title>
  </head>
  <body>

    <?php

      function generateNisn($length = 15)
      {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
      }
      $nisn = generateNisn();

      require "siswa.php";
      if (isset($_POST['simpan'])) {
        $id    = $nisn;
        $nama  = $_POST['nama'];
        $tpt   = $_POST['tpt'];
        $tgl   = $_POST['tgl'];
        $agama = $_POST['agama'];
        $hp    = $_POST['hp'];
        $kelas = $_POST['kelas'];
        $almt  = $_POST['alamat'];
        $foto  = $_POST['foto'];

        $sis = new siswa();

        $tambah = $sis->tambahdata($id, $nama, $tpt, $tgl, $almt, $agama, $hp, $kelas, $foto);
        if ($tambah) {
          header('Location:index.php');
        } else{
          echo "Gagal Simpan!";
        }
      }
    ?>

    <h1>Tambah Data</h1>
    <form class="" action="tambah.php" method="post">
      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama"></td>
        </tr>
        <tr>
          <td>Tmpt/Tgl Lahir</td>
          <td>:</td>
          <td><input type="text" name="tpt"> / <input type="date" name="tgl"></td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td>
            <select class="" name="agama">
              <option value="islam">Islam</option>
              <option value="kristen">Kristen</option>
              <option value="hindu">Hindu</option>
              <option value="budha">Budha</option>
              <option value="konghucu">Konghucu</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>No HP</td>
          <td>:</td>
          <td><input type="number" name="hp"></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td><input type="text" name="kelas"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>
            <textarea name="alamat" rows="8" cols="80"></textarea>
          </td>
        </tr>
        <tr>
          <td>Foto</td>
          <td>:</td>
          <td><input type="text" name="foto"></td>
        </tr>
      </table>
      <input type="submit" name="simpan" value="Simpan">
      <input type="reset" name="" value="Reset">
    </form>
  </body>
</html>
