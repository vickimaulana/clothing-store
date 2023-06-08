<!-- Sidebar -->
<div class="navbar-nav bg-gradient-white sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider mt-3 bg-white">

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Heading -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading text-dark">
            <?= $m['menu']; ?>
        </div>

        <?php
        $querySubMenu = "SELECT * FROM `user_sub_menu` WHERE `menu_id` = {$m['id']}";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- Nav Item - Dashboard -->
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0 text-dark" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?> text-dark"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3 bg-white">
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link  text-dark" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt text-dark"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block bg-white">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0 bg-dark" id="sidebarToggle"></button>
        </div>
</div>
<!-- End of Sidebar -->