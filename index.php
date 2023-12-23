<?php
session_start();
include 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>D4 Teknik Telekomunikasi - Politeknik Negeri Sriwijaya</title>

    <link rel="stylesheet" href="public/assets/css/main/app.css" />
    <link rel="stylesheet" href="public/assets/css/main/app-dark.css" />
    <link rel="stylesheet" href="public/assets/css/main/styles.css" />
    <link rel="shortcut icon" href="public/assets/images/logo/polsri.png" type="image/x-icon" />
    <link rel="shortcut icon" href="public/assets/images/logo/polsri.png" type="image/png" />

    <link rel="stylesheet" href="public/assets/css/shared/iconly.css" />
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="avatar avatar-md2 d-flex justify-content-between mx-auto mt-3">
                            <a href="index.php"><img src="public/assets/images/logo/polsri.png" alt="Logo" /></a>
                            <div class="text lh-1 ms-2">
                                <h6>Politeknik Negeri Sriwijaya</h6>
                                <p class="text-sm text-muted">
                                    D-IV Teknik Telekomunikasi
                                </p>
                            </div>
                        </div>
                        <div class="header-top-right">
                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul class="justify-content-center">
                            <li class="menu-item">
                                <a href="index.php" class="menu-link">
                                    <span>Home</span>
                                </a>
                            </li>

                            <li class="menu-item active has-sub">
                                <a href="#" class="menu-link">
                                    <span>About</span>
                                </a>
                                <div class="submenu">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        <ul class="submenu-group">
                                            <?php
                                                $select_content = $conn->prepare("SELECT * FROM `content`");
                                                $select_content->execute();
                                                if($select_content->rowCount() > 0){
                                                    while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <li class="submenu-item">
                                                <a href="#<?= $fetch_content['section']; ?>"
                                                    class="submenu-link"><?= $fetch_content['section']; ?></a>
                                            </li>
                                            <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="menu-item">
                                <a href="#contact" class="menu-link">
                                    <span>Contact</span>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="login.php" class="menu-link">
                                    <span><i class="bi bi-person-circle"></i> Log In</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="home-banner-area position-relative">
                    <div
                        class="card text-center p-5 shadow opacity-75 position-absolute top-50 start-50 translate-middle">
                        <h1 class="display-4 fw-bold">D-IV TEKNIK TELEKOMUNIKASI</h1>
                    </div>
                </div>
                <?php
                    $select_content = $conn->prepare("SELECT * FROM `content` WHERE section = 'Profile Program Studi'");
                    $select_content->execute();
                    if($select_content->rowCount() > 0){
                        while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
                ?>
                <section class="row p-5 text-center bg-secondary bg-opacity-10 p-2"
                    id="<?= $fetch_content['section']; ?>">
                    <span class="p-3 fs-3"><i class="bi bi-info-circle"></i></span>
                    <h1 class="display-4 fw-bold"><?= $fetch_content['column_2']; ?></h1>
                    <p class="text-muted"><?= $fetch_content['column_3']; ?></p>
                </section>
                <?php }} ?>
            </header>

            <div class="container-fluid">
                <div class="page-content">
                    <?php
                        $select_content = $conn->prepare("SELECT * FROM `content` WHERE section = 'Visi Program Studi D4 Teknik Telekomunikasi'");
                        $select_content->execute();
                        if($select_content->rowCount() > 0){
                            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <section class="row p-5" id="<?= $fetch_content['section']; ?>">
                        <figure class="text-center">
                            <blockquote class="blockquote">
                                <p><?= $fetch_content['column_1']; ?></p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <cite title="<?= $fetch_content['section']; ?>"><?= $fetch_content['section']; ?></cite>
                            </figcaption>
                        </figure>
                    </section>
                    <?php }} ?>

                    <div class="row justify-content-center">
                        <hr class="border border-primary border-3 opacity-75" style="width: 5rem;">
                    </div>

                    <?php
                        $select_content = $conn->prepare("SELECT * FROM `content` WHERE section = 'Misi Program Studi D4 Teknik Telekomunikasi'");
                        $select_content->execute();
                        if($select_content->rowCount() > 0){
                            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <section class="row p-5 text-center" id="<?= $fetch_content['section']; ?>">
                        <h1 class="fw-bold"><?= $fetch_content['section']; ?></h1>
                        <div class="container text-center p-5 mt-3">
                            <div class="row">
                                <div class="col">
                                    <h1 class="display-2 fw-bold text-shadow">1</h1>
                                    <p><?= $fetch_content['column_7']; ?></p>
                                </div>
                                <div class="col">
                                    <h1 class="display-2 fw-bold">2</h1>
                                    <p><?= $fetch_content['column_8']; ?></p>
                                </div>
                                <div class="col">
                                    <h1 class="display-2 fw-bold">3</h1>
                                    <p><?= $fetch_content['column_9']; ?></p>
                                </div>
                                <div class="col">
                                    <h1 class="display-2 fw-bold">4</h1>
                                    <p><?= $fetch_content['column_10']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }} ?>

                    <?php
                        $select_content = $conn->prepare("SELECT * FROM `content` ORDER BY added_at");
                        $select_content->execute();
                        if($select_content->rowCount() > 0){
                            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <?php if ($fetch_content['type'] == 'four-column' && $fetch_content['section'] != 'Misi Program Studi D4 Teknik Telekomunikasi'): ?>
                    <section class="row p-5 text-center" id="<?= $fetch_content['section']; ?>">
                        <h1 class="fw-bold"><?= $fetch_content['section']; ?></h1>
                        <div class="container text-center p-5 mt-3">
                            <div class="row">
                                <div class="col">
                                    <p><?= $fetch_content['column_7']; ?></p>
                                </div>
                                <div class="col">
                                    <p><?= $fetch_content['column_8']; ?></p>
                                </div>
                                <div class="col">
                                    <p><?= $fetch_content['column_9']; ?></p>
                                </div>
                                <div class="col">
                                    <p><?= $fetch_content['column_10']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php elseif ($fetch_content['type'] == 'three-column'):?>
                    <section class="row p-5 text-center" id="<?= $fetch_content['section']; ?>">
                        <h1 class="fw-bold"><?= $fetch_content['section']; ?></h1>
                        <div class="container text-center p-5 mt-3">
                            <div class="row">
                                <div class="col">
                                    <p><?= $fetch_content['column_4']; ?></p>
                                </div>
                                <div class="col">
                                    <p><?= $fetch_content['column_5']; ?></p>
                                </div>
                                <div class="col">
                                    <p><?= $fetch_content['column_6']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php elseif ($fetch_content['type'] == 'two-column' && $fetch_content['section'] != 'Profile Program Studi'):?>
                    <section class="row p-5 text-center" id="<?= $fetch_content['section']; ?>">
                        <h1 class="fw-bold"><?= $fetch_content['section']; ?></h1>
                        <div class="container text-center p-5 mt-3">
                            <div class="row">
                                <div class="col">
                                    <p><?= $fetch_content['column_2']; ?></p>
                                </div>
                                <div class="col">
                                    <p><?= $fetch_content['column_3']; ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php elseif ($fetch_content['type'] == 'one-column' && $fetch_content['section'] != 'Visi Program Studi D4 Teknik Telekomunikasi'):?>
                    <section class="row p-5 text-center" id="<?= $fetch_content['section']; ?>">
                        <h1 class="fw-bold"><?= $fetch_content['section']; ?></h1>
                        <p class="text-muted"><?= $fetch_content['column_1']; ?></p>
                    </section>
                    <?php elseif ($fetch_content['type'] == 'image-img'):?>
                    <section class="row p-5 text-center" id="<?= $fetch_content['section']; ?>">
                        <h1 class="fw-bold"><?= $fetch_content['section']; ?></h1>
                        <img src="uploaded_images/<?= $fetch_content['images']; ?>" alt="Gambar">
                    </section>
                    <?php endif; ?>
                    <?php }} ?>

                    <section class="row p-5 bg-primary p-2" id="contact">
                        <h1 class="fw-bold text-white">Hubungi Kami</h1>
                        <div class="row text-white mt-3">
                            <div class="col">
                                <h5 class="text-white">Sosial Media</h5>
                                <?php
                                    $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE type != 'address' ORDER BY type");
                                    $select_contact->execute();
                                    if($select_contact->rowCount() > 0){
                                        while($fetch_contact = $select_contact->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <div class="row align-items text-white">
                                    <div class="col-1">
                                        <?php if ($fetch_contact['type'] == 'telp'): ?>
                                        <i class="bi bi-telephone"></i>
                                        <?php elseif ($fetch_contact['type'] == 'fax'):?>
                                        <i class="bi bi-telephone"></i>
                                        <?php elseif ($fetch_contact['type'] == 'email'):?>
                                        <i class="bi bi-envelope-at"></i>
                                        <?php elseif ($fetch_contact['type'] == 'instagram'):?>
                                        <i class="bi bi-instagram"></i>
                                        <?php elseif ($fetch_contact['type'] == 'youtube'):?>
                                        <i class="bi bi-youtube"></i>
                                        <?php elseif ($fetch_contact['type'] == 'twitter'):?>
                                        <i class="bi bi-twitter-x"></i>
                                        <?php elseif ($fetch_contact['type'] == 'facebook'):?>
                                        <i class="bi bi-facebook"></i>
                                        <?php elseif ($fetch_contact['type'] == 'linkedin'):?>
                                        <i class="bi bi-linkedin"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-11">
                                        <?= $fetch_contact['description']; ?>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                            <div class="col">
                                <h5 class="text-white">Alamat</h5>
                                <?php
                                    $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE type = 'address'");
                                    $select_contact->execute();
                                    if($select_contact->rowCount() > 0){
                                        while($fetch_contact = $select_contact->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <div class="row align-items text-white">
                                    <div class="col">
                                        <?= $fetch_contact['description']; ?>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </section>


                </div>
            </div>

            <footer class="mt-1">
                <div class="container">
                    <div class="footer mb-0 text-muted">
                        <div class="text-center">
                            <p>2023 &copy; Politeknik Negeri Sriwijaya | D-IV Teknik Telekomunikasi</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="public/assets/js/bootstrap.js"></script>
    <script src="public/assets/js/app.js"></script>
    <script src="public/assets/js/pages/horizontal-layout.js"></script>
    <script src="public/assets/js/pages/dashboard.js"></script>
</body>

</html>