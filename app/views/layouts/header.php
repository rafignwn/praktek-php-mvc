<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>

    <link rel="shortcut icon" href="<?= BASE_URL; ?>/assets/bag.png" type="image/x-icon">
    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- style -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/card.css">
    <script src="<?= BASE_URL; ?>/assets/js/scripts.js" defer></script>
    <script src="<?= BASE_URL; ?>/assets/js/carousel.js" defer></script>
    <script src="<?= BASE_URL; ?>/assets/js/alert.js" defer></script>
    <?= Flasher::getFlash(); ?>
</head>

<body>
    <div class="navigation">
        <div class="container">
            <div class="navbar">
                <a href="<?= BASE_URL; ?>" class="logo">
                    <ion-icon name="logo-buffer"></ion-icon> <span>INDOMALES</span>
                </a>
                <span data-triger-category="category of product">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
                <nav id="TopNavbar">
                    <span id="btnSearch" class="nav-link show">
                        <ion-icon name="search-outline"></ion-icon>
                    </span>
                    <div id="formSearch">
                        <form action="">
                            <span id="CloseSearch">
                                <ion-icon name="close-outline"></ion-icon>
                            </span>
                            <input type="text" placeholder="search items . . .">
                        </form>
                    </div>
                    <a href="#Keranjang" class="nav-link">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                    </a>
                    <div id="NavAccount" class="auth">
                        <?php if (empty($user)) : ?>
                            <a href="#Login" data-triger-login="triger login" class="nav-link">
                                <ion-icon name="log-in-outline"></ion-icon>
                            </a>
                        <?php else : ?>
                            <!-- <a href="<?= BASE_URL; ?>/auth/logout" class="nav-link">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </a> -->
                            <button class="btn-profile">
                                <img src="<?= BASE_URL; ?>/assets/images/<?= $user['gambar'] ?>" alt="<?= $user['nama'] ?>">
                            </button>
                        <?php endif; ?>
                    </div>
                    <!-- <span class="burger">
                        <div class="burger-block"></div>
                    </span> -->
                </nav>
            </div>
            <div class="category">
                <ul>
                    <li><a href="<?= BASE_URL; ?>/produk/kategori/Honda">Honda</a></li>
                    <li><a href="<?= BASE_URL; ?>/produk/kategori/Suzuki">Suzuki</a></li>
                    <li><a href="<?= BASE_URL; ?>/produk/kategori/Yamaha">Yamaha</a></li>
                    <li><a href="<?= BASE_URL; ?>/produk/kategori/Kawasaki">Kawasaki Motor</a></li>
                    <li><a href="<?= BASE_URL; ?>/produk/kategori/KTM">KTM Racing</a></li>
                    <li><a href="<?= BASE_URL; ?>/produk/kategori/Viar">Viar Motor</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php if (empty($data['user'])) : ?>
        <div id="ModalLogin" class="modal modal-auth none">
            <div class="form-container">
                <span id="CloseModalLogin" class="btn-close-modal">
                    <ion-icon name="close-outline"></ion-icon>
                </span>
                <h2>Login</h2>
                <form action="<?= BASE_URL; ?>/auth/login" id="formLogin" method="POST">
                    <div class="form-group">
                        <input type="text" name="username_or_email" required placeholder="username or email" id="InputLogin">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required placeholder="password">
                    </div>
                    <button type="submit" name="submit">Log in</button>
                    <p>Don't have an account? <a href="#Register" data-triger-register="triger register">Register</a></p>
                </form>
            </div>
        </div>

        <div id="ModalRegister" class="modal modal-auth none">
            <div class="form-container">
                <span id="CloseModalRegister" class="btn-close-modal">
                    <ion-icon name="close-outline"></ion-icon>
                </span>
                <h2>Register</h2>
                <form action="<?= BASE_URL; ?>/auth/register" method="POST">
                    <div class="form-group">
                        <input type="text" name="nama" required placeholder="Full name" id="InputRegister">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" required placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" required placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required placeholder="password">
                        <span class="show-hide-pw">
                            <ion-icon name="eye-off-outline"></ion-icon>
                        </span>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <div id="Fade" class="fade"></div>
    <div class="account-menu" id="ModalAccount">
        <ul class="menu-container">
            <div class="menu-item-profile">
            <img id="ImgMenuAccount" src="<?php echo BASE_URL; ?>/assets/images/<?php echo empty($user) ? "profile_picture.png" : $user['gambar'] ?>" alt="<?php echo empty($user) ? 'Profile Picture' : $user['nama'] ?>">
                <h5 id="ProfileName" class="profile-name"><?php echo empty($user) ? 'Noname User' : $user['nama'] ?></h5>
            </div>
            <hr>
            <li class="menu-item">
                <a href="<?= BASE_URL ?>/produk/byuser" class="link">
                    <ion-icon name="bag-handle" class="link-icon"></ion-icon>
                    <span class="link-text">Daftar Produk Anda</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#ProdukAnda" class="link">
                    <ion-icon name="bag-add" class="link-icon"></ion-icon>
                    <span class="link-text">Tambah Produk</span>
                </a>
            </li>
            <hr>
            <li class="menu-item">
                <a href="#Editprofile" class="link">
                    <ion-icon name="create" class="link-icon"></ion-icon>
                    <span class="link-text">Edit Profile</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?= BASE_URL; ?>/auth/logout" class="link">
                    <ion-icon name="log-out-outline" class="link-icon"></ion-icon>
                    <span class="link-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <main>