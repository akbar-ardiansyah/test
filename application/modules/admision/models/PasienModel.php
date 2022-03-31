<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PasienModel extends CI_Model
{
    public function get_data_berobat($tgl_berobat)
    {

        $this->db->select('a.nama_pasien, a.no_identitas, date_format(b.tgl_berobat, "%d-%m-%Y") as tgl_berobat, c.nama_asuransi, d.nama_poliklinik, e.nama_dokter');
        $this->db->join('tbl_pendaftaran b', 'b.id_pasien = a.id_pasien');
        $this->db->join('tbl_asuransi c', 'c.id_asuransi = b.id_asuransi');
        $this->db->join('tbl_poliklinik d', 'd.id_poliklinik = b.id_poliklinik');
        $this->db->join('tbl_dokter e', 'e.id_dokter = b.id_dokter');
        $this->db->where('b.tgl_berobat', $tgl_berobat);
        return $this->db->get('tbl_pasien a')->result();

        // $this->db->select('p.nama_pasien, p.no_identitas, date_format(c.tgl_berobat, "%d-%m-%Y") as tgl_berobat, a.nama_asuransi, po.nama_poliklinik, d.nama_dokter');
        // $this->db->join('tbl_asuransi a', 'a.id_asuransi = p.id_asuransi');
        // $this->db->join('tbl_poliklinik po', 'po.id_poliklinik = p.id_poliklinik');
        // $this->db->join('tbl_dokter d', 'd.id_dokter = p.id_dokter');
        // $this->db->where('c.tgl_berobat', $tgl_berobat);
        // return $this->db->get('tbl_pasien p')->result();
    }
}
