<?php 
class M_perpus extends CI_Model{
 
  function insert_data($table,$data)
  {
    return $this->db->insert($table,$data);
  }

  // update status buku
  public function update_status_buku($table,$status,$id_buku)
  {
    $this->db->update($table,$status,$id_buku);
  }

  // update table keranjang(peminjaman)
  public function update_data($table,$data,$where)
  {
    $this->db->update($table,$data,$where);
  }
  
  public function getByEmail($table,$email)
  {
   return $this->db->get_where($table,['email' => $email])->row_array();
  }

  public function getAllData($table)
  {
    return $this->db->get($table)->result_array();
  }
  public function edit_data($where,$table)
  {
   return $this->db->get_where($table,$where); 
  }

  public function getById($id)
  {
    $this->db->select('buku.*, kategori.nama_kategori as nama_kategori');
    $this->db->from('buku');
    $this->db->join('kategori','kategori.id_kategori=buku.id_kategori');
    $this->db->where('id_buku',$id);
    return $this->db->get();

  }
  
  public function hapus_buku($table,$id)
  {
    $this->db->delete($table,['id_buku' =>$id]);
    return $this->db->affected_rows();
  }

  public function pinjam($table)
  {
    $this->db->order_by($table,'id_pinjam','DESC')
                      ->limit(10);
  }

  public function get_data($table)
 {
   return $this->db->get($table);
 }

 public function delete_data($where,$table)
 {
   $this->db->where($where);
   $this->db->delete($table);
 }

}//akhir class

?>