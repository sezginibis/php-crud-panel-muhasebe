<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="dist/img/logo.png" alt="SSM Panel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SSM Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form 
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
                </div>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-minus-square"></i>
                        <p>
                            Giderler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="sayfa.php?sayfa=masraflar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Masraflar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sayfa.php?sayfa=odemeler" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ödemeler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sayfa.php?sayfa=calisanlar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Çalışanlar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>
                            Gelirler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="sayfa.php?sayfa=alacaklar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alacaklar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sayfa.php?sayfa=satislar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Satışlar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="nakit.php" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Nakit Yönetimi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Filtremeler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="raporlar.php?rapor=masraf" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Masraf filtresi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="raporlar.php?rapor=odeme" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ödeme filtresi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="raporlar.php?rapor=alacak" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alacak filtresi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="raporlar.php?rapor=satis" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Satış filtresi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="raporlar.php?rapor=nakit" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nakit filtresi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="kullanicilar.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Kullanıcılar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cikis.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Çıkış yap
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>