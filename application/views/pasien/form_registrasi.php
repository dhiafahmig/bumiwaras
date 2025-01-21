<?php include 'application/views/templates/header.php'; ?>

<body>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col">
                <?php if (!isset($pasien)): ?>
                    <a href="<?php echo base_url('table'); ?>" class="btn btn-info">
                        <i class="fas fa-list"></i> List Pasien Terdaftar
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><?php echo isset($pasien) ? 'Edit' : 'Tambah'; ?> Data Pasien</h4>
            </div>
            <div class="card-body">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo isset($pasien) ? base_url('registrasi/edit/'.$pasien->id_pasien) : base_url('simpan'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Identitas (KTP/SIM/Passport) *</label>
                                <input type="text" name="no_identitas" class="form-control" value="<?php echo set_value('no_identitas', isset($pasien) ? $pasien->no_identitas : ''); ?>">
                                <?php echo form_error('no_identitas', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo set_value('nama_lengkap', isset($pasien) ? $pasien->nama_lengkap : ''); ?>">
                                <?php echo form_error('nama_lengkap', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo set_value('tempat_lahir', isset($pasien) ? $pasien->tempat_lahir : ''); ?>">
                                <?php echo form_error('tempat_lahir', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo set_value('tanggal_lahir', isset($pasien) ? $pasien->tanggal_lahir : ''); ?>">
                                <?php echo form_error('tanggal_lahir', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L" <?php echo set_select('jenis_kelamin', 'L', isset($pasien) && $pasien->jenis_kelamin == 'L'); ?>>Laki-laki</option>
                                    <option value="P" <?php echo set_select('jenis_kelamin', 'P', isset($pasien) && $pasien->jenis_kelamin == 'P'); ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Lengkap *</label>
                                <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat', isset($pasien) ? $pasien->alamat : ''); ?></textarea>
                                <?php echo form_error('alamat', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Status Pernikahan *</label>
                                <select name="status_pernikahan" class="form-control">
                                    <option value="Belum Menikah" <?php echo set_select('status_pernikahan', 'Belum Menikah', isset($pasien) && $pasien->status_pernikahan == 'Belum Menikah'); ?>>Belum Menikah</option>
                                    <option value="Menikah" <?php echo set_select('status_pernikahan', 'Menikah', isset($pasien) && $pasien->status_pernikahan == 'Menikah'); ?>>Menikah</option>
                                    <option value="Cerai Hidup" <?php echo set_select('status_pernikahan', 'Cerai Hidup', isset($pasien) && $pasien->status_pernikahan == 'Cerai Hidup'); ?>>Cerai Hidup</option>
                                    <option value="Cerai Mati" <?php echo set_select('status_pernikahan', 'Cerai Mati', isset($pasien) && $pasien->status_pernikahan == 'Cerai Mati'); ?>>Cerai Mati</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Keluarga Terdekat *</label>
                                <input type="text" name="nama_keluarga" class="form-control" value="<?php echo set_value('nama_keluarga', isset($pasien) ? $pasien->nama_keluarga : ''); ?>">
                                <?php echo form_error('nama_keluarga', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Hubungan Keluarga *</label>
                                <input type="text" name="hubungan_keluarga" class="form-control" value="<?php echo set_value('hubungan_keluarga', isset($pasien) ? $pasien->hubungan_keluarga : ''); ?>">
                                <?php echo form_error('hubungan_keluarga', '<div class="error-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Kontak Keluarga *</label>
                                <input type="text" name="kontak_keluarga" class="form-control" value="<?php echo set_value('kontak_keluarga', isset($pasien) ? $pasien->kontak_keluarga : ''); ?>">
                                <?php echo form_error('kontak_keluarga', '<div class="error-feedback">', '</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2"><?php echo isset($pasien) ? 'Update' : 'Simpan'; ?> Data</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'application/views/templates/footer.php'; ?>