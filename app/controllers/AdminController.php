<?php 
   
include_once 'config/database.php';
include_once 'app/models/AdminModel.php';

class AdminController{
    private $adminModel;
    private $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->adminModel = new AdminModel($this->db);
    }

    public function viewRegister(){
        include 'app/views/auth/register.php';
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($this->adminModel->register($username, $password)){
                $success = "Register berhasil Silahkan Login";
                include 'app/views/auth/login.php';
            } else {
                $error = "Gagal Register. Username Mungkin Sudah Dipakai";
                include "app/views/auth/register.php";
            }
        }
    }

    public function index(){
        if(isset($_SESSION['admin_id'])){
            header("Location: index.php?act=dashboard");
            exit;
        }
        include 'app/views/auth/login.php';
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->adminModel->login($username, $password);

            if($admin) {
                $_SESSION['admin_id'] = $admin['id_admin'];
                $_SESSION['username'] = $admin['username'];
                header("Location: index.php?act=dashboard");
            } else {
                $error = "Username Atau Password salah";
                include 'app/views/auth/login.php';
            }
        }
    }
    
    public function dashboard(){
        if(!isset($_SESSION['admin_id'])){
            header("Location: index.php");
            exit;
        }
        include 'app/views/dashboard/index.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}

?>
