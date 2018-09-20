<?php
  class siswa{

    public function __construct()
    {
      $this->db = new PDO('mysql:host=localhost; dbname=sekolah', 'root', 'toor');
    }

    public function tambahdata($id, $nama, $tpt, $tgl, $almt, $agama, $hp, $kelas, $foto)
    {
      $sql = "INSERT INTO siswa (id_siswa, nama, tpt_l, tgl_l, alamat, agama, no_hp, kelas, foto) VALUES ('$id', '$nama', '$tpt', '$tgl', '$almt', '$agama', '$hp', '$kelas', '$foto')";
      $query = $this->db->query($sql);
      if (!$query) {
        return "Gagal Masuk";
      }else{
        return "Sukses Masuk";
      }
    }

    public function tampildata(){
      $sql = "SELECT * FROM siswa";
      $query = $this->db->query($sql);
      return $query;
    }

    public function nisn()
    {
      $cari_id = "SELECT max(id_siswa) as kode FROM siswa";
      $query = $this->db->query($cari_id);
      return $query;
    }

    public function hapus($id)
    {
      $sql = "DELETE FROM siswa WHERE id_siswa = '$id'";
      $query = $this->db->query($sql);
    }

    public function editSiswa($id)
    {
      $sql = "SELECT * FROM siswa WHERE id_siswa = '$id'";
      $query = $this->db->query($sql);
      return $query;
    }

    public function updateSiswa($id, $nama, $tpt, $tgl, $agama, $alamat, $hp, $kelas)
    {
      $sql = "UPDATE siswa SET nama = '$nama', tpt_l = '$tpt', tgl_l = '$tgl', agama = '$agama', alamat = '$alamat', no_hp = '$hp', kelas = '$kelas' WHERE id_siswa = '$id'";
      $query = $this->db->query($sql);

      if (!$query) {
        return "Gagal Update!";
      }else{
        return "Sukses";
      }
    }
  }

?>
