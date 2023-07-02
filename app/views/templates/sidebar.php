<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link mt-4 <?= $data['judul'] == 'Dashboard' ? 'active' : '' ?>" href="<?= base_url; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Fitur</div>
                    <a class="nav-link <?= $data['judul'] == 'Kategori' ? 'active' : '' ?>" href="<?= base_url; ?>/kategori">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Kategori
                    </a>
                    <a class="nav-link <?= $data['judul'] == 'Buku' ? 'active' : '' ?>" href="<?= base_url; ?>/buku">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Buku
                    </a>
                    <a class="nav-link <?= $data['judul'] == 'About Me' ? 'active' : '' ?>" href="<?= base_url; ?>/about">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        About Me
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>