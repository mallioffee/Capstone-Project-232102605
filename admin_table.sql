-- File ini berisi SQL untuk membuat tabel admin jika ingin mengupgrade ke database-based authentication
-- Jalankan query ini di phpMyAdmin untuk database db_spfc

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert admin default dengan password: admin123 (hashed menggunakan password_hash)
-- Catatan: Ganti password ini dengan yang Anda inginkan menggunakan password_hash()
-- Contoh di PHP: password_hash('admin123', PASSWORD_DEFAULT)
INSERT INTO admin (username, password, name, email) VALUES 
('admin', '$2y$10$YourHashedPasswordHere', 'Administrator', 'admin@spfc.local');

-- Untuk membuat hash password baru, jalankan kode PHP ini:
/*
<?php
$password = 'password_baru';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash; // Copy hasil ini untuk dimasukkan ke SQL
?>
*/
