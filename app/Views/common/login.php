<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Gheav">
    <meta name="keywords" content="Gheav, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <title>Selamat datang di Terrafert | Terrafert</title>
    <link rel="icon" href="<?= base_url('assets/img/logo-1.png') ?>" type="image/png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</head>

<body style="height: 100%;">
    <main class="w-100 h-100">
        <div class="d-flex h-100">
            <div class="h-100" style="width:50%;">
                <img src="<?= base_url('assets/img/Bg-2.png') ?>" class="h-100 w-100"/>
            </div>
            <div class="h-100 text-center d-flex flex-column justify-content-center align-items-center" style="width:50%;">
                <?= $this->include('common/alerts'); ?>
                <div class="text-center">
                    <img class="w-75" src="<?= base_url('assets/img/logo-1.png') ?>"/>
                </div>
                <div class="text-center">
                    <h1 class="text-main" style="font-weight:bold;">Selamat datang di Terrafert</h1>
                    <p class="lead">
                        Masuk untuk melanjutkan
                    </p>
                </div>
                <form action="<?= base_url('GetLogin'); ?>" method="POST">
                    <div class="mb-3 w-100 d-flex justify-content-center">
                        <input class="form-control form-control-lg custom-box-shadow" type="text" name="inputEmail" style="" placeholder="Nama Pengguna" />
                    </div>
                    <div class="mb-3 w-100 d-flex justify-content-center">
                        <input class="form-control form-control-lg custom-box-shadow" type="password" name="inputPassword" placeholder="Kata Sandi" />
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-lg btn-main">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>