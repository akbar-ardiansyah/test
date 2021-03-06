<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftaranModel');
        // add_js(['js/admision/pendaftaran.js']);
    }

    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // $idPasien = $this->db->select_max('id_pasien')->get('tbl_pasien')->row()->id_pasien + 1;
            // $pasien = [
            //     'nama_pasien'           => $this->input->post('nama_pasien', true),
            //     'no_identitas'          => $this->input->post('nik', true),
            //     'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
            //     'tgl_lahir'             => $this->input->post('tgl_lahir', true),

            // ];
            $data = [
                'tgl_berobat'           => $this->input->post('tgl_berobat', true),
                'id_asuransi'           => $this->input->post('id_asuransi', true),
                'id_poliklinik'         => $this->input->post('id_poliklinik', true),
                'id_dokter'             => $this->input->post('id_dokter', true),
                'id_pasien'             => $this->input->post('id_pasien', true)
            ];

            // $datapasien      = $this->PendaftaranModel->insert('tbl_pasien', $pasien);
            $pendaftaran = $this->PendaftaranModel->insert('tbl_pendaftaran', $data);

            if ($pendaftaran) {
                $response = ['status' => true, 'message' => 'Data pendaftaran berhasil disimpan'];
            } else {
                $response = ['status' => false, 'message' => 'Ooops, terjadi kesalahan ketika menyimpan data'];
            }

            echo json_encode($response);
        } else {

            $data['asuransi'] = $this->PendaftaranModel->asuransi();
            $data['poliklinik'] = $this->PendaftaranModel->poliklinik();

            $this->template->render('admision.pendaftaran.index', $data);
        }
    }


    public function fetch_dokter()
    {
        $id_poliklinik = $this->input->post('id_poliklinik');

        $dokters = $this->PendaftaranModel->dokter($id_poliklinik);

        $option = '<option value="">Pilih Dokter</option>';

        foreach ($dokters as $dokter) {
            $option .= '<option value="' . $dokter->id_dokter . '">' . $dokter->nama_user . '</option>';
        }
        echo $option;
    }

    public function fetch_pasien()
    {
        $this->load->library('Datatable');
        $this->datatable->select("sts_user,nama_user, no_identitas, jenis_kelamin, date_format(tgl_lahir, '%d %M %Y') as tgl_lahir,id_user");
        $this->datatable->from("tbl_user");
        $this->datatable->edit_column('id_user', '<button data-id="$1" data-namauser="$2" class="btn btn-xs btn-success pilih-pasien"><i class="fa fa-check"></i> Pilih Pasien</button>', 'id_user, nama_user');
        echo $this->datatable->generate();
    }
}
