# QUICK START - Sistem Admin Login SPFC

## 🎯 Apa yang Telah Dilakukan?

Sistem login admin dan autentikasi telah berhasil diterapkan pada aplikasi SPFC dengan fitur keamanan penuh.

---

## ⚡ Quick Start (3 Langkah)

### 1️⃣ Login ke Admin

- Buka: `http://localhost/spfc/login_admin.php`
- **Username**: `admin`
- **Password**: `admin123`

### 2️⃣ Akses Fitur Admin

Setelah login, menu Admin akan muncul di sidebar:

- ✅ Kelola Gejala
- ✅ Kelola Penyakit
- ✅ Kelola Basis Aturan

### 3️⃣ Logout

Klik tombol "Logout" di sidebar untuk keluar

---

## 📦 File-File Baru

| File                          | Fungsi                                |
| ----------------------------- | ------------------------------------- |
| **login_admin.php**           | 🔐 Halaman login admin                |
| **logout.php**                | 🚪 Script logout                      |
| **check_auth.php**            | 🛡️ Fungsi validasi autentikasi        |
| **change_admin_password.php** | 🔑 Tool untuk ubah password           |
| **admin_table.sql**           | 💾 SQL untuk upgrade ke database auth |
| **ADMIN_LOGIN_GUIDE.md**      | 📖 Panduan lengkap (dokumentasi)      |
| **QUICK_START.md**            | ⚡ File ini                           |

---

## 🔒 Keamanan

✅ **Session-based authentication** - Aman dan standard  
✅ **Protected admin pages** - Hanya admin yang bisa akses  
✅ **Session timeout** - Auto logout setelah 30 menit idle  
✅ **Dynamic UI** - Menu berubah sesuai status login  
✅ **Easy to upgrade** - Bisa upgrade ke database-based auth

---

## 🔧 Ubah Password Admin

**RECOMMENDED:** Ubah password default segera!

### Opsi 1: GUI Tool (Mudah)

```
http://localhost/spfc/change_admin_password.php
```

- Password lama: `admin123`
- Masukkan password baru (minimal 6 karakter)
- Hapus file setelah selesai untuk keamanan

### Opsi 2: Edit File Langsung

Edit `login_admin.php` baris 19-20:

```php
$admin_username = 'admin';
$admin_password = 'PASSWORD_BARU_ANDA'; // <- Ganti di sini
```

### Opsi 3: Upgrade ke Database (Advanced)

Lihat `admin_table.sql` untuk setup database authentication

---

## 📋 Testing Checklist

Pastikan semua ini bekerja:

- [ ] Bisa login dengan username `admin` dan password `admin123`
- [ ] Mendapat error saat login dengan password salah
- [ ] Menu Admin hanya muncul setelah login
- [ ] Bisa mengakses halaman Gejala/Penyakit/Aturan setelah login
- [ ] Tidak bisa akses halaman admin tanpa login (redirect ke login)
- [ ] Logout berfungsi dengan baik
- [ ] Menu "Admin Login" muncul kembali setelah logout

---

## 🎨 Fitur UI/UX

- 🌈 **Modern login design** - Gradient background yang menarik
- 📱 **Responsive** - Bekerja di mobile dan desktop
- 👤 **User indicator** - Menampilkan nama admin yang login
- 🚪 **Quick logout** - Tombol logout di sidebar
- ⚠️ **Error messages** - Pesan error yang jelas
- ⏱️ **Session timeout** - Notifikasi jika session timeout

---

## 🚀 Langkah Selanjutnya (Optional)

1. **Upgrade ke Database Auth**

   - Jalankan `admin_table.sql` di database
   - Update logika login di `login_admin.php`
   - Password di-hash dengan `password_hash()`

2. **Add CSRF Protection**

   - Tambahkan CSRF token di form login
   - Validasi token pada POST request

3. **Add Login Attempt Limiting**

   - Batasi failed login attempts
   - Lockout temporary setelah 5 kali gagal

4. **Add Activity Logging**

   - Log setiap aksi admin
   - Simpan di database untuk audit trail

5. **Use HTTPS**
   - Pastikan aplikasi berjalan di HTTPS
   - Encrypt session cookies

---

## ❓ FAQ

**Q: Bagaimana jika lupa password admin?**  
A: Edit langsung di `login_admin.php` baris 19-20 atau gunakan `change_admin_password.php`

**Q: Bisakah membuat multiple admin?**  
A: Untuk sekarang hanya 1 admin. Upgrade ke database untuk multi-admin support.

**Q: Berapa lama session berlaku?**  
A: 30 menit idle time. Bisa diubah di `check_auth.php` baris 21.

**Q: Apakah password aman?**  
A: Saat ini hardcoded di file PHP. Upgrade ke database + password hash untuk production.

**Q: Bisa diakses dari smartphone?**  
A: Ya, halaman login responsive dan bekerja di semua device.

---

## 📞 Support

Jika ada masalah:

1. Baca `ADMIN_LOGIN_GUIDE.md` untuk dokumentasi lengkap
2. Check troubleshooting section di dokumentasi
3. Pastikan `config.php` sudah terhubung ke database
4. Pastikan session folder di server writable

---

**Selamat! Sistem admin login Anda sudah siap! 🎉**

Nikmati kemudahan mengelola data dengan aman.

---

_Last Updated: January 4, 2026_
