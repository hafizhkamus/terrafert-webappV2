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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body>
	<div class="wrapper">
		<?= $this->include('layouts/sidebar'); ?>
		<div class="main">
			<!-- HEADER: MENU + HEROE SECTION -->
			<?= $this->include('layouts/header'); ?>
			<!-- CONTENT -->
			<main class="content">
				<div class="container-fluid p-0">
					<?= $this->include('common/alerts'); ?>
					<?= $this->renderSection('content'); ?>
				</div>
			</main>
			<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
			<?= $this->include('layouts/footer'); ?>
		</div>
	</div>
</body>

</html>