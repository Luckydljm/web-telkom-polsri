<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Add Content</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?page=content">Content</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Content</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-start">
                <div class="mx-3 fs-5"><i class="bi bi-stack"></i></div>
                <div class="fs-5">Add New Content</div>
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
            <div class="card-header">Content Add Form</div>
            <div class="card-body">
                <form action="../page/content/action.php" method="post" enctype="multipart/form-data"
                    data-parsley-validate>
                    <div class="form-group">
                        <label for="section" class="form-text">Section<span class="text-danger">*)</span></label>
                        <input type="text" id="section" class="form-control" name="section"
                            data-parsley-required="true" />
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-text">Type</label>
                        <select id="type" class="form-select select2" data-toggle="select2"
                            aria-label="Default select example" name="type" onchange="show_type_form(this.value)"
                            required>
                            <option value="">Select Type of Content</option>
                            <option value="image-img">Image</option>
                            <option value="one-column">Article 1 Column</option>
                            <option value="two-column">Article 2 Column</option>
                            <option value="three-column">Article 3 Column</option>
                            <option value="four-column">Article 4 Column</option>
                        </select>
                    </div>

                    <div class="form-group" id="image" style="display: none;">
                        <label for="images" class="form-text">Content Image <small>(The image size
                                should be: 400 X 255)</small>
                        </label>
                        <div class="input-group mb-3">
                            <input type="file" name="images" class="form-control" id="images" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group" id="one" style="display: none;">
                        <label for="example" class="form-text text-danger">Sample</label>
                        <img src="../public/assets/images/samples/one-column.png" alt="" id="example"
                            class="form-control" style="height: 15rem;">
                        <label for="column_1" class="form-text">Article 1</label>
                        <textarea name="column_1" id="column_1" class="form-control"></textarea>
                    </div>

                    <div class="form-group" id="two" style="display: none;">
                        <label for="example" class="form-text text-danger">Sample</label>
                        <img src="../public/assets/images/samples/two-column.png" alt="" id="example"
                            class="form-control" style="height: 15rem;">
                        <label for="column_2" class="form-text">Article 1</label>
                        <textarea name="column_2" id="column_2" class="form-control"></textarea>
                        <label for="column_3" class="form-text">Article 2</label>
                        <textarea name="column_3" id="column_3" class="form-control"></textarea>
                    </div>

                    <div class="form-group" id="three" style="display: none;">
                        <label for="example" class="form-text text-danger">Sample</label>
                        <img src="../public/assets/images/samples/three-column.png" alt="" id="example"
                            class="form-control" style="height: 15rem;">
                        <label for="column_4" class="form-text">Article 1</label>
                        <textarea name="column_4" id="column_4" class="form-control"></textarea>
                        <label for="column_5" class="form-text">Article 2</label>
                        <textarea name="column_5" id="column_5" class="form-control"></textarea>
                        <label for="column_6" class="form-text">Article 3</label>
                        <textarea name="column_6" id="column_6" class="form-control"></textarea>
                    </div>

                    <div class="form-group" id="four" style="display: none;">
                        <label for="example" class="form-text text-danger">Sample</label>
                        <img src="../public/assets/images/samples/four-column.png" alt="" id="example"
                            class="form-control" style="height: 15rem;">
                        <label for="column_7" class="form-text">Article 1</label>
                        <textarea name="column_7" id="column_7" class="form-control"></textarea>
                        <label for="column_8" class="form-text">Article 2</label>
                        <textarea name="column_8" id="column_8" class="form-control"></textarea>
                        <label for="column_9" class="form-text">Article 3</label>
                        <textarea name="column_9" id="column_9" class="form-control"></textarea>
                        <label for="column_10" class="form-text">Article 4</label>
                        <textarea name="column_10" id="column_10" class="form-control"></textarea>
                    </div>

                    <input class="added_at" type="hidden" name="added_at" value="<?php echo date('Y-m-d')?>">
                    <button type="submit" name="publish" class="btn btn-primary">Publish</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
// add content
function show_type_form(param) {
    var checker = param.split('-');
    var type = checker[0];
    if (type === 'one') {
        $('#image').hide();
        $('#one').show();
        $('#two').hide();
        $('#three').hide();
        $('#four').hide();
    } else if (type === 'two') {
        $('#image').hide();
        $('#one').hide();
        $('#two').show();
        $('#three').hide();
        $('#four').hide();
    } else if (type === 'three') {
        $('#image').hide();
        $('#one').hide();
        $('#two').hide();
        $('#three').show();
        $('#four').hide();
    } else if (type === 'four') {
        $('#image').hide();
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        $('#four').show();
    } else if (type === 'image') {
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        $('#four').hide();
        $('#image').show();
    } else {
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        $('#four').hide();
        $('#image').hide();
    }
}
</script>