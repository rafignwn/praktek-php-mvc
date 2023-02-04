<?php

class Product
{
    private $tableName = "products";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProduct()
    {
        $this->db->query("SELECT * FROM $this->tableName");
        return $this->db->fetchAllResult();
    }

    public function getProductById(int $id)
    {
        $this->db->query("SELECT * FROM $this->tableName WHERE id=:id_produk");
        $this->db->bind("id_produk", $id);
        return $this->db->single();
    }

    public function byCategory(string $category)
    {
        $this->db->query("SELECT * FROM $this->tableName WHERE kategori = :kategori_produk");
        $this->db->bind('kategori_produk', $category);

        return $this->db->fetchAllResult();
    }
}
