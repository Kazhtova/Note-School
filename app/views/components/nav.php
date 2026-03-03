<?php
// Mengambil parameter 'act' dari URL. Jika kosong, asumsikan berada di 'dashboard'
// Merujuk pada standar W3Schools: PHP $_GET Superglobal
$current_page = isset($_GET['act']) ? $_GET['act'] : 'dashboard';
?>

<nav class="sidebar" id="sidebar">
    <div>
        <div class="brand">
            <i class='bx bxs-cube-alt'></i> NotesApp
        </div>

        <div class="menu">
            <a href="index.php?act=dashboard"
                class="menu-link <?php echo ($current_page === 'dashboard') ? 'active' : ''; ?>">
                <i class='bx bxs-dashboard'></i> <span>Dashboard</span>
            </a>

            <a href="index.php?act=kategori"
                class="menu-link <?php echo ($current_page === 'kategori') ? 'active' : ''; ?>">
                <i class='bx bx-note'></i> <span>Kategori</span>
            </a>

            <a href="index.php?act=kategori-tambah"
                class="menu-link <?php echo ($current_page === 'kategori-tambah' || $current_page === 'kategori-edit') ? 'active' : ''; ?>">
                <i class='bx bx-plus-circle'></i> <span>Buat Baru</span>
            </a>
        </div>
    </div>

    <a href="index.php?act=logout" class="btn-logout">
        <i class='bx bx-log-out'></i> <span>Logout</span>
    </a>
</nav>

<div class="sidebar-overlay" id="sidebarOverlay"></div>