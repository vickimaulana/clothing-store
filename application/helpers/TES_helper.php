<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_category($type_id)
{
    if ($type_id == 1) {
        return "success";
    } else if ($type_id == 2) {
        return "danger";
    } else if ($type_id == 3) {
        return "info";
    } else if ($type_id == 4) {
        return "warning";
    }
}

function check_stock_img($stock)
{
    if ($stock == 0) {
        return "<div class='text'><strong>OUT OF STOCK</strong></div>";
    } else {
        return "";
    }
}

function check_stock_button($stock)
{
    if ($stock == 0) {
        return "";
    } else {
        return "href='http://localhost:8080/clothing-store/user/detail/";
    }
}
