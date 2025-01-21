<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {

    private $table = 'pasien';  // nama tabel di database

    public function simpan($data) {
        return $this->db->insert($this->table, [
            'no_identitas' => $data['no_identitas'],
            'nama_lengkap' => $data['nama_lengkap'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'status_pernikahan' => $data['status_pernikahan'],
            'nama_keluarga' => $data['nama_keluarga'],
            'hubungan_keluarga' => $data['hubungan_keluarga'],
            'kontak_keluarga' => $data['kontak_keluarga'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function get_all() {
        $this->db->select('id_pasien, no_identitas, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, status_pernikahan, nama_keluarga, hubungan_keluarga, kontak_keluarga');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id_pasien) {
        return $this->db->get_where($this->table, ['id_pasien' => $id_pasien])->row();
    }

    public function update($id_pasien, $data) {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->update($this->table, $data);
    }

    public function delete($id_pasien) {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->delete($this->table);
    }
}
