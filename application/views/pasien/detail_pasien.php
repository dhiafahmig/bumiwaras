
<?php include 'application/views/templates/header.php'; ?>
<body>
    <div class="container mt-5">
        <h2>Detail Pasien</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $pasien->nama_lengkap ?></h5>
                <p class="card-text"><strong>No. Identitas:</strong> <?= $pasien->no_identitas ?></p>
                <p class="card-text"><strong>Tempat, Tanggal Lahir:</strong> <?= $pasien->tempat_lahir . ', ' . date('d/m/Y', strtotime($pasien->tanggal_lahir)) ?></p>
                <p class="card-text"><strong>Jenis Kelamin:</strong> <?= $pasien->jenis_kelamin ?></p>
                <p class="card-text"><strong>Alamat:</strong> <?= $pasien->alamat ?></p>
                <p class="card-text"><strong>Status Pernikahan:</strong> <?= $pasien->status_pernikahan ?></p>
                <p class="card-text"><strong>Nama Keluarga:</strong> <?= $pasien->nama_keluarga ?></p>
                <p class="card-text"><strong>Hubungan Keluarga:</strong> <?= $pasien->hubungan_keluarga ?></p>
                <p class="card-text"><strong>Kontak Keluarga:</strong> <?= $pasien->kontak_keluarga ?></p>
                <a href="<?= base_url('table') ?>" class="btn btn-primary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</body>

<?php include 'application/views/templates/footer.php'; ?>