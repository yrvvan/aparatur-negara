<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {

    public function index() {
        $query = $this->db->get('menu');
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function validate() {
        if ($this->input->post('usern') == NULL) {
            $username = $this->session->userdata('username');
        } else {
            $username = $this->input->post('usern');
        }
        $this->db->where('username', $username);
        $this->db->where('passw_user', md5($this->input->post('passw')));
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }

    function priv($usr) {
        $this->db->where('username', $usr);
        $query = $this->db->get('user');
        if ($query->num_rows() != 0) {
            return $query->row();
        }
    }

    function tambah_pengumuman() {
        $this->db->where('kepegawaian', 'aktif');
        $this->db->where('privillege', 'common');
        $username = $this->get_user();

        $add_pengumuman = array(
            'perihal' => $this->input->post('perihal'),
            'tgl_pengumuman' => $this->input->post('tgl_pengumuman'),
            'isi_pengumuman' => $this->input->post('isi')
        );
        $insert = $this->db->insert('pengumuman', $add_pengumuman);

        $this->db->select_max('id_pengumuman');
        $id_pengumuman = $this->db->get('pengumuman')->row();

        foreach ($username as $usern) {
            $data_dtl_pengumuman = array(
                'username' => $usern->username,
                'id_pengumuman' => $id_pengumuman->id_pengumuman,
                'status' => "Belum terbaca"
            );
            $q_dtl_pengumuman = $this->db->insert('detil_pengumuman', $data_dtl_pengumuman);
        }

        if ($insert && $q_dtl_pengumuman) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function unread_disposisi() {
        $this->db->select('*');
        $this->db->from('detil_all_disposisi a');
        $this->db->join('disposisi b', 'b.id_disposisi = a.id_disposisi', 'left');
        $this->db->where('a.username', $this->session->userdata('username'));
        $this->db->where('a.status', "Belum terbaca");
        $this->db->order_by('a.id_disposisi', 'desc');
        return $this->db->get()->result();
    }

    function get_dokumen() {
        $this->db->distinct();
        $this->db->select('b.nm_dokumen');
        $this->db->from('detil_disposisi a');
        $this->db->join('dokumen b', 'b.id_dokumen = a.id_dokumen', 'left');
        $this->db->order_by('a.id_dokumen', 'desc');
        return $this->db->get()->result();
    }

    function count_unread_disposisi() {
        $this->db->select('*, count(*) as total');
        $this->db->from('detil_all_disposisi a');
        $this->db->join('disposisi b', 'b.id_disposisi = a.id_disposisi', 'left');
        $this->db->where('a.username', $this->session->userdata('username'));
        $this->db->where('a.status', "Belum terbaca");
        $this->db->order_by('a.id_disposisi', 'desc');
        return $this->db->get()->row();
    }

    function unread_pengumuman() {
        $this->db->select('*');
        $this->db->from('detil_pengumuman a');
        $this->db->join('pengumuman b', 'b.id_pengumuman = a.id_pengumuman', 'left');
        $this->db->where('a.username', $this->session->userdata('username'));
        $this->db->where('a.status', "Belum terbaca");
        $this->db->order_by('a.id_pengumuman', 'desc');
        return $this->db->get()->result();
    }

    function count_unread_pengumuman() {
        $this->db->select('*, count(*) as total');
        $this->db->from('detil_pengumuman a');
        $this->db->join('pengumuman b', 'b.id_pengumuman = a.id_pengumuman', 'left');
        $this->db->where('a.username', $this->session->userdata('username'));
        $this->db->where('a.status', "Belum terbaca");
        $this->db->order_by('a.id_pengumuman', 'desc');
        return $this->db->get()->row();
    }

    function get_pengumuman($id_pengumuman = "") {
        if ($id_pengumuman == "") {
            $this->db->select('*');
            $this->db->from('detil_pengumuman a');
            $this->db->join('pengumuman b', 'b.id_pengumuman = a.id_pengumuman', 'left');
            $this->db->where('a.username', $this->session->userdata('username'));
            $this->db->order_by('a.id_pengumuman', 'desc');
            return $this->db->get()->result();
        } else {
            $dt_upd_status = array(
                'status' => "Terbaca"
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->where('id_pengumuman', $id_pengumuman);
            $update = $this->db->update('detil_pengumuman', $dt_upd_status);

            $this->db->select('*');
            $this->db->from('detil_pengumuman a');
            $this->db->join('pengumuman b', 'b.id_pengumuman = a.id_pengumuman', 'left');
            $this->db->where('a.id_pengumuman', $id_pengumuman);
            $this->db->order_by('a.id_pengumuman', 'desc');
            return $this->db->get()->row();
        }
    }

    function tambah_tag() {
        $add_tag = array(
            'nm_tag' => $this->input->post('tag')
        );
        $insert = $this->db->insert('tag', $add_tag);
        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function tambah_agenda() {
        $this->db->where('kepegawaian', 'aktif');
        $this->db->where('privillege', 'common');
        $username = $this->get_user();

        $add_agenda = array(
            'perihal' => $this->input->post('perihal'),
            'tgl_agenda' => $this->input->post('tgl_agenda'),
            'jam' => $this->input->post('jam'),
            'tempat' => $this->input->post('tempat'),
            'peserta' => $this->input->post('peserta'),
            'penyelenggara' => $this->input->post('penyelenggara')
        );
        $insert = $this->db->insert('agenda', $add_agenda);

        $this->db->select_max('id_agenda');
        $id_agenda = $this->db->get('agenda')->row();

        foreach ($username as $usern) {
            $data_dtl_agenda = array(
                'username' => $usern->username,
                'id_agenda' => $id_agenda->id_agenda,
                'status' => "Belum terbaca"
            );
            $q_dtl_agenda = $this->db->insert('detil_agenda', $data_dtl_agenda);
        }

        if ($insert && $q_dtl_agenda) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_agenda($id_agenda = "") {
        if ($id_agenda == "") {
            $this->db->where('SUBSTR(tgl_agenda,1,2)>=', date('m'));
            $this->db->order_by('id_agenda', 'desc');
            return $this->db->get('agenda')->result();
        } else {
            $this->db->where('id_agenda', $id_agenda);
            return $this->db->get('agenda')->row();
        }
    }

    function get_anouncement($id_pengumuman = "") {
        if ($id_pengumuman == "") {
            return $this->db->get('pengumuman')->result();
        } else {
            $this->db->where('id_pengumuman', $id_pengumuman);
            return $this->db->get('pengumuman')->row();
        }
    }

    function add_user() {
        $add_user = array(
            'username' => $this->input->post('username'),
            'nm_user' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'jenkel' => $this->input->post('jenkel'),
            'privillege' => $this->input->post('privillege'),
            'jabatan' => $this->input->post('jabatan'),
            'passw_user' => md5($this->input->post('pass')),
            'foto' => $_FILES['foto']['name']
        );
        $insert = $this->db->insert('user', $add_user);

        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_no_nota() {
        $this->db->select_max('no_nota');
        return $this->db->get('nota_keluar')->row();
    }

    function add_nota_keluar() {
        $add_nota_keluar = array(
            'no_nota' => $this->input->post('no_nota'),
            'tgl_input' => $this->input->post('tglinput'),
            'tujuan' => $this->input->post('tujuansurat'),
            'perihal' => $this->input->post('perihal')
        );
        $insert = $this->db->insert('nota_keluar', $add_nota_keluar);

        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_no_surat($tipe) {
        $this->db->select_max('no_agenda');
        $this->db->where('tipe', $tipe);
        return $this->db->get('surat_masuk')->row();
    }

    function add_srt_masuk() {
        $add_srt_masuk = array(
            'no_agenda' => $this->input->post('no_agenda'),
            'perihal_srt_masuk' => $this->input->post('perihal'),
            'tgl_input' => $this->input->post('tglinput'),
            'tgl_srt_masuk' => $this->input->post('tglsurat'),
            'asal_srt_masuk' => $this->input->post('asalsurat'),
            'no_surat' => $this->input->post('nosurat'),
            'disposisi' => $this->input->post('disposisi'),
            'tipe' => $this->input->post('tipesurat')
        );
        $insert = $this->db->insert('surat_masuk', $add_srt_masuk);

        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_user() {
        $username = $this->input->post('username');
        if ($this->input->post('pass') != "") {
            if ($_FILES['foto']['name'] != "") {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan'),
                    'passw_user' => md5($this->input->post('pass')),
                    'foto' => $_FILES['foto']['name']
                );
            } else {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan'),
                    'passw_user' => md5($this->input->post('pass'))
                );
            }
        } else {
            if ($_FILES['foto']['name'] != "") {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan'),
                    'foto' => $_FILES['foto']['name']
                );
            } else {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan')
                );
            }
        }
        $this->db->where('username', $username);
        $update = $this->db->update('user', $upd_user);

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_user() {
        $this->db->where('username !=', "siliwanti");
        $this->db->order_by('id_user');
        return $this->db->get('user')->result();
    }

    function get_field_disposisi() {
        return $this->db->get('field_disposisi')->result();
    }

    function get_srt_masuk() {
        return $this->db->get('surat_masuk')->result();
    }

    function get_nota_keluar() {
        $this->db->order_by('tgl_input');
        return $this->db->get('nota_keluar')->result();
    }

    function get_tag() {
        return $this->db->get('tag')->result();
    }

    function tambah_disposisi() {
        $data_disposisi = array(
            'temui_saya' => $this->input->post('temui_saya'),
            'dibahas' => $this->input->post('dibahas'),
            'diteliti' => $this->input->post('diteliti'),
            'tanggapan' => $this->input->post('tanggapan'),
            'draft' => $this->input->post('draft'),
            'siapkan_jawaban' => $this->input->post('siapkan_jawaban'),
            'wakili' => $this->input->post('wakili'),
            'catat' => $this->input->post('catat'),
            'laporkan' => $this->input->post('laporkan'),
            'disetujui' => $this->input->post('disetujui'),
            'dipenuhi' => $this->input->post('dipenuhi'),
            'koordinasikan' => $this->input->post('koordinasikan'),
            'diketahui' => $this->input->post('diketahui'),
            'dipergunakan' => $this->input->post('dipergunakan'),
            'bahan_perhatian' => $this->input->post('bahan_perhatian'),
            'dimonitor' => $this->input->post('dimonitor'),
            'file' => $this->input->post('file'),
            'lainnya' => $this->input->post('lainnya'),
            'no_agenda' => $this->input->post('no_agenda'),
            'tipe' => $this->input->post('tipe'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'tgl_diterima' => $this->input->post('tgl_diterima'),
            'tingkat1' => $this->input->post('tingkat1'),
            'tingkat2' => $this->input->post('tingkat2'),
            'catatan' => $this->input->post('catatan')
        );

        $q_disposisi = $this->db->insert('disposisi', $data_disposisi);

        $data_dokumen = array(
            'nm_dokumen' => $_FILES['file']['name'],
            'tgl_input' => $this->input->post('tgl_surat')
        );

        $q_dokumen = $this->db->insert('dokumen', $data_dokumen);

        $this->db->select_max('id_disposisi');
        $id_disposisi = $this->db->get('disposisi')->row();

        $this->db->select_max('id_dokumen');
        $id_dokumen = $this->db->get('dokumen')->row();

        foreach ($this->input->post('username') as $usern) {
            $data_detil_disposisi = array(
                'id_disposisi' => $id_disposisi->id_disposisi,
                'username' => $usern,
                'id_dokumen' => $id_dokumen->id_dokumen
            );
            $q_detil_disposisi = $this->db->insert('detil_disposisi', $data_detil_disposisi);
        }

        $this->db->where('kepegawaian', 'aktif');
        $this->db->where('privillege', 'common');
        $alluser = $this->db->get('user')->result();

        foreach ($alluser as $au) {
            $data_detil_all_disposisi = array(
                'id_disposisi' => $id_disposisi->id_disposisi,
                'username' => $au->username,
                'id_dokumen' => $id_dokumen->id_dokumen,
                'status' => "Belum terbaca"
            );
            $q_detil_all_disposisi = $this->db->insert('detil_all_disposisi', $data_detil_all_disposisi);
        }


        if ($q_disposisi && $q_dokumen && $q_detil_disposisi && $q_detil_all_disposisi) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_disposisi($id_disposisi = "") {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('detil_disposisi a');
        $this->db->join('disposisi b', 'b.id_disposisi = a.id_disposisi', 'left');
        $this->db->join('dokumen c', 'c.id_dokumen = a.id_dokumen', 'left');
        //$this->db->where('a.id_cat', $view);
        $this->db->order_by('a.id_disposisi', 'desc');
        $this->db->group_by('a.id_disposisi');
        if ($id_disposisi == "") {
            $query = $this->db->get();
            if ($query) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            $this->db->where('a.id_disposisi', $id_disposisi);
            $query = $this->db->get();
            $data_dtl_upd_all_dispos = array(
                'status' => "terbaca"
            );
            $this->db->where('id_disposisi', $id_disposisi);
            $this->db->where('username', $this->session->userdata('username'));
            $upd_status = $this->db->update('detil_all_disposisi', $data_dtl_upd_all_dispos);

            if ($query && $upd_status) {
                return $query->row();
            } else {
                return FALSE;
            }
        }
    }

    function get_u_disposisi() {
        $this->db->select('*');
        $this->db->from('detil_all_disposisi a');
        $this->db->join('disposisi b', 'b.id_disposisi = a.id_disposisi', 'left');
        $this->db->join('dokumen c', 'c.id_dokumen = a.id_dokumen', 'left');
        //$this->db->where('a.username', $this->session->userdata('username'));
        $this->db->order_by('a.id_disposisi', 'desc');
        $this->db->group_by('a.id_disposisi');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_username_disposisi($id_disposisi) {
        $this->db->select('*');
        $this->db->from('detil_disposisi a');
        $this->db->join('user b', 'b.username = a.username', 'left');
        $this->db->where('a.id_disposisi', $id_disposisi);
        $this->db->order_by('a.id_detil', 'desc');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_username_no_disposisi($id_disposisi) {
        $string = "select * from user where username != 'siliwanti' and username not in(select username from detil_disposisi where id_disposisi = '$id_disposisi')";
        $query_no_dispo = $this->db->query($string);
        if ($query_no_dispo) {
            return $query_no_dispo->result();
        } else {
            return FALSE;
        }
    }

    function get_last_agenda($tipe) {
        $this->db->select_max('no_agenda');
        $this->db->where('tipe', $tipe);
        return $this->db->get('disposisi')->row();
    }

}

?>