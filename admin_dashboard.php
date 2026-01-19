<div class="card">
    <div class="card-header text-white border-dark" style="background-color: #004d29;">
        <strong>📊 Dashboard Admin</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="alert alert-info" role="alert">
                    <strong>Selamat datang!</strong> Anda login sebagai <strong><?php echo htmlspecialchars($_SESSION['admin_name']); ?></strong>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Card Kelola Gejala -->
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 40px; margin-bottom: 10px;">🌵</div>
                        <h5 class="card-title">Kelola Gejala</h5>
                        <p class="card-text text-muted" style="font-size: 12px;">Tambah, edit, atau hapus data gejala tanaman</p>
                        
                        <?php
                        $sql = "SELECT COUNT(*) as total FROM gejala";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_gejala = $row['total'];
                        ?>
                        
                        <div style="background-color: #f0f0f0; padding: 15px; border-radius: 8px; margin: 10px 0;">
                            <p style="margin: 0; font-size: 24px; font-weight: 600;">
                                <?php echo $total_gejala; ?>
                            </p>
                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #666;">Data Gejala</p>
                        </div>
                        
                        <a href="?page=gejala" class="btn btn-primary btn-sm mt-3" style="width: 100%; background: linear-gradient(135deg, #00ee7fff 0%, #004d29 100%); border: none;">
                            Kelola Gejala
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Kelola Penyakit -->
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 40px; margin-bottom: 10px;">💚</div>
                        <h5 class="card-title">Kelola Penyakit</h5>
                        <p class="card-text text-muted" style="font-size: 12px;">Tambah, edit, atau hapus data penyakit tanaman</p>
                        
                        <?php
                        $sql = "SELECT COUNT(*) as total FROM penyakit";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_penyakit = $row['total'];
                        ?>
                        
                        <div style="background-color: #f0f0f0; padding: 15px; border-radius: 8px; margin: 10px 0;">
                            <p style="margin: 0; font-size: 24px; font-weight: 600;">
                                <?php echo $total_penyakit; ?>
                            </p>
                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #666;">Data Penyakit</p>
                        </div>
                        
                        <a href="?page=penyakit" class="btn btn-primary btn-sm mt-3" style="width: 100%; background: linear-gradient(135deg, #00ee7fff 0%, #004d29 100%); border: none;">
                            Kelola Penyakit
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Kelola Basis Aturan -->
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm" style="transition: all 0.3s;">
                    <div class="card-body text-center">
                        <div style="font-size: 40px; margin-bottom: 10px;">✅</div>
                        <h5 class="card-title">Kelola Basis Aturan</h5>
                        <p class="card-text text-muted" style="font-size: 12px;">Manage basis aturan untuk diagnosis Tanaman</p>
                        
                        <?php
                        $sql = "SELECT COUNT(*) as total FROM basis_aturan";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_aturan = $row['total'];
                        ?>
                        
                        <div style="background-color: #f0f0f0; padding: 15px; border-radius: 8px; margin: 10px 0;">
                            <p style="margin: 0; font-size: 24px; font-weight: 600;">
                                <?php echo $total_aturan; ?>
                            </p>
                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #666;">Basis Aturan</p>
                        </div>
                        
                        <a href="?page=aturan" class="btn btn-primary btn-sm mt-3" style="width: 100%; background: linear-gradient(135deg, #00ee7fff 0%, #004d29 100%); border: none;">
                            Kelola Aturan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h5 style="margin-bottom: 20px; border-bottom: 2px solid #004d29; padding-bottom: 10px;">
                    📈 Statistik Sistem
                </h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; margin-bottom: 15px;">
                    <p style="margin: 0; color: #666; font-size: 12px; text-transform: uppercase; font-weight: 600;">
                        Total Gejala
                    </p>
                    <p style="margin: 5px 0 0 0; font-size: 28px; font-weight: 700;">
                        <?php echo $total_gejala; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; margin-bottom: 15px;">
                    <p style="margin: 0; color: #666; font-size: 12px; text-transform: uppercase; font-weight: 600;">
                        Total Penyakit
                    </p>
                    <p style="margin: 5px 0 0 0; font-size: 28px; font-weight: 700;">
                        <?php echo $total_penyakit; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; margin-bottom: 15px;">
                    <p style="margin: 0; color: #666; font-size: 12px; text-transform: uppercase; font-weight: 600;">
                        Total Basis Aturan
                    </p>
                    <p style="margin: 5px 0 0 0; font-size: 28px; font-weight: 700;">
                        <?php echo $total_aturan; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; margin-bottom: 15px;">
                    <p style="margin: 0; color: #666; font-size: 12px; text-transform: uppercase; font-weight: 600;">
                        Status Admin
                    </p>
                    <p style="margin: 5px 0 0 0; font-size: 28px; color: #28a745; font-weight: 700;">
                        ✓ Aktif
                    </p>
                </div>
            </div>
        </div>

        <!-- Informasi Akun -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div style="padding: 20px; background-color: #e7f3ff; border-radius: 8px; border-left: 4px solid #004d29;">
                    <h6 style="margin-bottom: 10px; color: #333;">
                        <i class="fa-solid fa-user-circle"></i> Informasi Akun
                    </h6>
                    <p style="margin: 5px 0; color: #555; font-size: 14px;">
                        <strong>Username:</strong> admin
                    </p>
                    <p style="margin: 5px 0; color: #555; font-size: 14px;">
                        <strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                    </p>
                    <p style="margin: 5px 0; color: #555; font-size: 14px;">
                        <strong>Login pada:</strong> <?php echo date('d/m/Y H:i:s', $_SESSION['login_time']); ?>
                    </p>
                    <p style="margin: 10px 0 0 0; font-size: 12px; color: #999;">
                        💡 Tip: Anda akan otomatis logout setelah 30 menit tidak aktif
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="change_admin_password.php" target="_blank" class="btn btn-warning btn-sm">
                    <i class="fa-solid fa-key"></i> Ubah Password
                </a>
                <a href="logout.php" class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        overflow: hidden;
    }
    
    .card:hover {
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.2) !important;
        transform: translateY(-2px);
    }
</style>
