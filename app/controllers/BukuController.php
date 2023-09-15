<?php

class BukuController extends Controller
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function index()
    {
        $this->db->query("SELECT * FROM tb_buku");
        $data = $this->db->fetchAllResult();
        // var_dump($data);
        // die();
        return $this->view("buku/index", $data);
    }

    public function tambah()
    {
        return $this->view("buku/tambah");
    }

    public function simpan()
    {
        // var_dump($_POST);
        $this->db->query("INSERT INTO tb_buku (id, judul, pengarang, penerbit, jumlah, deskripsi) VALUES (:ori_id, :ori_judul, :ori_pengarang, :ori_penerbit, :ori_jumlah, :ori_deskripsi)");

        // bind data sebelum di eksekusi querynya
        $this->db->bind("ori_id", uniqid("buku_"));
        $this->db->bind("ori_judul", $_POST['judul']);
        $this->db->bind("ori_pengarang", $_POST['penulis']);
        $this->db->bind("ori_penerbit", $_POST['penerbit']);
        $this->db->bind("ori_jumlah", (int)$_POST['jumlah']);
        $this->db->bind("ori_deskripsi", $_POST['deskripsi']);

        if ($this->db->execute()) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Data gagal ditambahkan!";
        }
    }
}
