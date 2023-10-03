<?php include DIR_OF_APP . "/views/layouts/header.php" ?>

<style>
    .my-shadow {
        box-shadow: 3px 3px black;
        border: 2px solid black;
    }

    main {
        margin-top: 0;
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

    .push-animate:hover {
        /* animation: mutermuter 400ms linear forwards; */
        box-shadow: 0px 0px black;
        translate: 3px 3px;
    }

    #SampulBuku {
        width: 15rem;
        height: 20rem;
        object-fit: cover;
        border: 2px solid black;
        border-radius: .5rem;
        margin-left: 1rem;
    }
</style>

<!-- <h1 class="text-red-500">Halaman Tambah Buku</h1> -->
<div class="p-4">
    <h4 class="font-bold text-2xl text-center text-gray-800 mb-4 underline uppercase">Form Tambah Buku</h4>
    <form action="<?= BASE_URL . '/buku/simpan' ?>" method="post" enctype="multipart/form-data" class="flex justify-center">
        <div class="flex flex-col gap-3 w-1/3 p-4 rounded-md my-shadow border-2 border-gray-800">
            <label for="inputJudul">
                <input name="judul" placeholder="Masukan Judul" type="text" class="px-4 py-2 text-md outline-none border-2 border-black w-full mt-2 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="penulis" placeholder="Masukan penulis buku" type="text" class="px-4 py-2 text-md outline-none border-2 border-black w-full mt-2 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="penerbit" placeholder="Masukan penerbit buku" type="text" class="px-4 py-2 text-md outline-none border-2 border-black w-full mt-2 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="jumlah" placeholder="Masukan jumlah buku" type="number" class="px-4 py-2 text-md outline-none border-2 border-black w-full mt-2 rounded-md">
            </label>
            <label for="inputJudul">
                <input name="deskripsi" placeholder="Masukan deskripsi buku" type="text" class="px-4 py-2 text-md outline-none border-2 border-black w-full mt-2 rounded-md">
            </label>
            <label for="inputSampul">
                <input name="sampul" accept="image/jpeg,image/png" id="inputSampul" placeholder="Masukan deskripsi buku" type="file" class="px-4 py-2 text-md outline-none border-2 border-black w-full mt-2 rounded-md">
            </label>
            <button class="bg-white text-black mt-6 font-semibold py-2 rounded-md text-xl uppercase my-shadow push-animate">simpan</button>
        </div>
        <img class="my-shadow" src="<?= BASE_URL . "/assets/images/default.jpg"; ?>" alt="gambar sampul buku" id="SampulBuku">
    </form>
</div>

<script>
    const inputImage = document.getElementById("inputSampul");

    inputImage.addEventListener("change", function(e) {
        const selectedFile = e.target.files[0];

        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("SampulBuku").src = e.target.result;
            }

            reader.readAsDataURL(selectedFile);
        }
    })
</script>