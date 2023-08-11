<?php include DIR_OF_APP . "/views/layouts/header.php" ?>

<h1 class="text-red-500">Halaman Tambah Buku</h1>
<div class="p-4">
    <h4 class="font-semibold text-2xl text-red-600">Form Tambah Buku</h4>
    <form action="<?= BASE_URL . '/buku/simpan' ?>" method="post">
        <div class="flex flex-col gap-3 w-1/3">
            <label for="inputJudul">
                <input name="judul" placeholder="Masukan Judul" type="text" class="px-4 py-1 outline-none border-2 border-sky-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="penulis" placeholder="Masukan penulis buku" type="text" class="px-4 py-1 outline-none border-2 border-sky-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="penerbit" placeholder="Masukan penerbit buku" type="text" class="px-4 py-1 outline-none border-2 border-sky-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="jumlah" placeholder="Masukan jumlah buku" type="text" class="px-4 py-1 outline-none border-2 border-sky-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="deskripsi" placeholder="Masukan deskripsi buku" type="text" class="px-4 py-1 outline-none border-2 border-sky-500 w-full mt-4 rounded-md">
            </label>
            <button class="bg-sky-700 text-white font-semibold py-2 rounded-md text-xl uppercase">simpan</button>
        </div>
    </form>
</div>