<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Gheav">
	<meta name="keywords" content="Gheav, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="icon" href="<?= base_url('assets/img/logo-1.png') ?>" type="image/png"/>
	<title>Terrafert | Optimalkan Hasil Panen Bersama Terrafert: Puncak Kesuburan Tanah untuk Sukses Agrikurtur</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

	<script src="<?= base_url('assets/js/app.js') ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body>
    <div style=" position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    background-color: #799345;">
        
        <div class="w-12 text-center" style="background-color: #2E4600; height:55px; align-items: center;">
            <img class="w-40 h-100" src="<?= base_url('assets/img/logo-1.png') ?>"/>
        </div>

        <a style="text-decoration:none;" class="me-3 mb-2 mt-3" href="<?= base_url('login') ?>">
            <h4>Masuk</h4>
        </a>
    </div>

    <div class="w-100" style="background-color: #becba3;">
        <div class="container pt-4">
            <h1 style="font-weight:bold;" class="w-100 text-center">Selamat datang di website resmi TERRAFERT</h1>
            <p style="color: black;">Kami memiliki inovasi terbaru dalam dunia pertanian dengan alat monitoring unggulan kami, Terrafert. Sebuah solusi canggih untuk pemetaan kesuburan tanah yang memungkinkan para petani dan ahli pertanian untuk mengoptimalkan produksi tanaman mereka.</p>
            <h3 style="font-weight:bold;">Apa itu Terrafert?</h3>
            <p style="color: black;">Terrafert adalah alat monitoring dan pemetaan kesuburan tanah yang revolusioner, dirancang khusus untuk memberikan informasi tentang kondisi tanah perkebunan Anda. Dengan teknologi terkini, Terrafert memanfaatkan sensor yang canggih untuk menganalisis 5 komposisi tanah seperti kelembaban tanah, pH tanah, Nitrogen, Fosfor dan Kalium yang akan mempengaruhi 
            kesehatan tanaman Anda.</p>
            <div class="d-flex w-100" style="height:600px; position: relative;">
                <div class="w-12" style="position: relative;
                z-index: 1001;
                padding: 10px;
                background-color: transparent;">
                    <a onclick="check(1)" style="text-decoration:none;">
                        <div class="text-center mb-2 d-flex align-items-center justify-content-center py-2 leaf-button" 
                        style="background-color: #dfdfdf; color: grey; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                            <img src="<?= base_url('assets/img/leaf.png') ?>" style="width: 40px;">
                            <label style="font-weight:bold;">
                            Alat 1
                            </label>
                        </div>
                    </a>
                    <a onclick="check(2)" style="text-decoration:none;">
                        <div class="text-center mb-2 d-flex align-items-center justify-content-center py-2 leaf-button" 
                        style="background-color: #dfdfdf; color: grey; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                            <img src="<?= base_url('assets/img/leaf.png') ?>" style="width: 40px;">
                            <label style="font-weight:bold;">
                            Alat 2
                            </label>
                        </div>
                    </a>
                </div>
                <div class="w-40" id="details-1" style="position: relative;
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
                                    <strong>Lokasi:</strong> <label for="" id="location">Desa Curug Rendeng, Subang</label>
                                </div>
                                <div>
                                    <strong>Koordinat Saat ini:</strong> <label for="" id="longlat">-6.6908840, 107.6722790</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="d-flex justify-content-between">
                                <div id="bg-humidity" class="d-flex justify-content-center align-items-center py-2 px-2 w-48" style="background-color: #EB3939;">
                                    <div class="text-center me-1">
                                        <div>
                                            <h5>
                                                <strong id="humidity">30%</strong> 
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
                                <div id="bg-ph" class="d-flex justify-content-center align-items-center py-2 px-2 w-48" style="background-color: #EB3939;">
                                    <div class="text-center me-1">
                                        <div>
                                            <h5>
                                                <strong id="ph">3.5</strong> 
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
                            <div id="bg-natrium" class="d-flex justify-content-center align-items-center py-2 px-2 w-30" style="background-color: #EB3939;">
                                <div class="text-center me-1">
                                    <div>
                                        <div style="font-size : 10px !important; color:black;">
                                            <strong id="natrium">200 ppm</strong> 
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
                            <div id="bg-phosphorus" class="d-flex justify-content-center align-items-center py-2 px-2 w-30" style="background-color: #EB3939;">
                                <div class="text-center me-1">
                                    <div>
                                        <div style="font-size : 10px !important; color:black;">
                                            <strong id="phosphorus">7.5 ppm</strong> 
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
                            <div id="bg-potassium" class="d-flex justify-content-center align-items-center py-2 px-2 w-30" style="background-color: #EB3939;">
                                <div class="text-center me-1">
                                    <div>
                                        <div style="font-size : 10px !important; color:black;">
                                            <strong id="potassium">120.5 ppm</strong> 
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
                <div class="w-40" id="details-2" style="position: relative;
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
                                <label id="namaAlat" style="font-weight:bold; color : black;"> Alat 2</label>
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
                                    <strong>Lokasi Awal:</strong> <label for="" id="location">Desa Curug Rendeng, Subang</label>
                                </div>
                                <div>
                                    <strong>Koordinat Saat ini:</strong> <label for="" id="longlat">-6.6909050, 107.6723020</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="d-flex justify-content-between">
                                <div id="bg-humidity" class="d-flex justify-content-center align-items-center py-2 px-2 w-48" style="background-color: #76AF00;">
                                    <div class="text-center me-1">
                                        <div>
                                            <h5>
                                                <strong id="humidity">60%</strong> 
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
                                                <strong id="ph">6.5</strong> 
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
                                            <strong id="natrium">285.2 ppm</strong> 
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
                                            <strong id="phosphorus">8.5 ppm</strong> 
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
                                            <strong id="potassium">210.5 ppm</strong> 
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
            <div class="mb-5 mt-3">
                <h3 style="font-weight:bold;">
                    Temukan Kami:
                </h3>
                <h5>
                    <img src="<?= base_url('assets/img/mail.png') ?>" width="20px">&nbsp; agrooptim@gmail.com
                </h5>
                <h5>
                    <img src="<?= base_url('assets/img/whatsapp.png') ?>" width="20px">&nbsp; 081-222-444-555
                </h5>
            </div>
            <br><br><br>    
        </div>
    </div>
    

    <footer class="footer" style="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    z-index:2000;
    text-align: center;">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-9 text-start d-flex justify-content-start align-items-center" style="text-shadow: 2px 2px black;">
                    Optimalkan Hasil Panen Bersama Terrafert: Puncak Kesuburan Tanah untuk Sukses Agrikurtur
                </div>
            </div>
        </div>
    </footer>
