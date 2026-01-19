<?php
// Fungsi untuk mengecek apakah user sudah login sebagai admin
function check_admin_login() {
    // Mulai session jika belum dimulai
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Cek apakah session admin_id ada
    if (!isset($_SESSION['admin_id'])) {
        // Redirect ke login page
        header("Location: login_admin.php");
        exit();
    }
    
    // Optional: Cek session timeout (30 menit)
    $timeout = 30 * 60; // 30 menit dalam detik
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > $timeout) {
        // Session timeout, hapus session dan redirect ke login
        session_destroy();
        header("Location: login_admin.php?timeout=1");
        exit();
    }
    
    // Update login time untuk mencegah timeout
    $_SESSION['login_time'] = time();
    
    return true;
}

// Fungsi untuk logout
function logout_admin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
}
?>
