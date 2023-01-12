<?php
class M_KritikSaran extends CI_Model
{

    public function tampilData()
    {
        return $this->db->get_where("kritik_saran");
    }


    function fungsiDelete($id_kritik_saran)
    {
        $this->db->where('id_kritik_saran', $id_kritik_saran);
        $this->db->delete('kritik_saran');
    }

    public function fungsiTambah($data)
    {
        $this->db->insert('kritik_saran', $data);
    }
}
