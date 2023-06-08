<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>: <strong><?= $member['name']; ?></strong></h1>

    <div class="row">
        <div>
            <img class="img-thumbnail mr-3" style="max-width: 250px;" src="<?= base_url('assets/img/profile/') . $member['image']; ?>">
        </div>
        <div class="col-lg-4">
            <form action="" method="post">
                <div class="form-group row">
                    <input type="text" class="form-control mt-3" id="email" name="email" value="<?= $member['email'] ?>" readonly>
                </div>
                <div class="form-group row">
                    <select class="form-control" id="role_id" name="role_id">
                        <option value="">Select Role</option>
                        <?php foreach ($role as $r) : ?>
                            <?php if ($r['id'] == $member['role_id']) : ?>
                                <option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
                            <?php else : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <?php if ($member['is_active'] == 1) : ?>
                            <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active" checked>
                        <?php else : ?>
                            <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active">
                        <?php endif; ?>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm">
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