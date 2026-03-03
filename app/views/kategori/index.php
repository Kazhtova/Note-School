<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori | Dashboard Admin</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/style3.css?v=<?php echo time(); ?>">
</head>

<body>

    <?php require_once 'app/views/components/nav.php'; ?>

    <main class="main-content">

        <header class="header-top" style="margin-bottom: 2rem;">
            <div class="welcome-text">
                <h2 style="font-family:'Poppins'; color: var(--text-main);">Manajemen Kategori</h2>
            </div>
            <div class="user-profile">
                <div style="text-align: right;">
                    <span style="display:block; font-weight:600; font-size:0.9rem;">Admin Role</span>
                    <span style="font-size: 0.8rem; color: var(--text-muted);">Online</span>
                </div>
                <div class="avatar">
                    <?php echo isset($_SESSION['username']) ? strtoupper(substr($_SESSION['username'], 0, 1)) : 'A'; ?>
                </div>
            </div>
        </header>

        <div class="container" style="max-width: 100%; padding: 0 1rem;">
            <div class="page-header">
                <div>
                    <h2 class="title">Daftar Kategori</h2>
                    <p class="subtitle">Kelola kategori produk dan konten Anda</p>
                </div>
                <a href="index.php?act=kategori-tambah" class="btn btn-primary">
                    <i data-lucide="plus"></i> Tambah Kategori
                </a>
            </div>

            <?php if (isset($_SESSION['success_msg'])) : ?>
            <div class="alert alert-success">
                <i data-lucide="check-circle"></i>
                <?php 
                    echo $_SESSION['success_msg']; 
                    unset($_SESSION['success_msg']);
                ?>
            </div>
            <?php endif; ?>

            <div class="card table-card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th width="80">No.</th>
                                <th>Nama Kategori</th>
                                <th>Dibuat Oleh</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($data_kategori) && count($data_kategori) > 0) :
                                foreach ($data_kategori as $row) : 
                                    $id = $row['id_kategori'] ?? $row['id'] ?? '';
                            ?>
                            <tr>
                                <td class="text-center text-muted"><?php echo $no++; ?></td>
                                <td>
                                    <span
                                        class="category-name"><?php echo htmlspecialchars($row['nama_kategori']); ?></span>
                                </td>
                                <td>
                                    <div class="admin-badge">
                                        <i data-lucide="user"></i>
                                        <?php echo htmlspecialchars($row['nama_admin'] ?? 'Unknown'); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="index.php?act=kategori-edit&id_kategori=<?php echo $id; ?>"
                                            class="btn-icon btn-edit" title="Edit">
                                            <i data-lucide="edit-3"></i>
                                        </a>
                                        <a href="index.php?act=kategori-hapus&id_kategori=<?php echo $id; ?>"
                                            class="btn-icon btn-delete delete-btn" title="Hapus">
                                            <i data-lucide="trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="4" class="empty-state" style="text-align: center; padding: 3rem;">
                                    <i data-lucide="folder-open"
                                        style="width: 48px; height: 48px; margin-bottom: 1rem; color: var(--text-muted);"></i>
                                    <p style="color: var(--text-muted);">Belum ada kategori tersedia.</p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
    // Initialize Icons for content area
    lucide.createIcons();
    </script>

    <?php require_once 'public/js/components/alertDel.php'; ?>
</body>

</html>