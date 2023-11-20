<?php include DIR_OF_APP . "/views/layouts/header.php" ?>

<div class="card-detail flex">
    <div class="overflow-hidden mr-5 w-48 h-56 border-2 border-pink-400 rounded-md">
        <img class="w-full h-full object-cover" src="<?= BASE_URL ?>/assets/sampul/<?= $data['sampul'] ?>" alt="">
    </div>
    <div class="">
        <h1 class="font-bold text-lg mb-4"><?= $data['judul'] ?></h1>
        <div class="flex flex-col mb-2">
            <p class="text-gray-400">Pengarang</p>
            <p class="text-gray-700"><?= $data['pengarang'] ?></p>
        </div>
        <div class="flex flex-col mb-2 capitalize">
            <p class="text-gray-400">penerbit</p>
            <p class="text-gray-700"><?= $data['penerbit'] ?></p>
        </div>
        <div class="flex flex-col mb-2 capitalize">
            <p class="text-gray-400">deskripsi</p>
            <p class="text-gray-700"><?= $data['deskripsi'] ?></p>
        </div>
    </div>
    <div class="w-fit ml-4">
        <button class="mr-3 bg-pink-300 text-pink-700 px-4 py-1 rounded-sm outline-none">Hapus</button>
        <a class="mr-3 bg-sky-300 text-sky-700 px-4 py-1 rounded-sm" href="<?= BASE_URL ?>/buku/edit/<?= $data['id'] ?>">Edit</a>
    </div>
</div>