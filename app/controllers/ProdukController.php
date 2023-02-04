<?php
class ProdukController extends Controller
{
    private $modelProduk;

    public function __construct()
    {
        $this->modelProduk = $this->model("Produk");
    }

    // index function
    public function index()
    {
        $produk = $this->modelProduk->ambilSemuaData();

        $data = [
            "produk" => $produk,
        ];

        $this->title = "Semua Produk di Toko ini";
        return $this->view("produk/index", $data);
    }

    public function kategori($kategori)
    {
        $produk = $this->modelProduk->ambilDataByKategori($kategori);

        $data = [
            "produk" => $produk,
            "title" => "Produk " . $kategori,
        ];

        // mengganti judul website
        $this->title = "Daftar Produk " . $kategori;

        return $this->view("produk/index", $data);
    }

    public function byuser()
    {
        if (!$this->isLogin()) {
            Flasher::setFlasher("Maaf anda belum login cuy.", "danger");
            return $this->redirectTo("/");
        }

        $produk = $this->modelProduk->ambilDataByUser($this->user()->id);

        $data = [
            "produk" => $produk,
            "title" => "Produk Anda - " . $this->user()->nama,
        ];

        $this->title = "Semua Produk Anda - " . $this->user()->nama;
        return $this->view("produk/index", $data);
    }
}
