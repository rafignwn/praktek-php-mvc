<?php

class BukuController extends Controller
{
    public function index()
    {
        return $this->view("buku/index");
    }

    public function tambah()
    {
        return $this->view("buku/tambah");
    }

    public function simpan()
    {
        var_dump($_POST);
    }
}
