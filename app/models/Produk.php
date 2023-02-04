<?php
class Produk {
    private $namaTabel = "produk";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function ambilSemuaData() {
        $this->db->query("SELECT * FROM $this->namaTabel");

        // mengembalikan hasil dari eksekusi query
        return $this->db->fetchAllResult();
    }

    public function ambilDataByKategori(string $kategori) {
        $this->db->query("SELECT * FROM $this->namaTabel WHERE kategori=:kategori_produk");
        $this->db->bind("kategori_produk", $kategori);
        
        return $this->db->fetchAllResult();
    }

    // function untuk mengambil data user
    public function ambilDataByUser($user_id) {
        $this->db->query("SELECT * FROM $this->namaTabel WHERE user_id=:id_pengguna");
        $this->db->bind("id_pengguna", $user_id);

        return $this->db->fetchAllResult();
    }
}