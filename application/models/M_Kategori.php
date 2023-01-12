<?php
class M_Kategori extends CI_Model
{

    public function tampilData()
    {
        return $this->db->get_where("kategori")->result_array();
    }

    public function fungsiTambah($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function halamanUpdate($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    function fungsiDelete($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    public function jumlah_kategori()
    {
        $query = $this->db->get('kategori');
        return $query->num_rows();
    }

    public function tampilDataKearifanLokal()
    {
        return $this->db->get_where("potensi", array('id_kategori' => '1'));
    }
    public function tampilDataCarubanLiterasiHub()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('potensi', 'kategori.id_kategori = potensi.id_kategori');
        $this->db->join('wilayah', 'wilayah.id_wilayah = potensi.id_wilayah');
        $this->db->where('kategori.id_kategori', 2);
        return $this->db->get();
    }
    public function tampilDataNaskahKuno()
    {
        return $this->db->get_where("potensi", array('id_kategori' => '3'));
    }
}
