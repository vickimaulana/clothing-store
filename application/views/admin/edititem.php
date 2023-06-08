<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>: <strong><?= $clothing['name'] ?></strong></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart(); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $clothing['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="price" name="price" value="<?= $clothing['price'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="type" name="type">
                        <option value="">Select Type</option>
                        <?php foreach ($type as $t) : ?>
                            <?php if ($t['id'] == $clothing['type_id']) : ?>
                                <option value="<?= $t['id'] ?>" selected><?= $t['type'] ?></option>
                            <?php else : ?>
                                <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="stock" name="stock" value="<?= $clothing['stock'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/clothing/') . $clothing['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input" id="editfile" name="editfile">
                                <label for="image" class="custom-file-label">Choose File</label>
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn" id="btn-confirm">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->