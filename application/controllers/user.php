<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_state') != 'true' || $this->session->userdata('user_role') !=1  )
        {
            redirect('site');
        }
        $this->load->library('upload');
        $this->load->model('table_model');

    }


    public function index()
    {
        $this->breadcrumbs->push('Home','admin');
        $this->breadcrumbs->push('User Managment','admin/user-management');
        $this->db->order_by('user_role','ASC');
        $data['query']=$this->db->get('users_tbl')->result_array();
        $data["sidebar_menu"]="admin/template/sidebar_menu";
        $data['pagetitle']="User Managment";
        $data['loginame']=$this->session->userdata('real_name');
        $data['main_content']='admin/user_show';
        $this->load->view('admin/admin_template',$data);
    }

    public function user_detail()
    {
        $this->breadcrumbs->push('Home','admin');
        $this->breadcrumbs->push('User Managment','admin/user-management');
        $this->breadcrumbs->push('User Detail','admin/user-detail');
        $id=$this->uri->segment(3);
        $this->db->where('t_id',$id);
        $data['pagetitle']="User Detail";
        $data['row']=$this->db->get('users_tbl')->row_array();
        $data['loginame']=$this->session->userdata('real_name');
        $data["sidebar_menu"]="admin/template/sidebar_menu";
        $data['main_content']='admin/detail_show';
        $this->load->view('admin/admin_template',$data);
    }

    public function add_user()
    {
        $this->breadcrumbs->push('Home','admin');
        $this->breadcrumbs->push('User Managment','admin/user-management');
        $this->breadcrumbs->push('Add User','admin/add-user');
        $data['query']=$this->db->get('users_tbl')->result_array();
        $data['pagetitle']="Add User";
        $data['loginame']=$this->session->userdata('real_name');
        $data["sidebar_menu"]="admin/template/sidebar_menu";
        $data['main_content']='admin/add_user_form';
        $this->load->view('admin/admin_template',$data);
    }

    public function add_user_process()
    {
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $user_role=$this->input->post('user_role');
        date_default_timezone_set("Asia/Rangoon");
        $time =  strtotime(date("Y-m-d H:i:s"));
        $user_id=$this->db->count_all('users_tbl');
        $data = array(
            'user_id'=>$user_id,
            'username' => $username ,
            'first_name' => $first_name ,
            'last_name' => $last_name ,
            'password'=> md5($password),
            'user_role'=> $user_role,
            'creat_date'=> $time,
            'creator_name'=> $this->session->userdata('real_name')
        );
        $this->db->insert('users_tbl',$data);
        $data = array
        (
            'user_id' => $this->session->userdata('user_id'),
            'username' => $this->session->userdata('username'),
            'real_name' => $this->session->userdata('real_name'),
            'About' => 'User Managment',
            'description' => 'Add New',
            'date_time' => $time
        );
        $this->db->insert('activity_log_tbl',$data);
        redirect('admin/user-management');

    }

    public function edit_user()
    {
        $this->breadcrumbs->push('Home','admin');
        $this->breadcrumbs->push('User Managment','admin/user-management');
        $this->breadcrumbs->push('Edit User','admin/edit-user');
        $id=$this->uri->segment(3);
        $this->db->where('t_id',$id);
        $data['pagetitle']="Edit User";
        $data['row']=$this->db->get('users_tbl')->row_array();
        $data['loginame']=$this->session->userdata('real_name');
        $data["sidebar_menu"]="admin/template/sidebar_menu";
        $data['main_content']='admin/edit_user_form';
        $this->load->view('admin/admin_template',$data);
    }

    public function edit_user_process()
    {
        $id=$this->uri->segment(3);
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $user_role=$this->input->post('user_role');
        date_default_timezone_set("Asia/Rangoon");
        $time =  strtotime(date("Y-m-d H:i:s"));
        $data = array(
            'username' => $username ,
            'first_name' => $first_name ,
            'last_name' => $last_name ,
            'password'=> md5($password),
            'user_role'=> $user_role,
            'creat_date'=> $time,
            'creator_name'=> $this->session->userdata('real_name')
        );
        $this->db->where('t_id',$id);
        $this->db->update('users_tbl',$data);
        $data = array
        (
            'user_id' => $this->session->userdata('user_id'),
            'username' => $this->session->userdata('username'),
            'real_name' => $this->session->userdata('real_name'),
            'About' => 'User Managment',
            'description' => 'Edit',
            'date_time' => $time
        );
        $this->db->insert('activity_log_tbl',$data);
        redirect('admin/user-management');
    }

    public function delete_user()
    {
        $id=$this->uri->segment(3);
        $this->db->where('t_id',$id);
        $this->db->delete('users_tbl');
        date_default_timezone_set("Asia/Rangoon");
        $time =  strtotime(date("Y-m-d H:i:s"));
        $data = array
        (
            'user_id' => $this->session->userdata('user_id'),
            'username' => $this->session->userdata('username'),
            'real_name' => $this->session->userdata('real_name'),
            'About' => 'Country',
            'description' => 'Delete',
            'date_time' => $time
        );
        $this->db->insert('activity_log_tbl',$data);
        redirect('admin/user-management');
    }









}