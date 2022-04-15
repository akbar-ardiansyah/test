<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pendaftaran Pasien Berobat</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-7">
                                <form method="GET" action="<?= current_url() ?>">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="tgl_berobat" class="col-form-label">Filter Tanggal Berobat</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="date" id="tgl_berobat" name="tgl_berobat" value="<?= $tgl_berobat ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label"></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success btn-xs">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table id="data_pasien" class="table table-striped table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>NIK</th>
                                    <th>Tgl.Berobat</th>
                                    <th>Asuransi</th>
                                    <th>Poliklinik</th>
                                    <th>Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {

            var table;
            if (!table) {
                table = $('#data_pasien').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: site_url + 'admision/pasien/fetch_pasien',
                        type: 'POST'
                    },
                    columns: [{
                            "data": 'id_pendaftaran',
                            "sortable": false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            "data": "nama_user",
                            render: function(data, type, full, meta) {
                                if (full.sts_user != 1) {
                                    return (
                                        `<span class="font-weight-bold">` + full.nama_user + `</span>
                                    <span class="badge rounded-pill bg-success float-end"">dokter</span>`
                                    );
                                } else {
                                    return (
                                        `<span class="font-weight-bold">` + full.nama_user + `</span>`
                                    );
                                }
                            },
                        },
                        {
                            "data": "no_identitas"
                        },
                        {
                            "data": "tgl_berobat"
                        },
                        {
                            "data": "nama_asuransi"
                        },
                        {
                            "data": "nama_poliklinik",
                        },
                        {
                            "data": "id_dokter",

                        },
                    ],
                });
            }

        }
    }
</script>