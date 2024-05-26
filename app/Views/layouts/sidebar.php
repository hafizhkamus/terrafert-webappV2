<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= base_url('/home'); ?> ">
            <!-- <span class="align-middle">CI4 - Starter Panel</span> -->
            <div class="w-100 text-center">
                <img class="w-75" src="<?= base_url('assets/img/logo-3.png') ?>"/>
            </div>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item <?= ($segment == 'map') ? 'active' : ''; ?>">
                <a class="sidebar-link px-3 py-3" href="<?= base_url('map'); ?> ">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle px-2">Peta</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($segment == 'alat') ? 'active' : ''; ?>">
                <a class="sidebar-link px-3 py-3" href="<?= base_url('alat'); ?> ">
                    <i class="align-middle" data-feather="pen-tool"></i> <span class="align-middle px-2">Alat</span>
                </a>
            </li>
            <li class="sidebar-item <?= ($segment == 'histori') ? 'active' : ''; ?>">
                <a class="sidebar-link px-3 py-3" href="<?= base_url('histori'); ?> ">
                    <i class="align-middle" data-feather="clock"></i> <span class="align-middle px-2">Histori</span>
                </a>
            </li>   
            <li class="sidebar-item <?= ($segment == 'grafik') ? 'active' : ''; ?>">
                <a class="sidebar-link px-3 py-3" href="<?= base_url('grafik'); ?> ">
                    <i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle px-2">Grafik</span>
                </a>
            </li>
        </ul>
    </div>
</nav>