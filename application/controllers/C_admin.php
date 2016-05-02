<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
    }

    //diload pertama kali
    public function index($isi = 'isi_index') {
        $data['menu'] = $this->M_admin->index();
        $data['isi'] = $isi;
        $this->load->view('skel', $data);
    }

//________________________________________________________Universal__________________________________________________________________________________
    //Halaman login
    public function usrs() {
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        //super admin
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/admin', 'refresh');
            die();
        } //user biasa
        elseif (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/user', 'refresh');
            die();
        } else {
            $this->load->view('login');
        }
    }

    //Proses validasi login
    function validate() {
        $this->form_validation->set_rules('usern', 'User Name', 'trim|required');
        $this->form_validation->set_rules('passw', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->usrs();
        } else {
            $query = $this->M_admin->validate();
            if ($query) { // if the user's validated...
                if ($query->privillege == "common") {
                    $data = array(
                        'username' => $this->input->post('usern'),
                        'is_logged_in' => TRUE,
                        'privillege' => "common"
                    );
                } elseif ($query->privillege == "superadmin") {
                    $data = array(
                        'username' => $this->input->post('usern'),
                        'is_logged_in' => TRUE,
                        'privillege' => "superadmin"
                    );
                }
                $this->session->set_userdata($data);
                $priv = $this->session->userdata('privillege');
                if ($priv == "superadmin") {
                    redirect(base_url() . 'C_admin/admin', 'refresh');
                    die();
                } else {
                    redirect(base_url() . 'C_admin/user', 'refresh');
                    die();
                }
            } else { // incorrect username or password
                $this->usrs();
            }
        }
    }

    //Mengecek sesi
    function is_logged_in() {
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($privillege) && $privillege != "superadmin" && !isset($username) && !isset($is_logged_in) && $is_logged_in != TRUE) {
            header('location: ' . base_url() . 'C_admin/usrs');
            die();
        } elseif (!isset($privillege) && $privillege != "superadmin" && !isset($is_logged_in) && $is_logged_in != TRUE) {
            echo "<center><h1 style='color:red;'>You have no permission to Access this Page</h1></center>";
            redirect(base_url() . 'C_admin/lock', 'refresh');
            die();
        }
    }

    //redirect ke halaman user jika privillege yang dimiliki adalah common
    function redir_user() {
        $data['data_agenda'] = $this->M_admin->get_agenda();
        $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
        $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
        $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
        $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
        $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
        $data['view'] = "u_dashboard";
        $this->load->view('user_adm', $data);
    }

    //redirect ke halaman admin jika privillege yang dimiliki adalah common
    function redir_superadmin() {
        $data['data_agenda'] = $this->M_admin->get_agenda();
        $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
        $data['view'] = "dashboard";
        $this->load->view('super_adm', $data);
    }

    //Logout
    function user_out() {
        $this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('privillege');
        $this->index();
    }

    //Log off
    function lock() {
        $user = $this->session->userdata('username');
        if (isset($user) && $user != NULL) {
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('privillege');
            //$this->session->unset_userdata('username');
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $this->load->view('priv/lock', $data);
        } else {
            $this->index();
        }
    }

    //Wake up
    function unlock() {
        $this->form_validation->set_rules('passw', 'Password', 'trim|required');
        $user = $this->session->userdata('username');
        if (isset($user) && $user != NULL) {
            $query = $this->M_admin->validate();
            if ($query) { // if the user's validated...
                //$this->chance = 0;
                if ($query->privillege == "common") {
                    $data = array(
                        'username' => $user,
                        'is_logged_in' => TRUE,
                        'privillege' => "common");
                } elseif ($query->privillege == "superadmin") {
                    $data = array(
                        'username' => $user,
                        'is_logged_in' => TRUE,
                        'privillege' => "superadmin"
                    );
                }
                $this->session->set_userdata($data);
                $priv = $this->session->userdata('privillege');
                if ($priv == "superadmin") {
                    header('location: ' . base_url() . 'C_admin/admin');
                    die();
                } else {
                    header('location: ' . base_url() . 'C_admin/user');
                    die();
                }
            } else { // incorrect username or password
                $this->lock();
            }
        } else {
            $this->index();
        }
    }

