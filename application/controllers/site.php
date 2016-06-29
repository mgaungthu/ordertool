 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    function __construct() 
        { 
            
        parent::__construct();
        
        

        }
 

    public function index($error='')
   {    

    if ($this->session->userdata('login_state') == 'true')
        {
            redirect('admin');
        }

        if ($error=='error') 
        {
            $data['error'] = 'true'; 
        }
        else
        {
            $data['error'] = '';
        }
        $data['login_form']='main/login_form';
        $this->load->view('main/login',$data);

   }

   public function login()
   {
    $this->form_validation->set_rules('username','','required');
    $this->form_validation->set_rules('password','','required');
    $username=$this->input->post('username');
    $password=$this->input->post('password');
    date_default_timezone_set("Asia/Rangoon");
    $time =  strtotime(date("Y-m-d H:i:s"));
      if ($this->form_validation->run()==FALSE)
        {
             $this->index('error');
        }
        else
        {           
            $loginState = $this->main_model->loginState($username,$password);
            if ($loginState == true)
            {
               $password= md5($password);
               $val = $this->db->query(" SELECT * FROM users_tbl WHERE username = '$username' AND password = '$password' ")->row_array();
               $data = array
                (
                    'user_id' => $val['user_id'], 
                    'username' => $val['username'],
                    'real_name' => $val['first_name'].' '.$val['last_name'],
                    'About' => 'System',
                    'description' => 'Login',
                    'date_time' => $time

                );
                $this->db->insert('activity_log_tbl',$data);
               redirect('admin');               
            }
            else
            {
                    $this->index('error');
            }
        
        }
     
   }

   public function logout()
    {   
        if ($this->session->userdata('login_state') != 'true')
        {
            $data['error'] = '';
        }
        else
        {
        date_default_timezone_set("Asia/Rangoon");
        $time =  strtotime(date("Y-m-d H:i:s"));
        $data = array
                (
                    'user_id' => $this->session->userdata('user_id'), 
                    'username' => $this->session->userdata('username'),
                    'real_name' => $this->session->userdata('real_name'),
                    'About' => 'System',
                    'description' => 'Logout',
                    'date_time' => $time

                );
        $this->db->insert('activity_log_tbl',$data);
        $data['error'] = 'logout';
        }    

        $this->session->sess_destroy();
        $data['login_form'] = 'main/login_form';
        $this->load->view('main/login',$data);
    }





}