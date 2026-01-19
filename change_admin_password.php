<?php
/**
 * Script Helper untuk Mengubah Password Admin
 * 
 * Jalankan file ini di browser untuk mengubah password admin:
 * http://localhost/spfc/change_admin_password.php
 * 
 * CATATAN: Hapus atau proteksi file ini setelah selesai mengubah password!
 */

// Pastikan script hanya bisa dijalankan via POST untuk keamanan
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && isset($_GET['reset'])) {
    // Reset password untuk demo
    $new_password = 'admin123';
    echo "<pre>";
    echo "Password Admin: " . $new_password . "\n\n";
    echo "Ubah password di file login_admin.php baris 19-20:\n";
    echo "\$admin_password = '" . $new_password . "';\n";
    echo "</pre>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php';
    
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validasi input
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $error = "Semua field harus diisi!";
    } elseif ($new_password !== $confirm_password) {
        $error = "Password baru tidak cocok!";
    } elseif (strlen($new_password) < 6) {
        $error = "Password minimal 6 karakter!";
    } else {
        // Cek password lama
        $admin_username = 'admin';
        $admin_password = 'admin123'; // Password default saat ini
        
        if ($old_password !== $admin_password) {
            $error = "Password lama salah!";
        } else {
            // Baca file login_admin.php
            $file_content = file_get_contents('login_admin.php');
            
            // Ganti password
            $new_content = str_replace(
                "\$admin_password = 'admin123';",
                "\$admin_password = '" . addslashes($new_password) . "';",
                $file_content
            );
            
            // Simpan file
            if (file_put_contents('login_admin.php', $new_content)) {
                $success = "✓ Password admin berhasil diubah!";
                // Bersihkan output buffering
                if (ob_get_level()) ob_end_clean();
            } else {
                $error = "Gagal menyimpan file. Pastikan file login_admin.php dapat ditulis.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e1e3d6;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .alert {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        input[type="password"], input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #004d29;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }
        button:hover {
            background-color: #008c4bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔐 Ubah Password Admin</h2>
        
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
            <p style="text-align: center; color: #666;">
                <a href="index.php">Kembali ke Halaman Utama</a>
            </p>
        <?php else: ?>
            <div class="alert alert-warning">
                ⚠️ <strong>PENTING:</strong> Hapus file ini setelah selesai mengubah password untuk keamanan!
            </div>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="old_password">Password Lama</label>
                    <input type="password" id="old_password" name="old_password" required>
                </div>
                
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password Baru</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                
                <button type="submit">Ubah Password</button>
            </form>
            
            <hr style="margin: 20px 0;">
            
            <p style="font-size: 12px; color: #666; text-align: center;">
                Password Lama Saat Ini: <code>password</code>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
