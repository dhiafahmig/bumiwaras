<?php include 'application/views/templates/header.php'; ?>
<body>
    <div class="container mt-6">
        <h2 class="mb-4">Data Pasien</h2>
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>
        
        <div class="mb-3">
            <a href="<?= base_url('registrasi') ?>" class="btn btn-primary">Tambah Pasien Baru</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="pasienTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Identitas</th>
                                <th>Nama Lengkap</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Keluarga</th>
                                <th>Hubungan</th>
                                <th>Kontak Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($pasien as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->no_identitas ?></td>
                                <td><?= $p->nama_lengkap ?></td>
                                <td><?= $p->tempat_lahir . ', ' . date('d/m/Y', strtotime($p->tanggal_lahir)) ?></td>
                                <td><?= $p->jenis_kelamin ?></td>
                                <td><?= $p->nama_keluarga ?></td>
                                <td><?= $p->hubungan_keluarga ?></td>
                                <td><?= $p->kontak_keluarga ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('registrasi/detail/'.$p->id_pasien) ?>" class="btn btn-sm btn-info mx-1">Detail</a>
                                        <a href="<?= base_url('registrasi/edit/'.$p->id_pasien) ?>" class="btn btn-sm btn-warning mx-1">Edit</a>
                                        <a href="<?= base_url('registrasi/delete/'.$p->id_pasien) ?>" class="btn btn-sm btn-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'application/views/templates/footer.php'; ?>