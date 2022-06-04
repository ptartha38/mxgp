<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/polri/POLDANTB.png">
    <!-- Title Page-->
    <title>Sispam MX GP Polres Sumbawa</title>

    <!-- FontAwesome CSS-->
    <script src="https://kit.fontawesome.com/bbf59dc8bc.js" crossorigin="anonymous"></script>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url() ?>/assets/dashboard/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>/assets/dashboard/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Jquery CSS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Main CSS-->
    <link href="<?= base_url() ?>/assets/dashboard/css/theme.css" rel="stylesheet" media="all">

    <!-- Leaflet Js-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

    <!-- Leaflet Search JS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/leaflet/search/dist/leaflet-search.src.css">
    <script src="<?= base_url() ?>/assets/leaflet/search/dist/leaflet-search.src.js"></script>

</head>

<body onload="getLocation();" class="animsition">
    <div class="column p-2"><a href="#" class="btn btn-primary" onclick="location.href='<?php echo base_url('Home'); ?>'" title="kembali"><span style="font-size: 1em;"><i class="fa fa-arrow-left"></i></span> Kembali ke Beranda</a></div>

    <div id="mapid" style=" height: 800px;"></div>

    <form action="" id="form-loc" name="form-loc" method="POST" class="form-loc">
        <input hidden type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $session->nama_lengkap; ?>">
        <input hidden type="text" id="latitude" name="latitude">
        <input hidden type="text" id="longitude" name="longitude">
        <input hidden type="text" id="NRP" name="NRP" value="<?= $session->NRP; ?>">
    </form>

    <!-- DELETE MODAL -->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalHapusLabel">MENGHAPUS DATA INPUTAN TERAKHIR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-hapus" method="post" action="<?= base_url('home/hapus_anggota') ?>">
                        <p class="error-text"><i style="color: Tomato;" class="fa fa-warning modal-icon"></i><b> ANDA YAKIN AKAN MENGHAPUS DATA ?</b>
                            <br><i>Tindakan Ini Tidak dapat Dibatalkan.</i>
                        </p>
                        <input type="hidden" id="delete_id" name="delete_id" class="form-control">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left "></i>&nbsp;Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- !. Delete Record Modal-->
    <style>
        .modal-backdrop {
            z-index: -1;
        }

        .custom-div-icon img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: absolute;
            left: 0;
            right: 0;
            margin: 8px auto;
            text-align: center;
        }

        .custom-div-icon i {
            position: absolute;
            width: 22px;
            font-size: 22px;
            left: 0;
            right: 0;
            margin: 10px auto;
            text-align: center;
        }

        .marker-pin {
            width: 30px;
            height: 30px;
            border-radius: 50% 50% 50% 0;
            background: #c30b82;
            position: absolute;
            transform: rotate(-45deg);
            left: 50%;
            top: 50%;
            margin: -15px 0 0 -15px;
        }

        .marker-pin::after {
            content: '';
            width: 24px;
            height: 24px;
            margin: 3px 0 0 3px;
            background: #fff;
            position: absolute;
            border-radius: 50%;
        }
    </style>
    <script>
        $(document).ready(function() {
            Realtime();
            data_pos();
            setInterval(() => {
                Realtime();
                getLocation();
            }, 11000);
        });

        <?php if (session()->getFlashdata('sukses')) { ?>
            Swal.fire(
                'Selamat',
                '<?php echo $session->sukses ?>',
                'success'
            )
        <?php } ?>

        // Mendapatkan Koordinat Secara Realtime
        function getLocation() {
            if (!navigator.geolocation) {
                console.log("Fitur Lokasi tidak aktif")
            } else {
                navigator.geolocation.getCurrentPosition(showPosition)
            }
        }

        function showPosition(position) {
            document.querySelector('.form-loc input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.form-loc input[name = "longitude"]').value = position.coords.longitude;
            $.ajax({
                url: "<?php echo base_url('Home/save_lokasi'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data: $('#form-loc').serialize(),
                success: function(x) {
                    if (x.sukses == true) {
                        console.log("Data Tersimpan");
                    }
                }
            });
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Nyalakan Fitur Lokasi di Perangkat Anda");
                    location.reload();
                    break;
            }
        }


        // Maping Icon dan Tempat
        let latling = [-8.4360622, 117.4384097];
        var map = new L.map('mapid').setView(latling, 12);

        map.addLayer(new L.TileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 20,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }));

        googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
googleStreets.addTo(map);

googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
googleTerrain.addTo(map);

        // Memasukan Data Anggota Live
        function Realtime() {
            
        var markersLayer = new L.LayerGroup(); //layer contain searched elements
        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            layer: markersLayer,
            initial: false,
            zoom: 16,
            position: 'topright'
        });
        map.addControl(controlSearch);
        
            var buka_wa = '<div class="btn btn-success"><a href="http://api.whatsapp.com://send?phone='
            var tutup_wa = '"target=" _blank">'
            var icon_wa = '<i style="color: white;" class="fab fa-whatsapp fa-1x" aria-hidden="true"></i></a></div>'
            var buka_hapus = '<div class="btn btn-danger">onclick="warning('
            var tutup_hapus = ') "title="Delete"><span><i class="fa fa-trash"></i></span></a></div>'
            var foto
            var icon
            $.ajax({
                url: "<?php echo base_url('Home/ambil_data'); ?>",
                type: "POST",
                dataType: "JSON",
                success: function(x) {
                    if (x.sukses == true) {
                        for (i = 0; i < x.data.length; i++) {
                            <?php if ($session->akses == "admin") {
                                $hidden_hapus = "";
                            } else {
                                $hidden_hapus = "hidden";
                            }
                            ?>
                            var hapus = '<a <?= $hidden_hapus; ?> href="#" class="btn btn-danger" onclick="warning(' + x.data[i].NRP + ') "title="Delete"><span><i style="color: white;" class="fa fa-trash"></i></span></a>'
                            if (x.data[i].foto != "") {
                                foto = "<img width='100' src=<?= base_url() ?>" + "/assets/img/foto_profil/" + x.data[i].foto + "/>"
                                icon = "<div style='background-color:black;' class='marker-pin'></div><img width='100' src=<?= base_url() ?>" + "/assets/img/foto_profil/" + x.data[i].foto + "/>"
                            } else {
                                icon = "<div style='background-color:#4838cc;' class='marker-pin'></div><i class='fa fa-user'>"
                                foto = "<img width='100' src=<?= base_url() ?>" + "/assets/img/foto_profil/user_image.png/>"
                            }
                            var nama = x.data[i].nama_lengkap, //value searched
                                // marker = new L.Marker(new L.latLng(x.data[i].latitude, x.data[i].longitude), {title: title} );//se property searched
                                marker = new L.marker([x.data[i].latitude, x.data[i].longitude], {
                                    title: nama,
                                    icon: L.divIcon({
                                        className: 'custom-div-icon',
                                        html: icon,
                                        iconSize: [30, 42],
                                        iconAnchor: [15, 42],
                                        popupAnchor: [0, -30]
                                    })
                                })
                            marker.bindPopup(
                                foto + "<br>" +
                                "<b> Nama : " + x.data[i].nama_lengkap + "</b> <br>" +
                                "NRP :" + x.data[i].NRP + "<br>" +
                                "Pangkat : " + x.data[i].pangkat + "<br>" +
                                "Lokasi Pospam : " + x.data[i].lokasi_pam + "<br>" +
                                "No Handphone : " + x.data[i].hp + "<br>" +
                                buka_wa + x.data[i].hp + tutup_wa + icon_wa + " " + hapus
                            );
                            markersLayer.addLayer(marker);
                            setInterval(() => {
                                map.removeLayer(marker);
                                map.removeLayer(markersLayer);
                                map.removeControl(controlSearch);
                            }, 10000);
                        }
                    }
                }
            })
        }

        function data_pos() {
            var markersLayer = new L.LayerGroup(); //layer contain searched elements
        map.addLayer(markersLayer);
        var controlSearch = new L.Control.Search({
            layer: markersLayer,
            initial: false,
            zoom: 16,
            position: 'topleft'
        });

        map.addControl(controlSearch);

           $.ajax({
                url: "<?php echo base_url('Pam/ambil_data_lokasi'); ?>",
                type: "POST",
                dataType: "JSON",
                success: function(x) {
                    if (x.sukses == true) {
                        for (i = 0; i < x.data.length; i++) {
                            if (x.data[i].foto != "") {
                                foto = "<img width='100' src=<?= base_url() ?>" + "/assets/img/foto_lokasi/" + x.data[i].foto + "/>"
                            } else {
                                foto = "<img width='100' src=<?= base_url() ?>" + "/assets/img/foto_lokasi/mxgp.png/>"
                            }
                            icon = "<div style='background-color:orange;'></div>" + x.data[i].icon_lokasi
                            var nama = x.data[i].nama_lokasi, //value searched
                                // marker = new L.Marker(new L.latLng(x.data[i].latitude, x.data[i].longitude), {title: title} );//se property searched
                                marker = new L.marker([x.data[i].latitude, x.data[i].longitude], {
                                    title: nama,
                                    icon: L.divIcon({
                                        className: 'custom-div-icon',
                                        html: icon,
                                        iconSize: [30, 42],
                                        iconAnchor: [15, 42],
                                        popupAnchor: [0, -30]
                                    })
                                })
                            marker.bindPopup(
                                foto + "<br>" +
                                "<b> Nama Lokasi : " + x.data[i].nama_lokasi + "</b> <br>" +
                                "Alamat :" + x.data[i].alamat + "<br>" +
                                "Keterangan : " + x.data[i].ket
                            );
                            markersLayer.addLayer(marker);
                        }
                    }
                }
            })
        }



        L.marker([-8.430020132648073, 117.4323433428779], {
            icon: L.divIcon({
                className: 'custom-div-icon',
                html: "<div style='background-color:red;' class='marker-pin'></div><i class='fa fa-flag-checkered awesome'>",
                iconSize: [30, 42],
                iconAnchor: [15, 42],
                popupAnchor: [0, -30]
            })
        }).addTo(map).bindPopup(
            "<img width='100' src=<?= base_url() ?>" + "/assets/leaflet/mxgp.png/>" + "<br>" +
            "Event Internasional MXGP 2022"
        );


        var circle = L.circle([-8.430020132648073, 117.4323433428779], {
            color: 'black',
            fillColor: 'white',
            fillOpacity: 0.1,
            radius: 500
        }).addTo(map);



        // Hapus
        //Delete
        function warning(hasil_id) {
            $('#ModalHapus').modal('show');
            $('#delete_id').val(hasil_id);
        }


        $('#carilokasi').on('keyup', function(e) {



controlSearch.searchText( e.target.value );

})
    </script>

    <div class="copyright">
        <p>Copyright © 2022 Polres Sumbawa.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url() ?>/assets/dashboard/vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/dashboard/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url() ?>/assets/dashboard/js/main.js"></script>

</body>

</html>
<!-- end document-->