//___________________________________________________________Admin______________________________________________________________________
    //Halaman admin
    function admin($param = "dashboard") {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            if ($param == "add_memo_masuk") {
                $data['no_surat'] = $this->M_admin->get_no_surat('memo');
            } elseif ($param == "add_undangan_masuk") {
                $data['no_surat'] = $this->M_admin->get_no_surat('undangan');
            }
            $data['no_nota'] = $this->M_admin->get_no_nota();
            $data['srt_masuk'] = $this->M_admin->get_srt_masuk();
            $data['nota_keluar'] = $this->M_admin->get_nota_keluar();
            $data['alluser'] = $this->M_admin->get_user();
            $data['pengumuman'] = $this->M_admin->get_anouncement();
            $data['agenda'] = $this->M_admin->get_agenda();
            $data['data_tag'] = $this->M_admin->get_tag();
            $data['all_disposisi'] = $this->M_admin->get_disposisi();
            $data['data_agenda'] = $this->M_admin->get_agenda();
            $data['status'] = "";
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = $param;
            $this->load->view('super_adm', $data);
        }
    }

    //menambahkan user baru
    function tambah_user() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('pass', 'Password', 'trim|required');
            $this->form_validation->set_rules('repass', 'Re-type Password', 'trim|required|matches[pass]');
            $this->form_validation->set_rules('privillege', 'Hak Akses', 'trim|required');
            $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

            $config = array(
                'upload_path' => './assets/img',
                'allowed_types' => 'gif|jpg|png',
                'overwrite' => TRUE);

            if ($this->form_validation->run() == FALSE) {
                $data['status'] = validation_errors();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                $data['view'] = "add_user";
                $this->load->view('super_adm', $data);
            } else {
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                if ($this->M_admin->add_user()) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    //halaman edit user
    function edit_user($username) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username_sess = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username_sess) && isset($is_logged_in) && $is_logged_in == TRUE) {
            $data['status'] = "";
            $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
            $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
            $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
            $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
            $data['data_user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "u_edit_akun";
            $this->load->view('user_adm', $data);
        } else {
            $data['status'] = "";
            $data['data_user'] = $this->M_admin->priv($username);
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "edit_user";
            $this->load->view('super_adm', $data);
        }
    }

    //update data user
    function update_user() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username_sess = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'trim');
        $this->form_validation->set_rules('repass', 'Re-type Password', 'trim|matches[pass]');
        $this->form_validation->set_rules('privillege', 'Hak Akses', 'trim|required');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $username = $this->input->post('username');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpg|png',
            'overwrite' => TRUE);

        if ($this->form_validation->run() == FALSE) {
            $data['status'] = validation_errors();
            $this->edit_user($username);
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $q_update = $this->M_admin->update_user();

            if (isset($privillege) && $privillege == "common" && isset($username_sess) && isset($is_logged_in) && $is_logged_in == TRUE) {
                if ($q_update) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data pengguna dengan username $username telah berhasil perbaharui.</div>";
                    $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
                    $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
                    $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
                    $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
                    $data['data_user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "u_edit_akun";
                    $this->load->view('user_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
                    $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
                    $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
                    $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
                    $data['data_user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "u_edit_akun";
                    $this->load->view('user_adm', $data);
                }
            } else {
                if ($q_update) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data pengguna dengan username $username telah berhasil perbaharui.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    //Halaman input disposisi
    function disposisi($tipe) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $data['status'] = "";
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['tipe'] = $tipe;
            $data['no_agenda'] = $this->M_admin->get_last_agenda($tipe);
            $data['all_user'] = $this->M_admin->get_user();
            $data['field_disposisi'] = $this->M_admin->get_field_disposisi();
            $data['view'] = "disposisi";
            $this->load->view('super_adm', $data);
        }
    }

    //tambah data disposisi
    function tambah_disposisi() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('no_agenda', 'Nomor Agenda', 'trim|numeric|required');
            $this->form_validation->set_rules('tgl_surat', 'Nomor Agenda', 'trim|required');
            $this->form_validation->set_rules('tgl_diterima', 'Nomor Agenda', 'trim|required');
            $this->form_validation->set_rules('tingkat1', 'Nomor Agenda', 'trim|required');
            $this->form_validation->set_rules('tingkat2', 'Nomor Agenda', 'trim|required');
            $tipe = $this->input->post('tipe');

            $config = array(
                'upload_path' => './assets/dokumen',
                'allowed_types' => 'pdf',
                'overwrite' => TRUE);

            if ($this->form_validation->run() == FALSE) {
                $this->disposisi();
            } else {
                $this->load->library('upload', $config);
                $this->upload->do_upload('file');
                $q_update = $this->M_admin->tambah_disposisi();
                if ($q_update) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data disposisi berhasil ditambahkan.</div>";
                    $data['tipe'] = $tipe;
                    $data['no_agenda'] = $this->M_admin->get_last_agenda($tipe);
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['all_user'] = $this->M_admin->get_user();
                    $data['field_disposisi'] = $this->M_admin->get_field_disposisi();
                    $data['view'] = "disposisi";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['all_user'] = $this->M_admin->get_user();
                    $data['field_disposisi'] = $this->M_admin->get_field_disposisi();
                    $data['view'] = "disposisi";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    //halaman edit disposisi
    function edit_disposisi($id_disposisi) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $data['status'] = "";
            $data['data_disposisi'] = $this->M_admin->get_disposisi($id_disposisi);
            $data['user_disposisi'] = $this->M_admin->get_username_disposisi($id_disposisi);
            $data['user_no_disposisi'] = $this->M_admin->get_username_no_disposisi($id_disposisi);
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "edit_disposisi";
            $this->load->view('super_adm', $data);
        }
    }

    //tambah data pengumuman
    function tambah_pengumuman() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('perihal', 'Perihal Pengumuman', 'trim|required');
            $this->form_validation->set_rules('tgl_pengumuman', 'Tgl. Pengumuman', 'trim|required');
            $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->is_logged_in();
                $data['status'] = validation_errors();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                $data['view'] = "add_pengumuman";
                $this->load->view('super_adm', $data);
            } else {
                if ($this->M_admin->tambah_pengumuman()) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_pengumuman";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_pengumuman";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    function tambah_agenda() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('perihal', 'Perihal Agenda', 'trim|required');
            $this->form_validation->set_rules('tgl_agenda', 'Tgl. Agenda', 'trim|required');
            $this->form_validation->set_rules('jam', 'Isi Agenda', 'trim|required');
            $this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
            $this->form_validation->set_rules('peserta', 'Tempat', 'trim|required');
            $this->form_validation->set_rules('penyelenggara', 'Tempat', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->is_logged_in();
                $data['status'] = validation_errors();
                $data['srt_masuk'] = $this->M_admin->get_srt_masuk();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                $data['view'] = "agenda";
                $this->load->view('super_adm', $data);
            } else {
                if ($this->M_admin->tambah_agenda()) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['data_agenda'] = $this->M_admin->get_agenda();
                    $data['view'] = "agenda";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['data_agenda'] = $this->M_admin->get_agenda();
                    $data['view'] = "agenda";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    function tambah_tag() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('tag', 'Nama Tag', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->is_logged_in();
                $data['status'] = validation_errors();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                $data['data_tag'] = $this->M_admin->get_tag();
                $data['view'] = "tag";
                $this->load->view('super_adm', $data);
            } else {
                if ($this->M_admin->tambah_tag()) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['data_tag'] = $this->M_admin->get_tag();
                    $data['view'] = "tag";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['data_tag'] = $this->M_admin->get_tag();
                    $data['view'] = "tag";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    //menambahkan surat masuk
    function tambah_srt_masuk() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('perihal', 'Perihal Surat Masuk', 'trim|required');
            $this->form_validation->set_rules('no_agenda', 'No. Agenda', 'trim|required|numeric');
            $this->form_validation->set_rules('tglinput', 'Tgl. Input', 'trim|required');
            $this->form_validation->set_rules('tglsurat', 'Tgl. Surat', 'trim|required');
            $this->form_validation->set_rules('asalsurat', 'Asal Surat', 'trim|required');
            $this->form_validation->set_rules('nosurat', 'Nomor Surat', 'trim|required');
            $this->form_validation->set_rules('disposisi', 'Disposisi Direktur', 'trim');
            $this->form_validation->set_rules('tipesurat', 'Tipe Surat Masuk', 'trim|required');
            $tipe = $this->input->post('tipesurat');

            if ($this->form_validation->run() == FALSE) {
                if ($tipe == "Memo") {
                    $data['no_surat'] = $this->M_admin->get_no_surat('memo');
                } elseif ($tipe == "Undangan") {
                    $data['no_surat'] = $this->M_admin->get_no_surat('undangan');
                }
                $data['status'] = validation_errors();
                $data['srt_masuk'] = $this->M_admin->get_srt_masuk();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                if ($tipe == "Memo") {
                    $data['view'] = "add_memo_masuk";
                } elseif ($tipe == "Undangan") {
                    $data['view'] = "add_undangan_masuk";
                }
                $this->load->view('super_adm', $data);
            } else {
                if ($this->M_admin->add_srt_masuk()) {
                    if ($tipe == "Memo") {
                        $data['no_surat'] = $this->M_admin->get_no_surat('memo');
                    } elseif ($tipe == "Undangan") {
                        $data['no_surat'] = $this->M_admin->get_no_surat('undangan');
                    }
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['srt_masuk'] = $this->M_admin->get_srt_masuk();
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    if ($tipe == "Memo") {
                        $data['view'] = "add_memo_masuk";
                    } elseif ($tipe == "Undangan") {
                        $data['view'] = "add_undangan_masuk";
                    }
                    $this->load->view('super_adm', $data);
                } else {
                    if ($tipe == "Memo") {
                        $data['no_surat'] = $this->M_admin->get_no_surat('memo');
                    } elseif ($tipe == "Undangan") {
                        $data['no_surat'] = $this->M_admin->get_no_surat('undangan');
                    }
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['srt_masuk'] = $this->M_admin->get_srt_masuk();
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    if ($tipe == "Memo") {
                        $data['view'] = "add_memo_masuk";
                    } elseif ($tipe == "Undangan") {
                        $data['view'] = "add_undangan_masuk";
                    }
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    //menambahkan nota keluar
    function tambah_nota_keluar() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('perihal', 'Perihal Surat Masuk', 'trim|required');
            $this->form_validation->set_rules('no_nota', 'No. Agenda', 'trim|required|numeric');
            $this->form_validation->set_rules('tglinput', 'Tgl. Input', 'trim|required');
            $this->form_validation->set_rules('tujuansurat', 'Asal Surat', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['status'] = validation_errors();
                $data['no_nota'] = $this->M_admin->get_no_nota();
                $data['nota_keluar'] = $this->M_admin->get_nota_keluar();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                $data['view'] = "add_nota_keluar";
                $this->load->view('super_adm', $data);
            } else {
                if ($this->M_admin->add_nota_keluar()) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['no_nota'] = $this->M_admin->get_no_nota();
                    $data['nota_keluar'] = $this->M_admin->get_nota_keluar();
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_nota_keluar";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['no_nota'] = $this->M_admin->get_no_nota();
                    $data['nota_keluar'] = $this->M_admin->get_nota_keluar();
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_nota_keluar";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }
    
    //Halaman user
    function tambah_sharing() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_superadmin', 'refresh');
            die();
        } else {
            $data['data_agenda'] = $this->M_admin->get_agenda();
            $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
            $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
            $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
            $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
            $data['pengumuman'] = $this->M_admin->get_pengumuman();
            $data['u_disposisi'] = $this->M_admin->get_u_disposisi();
            $data['status'] = "";
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = $param;
            $this->load->view('user_adm', $data);
        }
    }

//_________________________________________________________________User__________________________________________________________________________
    //Halaman user
    function user($param = "u_dashboard") {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_superadmin', 'refresh');
            die();
        } else {
            $data['nota_keluar'] = $this->M_admin->get_nota_keluar();
            $data['srt_masuk'] = $this->M_admin->get_srt_masuk();
            $data['dokumen'] = $this->M_admin->get_dokumen();
            $data['data_agenda'] = $this->M_admin->get_agenda();
            $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
            $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
            $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
            $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
            $data['pengumuman'] = $this->M_admin->get_pengumuman();
            $data['u_disposisi'] = $this->M_admin->get_u_disposisi();
            $data['status'] = "";
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = $param;
            $this->load->view('user_adm', $data);
        }
    }

    //haaman lihat pengumuman
    function lihat_pengumuman($id_pengumuman) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            $data['pengumuman'] = $this->M_admin->get_pengumuman($id_pengumuman);
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "edit_pengumuman";
            $this->load->view('super_adm', $data);
        } else {
            $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
            $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
            $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
            $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
            $data['pengumuman'] = $this->M_admin->get_pengumuman();
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "u_dashboard";
            $this->load->view('user_adm', $data);
        }
    }

    //halaman lihat disposisi
    function lihat_disposisi($id_disposisi) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_superadmin', 'refresh');
            die();
        } else {
            $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
            $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
            $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
            $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
            $data['status'] = "";
            $data['data_disposisi'] = $this->M_admin->get_disposisi($id_disposisi);
            $data['user_disposisi'] = $this->M_admin->get_username_disposisi($id_disposisi);
            $data['user_no_disposisi'] = $this->M_admin->get_username_no_disposisi($id_disposisi);
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "lihat_disposisi";
            $this->load->view('user_adm', $data);
        }
    }

    /*
      function agenda() {
      $this->is_logged_in();
      $privillege = $this->session->userdata('privillege');
      $username = $this->session->userdata('username');
      $is_logged_in = $this->session->userdata('is_logged_in');
      if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
      redirect(base_url() . 'C_admin/redir_user', 'refresh');
      die();
      } else {
      $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
      $data['view'] = "agenda";
      $this->load->view('super_adm', $data);
      }
      }
     */

    function print_srt_masuk($view) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'C_admin/redir_user', 'refresh');
            die();
        } else {
            $this->load->library('fpdf/fpdf');
            $this->load->view('priv/' . $view);
        }
    }

}