</body>

<script>
    var map = L.map('maps').setView({ lat : 0.7893, lon : 113.9213 }, 10);

    L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 22,
        attribution: '© Google Maps'
      }).addTo(map);

    var myCustomColour = '#dc3545';
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

    // define rectangle geographical bounds
    var bounds = [[-6.6908840, 107.6722790], [-6.6909050, 107.6723020], [-6.6908310, 107.6723090], [-6.6908660, 107.6723780]];

    L.marker({lat : -6.6908840 , lon : 107.6722790}, {icon : icon}).addTo(map);

    var myCustomColour2 = '#1cbb8c';
    const markerHtmlStyles2 = `
    background-color: ${myCustomColour2};
    width: 1.5rem;
    height: 1.5rem;
    display: block;
    right: 0.7rem;
    bottom: 0.2rem;
    position: relative;
    border-radius: 3rem 3rem 0;
    transform: rotate(45deg);
    border: 1px solid #FFFFFF`

    const icon2 = L.divIcon({
    className: "my-custom-pin",
    iconAnchor: [0, 24],
    labelAnchor: [-6, 0],
    popupAnchor: [0, -36],
    html: `<span style="${markerHtmlStyles2}" />`
    })
    
    L.marker({lat : -6.6909050 , lon : 107.6723020}, {icon : icon2}).addTo(map);
    // create an orange rectangle
    L.rectangle(bounds, {color: "red", weight: 1}).addTo(map);

    // zoom the map to the rectangle bounds
    map.setView({ lat : -6.6908840, lon : 107.6722790 }, 21);

    function check(data)
    {
        if(data == 1){
            $('#details-2').css('display', 'none');
            $('#details-1').css('display', '');
            map.setView({ lat : -6.6908840, lon : 107.6722790 }, 22);
        } else {
            $('#details-1').css('display', 'none');
            $('#details-2').css('display', '');
            map.setView({ lat : -6.6909050, lon : 107.6723020 }, 22);
        }
    }

    function uncheck()
    {
        map.setView({ lat : -6.6908840, lon : 107.6722790 }, 21);
            $('#details-1').css('display', 'none');
            $('#details-2').css('display', 'none');
    }
</script>

</html>