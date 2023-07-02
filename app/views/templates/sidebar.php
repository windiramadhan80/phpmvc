<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a <?php if ($data['judul'] == 'Dashboard') : ?> class="nav-link mt-4 active" <?php else : ?> class="nav-link mt-4" <?php endif; ?> href="<?= base_url; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Fitur</div>
                    <a <?php if ($data['judul'] == 'Kategori') : ?> class="nav-link active" <?php else : ?> class="nav-link" <?php endif; ?> href="<?= base_url; ?>/kategori">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Kategori
                    </a>
                    <a class="nav-link" href="<?= base_url; ?>/buku">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Buku
                    </a>
                    <a class="nav-link" href="<?= base_url; ?>/about">
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