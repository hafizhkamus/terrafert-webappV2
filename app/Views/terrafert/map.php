<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex w-100" style="height:100%; position: relative;">
    <div class="w-12" style="position: relative;
    z-index: 1001;
    padding: 10px;
    background-color: transparent;">
        <?php foreach ($Alat as $alat) : ?>
        <a onclick="check(<?= htmlspecialchars(json_encode($alat), ENT_QUOTES, 'UTF-8') ?>)" style="text-decoration:none;">
            <div class="text-center mb-2 d-flex align-items-center justify-content-center py-2 leaf-button" 
            style="background-color: #dfdfdf; color: grey; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                <img src="<?= base_url('assets/img/leaf.png') ?>" style="width: 40px;">
                <label style="font-weight:bold;">
                Alat <?= $alat['no_device']; ?>
                </label>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="w-40" id="details" style="position: relative;
    z-index: 1001;
    padding: 10px;
    display: none;
    background-color: transparent;">
        <!-- <h2>TEST</h2> -->
        <div class="mb-2 py-2" 
        style="background-color: #dfdfdf; color: grey; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
            <div class="px-2 mb-2 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="<?= base_url('assets/img/leaf.png') ?>" style="width: 40px;">
                    <label id="namaAlat" style="font-weight:bold; color : black;"> Alat 1</label>
                </div>
                <div>
                    <a onclick="uncheck()">
                        <img src="<?= base_url('assets/img/close.png') ?>" style="width: 25px;">
                    </a>
                </div>
            </div>
            <div class="px-2 py-3 d-flex align-items-center" style="background-color: #b8b9ba;">
                <img src="<?= base_url('assets/img/pin.png') ?>" style="width: 40px;">
                <div>
                    <div>
                        <strong>Lokasi Awal:</strong> <label for="" id="location">Dummy Data</label>
                    </div>
                    <div>
                        <strong>Koordinat Saat ini:</strong> <label for="" id="longlat">Dummy Data</label>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <div class="d-flex justify-content-between">
                    <div id="bg-humidity" class="d-flex justify-content-center align-items-center py-2 px-2 w-48" style="background-color: #76AF00;">
                        <div class="text-center me-1">
                            <div>
                                <h5>
                                    <strong id="humidity">65.5%</strong> 
                                </h5>
                            </div>
                            <div>
                                <h6>
                                    <strong>Kelembaban</strong> 
                                </h6>
                            </div>
                        </div>
                        <img src="<?= base_url('assets/img/water.png') ?>" style="width: 40px;">
                    </div>
                    <div id="bg-ph" class="d-flex justify-content-center align-items-center py-2 px-2 w-48" style="background-color: #76AF00;">
                        <div class="text-center me-1">
                            <div>
                                <h5>
                                    <strong id="ph">65.5%</strong> 
                                </h5>
                            </div>
                            <div>
                                <h6>
                                    <strong>pH</strong> 
                                </h6>
                            </div>
                        </div>
                        <img src="<?= base_url('assets/img/ph.png') ?>" style="width: 40px;">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-2 mb-1">
                <div id="bg-natrium" class="d-flex justify-content-center align-items-center py-2 px-2 w-30" style="background-color: #76AF00;">
                    <div class="text-center me-1">
                        <div>
                            <div style="font-size : 10px !important; color:black;">
                                <strong id="natrium">65.5%</strong> 
                            </div>
                        </div>
                        <div>
                            <div style="font-size : 10px !important; color:black;">
                                <strong>Nitrogen (N)</strong> 
                            </div>
                        </div>
                    </div>
                    <img src="<?= base_url('assets/img/N.png') ?>" style="width: 30px;">
                </div>
                <div id="bg-phosphorus" class="d-flex justify-content-center align-items-center py-2 px-2 w-30" style="background-color: #76AF00;">
                    <div class="text-center me-1">
                        <div>
                            <div style="font-size : 10px !important; color:black;">
                                <strong id="phosphorus">65.5%</strong> 
                            </div>
                        </div>
                        <div>
                            <div style="font-size : 10px !important; color:black;">
                                <strong>Fosfor (P)</strong> 
                            </div>
                        </div>
                    </div>
                    <img src="<?= base_url('assets/img/P.png') ?>" style="width: 30px;">
                </div>
                <div id="bg-potassium" class="d-flex justify-content-center align-items-center py-2 px-2 w-30" style="background-color: #76AF00;">
                    <div class="text-center me-1">
                        <div>
                            <div style="font-size : 10px !important; color:black;">
                                <strong id="potassium">65.5%</strong> 
                            </div>
                        </div>
                        <div>
                            <div style="font-size : 10px !important; color:black;">
                                <strong>Kalium (K)</strong> 
                            </div>
                        </div>
                    </div>
                    <img src="<?= base_url('assets/img/K.png') ?>" style="width: 30px;">
                </div>
            </div>
        </div>
    </div>
    <div id="maps" class="w-100" style="position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.5);">
    </div>
</div>

