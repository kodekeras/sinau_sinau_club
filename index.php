<?php
//   include_once "database.php";
//   include_once "siswa.php";
//
//   $database = new Database();
//   $db = $database->getConnection();
//
//   $siswa = new Siswa($db);
//
//   //query Product
//   $stmt = $siswa->readAll();
//   $num = $stmt->rowCount();
// ?>

<h1>Sekolahan</h1>

<a href="tambah.php">Input Data</a>
<?php
  require "siswa.php";
  $sis = new siswa();
  if (isset($_GET['hapus'])) {
    $del = $sis->hapus($_GET['hapus']);
    echo "Data berhasil di hapus";
  }
?>
<table border="1">
  <tr>
    <th>No.</th>
    <th>NISN</th>
    <th>Nama</th>
    <th>TTL</th>
    <th>Alamat</th>
    <th>Agama</th>
    <th>No HP</th>
    <th>Kelas</th>
    <th>Foto</th>
    <th>Aksi</th>
  </tr>
  <?php
    $tampil = $sis->tampildata();
    $no = 0;
    while ($data = $tampil->fetch(PDO::FETCH_OBJ)) {
    $no++;
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $data->id_siswa; ?></td>
    <td><?php echo $data->nama; ?></td>
    <td><?php echo $data->tpt_l; ?></td>
    <td><?php echo $data->alamat; ?></td>
    <td><?php echo $data->agama; ?></td>
    <td><?php echo $data->no_hp; ?></td>
    <td><?php echo $data->kelas; ?></td>
    <td><?php echo $data->foto; ?></td>
    <td>
      <a href="index.php?hapus=<?php echo $data->id_siswa;?>">Hapus</a>||
      <a href="edit.php?id=<?php echo $data->id_siswa;?>">Ubah</a>
    </td>
  </tr>
  <?php } ?>
</table>
