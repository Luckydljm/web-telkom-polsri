<div class="page-heading">
    <h2>Dashboard</h2>
</div>
<div class="page-content">
    <?php
    if (isset($_SESSION['sukses'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hello <?php echo $_SESSION['first_name']; ?>!</strong> <?= $_SESSION['sukses']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        unset($_SESSION['sukses']);
    }
    ?>

    <div class="row">
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <i class="icon dripicons dripicons-network-3"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Content</h6>
                            <?php
                            $select_content = $conn->prepare("SELECT * FROM `content`");
                            $select_content->execute();
                            $total_content =  $select_content->rowCount();
                            ?>
                            <h6 class="font-extrabold mb-0"><?= $total_content; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="icon dripicons dripicons-archive"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Users</h6>
                            <?php
                            $select_users = $conn->prepare("SELECT * FROM `users`");
                            $select_users->execute();
                            $total_users =  $select_users->rowCount();
                            ?>
                            <h6 class="font-extrabold mb-0"><?= $total_users; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="icon dripicons dripicons-user-group"></i>
                            </div>
                        </div>
                        <div class=" col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Contact</h6>
                            <?php
                            $select_contact = $conn->prepare("SELECT * FROM `contact`");
                            $select_contact->execute();
                            $total_contact =  $select_contact->rowCount();
                            ?>
                            <h6 class="font-extrabold mb-0"><?= $total_contact; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Total Content Uploaded</h4>
                </div>
                <div class="card-body">
                    <canvas id="contentChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Bar Chart
const ctx = document.getElementById('contentChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php 
                    $select_content = $conn->prepare("SELECT * FROM `content`");
                    $select_content->execute();
                    if($select_content->rowCount() > 0){
                        while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){   
                            $added_at = $fetch_content['added_at'];
                            echo '"' . $added_at . '"' . ',';
                        }
                    }
                ?>],
        datasets: [{
            label: 'Total Content Uploaded',
            data: [<?php 
                   $select_content = $conn->prepare("SELECT * FROM `content`");
                   $select_content->execute();
                   if($select_content->rowCount() > 0){
                       while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){  
                           $added_at = $fetch_content['added_at'];
                           $select_data = $conn->prepare("SELECT * FROM `content` WHERE added_at = ?");
                           $select_data->execute([$added_at]);
                           $total_data =  $select_data->rowCount();
                           echo $total_data . ',';
                       }
                   }
                    ?>],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>