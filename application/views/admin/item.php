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
        <a href="" class="btn ml-3 additem" id="btn-modal" data-toggle="modal" data-target="#exampleModal">Add New Item</a>
    </form>
    <div class="row mt-3">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Type</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($clothing as $c) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><img id="img-clothing" src="<?= base_url('assets/img/clothing/') . $c['image']; ?>"></td>
                                <td><?= $c['name'] ?></td>
                                <td>Rp. <?= number_format($c['price']); ?></td>
                                <td><?= $c['type']; ?></td>
                                <td><?= $c['stock']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/edititem/') . $c['id'] ?>" class="badge badge-success">edit</a>
                                    <a href="<?= base_url('admin/deleteitem/') . $c['id'] ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/item'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <select class="form-control" id="type" name="type">
                        <option value="">Select Type</option>
                        <?php foreach ($type as $t) : ?>
                            <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="userfile" name="userfile">
                        <label for="userfile" class="custom-file-label">Choose File</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn" id="btn-confirm">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>