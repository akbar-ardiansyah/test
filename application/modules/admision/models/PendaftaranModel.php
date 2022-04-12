<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PendaftaranModel extends CI_Model
{
    public function asuransi()
    {
        return $this->db->get('tbl_asuransi')->result();
    }

    public function poliklinik()
    {
        return $this->db->get('tbl_poliklinik')->result();
    }

    public function dokter($id_poliklinik)
    {
        return $this->db->get_where('tbl_dokter', [
            'id_poliklinik' => $id_poliklinik
        ])->result();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    // public function ambil_data_user()
    // {
    //     $pasien = $this->db->get('tbl_user')->result_array();
    //     echo json_encode($pasien);
    // }

}
