<style>
    .modal-backdrop {
        z-index: -1;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <?php if ($session->akses == "admin") {
                    $hidden_fitur = "";
                } else {
                    $hidden_fitur = "hidden";
                }
                ?>
                <div <?= $hidden_fitur; ?> class="p-2"><a href="#" class="btn btn-primary" onclick="location.href='<?php echo base_url('Pam/form_insert'); ?>'" title="Insert"><span style="font-size: 1em;"><i class="fa fa-edit"></i></span> TAMBAH DATA</a></div>
                <table id="pin_lokasi" class="table table-bordered table" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA LOKASI</th>
                            <th>LATITUDE</th>
                            <th>LONGITUDE</th>
                            <th>ALAMAT</th>
                            <th>KET</th>
                            <th>ICON LOKASI</th>
                            <th>FOTO</th>
                            <th <?= $hidden_fitur; ?>>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_lokasi as $row) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td><?php echo $row['nama_lokasi'] ?></td>
                                <td><?php echo $row['latitude'] ?></td>
                                <td><?php echo $row['longitude'] ?></td>
                                <td><?php echo $row['alamat'] ?></td>
                                <td><?php echo $row['ket'] ?></td>
                                <td><?php echo $row['icon_lokasi'] ?></td>
                                <td><?php
                                    if ($row['foto'] != null) {
                                        $foto = $row['foto'];
                                    } else {
                                        $foto = 'mxgp.png';
                                    }
                                    ?>
                                    <a data-lightbox="<?= base_url() . '/assets/img/foto_lokasi/' . $foto ?>" href="<?= base_url() . '/assets/img/foto_lokasi/' . $foto ?>"><img style="width: 90px;" src='<?= base_url() . "/assets/img/foto_lokasi/" . $foto ?>'></a>
                                </td>
                                <td <?= $hidden_fitur; ?>>
                                    <div class="p-2"><a href="#" class="btn btn-primary" onclick="edit_record(<?php echo $row['id'] ?>)" title="Edit"><span style="font-size: 2em;"><i class="fa fa-edit"></i></span></a></div>
                                    <div class="p-2"><a href="#" class="btn btn-danger" onclick="warning(<?php echo $row['id'] ?>,'<?php echo $row['foto'] ?>') " title="Delete"><span style="font-size:2em;"><i class="fa fa-trash"></i></span></a></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Delete  Modal-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalHapusLabel">MENGHAPUS DATA LOKASI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-hapus">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <input type="hidden" name="nama_file" id="nama_file">
                    <p class="error-text"><i style="color: Tomato;" class="fa fa-warning modal-icon"></i><b> ANDA YAKIN AKAN MENGHAPUS DATA ?</b>
                        <br><i>Tindakan Ini Tidak dapat Dibatalkan.</i>
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left "></i>&nbsp;Close</button>
                        <button type="button" class="btn btn-danger" onclick="hapus()"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE MODAL -->
<div class="modal hide fade" id="UpdateModal" role="dialog" aria-labelledby="UpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajaxModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit" enctype="multipart/form-data" method="post" action="<?= base_url('pam/update_data_lokasi') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id_update" id="id_update">
                        <label for="nama_pelapor">NAMA LOKASI</label>
                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi">
                    </div>
                    <div class="form-group">
                        <label for="latitude">LATITUDE</label>
                        <input type="text" class="form-control" id="latitude" name="latitude">
                    </div>
                    <div class="form-group">
                        <label for="longitude">LONGITUDE</label>
                        <input type="text" class="form-control" id="longitude" name="longitude">
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT</label>
                        <textarea cols="3" class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ket">KETERANGAN</label>
                        <textarea cols="3" class="form-control" id="ket" name="ket"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="icon_lokasi">ICON LOKASI</label>
                        <input type="text" class="form-control" id="icon_lokasi" name="icon_lokasi">
                    </div>
                    <div class="form-group">
                        <label for="foto">FOTO</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <input type="hidden" class="form-control" id="nama_foto" name="nama_foto">
                    </div>
                    <div class="form-group">
                        <div id="preview"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left "></i>&nbsp;Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Save Data</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
</script>



