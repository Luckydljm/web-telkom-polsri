<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Contact</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?page=dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                    <div class="fs-5">Contact List</div>
                </div>
                <div class="card-header">
                    <button class="btn btn-outline-primary rounded-5 modal-btn" data-bs-toggle="modal"
                        data-bs-target="#modalAddContact"><i class="bi bi-plus-lg"></i>
                        Add New Contact</button>
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
        <div class="card">
            <div class="card-header">Contact Table</div>
            <div class="card-body">
                <table class="table table-striped text-gray-900" id="contactTable">
                    <thead>
                        <tr style="font-size: 0.9rem;">
                            <th>#</th>
                            <th>Contact Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        $show_contact = $conn->prepare("SELECT * FROM `contact`");
                        $show_contact->execute();
                        if($show_contact->rowCount() > 0){
                            while($fetch_contact = $show_contact->fetch(PDO::FETCH_ASSOC)){  
                                $no++;
                        ?>
                        <tr style="font-size: 0.9rem;">
                            <td><?= $no; ?></td>
                            <td><?= $fetch_contact['type']; ?></td>
                            <td><?= $fetch_contact['description']; ?></td>
                            <td>
                                <button class="btn btn-outline-danger modal-btn btn-delete-contact"
                                    id="btnDeleteContact" data-bs-toggle="modal" data-bs-target="#modalDeleteContact"
                                    data-id="<?= $fetch_contact['id_contact']; ?>"
                                    data-type="<?= $fetch_contact['type']; ?>"><i class="bi bi-trash-fill"></i></button>
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
<!-- add Contact -->
<div class=" modal text-gray-900" id="modalAddContact" tabindex="-1">
    <form action="../page/contact/action.php" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Contact</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select id="type" class="form-select" aria-label="Default select example" name="type">
                            <option selected disabled>Choose Type</option>
                            <option value="address"> address </option>
                            <option value="telp"> telp </option>
                            <option value="fax"> fax </option>
                            <option value="email"> email </option>
                            <option value="instagram"> instagram </option>
                            <option value="youtube"> youtube </option>
                            <option value="twitter"> twitter </option>
                            <option value="facebook"> facebook </option>
                            <option value="linkedin"> linkedin </option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                            required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-btn" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- delete contact -->
<div class="modal text-gray-900" id="modalDeleteContact" tabindex="-1">
    <form action="../page/contact/action.php" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Contact</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this <b class="type"></b>?</p>

                </div>
                <input type="hidden" class="id_contact" name="id_contact">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger modal-btn" name="delete">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>