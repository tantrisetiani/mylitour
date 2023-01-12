<?php

class M_potensi extends CI_Model
{

    public function get_data_db()
    {
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->join('kategori', 'potensi.id_kategori = kategori.id_kategori');
        $this->db->join('wilayah', 'potensi.id_wilayah = wilayah.id_wilayah');
        $this->db->order_by('id_potensi', 'ASC');
        return $this->db->get()->result_array();
    }
    public function add_data($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('potensi', ['id_potensi' => $id])->row_array();
    }
    public function detail_data($slug)
    {
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->join('kategori', 'kategori.id_kategori = potensi.id_kategori');
        $this->db->join('wilayah', 'wilayah.id_wilayah = potensi.id_wilayah');
        $this->db->where('potensi.slug', $slug);
        return $this->db->get()->row();
    }

    public function detail($slug)
    {
        $this->db->select('*');
        $this->db->from('potensi');
        $this->db->join('kategori', 'kategori.id_kategori = potensi.id_kategori');
        $this->db->join('wilayah', 'wilayah.id_wilayah = potensi.id_wilayah');
        $this->db->where('potensi.slug', $slug);
        return $this->db->get()->result();
    }

    public function update_data($id)
    {
        $data['potensi'] = $this->db->get_where('potensi', ['id_potensi' => $id])->row_array();

        // cek jika ada foto potensi yang di upload
        $upload_image = $_FILES['foto_potensi'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '10048';
            $config['upload_path'] = './assets/img/potensi';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_potensi')) {
                $old_image = $data['potensi']['foto_potensi'];
                $path = './assets/img/potensi/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_potensi', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "nama_potensi" => $this->input->post('nama_potensi', true),
            "slug" => $this->input->post('slug', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "id_wilayah" => $this->input->post('id_wilayah', true),
            "video_youtube" => $this->input->post('video_youtube',  true),
            "tanggal_update" => $this->input->post('tanggal_update',  true),
            "informasi" => $this->input->post('informasi', true),
            "referensi" => $this->input->post('referensi', true),

        ];
        $this->db->where('id_potensi', $this->input->post('id_potensi'));
        $this->db->update('potensi', $data);
    }

    public function delete_data($id)
    {
        $this->db->where($id);
        return $this->db->delete('Potensi');
    }

    public function jumlah_potensi()
    {
        $query = $this->db->get('potensi');
        return $query->num_rows();
    }
}
