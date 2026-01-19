<?php 
// Mulai session
session_start();

// koneksi database
include "config.php";
include "check_auth.php";

?>

<?php
// compute a base path that works whether the site is served at /spfc or the webroot
$base = rtrim(str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'])), '/');
if ($base === '') $base = '/';
// make sure $base does not have a trailing slash when used below (we'll handle it)
if ($base !== '/' ) $base = $base;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPFC</title>

        <script src="https://kit.fontawesome.com/e487c97f99.js" crossorigin="anonymous"></script>
        <!-- bootstrap css -->
         <link rel="stylesheet" href="<?php echo $base; ?>/assets/css/bootstrap.min.css">
         <!-- datatables css -->
            <link rel="stylesheet" href="<?php echo $base; ?>/assets/css/datatables.min.css">
        <!-- Font Awesome css -->
        <link rel="stylesheet" href="<?php echo $base; ?>/assets/css/all.css">
        <!-- chosen css -->
         <link rel="stylesheet" href="<?php echo $base; ?>/assets/css/bootstrap-chosen.css">
        <!-- custom styles (load last so it can override library CSS) -->
        <link rel="stylesheet" href="<?php echo $base; ?>/assets/css/style.css?v=<?php echo filemtime(__DIR__.'/assets/css/style.css'); ?>">

</head>

<body>
    <!-- navbar -->
    


<!-- container -->
<div class="container">
    <!-- Sidebar -->
    <aside id="sidebar">
            <div class="sidebar-widget">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="index.php">Marnicactus</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                
                <li class="sidebar-item">
                    <a href="?page=konsultasi" class="sidebar-link">
                        <i class="fa-regular fa-rectangle-list"></i>
                        <span>Konsultasi</span>
                    </a>
                </li>
                
                <?php if (isset($_SESSION['admin_id'])): ?>
                    <!-- Menu Admin (Ketika sudah login) -->
                    <li class="sidebar-item">
                        <a href="?page=admin" class="sidebar-link">
                            <i class="fa-regular fa-square-check"></i>
                            <span>Dashboard Admin</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="logout.php" class="sidebar-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout (<?php echo htmlspecialchars($_SESSION['admin_name']); ?>)</span>
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Login Link (Ketika belum login) -->
                    <li class="sidebar-item">
                        <a href="login_admin.php" class="sidebar-link">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span>Login Admin</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </aside>


    <!-- setting menu -->
    <div class="main">
        <div class="content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : "";
            $action = isset($_GET['action']) ? $_GET['action'] : "";
            
            // Halaman-halaman yang memerlukan autentikasi admin
            $admin_pages = ['admin', 'gejala', 'penyakit', 'aturan'];
            
            // Cek autentikasi untuk halaman admin
            if (in_array($page, $admin_pages)) {
                check_admin_login();
            }

            if ($page==""){
                include "welcome.php";
            }elseif ($page=="admin"){
                // Halaman dashboard admin
                include "admin_dashboard.php";
            }elseif ($page=="gejala"){
                if ($action==""){
                    include "tampil_gejala.php";
                }elseif ($action=="tambah"){
                    include "tambah_gejala.php";
                }elseif ($action=="update"){
                    include "update_gejala.php";
                }else{
                    include "hapus_gejala.php";
                }
            }elseif ($page=="penyakit"){
                if ($action==""){
                    include "tampil_penyakit.php";
                }elseif ($action=="tambah"){
                    include "tambah_penyakit.php";
                }elseif ($action=="update"){
                    include "update_penyakit.php";
                }else{
                    include "hapus_penyakit.php";
                }
            }elseif ($page=="aturan"){
                if ($action==""){
                    include "tampil_aturan.php";
                }elseif ($action=="tambah"){
                    include "tambah_aturan.php";
                }elseif ($action=="detail"){
                    include "detail_aturan.php";
                }elseif ($action=="update"){
                    include "update_aturan.php";
                }elseif ($action=="hapus_gejala"){
                    include "hapus_detail_aturan.php";
                }else{
                    include "hapus_aturan.php";
                }
            }elseif ($page=="konsultasi"){
                if ($action==""){
                    include "tampil_konsultasi.php";
                }else{
                    include "hasil_konsultasi.php";
                }
            }else{
                include "NAMA_HALAMAN";
            }
            ?>
        </div>
    </div>
</div>

<!-- jquery -->
<script src="<?php echo $base; ?>/assets/js/jquery-3.7.0.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo $base; ?>/assets/js/bootstrap.min.js"></script>
<!-- datatables js -->
<script src="<?php echo $base; ?>/assets/js/datatables.min.js"></script>
<script>
        $(document).ready(function() {
                    $('#myTable').DataTable();
        } );
</script>

<!-- Font Awesome js -->
<script src="<?php echo $base; ?>/assets/js/all.js"></script>

<!-- Chosen js -->
<script src="<?php echo $base; ?>/assets/js/chosen.jquery.min.js"></script>
<script>
        $(function() {
            $('.chosen').chosen();
        });
</script>

<!-- custom script (after jQuery) -->
<script src="<?php echo $base; ?>/assets/js/script.js"></script>

</body>
</html>