<script>
    $(document).ready(function() {
        var t = $('#pin_lokasi').DataTable({
            "iDisplayLength": 50,
            "responsive": true,
            "order": [
                [2, 'desc']
            ],
            "columnDefs": [{
                    "targets": 0,
                    "width": "2%",
                    "className": "text-center",
                    "orderable": false,
                    "searchable": true,
                    "responsivePriority": 1,
                },
                {
                    "targets": 1,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 2,
                },
                {
                    "targets": 2,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 3,
                },
                {
                    "targets": 3,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 4,
                },
                {
                    "targets": 4,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 5,
                },
                {
                    "targets": 5,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 6,
                },
                {
                    "targets": 6,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 7,
                },
                {
                    "targets": 7,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    "responsivePriority": 8,
                },
            ],
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: 'copy',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Lokasi Pengamanan',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Lokasi Pengamanan',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'excelHtml5',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        // set cell style: Wrapped text
                        $('row c', sheet).attr('s', '55'),
                            $('row:first c', sheet).attr('s', '51'); // first row is center
                        // $('row:nth-child(3) c:nth-child(2)', sheet).attr('s','2');                  
                    },
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Lokasi Pengamanan',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Lokasi Pengamanan',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                }
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
</script>
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('status')) { ?>
            Swal.fire(
                'SELAMAT!',
                'Data Anggota Berhasil di Ubah',
                'success'
            )
        <?php } ?>
    });

    function warning(hasil_id, nama_file) {
        $('#ModalHapus').modal('show');
        $('#delete_id').val(hasil_id);
        $('#nama_file').val(nama_file);
    }

    function hapus() {
        $.ajax({
            url: "<?php echo base_url('pam/hapus'); ?>",
            type: 'POST',
            dataType: 'JSON',
            data: $('#form-hapus').serialize(),
            success: function(x) {
                if (x.sukses == true) {
                    $('#ModalHapus').modal('hide');
                    Swal.fire(
                            'SELAMAT!',
                            'Data Berhasil di Hapus',
                            'success'
                        ),
                        setTimeout(function() {
                            window.location.reload(1);
                        }, 800);
                } else {
                    Swal.fire(
                        'GAGAL!',
                        'Data Tidak Berhasil di Simpan, Pastikan Nama Terisi !!!',
                        'error'
                    )
                }
            }
        });
    }

    //Tampil Edit Data
    function edit_record(hasil_id) {
        $('#UpdateModal').modal('show');
        $('#id_update').val(hasil_id);
        $.ajax({
            url: "<?php echo base_url('Pam/edit'); ?>",
            type: 'POST',
            dataType: 'JSON',
            data: $('#form-edit').serialize(),
            success: function(x) {
                if (x.sukses == true) {
                    $('#nama_lokasi').val(x.data.nama_lokasi);
                    $('#latitude').val(x.data.latitude);
                    $('#longitude').val(x.data.longitude);
                    $('#alamat').val(x.data.alamat);
                    $('#ket').val(x.data.ket);
                    $('#icon_lokasi').val(x.data.icon_lokasi);
                    $('#nama_foto').val(x.data.foto);
                    document.getElementById('preview').innerHTML = '<img style="width: 120px;" src=' + '<?= base_url() ?>' + '/assets/img/foto_lokasi/' + x.data2 + '>';
                }
            }
        });
    }
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').innerHTML = '<img style="width: 120px;" src="' + e.target.result + '">';
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#foto").change(function() {
        readURL(this);
    });

    function hanyaangka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#UpdateModal').on('hidden.bs.modal', function(e) {
        $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    })

    $("#form-edit").validate({
        rules: {
            nama_lokasi: {
                required: true
            },
            latitude: {
                required: true,
            },
            longitude: {
                required: true
            },
            alamat: {
                required: true
            },
            ket: {
                required: true
            },
            foto: {
                extension: "jpg|jpeg|png",
                filesize: 1, // here we are working with MB
            }
        },
        messages: {
            nama: {
                required: "Nama Lokasi Harus Diisi Dong Bos"
            },
            latitude: {
                required: "Latitude Harus Diisi"
            },
            longitude: {
                required: "Longitude Harus Diisi"
            },
            alamat: {
                alamat: "Username Harus Diisi"
            },
            ket: {
                required: "Keterangan Harus Diisi"
            },
            foto: {
                extension: "Tolong Upload File dengan Format JPG, JPEG dan PNG",
                filesize: "File Lebih Besar dari 1 MB"
            }
        }
    });

    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 1000000)
    }, 'File size must be less than {0} MB');
</script>
<style>
    .error {
        color: #F00;
    }
</style>