<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('user/changepassword') ?>" method="post">
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" class="form-control" id="current-password" name="current-password">
                    <?= form_error('current-password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new-password1">New Password</label>
                    <input type="password" class="form-control" id="new-password1" name="new-password1">
                    <?= form_error('new-password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new-password2">Confirm New Password</label>
                    <input type="password" class="form-control" id="new-password2" name="new-password2">
                    <?= form_error('new-password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" onclick="showChangePassword()">
                        <label class="custom-control-label" for="customCheck">Show Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn" id="btn-confirm">Change Password</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->