<?php 
class M_perpus extends CI_Model{
  /* 
    Login user by Email
      - anggota
      - admin
  */
  public function getByEmail($table,$email)
  {
   return $this->db->get_where($table,['email' => $email])->row_array();
  }


  /* 
    Insert_data 
      - data_buku
      - data_anggota
      - peminjaman
      - daftar
  */
  function insert_data($table,$data)
  {
    return $this->db->insert($table,$data);
  }


  /* 
    Get semua data
      - data anggota
      - data kategori
  */
  public function getData($table)
  {
    return $this->db->get($table)->result_array();
  }

  
  /* 
    Delete data
      - hapus buku
  */
  public function hapus_data($table,$where)
  {
    $this->db->delete($table,$where);
    return $this->db->affected_rows();
  }


  /* 
    Get data buku dan ketegori join kategori
  */
  public function data_buku()
  {
    $this->db->select('*');
    $this->db->from('buku');
    $this->db->join('kategori','kategori.id_kategori=buku.id_kategori');
    $this->db->order_by('id_buku','DESC');
    $query = $this->db->get();
    return $query;
  }

  
  /* 
    Get data by Id
      - detail_buku
      - pinjam_buku
  */
  public function getById($id)
  {
    $this->db->select('buku.*, kategori.nama_kategori as nama_kategori');
    $this->db->from('buku');
    $this->db->join('kategori','kategori.id_kategori=buku.id_kategori');
    $this->db->where('id_buku',$id);
    return $this->db->get();
  }

  /* 
    Get ID Anggota
  */
  public function getIdAnggota($table,$idAnggota)
  {
    return $this->db->get_where($table,$idAnggota);
  }


  /* 
    Get data peminjaman join anggota dan buku
  */
  public function data_peminjaman()
  {
    $this->db->select('peminjaman.*, anggota.nama_lengkap as nama_anggota, buku.judul_buku as judul_buku');
    $this->db->from('peminjaman');
    $this->db->join('anggota','anggota.id_anggota=peminjaman.id_anggota');
    $this->db->join('buku','buku.id_buku=peminjaman.id_buku');
    $query = $this->db->get();
    return $query;
  }


  /* 
    Update status buku
  */
  public function update_status_buku($table,$status,$id_buku)
  {
    $this->db->update($table,$status,$id_buku);
  }


  /* 
    update table keranjang(peminjaman)
  */
  public function update_data($table,$data,$where)
  {
    $this->db->update($table,$data,$where);
  }

}//akhir class

?>