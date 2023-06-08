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
        <div class="col-lg">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date Joined</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($member as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><img class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" src="<?= base_url('assets/img/profile/') . $m['image']; ?>"></td>
                                <td><?= $m['name'] ?></td>
                                <td><?= $m['email'] ?></td>
                                <td><?= $m['role'] ?></td>
                                <td><?php if ($m['is_active'] == 1) : echo 'Active' ?>
                                    <?php else : echo 'Inactive' ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d F Y', $m['date_created']) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editusers/') . $m['id'] ?>" class="badge badge-success">edit</a>
                                    <a href="<?= base_url('admin/deleteuser/') . $m['id'] ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this user?');">delete</a>
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