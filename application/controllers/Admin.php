<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Overview';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['clothing'] = $this->admin->getClothing();
        $data['member'] = $this->admin->getUser();
        if ($this->input->post('search')) {
            $data['member'] = $this->admin->getSearchUser();
            $data['clothing'] = $this->admin->getSearchClothing();
        }
        $data['num_user'] = $this->db->get('user')->num_rows();
        $data['num_item'] = $this->db->get('clothing')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function item()
    {
        $data['title'] = 'Item Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['clothing'] = $this->admin->getClothing();
        if ($this->input->post('search')) {
            $data['clothing'] = $this->admin->getSearchClothing();
        }
        $data['type'] = $this->db->get('type')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/item', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['userfile']['name'];

            if ($upload_image) {
                $config['upload_path'] = FCPATH . '/assets/img/clothing/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('userfile')) {
                    $data = [
                        'name' => $this->input->post('name'),
                        'price' => $this->input->post('price'),
                        'type_id' => $this->input->post('type'),
                        'stock' => $this->input->post('stock'),
                        'image' => $this->upload->data('file_name')
                    ];
                    $this->db->insert('clothing', $data);

                    redirect('admin/item');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<small class="text-danger">'
                            . $this->upload->display_errors() .
                            '</small>'
                    );
                    redirect('admin/item');
                }
            }
        }
    }

    public function edititem($item_id)
    {
        $data['title'] = 'Edit Item';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['clothing'] = $this->admin->getClothingById($item_id);
        $data['type'] = $this->db->get('type')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edititem', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $type_id = $this->input->post('type');
            $stock = $this->input->post('stock');
            $upload_image = $_FILES['editfile']['name'];

            if ($upload_image) {
                $config['upload_path'] = FCPATH . '/assets/img/clothing/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('editfile')) {
                    $old_image = $data['clothing']['image'];
                    unlink(FCPATH . 'assets/img/clothing/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<small class="text-danger">'
                            . $this->upload->display_errors() .
                            '</small>'
                    );
                    redirect('admin/item');
                }
            }
            $this->db->set('name', $name);
            $this->db->set('price', $price);
            $this->db->set('type_id', $type_id);
            $this->db->set('stock', $stock);
            $this->db->where('id', $item_id);
            $this->db->update('clothing');
            redirect('admin/item');
        }
    }

    public function deleteitem($delete_item_id)
    {
        $this->db->delete('clothing', ['id' => $delete_item_id]);
        redirect('admin/item');
    }

    public function user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['member'] = $this->admin->getUserButCurrentUser($data['user']['id']);
        if ($this->input->post('search')) {
            $data['member'] = $this->admin->getSearchUserById($data['user']['id']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer');
    }

    public function editusers($user_id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['member'] = $this->admin->getUserById($user_id);
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editmember', $data);
            $this->load->view('templates/footer');
        } else {
            $role = $this->input->post('role_id');
            $is_active = $this->input->post('is_active');

            $this->db->set('role_id', $role);
            $this->db->set('is_active', $is_active);
            $this->db->where('id', $user_id);
            $this->db->update('user');
            redirect('admin/user');
        }
    }

    public function deleteuser($delete_user_id)
    {
        $this->db->delete('user', ['id' => $delete_user_id]);
        redirect('admin/user');
    }
}
