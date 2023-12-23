<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Content</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?page=dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Content</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="d-flex justify-content-between">
                <div class="card-header d-flex justify-content-start">
                    <div class="mx-3 fs-5"><i class="bi bi-stack"></i></div>
                    <div class="fs-5">Content List</div>
                </div>
                <div class="card-header">
                    <a href="?page=add_content" class="btn btn-outline-primary rounded-5"><i class="bi bi-plus-lg"></i>
                        Add New Content</a>
                </div>
            </div>
        </div>
        <!-- Notifikasi Upload -->
        <?php
        if (isset($_SESSION['success'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['success']);
        }
        ?>

        <?php
        if (isset($_SESSION['update'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['update']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['update']);
        }
        ?>

        <?php
        if (isset($_SESSION['flash'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['flash']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['flash']);
        }
        ?>

        <?php
        if (isset($_SESSION['flash_fail'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> <?= $_SESSION['flash_fail']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['flash_fail']);
        }
        ?>

        <!-- Contact List -->
        <?php
            $show_content = $conn->prepare("SELECT * FROM `content` ORDER BY section");
            $show_content->execute();
            if($show_content->rowCount() > 0){
                while($fetch_content = $show_content->fetch(PDO::FETCH_ASSOC)){  
                    $content_id = $fetch_content['id_content'];
        ?>
        <p class="d-inline-flex gap-1">
            <button class="btn btn-primary shadow" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse-<?= $content_id ?>" aria-expanded="false"
                aria-controls="collapse-<?= $content_id ?>">
                <?= $fetch_content['section']; ?>
            </button>
        </p>
        <div class="collapse" id="collapse-<?= $content_id ?>">
            <?php
                if ($fetch_content['type'] == 'image-img') {
            ?>
            <div class="card card-body shadow" style="width: 18rem;">
                <img src=" ../uploaded_images/<?= $fetch_content['images']; ?>" class="card-img-top"
                    alt="article image">
            </div>
            <?php } ?>

            <?php
                if ($fetch_content['type'] == 'one-column') {
            ?>
            <div class="card card-body shadow">
                <?= $fetch_content['column_1']; ?>
            </div>
            <?php } ?>

            <?php
                if ($fetch_content['type'] == 'two-column') {
            ?>
            <div class="row">
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_2']; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_3']; ?>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php
                if ($fetch_content['type'] == 'three-column') {
            ?>
            <div class="row">
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_4']; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_5']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-body text-center shadow">
                        <?= $fetch_content['column_6']; ?>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php
                if ($fetch_content['type'] == 'four-column') {
            ?>
            <div class="row">
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_7']; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_8']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_9']; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-body shadow">
                        <?= $fetch_content['column_10']; ?>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
        <?php }} ?>

        <!-- Content Table -->
        <div class="card mt-3">
            <div class="card-header">Content Table</div>
            <div class="card-body">
                <table class="table table-striped text-gray-900" id="contactTable">
                    <thead>
                        <tr style="font-size: 0.9rem;">
                            <th>#</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        $show_content = $conn->prepare("SELECT * FROM `content` ORDER BY section");
                        $show_content->execute();
                        if($show_content->rowCount() > 0){
                            while($fetch_content = $show_content->fetch(PDO::FETCH_ASSOC)){   
                                $content_id = $fetch_content['id_content'];
                                $no++;
                        ?>
                        <tr style="font-size: 0.9rem;">
                            <td><?= $no; ?></td>
                            <td><b><?= $fetch_content['section']; ?></b></td>
                            <td>
                                <button class="btn btn-outline-danger modal-btn btn-delete-content"
                                    id="btnDeleteContent" data-bs-toggle="modal" data-bs-target="#modalDeleteContent"
                                    data-id="<?= $fetch_content['id_content']; ?>"
                                    data-section="<?= $fetch_content['section']; ?>"><i
                                        class="bi bi-trash-fill"></i></button>
                                <!-- <a href="?page=edit_content&get_id_content=<?= $content_id; ?>"
                                    class="btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a> -->
                            </td>
                        </tr>
                        <?php
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- modals -->

<!-- delete content -->
<div class="modal text-gray-900" id="modalDeleteContent" tabindex="-1">
    <form action="../page/content/action.php" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Content</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <b class="section"></b>?</p>

                </div>
                <input type="hidden" class="id_content" name="id_content">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger modal-btn" name="delete">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>