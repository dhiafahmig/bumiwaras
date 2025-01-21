<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Registrasi_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('pasien/form_registrasi');
    }

    public function simpan() {
        // Set validation rules
        $this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'required');
        $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
        $this->form_validation->set_rules('kontak_keluarga', 'Kontak Keluarga', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, return to form with errors
            $this->load->view('pasien/form_registrasi');
        } else {
            // Collect all form data
            $data = array(
                'no_identitas' => $this->input->post('no_identitas'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'status_pernikahan' => $this->input->post('status_pernikahan'),
                'nama_keluarga' => $this->input->post('nama_keluarga'),
                'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                'kontak_keluarga' => $this->input->post('kontak_keluarga')
            );

            // Debug: Print the data array
            echo "<pre>";
            print_r($data);
            echo "</pre>";

            // Try to save the data
            $result = $this->Registrasi_model->simpan($data);
            
            // Debug: Print the result
            var_dump($result);

            if ($result) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('table');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data.');
                redirect('registrasi');
            }
        }
    }

    public function table() {
        $data['pasien'] = $this->Registrasi_model->get_all();
        $this->load->view('pasien/table_pasien', $data);
    }

    public function edit($id_pasien) {
        $data['pasien'] = $this->Registrasi_model->get_by_id($id_pasien);

        if (empty($data['pasien'])) {
            show_404();
        }

        $this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'required');
        $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
        $this->form_validation->set_rules('kontak_keluarga', 'Kontak Keluarga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pasien/form_registrasi', $data);
        } else {
            $update_data = array(
                'no_identitas' => $this->input->post('no_identitas'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'status_pernikahan' => $this->input->post('status_pernikahan'),
                'nama_keluarga' => $this->input->post('nama_keluarga'),
                'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                'kontak_keluarga' => $this->input->post('kontak_keluarga')
            );

            if ($this->Registrasi_model->update($id_pasien, $update_data)) {
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
                redirect('table');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah data.');
                redirect('registrasi/edit/'.$id_pasien);
            }
        }
    }

    public function delete($id_pasien) {
        if ($this->Registrasi_model->delete($id_pasien)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus data.');
        }
        redirect('table');
    }

    public function detail($id_pasien) {
        $data['pasien'] = $this->Registrasi_model->get_by_id($id_pasien);

        if (empty($data['pasien'])) {
            show_404();
        }

        $this->load->view('pasien/detail_pasien', $data);
    }
}