<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <h3 class="mb-4 text-gray-800"><?= $title; ?></h3>
    <div class="row">
        <div class="wrap">
            <img class="img-thumbnail mr-3 border border-<?= check_category($clothing['type_id']); ?>" style="max-width: 300px; border-width:3px !important;" src="<?= base_url('assets/img/clothing/') . $clothing['image']; ?>">
            <?= check_stock_img($clothing['stock']) ?>
        </div>
        <div class="col-lg-8">
            <h1 class="text-dark"><strong><?= $clothing['name'] ?></strong><small> - <?= $clothing['type'] ?></small></h1>
            <h3>Rp. <?= number_format($clothing['price']) ?></h3>
            <div class="mt-4">Stock: <?= $clothing['stock'] ?></div>
            <?= form_open_multipart(); ?>
            <div class="mt-3">Size: </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="M" checked>
                <label class="form-check-label" for="exampleRadios">
                    M
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="L">
                <label class="form-check-label" for="exampleRadios">
                    L
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="XL">
                <label class="form-check-label" for="exampleRadios">
                    XL
                </label>
            </div>
            <div class="form-group row">
                <label for="qty" class="col-sm-1 col-form-label mr-3">Quantity</label>
                <div class="col-sm-2">
                    <input type="number" min="1" class="form-control" id="qty" name="qty" value="1">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <button type="button" onClick="multiplyBy()" class="btn btn-<?= check_category($clothing['type_id']); ?>" data-toggle="modal" data-target="#exampleModal">Buy</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:100%; max-width:600px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                <div>
                    <img class="img-thumbnail ml-3 border border-<?= check_category($clothing['type_id']); ?>" id="img-display" style="max-width: 300px; border-width:3px !important;" src="<?= base_url('assets/img/clothing/') . $clothing['image']; ?>">
                </div>
                <div class="col">
                    <h6><strong>YOU'RE ABOUT TO PURCHASE: </strong></h6>
                    <h3 class="text-dark"><?= $clothing['name'] ?><small> - <?= $clothing['type'] ?></small></h3>
                    <span>Price: <strong id="harga" data-value="<?= $clothing['price'] ?>">Rp. <?= number_format($clothing['price']) ?></strong></span><br>
                    <span>Size: <strong id="ukuran">M</strong></span><br>
                    <span>Quantity: <strong id="amount">1</strong></span><br>
                    <span>Total: <strong id="total">0</strong></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-<?= check_category($clothing['type_id']); ?>">Buy</button>
            </div>
            </form>
        </div>
    </div>
</div>