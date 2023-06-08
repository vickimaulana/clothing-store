<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Search -->
    <form action="" method="POST" class="form-inline">
        <div class=" input-group">
            <input type="text" name="search" class="form-control bg-white border-0 small shadow" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn" type="submit" id="btn-search">
                    <i class="fas fa-search fa-sm text-white"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="row mt-3">
        <?php foreach ($clothing as $c) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-<?= check_category($c['type_id']); ?> shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="wrap">
                                    <img src="<?= base_url('assets/img/clothing/') . $c['image'] ?>" id="img-display">
                                    <?= check_stock_img($c['stock']) ?>
                                </div>
                            </div>
                            <div class="col ml-3">
                                <div class="text-md font-weight-bold mb-1"><?= $c['name'] ?></div>
                                <div class="h3 mb-0 font-weight-bold">Rp. <?= number_format($c['price']) ?></div>
                                <a <?= check_stock_button($c['stock']) . $c['id'] . "'" ?> class="btn btn-<?= check_category($c['type_id']); ?> mt-2">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->