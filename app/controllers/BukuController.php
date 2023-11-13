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
        if ($_FILES['sampul']['error'] == 0) {
            $gambar = (object)$_FILES['sampul'];
            $extensi = strtolower(pathinfo($gambar->name, PATHINFO_EXTENSION));
            $namaSampul = uniqid("sampul_") . "." . $extensi;
            $isMoved = move_uploaded_file($gambar->tmp_name, DIR_OF_APP . "\..\public\assets\sampul\\" . $namaSampul);
            if ($isMoved) {
                $this->db->query("INSERT INTO tb_buku (id, judul, pengarang, penerbit, jumlah, deskripsi, sampul) VALUES (:ori_id, :ori_judul, :ori_pengarang, :ori_penerbit, :ori_jumlah, :ori_deskripsi, :ori_sampul)");

                // bind data sebelum di eksekusi querynya
                $this->db->bind("ori_id", uniqid("buku_"));
                $this->db->bind("ori_judul", $_POST['judul']);
                $this->db->bind("ori_pengarang", $_POST['penulis']);
                $this->db->bind("ori_penerbit", $_POST['penerbit']);
                $this->db->bind("ori_jumlah", (int)$_POST['jumlah']);
                $this->db->bind("ori_deskripsi", $_POST['deskripsi']);
                $this->db->bind("ori_sampul", $namaSampul);

                if ($this->db->execute()) {
                    echo "Data berhasil ditambahkan";
                } else {
                    echo "Data gagal ditambahkan!";
                }
            }
        } else {
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

        $this->redirectTo("buku");
    }

    public function edit()
    {
        return $this->view("buku/edit");
    }

    public function detail($idBuku)
    {
        $this->db->query("SELECT * FROM tb_buku WHERE id = '$idBuku'");
        $hasil = $this->db->single();
        var_dump($hasil);
    }

    // public function detail($idBuku)
    // {
    //     $this->db->query("SELECT * FROM tb_buku WHERE id = '$idBuku'");
    //     $result = $this->db->single();

    //     return $this->view("buku/detail", $result);
    // }
}
