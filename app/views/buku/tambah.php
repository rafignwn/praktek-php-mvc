<?php include DIR_OF_APP . "/views/layouts/header.php" ?>

<style>
    .my-shadow {
        box-shadow: 3px 3px black;
        border: 2px solid black;
    }

    @keyframes mutermuter {

        0% {
            translate: 0px 0px;
        }

        50% {
            translate: -50px 0px;
        }

        75% {
            translate: 50px 0px;

        }
    }

    .my-shadow:hover {
        animation: mutermuter 400ms linear forwards;
        box-shadow: 0px 0px black;
        translate: 3px 3px;
    }

    #previewSampul {
        margin-left: 2rem;
        margin-bottom: 2rem;
        border: 2px solid black;
        border-radius: 0.5rem;
        object-fit: cover;
        width: 15rem;
        height: 22rem;
    }
</style>


<div class="p-4 flex items-center flex-col">
    <h4 class="font-semibold text-2xl text-black mb-8">Form Tambah Buku</h4>
    <form class="flex" action="<?= BASE_URL . '/buku/simpan' ?>" method="post" enctype="multipart/form-data">
        <div class="flex flex-col gap-3">
            <label for="inputJudul">
                <input name="judul" required placeholder="Masukan Judul" type="text" class="px-4 py-1 outline-none border-2 border-gray-500 w-full rounded-md w-96">
            </label>
            <label for="inputJudul">
                <input name="penulis" placeholder="Masukan penulis buku" type="text" class="px-4 py-1 outline-none border-2 border-gray-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="penerbit" placeholder="Masukan penerbit buku" type="text" class="px-4 py-1 outline-none border-2 border-gray-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="jumlah" placeholder="Masukan jumlah buku" type="number" class="px-4 py-1 outline-none border-2 border-gray-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="deskripsi" placeholder="Masukan deskripsi buku" type="text" class="px-4 py-1 outline-none border-2 border-gray-500 w-full mt-4 rounded-md">
            </label>
            <label for="inputSampul" class="flex w-96 gap-3">
                <img class="w-20" src="<?= BASE_URL . '/assets/images/photo.png' ?>" alt="">
                <span>Pilih Sampul Buku</span>
                <input name="sampul" id="inputSampul" placeholder="Masukan deskripsi buku" type="file" class="px-4 py-1 outline-none border-2 border-gray-500 w-full mt-4 rounded-md hidden" accept="image/jpeg,image/png">
            </label>

            <button class="bg-white text-black font-semibold py-2 rounded-md text-xl uppercase my-shadow mt-5">simpan</button>
        </div>
        <img src="<?= BASE_URL . '/assets/images/profile_picture.png' ?>" id="previewSampul" alt="gambar sampul">
    </form>
</div>

<script>
    document.getElementById("inputSampul").addEventListener("change", function(e) {
        const selectedFile = e.target.files[0];

        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("previewSampul").src = e.target.result;
            }
            reader.readAsDataURL(selectedFile);
        }
    })
</script>