<?php 

session_start();

include_once 'app/controllers/AdminController.php';
include_once 'app/controllers/KategoriController.php';

$action = isset($_GET['act']) ? $_GET['act'] : 'login';
$controller = new AdminController();
$KategoriController = new KategoriController();

switch ($action) {
    case 'register':
    $controller->viewRegister();
        break;

    case 'register-process':
    $controller->register();
        break;

    case 'login':
    $controller->index();
        break;

    case 'login-process':
        $controller->login();
        break;

    case 'logout':
        $controller->logout();
        break;

    case 'kategori':
      $KategoriController->index();
      break;

    case 'kategori-tambah':
      $KategoriController->tambah();
      break;

    case 'kategori-tambah-proses':
      $KategoriController->tambahproses();
      break;

    case 'kategori-edit':
      $KategoriController->edit();
      break;

    case 'kategori-edit-proses':
      $KategoriController->editproses();
      break;
    
    case 'kategori-hapus':
      $KategoriController->hapus();
      break;

    case 'dashboard':
        $controller->dashboard();
        break;

    default:
    $controller->index();
    break;

}
?>
