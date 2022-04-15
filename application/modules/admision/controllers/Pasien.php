<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienModel');
    }

    public function index()
    {
        $data['tgl_berobat'] = $this->input->get('tgl_berobat') ?? date('Y-m-d');
        // $data['pasiens']     = $this->PasienModel->get_data_berobat($data['tgl_berobat']);
        $this->template->render('admision.pasien.index', $data);
    }

    public function fetch_pasien()
    {
        $this->load->library('Datatable');
        $this->datatable->select("b.id_pendaftaran, a.nama_user, a.sts_user, a.no_identitas, date_format(b.tgl_berobat, '% %d-%m-%Y') as tgl_berobat, c.nama_asuransi, d.nama_poliklinik, e.id_dokter");
        $this->datatable->from('tbl_user a');
        $this->datatable->join('tbl_pendaftaran b', 'b.id_pasien = a.id_user');
        $this->datatable->join('tbl_asuransi c', 'c.id_asuransi = b.id_asuransi');
        $this->datatable->join('tbl_poliklinik d', 'd.id_poliklinik = b.id_poliklinik');
        $this->datatable->join('tbl_dokter_jaga e', 'e.id_dokter = b.id_dokter');
        $this->datatable->where('b.tgl_berobat',  '2022-04-15');
        echo $this->datatable->generate();
    }
}
