<?php include DIR_OF_APP . "/views/layouts/header.php" ?>

<style>
    .card {
        position: relative;
        width: 190px;
        height: 254px;
        background-color: #000;
        display: flex;
        flex-direction: column;
        justify-content: end;
        padding: 12px;
        gap: 12px;
        border-radius: 8px;
        cursor: pointer;
    }

    .card::before {
        content: '';
        position: absolute;
        inset: 0;
        left: -5px;
        margin: auto;
        width: 200px;
        height: 264px;
        border-radius: 10px;
        background: linear-gradient(-45deg, #e81cff 0%, #40c9ff 100%);
        z-index: -10;
        pointer-events: none;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card::after {
        content: "";
        z-index: -1;
        position: absolute;
        inset: 0;
        background: linear-gradient(-45deg, #fc00ff 0%, #00dbde 100%);
        transform: translate3d(0, 0, 0) scale(0.95);
        filter: blur(20px);
    }

    .heading {
        font-size: 20px;
        text-transform: capitalize;
        font-weight: 700;
    }

    .card p:not(.heading) {
        font-size: 14px;
    }

    .card p:last-child {
        color: #e81cff;
        font-weight: 600;
    }

    .card:hover::after {
        filter: blur(30px);
    }

    .card:hover::before {
        transform: rotate(-90deg) scaleX(1.34) scaleY(0.77);
    }
</style>
<div class="my-4 px-20">
    <a class="inline-block px-4 py-2 bg-red-200 rounded-md text-red-500 hover:bg-green-200 hover:text-green-700" href="<?= BASE_URL . '/buku/tambah' ?>">Tambah Buku</a>
</div>
<div class="flex gap-10 flex-wrap justify-center">
    <?php foreach ($data as $buku) : ?>
        <a href="<?= BASE_URL ?>/buku/detail/<?= $buku['id'] ?>">
            <div class="card min-w-[190px]">
                <p class="text-white">
                    <?= $buku['judul'] ?>
                </p>
                <p>Uiverse
                </p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<script>
    document.querySelectorAll("div[data-idbuku]").forEach(function(buku) {
        buku.addEventListener("click", function(e) {
            window.location.href = "<?= BASE_URL ?>/buku/detail/" + e.target.dataset.idbuku;
        })
    })
</script>

<?php include DIR_OF_APP . "/views/layouts/footer.php" ?>