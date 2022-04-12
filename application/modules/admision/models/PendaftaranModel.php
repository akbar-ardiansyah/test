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
        // return $this->db->get_where('tbl_dokter_jaga', [
        //     'id_poliklinik' => $id_poliklinik
        // ])->result();

        $this->db->select('a.nama_user, a.id_dokter');
        $this->db->join('b.tbl_dokter_jaga', 'a.id_dokter = b.id_user');
        $this->db->where('a.id_poliklinik', $id_poliklinik);
        $this->db->get('tbl_user b')->result();
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