<script>
    var map = L.map('maps').setView({ lat : 0.7893, lon : 113.9213 }, 10);

    L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 22,
        attribution: '© Google Maps'
      }).addTo(map);

    // L.marker({lat : 0.7893, lon : 113.9213}).bindPopup('Hello Indonesia').addTo(map);

    const myCustomColour = '#1cbb8c'

    const markerHtmlStyles = `
    background-color: ${myCustomColour};
    width: 1.5rem;
    height: 1.5rem;
    display: block;
    right: 0.7rem;
    bottom: 0.2rem;
    position: relative;
    border-radius: 3rem 3rem 0;
    transform: rotate(45deg);
    border: 1px solid #FFFFFF`

    const icon = L.divIcon({
    className: "my-custom-pin",
    iconAnchor: [0, 24],
    labelAnchor: [-6, 0],
    popupAnchor: [0, -36],
    html: `<span style="${markerHtmlStyles}" />`
    })

    $.ajax({
        url: "<?php echo base_url('map/getAllDevices'); ?>",
        type: "POST",
        data: {},
        dataType: "json",
        success: function(data) {
            $.each(data, function(index, alat) {
                // console.log(alat);

                var myCustomColour = '#6c757d';

                var jumlah = 0;
                if(alat.N != null){
                    var Npoint = parseInt(alat.N) < 210 ? 0 : (parseInt(alat.N) > 500 ? 1 : 2);
                    var Ppoint = parseInt(alat.P) < 8 ? 0 : (parseInt(alat.P) > 10 ? 1 : 2);
                    var Kpoint = parseInt(alat.K) < 210 ? 0 : (parseInt(alat.K) > 400 ? 1 : 2);
                    
                    if((Npoint == 2 && Ppoint == 2) || (Kpoint == 2 && Ppoint == 2) || (Kpoint == 2 && Npoint == 2)){
                        myCustomColour = '#1cbb8c';
                    } else if ((Npoint == 1 && Ppoint == 1) || (Kpoint == 1 && Ppoint == 1) || (Kpoint == 1 && Npoint == 1)){
                        myCustomColour = '#fcb92c';
                    } else {
                        myCustomColour = '#dc3545';
                    }
                }

                const markerHtmlStyles = `
                background-color: ${myCustomColour};
                width: 1.5rem;
                height: 1.5rem;
                display: block;
                right: 0.7rem;
                bottom: 0.2rem;
                position: relative;
                border-radius: 3rem 3rem 0;
                transform: rotate(45deg);
                border: 1px solid #FFFFFF`

                const icon = L.divIcon({
                className: "my-custom-pin",
                iconAnchor: [0, 24],
                labelAnchor: [-6, 0],
                popupAnchor: [0, -36],
                html: `<span style="${markerHtmlStyles}" />`
                })
                L.marker({lat : alat.latitude, lon : alat.longitude}, {icon : icon}).addTo(map);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    // define rectangle geographical bounds
    var bounds = [[-6.6908840, 107.6722790], [-6.6909050, 107.6723020], [-6.6908310, 107.6723090], [-6.6908660, 107.6723780]];

    // create an orange rectangle
    L.rectangle(bounds, {color: "red", weight: 1}).addTo(map);

    // zoom the map to the rectangle bounds
    map.setView({ lat : -6.6908840, lon : 107.6722790 }, 21);

    function check(data)
    {
        console.log(data);
        $('#namaAlat').html(data.device_name);
        $('#longlat').html(data.longitude + ', ' + data.latitude);
        $('#humidity').html(data.humidity ? data.humidity + '%' : 0);
        $('#ph').html(data.ph ? data.ph + '%' : 0);
        $('#natrium').html(data.N ? data.N + ' ppm' : 0);
        $('#phosphorus').html(data.P ? data.P + ' ppm' : 0);
        $('#potassium').html(data.K ? data.K + ' ppm' : 0);
        $('#location').html(data.first_address);
        $('#details').css('display', '');

        var jumlah = 0;
        var myCustomColour = '#6c757d';
        if(data.N != null){
            var Npoint = parseInt(data.N) < 210 ? 0 : (parseInt(data.N) > 500 ? 1 : 2);
            var Ppoint = parseInt(data.P) < 8 ? 0 : (parseInt(data.P) > 10 ? 1 : 2);
            var Kpoint = parseInt(data.K) < 210 ? 0 : (parseInt(data.K) > 400 ? 1 : 2);
            
            if((Npoint == 2 && Ppoint == 2) || (Kpoint == 2 && Ppoint == 2) || (Kpoint == 2 && Npoint == 2)){
                myCustomColour = '#76AF00';
            } else if ((Npoint == 1 && Ppoint == 1) || (Kpoint == 1 && Ppoint == 1) || (Kpoint == 1 && Npoint == 1)){
                myCustomColour = '#EBFF02';
            } else {
                myCustomColour = '#EB3939';
            }
        }

        $('#bg-humidity').css('background-color', myCustomColour);
        $('#bg-ph').css('background-color', myCustomColour);
        $('#bg-natrium').css('background-color', myCustomColour);
        $('#bg-phosphorus').css('background-color', myCustomColour);
        $('#bg-potassium').css('background-color', myCustomColour);

        
        map.setView({ lat : data.latitude, lon : data.longitude }, 22);
    }

    function uncheck()
    {
        map.setView({ lat : -6.6908840, lon : 107.6722790 }, 21);
        $('#details').css('display', 'none');
    }
</script>
<?= $this->endSection(); ?>