<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Utama</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        halaman
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Landing Page
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="banner.php"><div class="sb-nav-link-icon"><i class="fas fa-reguler fa-window-maximize"></i></div>Banner</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="tryout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-file-pen"></i></div>
                                Tryout
                            </a>
                            <a class="nav-link" href="bimbel.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-chalkboard-user"></i></div>
                                Bimbel
                            </a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Pengguna</div>
                    <a class="nav-link" href="user.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="admin.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user-tie"></i></div>
                        Admin
                    </a> <br>
                    <a class="nav-link" href="logout.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-right-from-bracket"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Administrator
            </div>
        </nav>
    </div>