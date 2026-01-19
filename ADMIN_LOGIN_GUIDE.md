# Panduan Admin Login dan Autentikasi SPFC

## 📋 Ringkasan Perubahan

Sistem admin login telah berhasil diterapkan pada aplikasi SPFC. Berikut adalah file dan perubahan yang telah dilakukan:

### File Baru yang Dibuat:

1. **login_admin.php** - Halaman login admin
2. **check_auth.php** - File fungsi autentikasi
3. **logout.php** - File untuk logout

### File yang Dimodifikasi:

1. **index.php** - Menambahkan session management dan autentikasi check

---

## 🔐 Kredensial Login

**Username:** `admin`  
**Password:** `admin123`

⚠️ **PENTING:** Ganti password default ini dengan password yang lebih aman di file `login_admin.php` baris 19-20.

---

## 🚀 Cara Menggunakan

### 1. Akses Halaman Admin

- Buka halaman utama: `http://localhost/spfc/index.php`
- Klik menu "Admin Login" di sidebar
- Atau akses langsung: `http://localhost/spfc/login_admin.php`

### 2. Login

- Masukkan username: `admin`
- Masukkan password: `admin123`
- Klik tombol "Masuk"

### 3. Akses Fitur Admin

Setelah login, Anda dapat mengakses:

- **Gejala** - Tambah, edit, hapus data gejala
- **Penyakit** - Tambah, edit, hapus data penyakit
- **Basis Aturan** - Manage basis aturan diagnosis

### 4. Logout

- Klik "Logout" di sidebar untuk keluar dari akun admin

---

## 🔒 Fitur Keamanan

### 1. Session Management

- Setiap login menyimpan session admin
- Jika belum login dan mengakses halaman admin, otomatis redirect ke login page

### 2. Session Timeout

- Waktu timeout default: 30 menit
- Jika 30 menit tidak aktif, session akan berakhir dan harus login ulang

### 3. Protected Pages

Halaman-halaman berikut dilindungi dan hanya bisa diakses jika sudah login:

- Tampil Gejala (`?page=gejala`)
- Tambah Gejala (`?page=gejala&action=tambah`)
- Edit Gejala (`?page=gejala&action=update`)
- Hapus Gejala (`?page=gejala&action=hapus`)
- Tampil Penyakit (`?page=penyakit`)
- Tambah Penyakit (`?page=penyakit&action=tambah`)
- Edit Penyakit (`?page=penyakit&action=update`)
- Hapus Penyakit (`?page=penyakit&action=hapus`)
- Tampil Basis Aturan (`?page=aturan`)
- Tambah Basis Aturan (`?page=aturan&action=tambah`)
- Edit Basis Aturan (`?page=aturan&action=update`)
- Hapus Basis Aturan (`?page=aturan&action=hapus`)

### 4. User Interface Dinamis

- Menu "Admin" hanya tampil jika sudah login
- Menu "Logout" menampilkan nama admin yang login
- Menu "Admin Login" hanya tampil jika belum login

---

## 🛠️ Untuk Meningkatkan Keamanan

### 1. Ubah Password Default

Edit file `login_admin.php` baris 19-20:

```php
$admin_username = 'admin';
$admin_password = 'password_yang_aman'; // Ubah di sini
```

### 2. Simpan ke Database (Optional - Advanced)

Untuk keamanan lebih baik, simpan kredensial di database dengan password di-hash:

```php
// Ganti logika login di login_admin.php dengan:
$sql = "SELECT id, name, password FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['login_time'] = time();
        header("Location: index.php");
        exit();
    }
}
```

### 3. Gunakan HTTPS

Pastikan aplikasi berjalan di HTTPS untuk keamanan transmisi password.

### 4. Batasi Login Attempt

Tambahkan pembatasan jumlah attempt login gagal.

---

## 📁 Struktur File

```
spfc/
├── login_admin.php        [NEW] Halaman login
├── logout.php             [NEW] Script logout
├── check_auth.php         [NEW] Fungsi autentikasi
├── index.php              [MODIFIED] Routing & session management
├── config.php             [NO CHANGE] Database connection
├── tampil_gejala.php      [Protected by autentikasi]
├── tampil_penyakit.php    [Protected by autentikasi]
├── tampil_aturan.php      [Protected by autentikasi]
└── [Halaman lainnya]      [Protected by autentikasi]
```

---

## 🔍 Troubleshooting

### 1. "Session not started" Error

Pastikan `session_start()` ada di awal `index.php` - ✅ Sudah ditambahkan

### 2. Redirect Loop pada Login

Cek bahwa `check_auth.php` dimuat di `index.php` sebelum routing logic

### 3. Session Hilang Saat Pindah Halaman

Pastikan `check_auth.php` diinclude di semua halaman yang perlu autentikasi

### 4. Password Tidak Cocok

Pastikan tidak ada spasi atau karakter khusus di username/password

---

## 📝 Catatan Penting

1. **Password Hardcoded**: Username dan password saat ini di-hardcoded di `login_admin.php`. Ini acceptable untuk aplikasi sederhana, tapi untuk production, gunakan database.

2. **Session Storage**: Session disimpan di server (default PHP session handler). Untuk distributed systems, pertimbangkan Redis atau database.

3. **CSRF Protection**: Untuk keamanan lebih, tambahkan CSRF token di form login.

4. **Session Timeout**: Timeout 30 menit bisa disesuaikan di `check_auth.php` baris 21.

---

## ✅ Testing Checklist

- [x] Login berhasil dengan kredensial yang benar
- [x] Login gagal dengan kredensial yang salah
- [x] Halaman admin tidak bisa diakses tanpa login
- [x] Menu admin hanya tampil jika sudah login
- [x] Logout berfungsi dengan baik
- [x] Session timeout berfungsi

---

Selamat! Sistem admin login Anda sudah siap digunakan! 🎉
