<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    // Ini Api Untuk Panggil data ya di insert

    public function getMenu()
    {
        header('Content-Type: application/json');

        $hasil = $this->db->get("tb_menu");

        // cek kondisi ada datanya apa gak
        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data["menu"] = $hasil->result();
        } else {
            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }
        echo json_encode($data);

    }

    public function updateMenu()
    {
        header('Content-Type: application/json');

        // Variabel inputan mobile Kopas
        $nama = $this->input->post("nama");
        $harga = $this->input->post("harga");
        $keterangan = $this ->input->post("keterangan");
        $gambar = $this->input->post("gambar");
        $id = $this->input->post("id");

        $this->db->where('menu_id', $id);
        $getId = $this->db->get('tb_menu');

        if ($getId->num_rows() == 0) {
            $data['sukses'] = false;
            $data['pesan'] = "produk belum ada bang";
        } else {

            $this->db->where('menu_id', $id);

            $update['menu_nama'] = $nama;
            $update['menu_harga'] = $harga;
            $update['menu_ket'] = $keterangan;
            $update['menu_gambar'] = $gambar;

            // Query Update
            $status = $this->db->update('tb_menu', $update);

            // Cek
            if ($status) {
                $data['sukses'] = true;
                $data['pesan'] = "Update berhasil";
            } else {
                $data['sukses'] = false;
                $data['pesan'] = "Update tidak berhasil";
            }
        }

        echo json_encode($data);

    }

    // Untuk mengambil data barang berdasarkan id nya
    public function getDetailMenu($id)
    {
        header('Content-Type: application/json');
        $this->db->where('menu_id', $id);
        $hasil = $this->db->get("tb_menu");

        // cek kondisi ada datanya apa gak
        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data["barang"] = $hasil->row();
        } else {
            $data["pesan"] = "datanya tidak ditemukan";
            $data["sukses"] = false;
        }

        echo json_encode($data);

    }

    public function deleteMenu()
    {
        header('Content-Type: application/json');

        $id = $this->input->post("id");

        $this->db->where('menu_id', $id);
        $getId = $this->db->get('tb_menu');

        if ($getId->num_rows() == 0) {
            $data['sukses'] = false;
            $data['pesan'] = "produk belum ada bang Gak Bisa Hapus";
        } else {

            $this->db->where('menu_id', $id);
            $hasil = $this->db->delete('tb_menu');

            if ($hasil) {
                // Bikin respones ke mobile
                $data["pesan"] = "Berhasil Hapus Data Bang";
                $data["sukses"] = true;
            } else {
                $data["pesan"] = "datanya gak bisa dihapus";
                $data["sukses"] = false;
            }
        }

        echo json_encode($data);

    }

    

    public function insertMenu()
    {
        header('Content-Type: application/json');
        $data = array();

        if ($this->input->post() != null) {

            // Variabel inputan mobile
            $nama = $this->input->post("nama");
            $harga = $this->input->post("harga");
            $keterangan = $this->input->post("keterangan");
            $gambar = $this->input->post("gambar");
            // $gambar = $this->cek_foto('gambar');

            // echo json_encode($foto);
            // exit;

            // d implementasi nama field databasenya
            $simpan = array();
            $simpan["menu_nama"] = $nama;
            $simpan["menu_harga"] = $harga;
            $simpan["menu_keterangan"] = $keterangan;
            $simpan["menu_gambar"] = $gambar;

            // Using quoery for insert database

            $status = $this->db->insert("tb_menu", $simpan);

            // Cek berhasil apa gak
            if ($status) {
                $data['sukses'] = true;
                $data['pesan'] = "Insert Berhasil";
                $data['last_id'] = $this->db->insert_id();
            } else {
                $data['sukses'] = false;
                $data['pesan'] = "Insert tidak berhasil";
            }

            
        }else{
            $data['sukses'] = false;
            $data['pesan'] = "Insert tidak berhasil";
        }
        echo json_encode($data);
    }


    //  ++++++++++++++++++ Buat Fungsi Register +++++++++++++++++++++

    public function register()
    {
        header('Content-Type: application/json');

        //variable untuk ambil inputan dari mobile
        $id = $this->input->post("id");
        $nama = $this->input->post("nama");
        $nip = $this->input->post("nip");
        $jabatan = $this->input->post("jabatan");
        $unit_kerja = $this->input->post("unit_kerja");
        $hp = $this->input->post("hp");
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        

        $this->db->where("user_email", $email);
        $check = $this->db->get("tb_user");

        if ($check->num_rows() > 0) {

            $data["sukses"] = false;
            $data["pesan"] = "email udah ke register,silahkan login";

        } else {

            //d implementasi nama field database nya
            $simpan = array();
            $simpan["user_id"] = $id;
            $simpan["user_nama"] = $nama;
            $simpan["user_nip"] = $nip;
            $simpan["user_jabatan"] = $jabatan;
            $simpan["user_unit_kerja"] = $unit_kerja;
            $simpan["user_hp"] = $hp;
            $simpan["user_email"] = $email;
            $simpan["user_password"] = md5($password);

            //using query for insert database
            $status = $this->db->insert("tb_user", $simpan);

            $data = array();
            //check insertnya berhasil apa enggak
                if ($status) {
                    $data["sukses"] = true;
                    $data["pesan"] = "register berhasil";
                }else {
                    $data["sukses"] = false;
                    $data["pesan"] = "register failed,try again";

            }
        
        }

        echo json_encode($data);

    }

    public function login()
    {
        header('Content-Type: application/json');

        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $this->db->where("user_email", $email);
        $this->db->where("user_password", md5($password));

        $hasil = $this->db->get("tb_user");

        //check query ada datanya apa enggak
        if ($hasil->num_rows() > 0) {

            //bikin response k mobile
            $data['pesan'] = "login berhasil";
            $data['sukses'] = true;
            $data["user_data"] = $hasil->row();
        } else {
            $data['pesan'] = "email atau password salah";
            $data['sukses'] = false;
        }

        echo json_encode($data);
    }

    public function getUser()
    {
        header('Content-Type: application/json');

        $hasil = $this->db->get("tb_user");

        // cek kondisi ada datanya apa gak
        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data["barang"] = $hasil->result();
        } else {
            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }

        echo json_encode($data);

    }


    public function addPesananan()
    {
        header('Content-Type: application/json');

        //variable untuk ambil inputan dari mobile
        $data = array();
        if ($this->input->post() != null) {

        $menu = $this->input->addMenuPesanan();
        $user = $this->input->post("user_id");
        $total_harga = $this->input->post("total_harga");
        $metode = $this->input->post("metode");
        $status = $this->input->post("status_pesanan");
        $lokasi = $this->input->post("lokasi");
        $notes = $this->input->posy("notes");
        
        
        $simpan = array();
        $simpan["pesanan_menu"] = $menu;
        $simpan["pesanan_user"] = $user;
        $simpan["pesanan_harga"] =$total_harga;
        $simpan["pesanan_metode_bayar"] = $metode;
        $simpan["pesanan_status"] =$status;
        $simpan["lokasi"] = $lokasi;
        $simpan["catatan"] = $notes;
            // $gambar = $this->cek_foto('gambar');

            // echo json_encode($foto);
        

            $status = $this->db->insert("tb_pesanan", $simpan);

            // Cek berhasil apa gak
            if ($status) {
                $data['sukses'] = true;
                $data['pesan'] = "Insert Berhasil";
                $data['last_id'] = $this->db->insert_id();
            } else {
                $data['sukses'] = false;
                $data['pesan'] = "Insert tidak berhasil";
            }

            
        }else{
            $data['sukses'] = false;
            $data['pesan'] = "Insert tidak berhasil";
        }
        echo json_encode($data);
    }

    
    public function getPesanan()
    {
        header('Content-Type: application/json');

        $hasil = $this->db->get("tb_pesanan");

        // cek kondisi ada datanya apa gak
        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data["pesanan"] = $hasil->result();
        } else {
            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }
        echo json_encode($data);

    }

    public function addMenuPesanan(){
        header('Content-Type: application/json');

        $data = array();
        if ($this->input->post() != null) {
            $jumlah_menu = $this->input->post("jumlah_menu");
            $menu_id= $this->input->post("menu_id");
            $menu_pesanan_id = $this->input->post("menu_pesanan_id");

            $simpan = array();
            $simpan["jumlah_menu"] = $jumlah_menu;
            $simpan["menu_id"] = $menu_id;
            $simpan["menu_pesanan_id"] = $menu_pesanan_id;

            $status = $this->db->insert("menu_pesanan", $simpan);

            // Cek berhasil apa gak
            if ($status) {
                $data['sukses'] = true;
                $data['pesan'] = "Insert Berhasil";
                $data['last_id'] = $this->db->insert_id();
            } else {
                $data['sukses'] = false;
                $data['pesan'] = "Insert tidak berhasil";
            }
        }
        else{

            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }
        echo json_encode($data);
        
    }


}
