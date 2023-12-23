<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Edit Content</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?page=content">Content</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Content</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-start">
                <div class="mx-3 fs-5"><i class="bi bi-stack"></i></div>
                <div class="fs-5">Edit Content</div>
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
        if (isset($_SESSION['fail'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> <?= $_SESSION['fail']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['fail']);
        }
        ?>

        <div class="card p-3">
            <div class="card-header">Form Edit Content</div>
            <div class="card-body">
                <form action="../page/content/action.php" method="post" enctype="multipart/form-data"
                    data-parsley-validate>
                    <?php
                        if(isset($_GET['get_id_content'])){
                            $get_id_content = $_GET['get_id_content'];
                        }
                        $show_content = $conn->prepare("SELECT * FROM `content` WHERE id_content = ?");
                        $show_content->execute([$get_id_content]);
                        if($show_content->rowCount() > 0){
                            while($fetch_content = $show_content->fetch(PDO::FETCH_ASSOC)){  
                    ?>
                    <div class="form-group">
                        <label for="section" class="form-text">Section</label>
                        <input type="text" id="section" class="form-control" name="section"
                            value="<?= $fetch_content['section']; ?>" data-parsley-required="true" />
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-text">Type</label>
                        <input type="text" id="type" class="form-control" name="type"
                            value="<?= $fetch_content['type']; ?>" data-parsley-required="true" disabled />
                    </div>

                    <?php
                        if ($fetch_content['type'] == 'image-img') {
                    ?>
                    <div class="form-group">
                        <label for="sample" class="form-text">Current Image</label>
                        <img src="../uploaded_images/<?= $fetch_content['images']; ?>" alt="" id="sample"
                            class="form-control">
                    </div>
                    <?php } ?>

                    <?php
                        if ($fetch_content['type'] == 'one-column') {
                    ?>
                    <div class="form-group">
                        <label for="column_1" class="form-text">Article 1</label>
                        <textarea name="column_1" id="column_1" class="form-control"
                            disabled><?= $fetch_content['column_1']; ?></textarea>
                    </div>
                    <?php } ?>

                    <?php
                        if ($fetch_content['type'] == 'two-column') {
                    ?>
                    <div class="form-group">
                        <label for="column_2" class="form-text">Article 1</label>
                        <textarea name="column_2" id="column_2" class="form-control"
                            disabled><?= $fetch_content['column_2']; ?></textarea>
                        <label for="column_3" class="form-text">Article 2</label>
                        <textarea name="column_3" id="column_3" class="form-control"
                            disabled><?= $fetch_content['column_3']; ?></textarea>
                    </div>
                    <?php } ?>

                    <?php
                        if ($fetch_content['type'] == 'three-column') {
                    ?>
                    <div class="form-group">
                        <label for="column_4" class="form-text">Article 1</label>
                        <textarea name="column_4" id="column_4" class="form-control"
                            disabled><?= $fetch_content['column_4']; ?></textarea>
                        <label for="column_5" class="form-text">Article 2</label>
                        <textarea name="column_5" id="column_5" class="form-control"
                            disabled><?= $fetch_content['column_5']; ?></textarea>
                        <label for="column_6" class="form-text">Article 3</label>
                        <textarea name="column_6" id="column_6" class="form-control"
                            disabled><?= $fetch_content['column_6']; ?></textarea>
                    </div>
                    <?php } ?>

                    <?php
                        if ($fetch_content['type'] == 'four-column') {
                    ?>
                    <div class="form-group">
                        <label for="column_7" class="form-text">Article 1</label>
                        <textarea name="column_7" id="column_7" class="form-control"
                            disabled><?= $fetch_content['column_7']; ?></textarea>
                        <label for="column_8" class="form-text">Article 2</label>
                        <textarea name="column_8" id="column_8" class="form-control"
                            disabled><?= $fetch_content['column_8']; ?></textarea>
                        <label for="column_9" class="form-text">Article 3</label>
                        <textarea name="column_9" id="column_9" class="form-control"
                            disabled><?= $fetch_content['column_9']; ?></textarea>
                        <label for="column_10" class="form-text">Article 4</label>
                        <textarea name="column_10" id="column_10" class="form-control"
                            disabled><?= $fetch_content['column_10']; ?></textarea>
                    </div>
                    <?php }}} ?>

                    <input class="updated_at" type="hidden" name="updated_at" value="<?php echo date('Y-m-d')?>">
                    <input class="id_content" type="hidden" name="id_content" value="<?= $get_id_content; ?>">
                    <button type="submit" class="btn btn-primary text-center" name="update">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>

</script>