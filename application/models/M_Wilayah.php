<?php

class M_Wilayah extends CI_Model
{

    public function get_data_db()
    {
        $this->db->order_by('id_wilayah', 'asc');
        return $this->db->get('wilayah')->result_array();
    }

    public function add_data($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('wilayah', ['id_wilayah' => $id])->row_array();
    }

    public function update_data($data, $id)
    {
        return $this->db->update('wilayah', $data, ['id_wilayah' => $id]);
    }

    public function delete_data($id)
    {
        $this->db->where($id);
        return $this->db->delete('wilayah');
    }
    public function jumlah_wilayah()
    {
        $query = $this->db->get('wilayah');
        return $query->num_rows();
    }

}
