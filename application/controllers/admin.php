<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() 
    {             
        parent::__construct();
 		
     		if ($this->session->userdata('login_state') != 'true')
     		{
     			redirect('site');
     		}
        $this->load->library('upload');
       $this->load->model('table_model');

    }


          public function index()
      {
           $this->load->helper('url');
           $data['loginame']=$this->session->userdata('real_name');
             $data['user_role']=$this->session->userdata('user_role');
             $data['pagetitle']="Customer Orders";
             $data["sidebar_menu"]="admin/template/sidebar_menu";
             $this->db->order_by("create_date","DESC");
             $data['main_content']='admin/tabletest';
             $this->load->view('admin/admin_template',$data);
      }

  public function ajax_list()
  {
    $list = $this->table_model->get_datatables();
    $data = array();
    $no = $_POST['start'];
    $i=1;
     $color="";
     
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $i++;
      $row[] = $person->item_code;
      $row[] = $person->first_name.' '.$person->last_name;
      $row[] = $person->ph_no;
      $row[] = $person->address;
      $row[] = $person->city;
      $row[] = $person->color;
      $row[] = $person->quantity;
      $row[] = $person->note_pad;
      $row[] = date_time($person->create_date);
      $row[] = $person->who_created;

     
              if ($person->situation==1)
                {
                 
                  $color = "green";
                }
              elseif ($person->situation==0)
                {
                 
                 $color = "teal";
                
                 }
                elseif ($person->situation==2)
                {
                 
                 $color = "blue";
                 
                 }
                elseif ($person->situation==3)
                {
                $color = "red";
                
                }
               elseif ($person->situation==4)
                {
                $color = "yellow";
                
                }
                 else
                 {                   
                    $color = "normal";
                    
                 }

       $row[] = '<div id="showSelect-'.$person->t_id.'"> <div tid="'.$person->t_id.'" id="callStatusUpdate" val="'.$person->situation.'" class="status '.$color.'">'.situation($person->situation).'</div><span id="selectedbox"></span></div>';

       $row[] = '<a href="admin/edit-order/'.$person->t_id.'"><i class="fa fa-pencil-square-o"></i> </a>|
        <a href="admin/delete-order" id="'.$person->t_id.'" class="delete_order"><i class="fa fa-trash-o"></i> </a>'    ;  
 
       
            //add html for action    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->table_model->count_all(),
            "recordsFiltered" => $this->table_model->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }


  public function callStatusUpdate(){
    $data['id']=$this->input->post('id');
    $data['value']=$this->input->post('value');
    $this->load->view('admin/callStatusUpdate',$data);

  }
            public function already_sent(){
        $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Already Sent','admin/already-sent');
         $data['loginame']=$this->session->userdata('real_name');
         $data['user_role']=$this->session->userdata('user_role');
         $data['pagetitle']="Customer Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $this->db->order_by("create_date","DESC");
         $this->db->where('situation',1);
         $data["query"]=$this->db->get("order_list_tbl")->result_array();
         $data['main_content']='admin/home';
         $this->load->view('admin/admin_template',$data);
      }


        public function already_called()  {
        $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Already Called','admin/already-called');
         $data['loginame']=$this->session->userdata('real_name');
         $data['user_role']=$this->session->userdata('user_role');
         $data['pagetitle']="Customer Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $this->db->order_by("create_date","DESC");
         $this->db->where('situation',2);
         $data["query"]=$this->db->get("order_list_tbl")->result_array();
         $data['main_content']='admin/home';
         $this->load->view('admin/admin_template',$data);
      }


      public function cant_called()  {
        $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Can`t Called','admin/cant-called');
         $data['loginame']=$this->session->userdata('real_name');
         $data['user_role']=$this->session->userdata('user_role');
         $data['pagetitle']="Customer Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $this->db->order_by("create_date","DESC");
         $this->db->where('situation',3);
         $data["query"]=$this->db->get("order_list_tbl")->result_array();
         $data['main_content']='admin/home';
         $this->load->view('admin/admin_template',$data);
      }

      public function cancel()  {
        $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Canceled','admin/cancel');
         $data['loginame']=$this->session->userdata('real_name');
         $data['user_role']=$this->session->userdata('user_role');
         $data['pagetitle']="Customer Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $this->db->order_by("create_date","DESC");
         $this->db->where('situation',4);
         $data["query"]=$this->db->get("order_list_tbl")->result_array();
         $data['main_content']='admin/home';
         $this->load->view('admin/admin_template',$data);
      }


      public function voucher()  {
        $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Voucher','admin/voucher');
         $data['loginame']=$this->session->userdata('real_name');
         $data['user_role']=$this->session->userdata('user_role');
         $data['pagetitle']="Customer Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $this->db->order_by("create_date","DESC");
         $this->db->where('situation',0);
         $data["query"]=$this->db->get("order_list_tbl")->result_array();
         $data['main_content']='admin/home';
         $this->load->view('admin/admin_template',$data);
      }

      public function add_order()
     {  
                 
         $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Add New Order','admin/add-order');
         $data['loginame']=$this->session->userdata('real_name');
         $data['pagetitle']="Add New Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $data['main_content']='admin/add_order_form';
         $this->load->view('admin/admin_template',$data);
      }

      public function edit_order()
     {  
                 
         $this->breadcrumbs->push('Home','admin/index');
         $this->breadcrumbs->push('Add New Order','admin/add-order');
         $t_id=$this->uri->segment(3);
         $this->db->where("t_id",$t_id);
         $data["row"]=$this->db->get("order_list_tbl")->row_array();
         $data['loginame']=$this->session->userdata('real_name');
         $data['pagetitle']="Add New Orders";
         $data["sidebar_menu"]="admin/template/sidebar_menu";
         $data['main_content']='admin/add_order_form';
         $this->load->view('admin/admin_template',$data);
      }

      public function add_order_process()
      {
        date_default_timezone_set("Asia/Rangoon");
        $create_date =  strtotime(date("Y-m-d H:i:s"));
        $first_name=$this->input->post("first_name");
        $last_name=$this->input->post("last_name");
        $ph_no=$this->input->post("ph_no");
        $address=$this->input->post("address");
        $note_pad=$this->input->post("note_pad");
        $city=$this->input->post("city");
        $item_code  =$this->input->post("item_code");
        $quantity  =$this->input->post("quantity");
        $color  =$this->input->post("color");
        
        $data = array(
          'first_name' => $first_name, 
          'last_name' =>$last_name , 
          'ph_no' => $ph_no, 
          'address' => $address, 
          'note_pad' => $note_pad, 
          'city' => $city, 
          'item_code' => $item_code, 
          'quantity' => $quantity, 
          'color' => $color, 
          'create_date' => $create_date,
          'who_created' =>$this->session->userdata('real_name')
          );
        $this->db->insert("order_list_tbl",$data);
        redirect("admin");

      }

            public function edit_order_process()
      {

        $t_id=$this->uri->segment(3);
        $first_name=$this->input->post("first_name");
        $last_name=$this->input->post("last_name");
        $ph_no=$this->input->post("ph_no");
        $address=$this->input->post("address");
        $note_pad=$this->input->post("note_pad");
        $city=$this->input->post("city");
        $item_code  =$this->input->post("item_code");
        $quantity  =$this->input->post("quantity");
        $color  =$this->input->post("color");
        
        $data = array(
          'first_name' => $first_name, 
          'last_name' =>$last_name , 
          'ph_no' => $ph_no, 
          'address' => $address, 
          'note_pad'=>$note_pad,
          'city' => $city, 
          'item_code' => $item_code, 
          'quantity' => $quantity, 
          'color' => $color, 
          
          );
        $this->db->where("t_id",$t_id);
        $this->db->update("order_list_tbl",$data);
        redirect("admin");

      }

      public function delete_order()
      {
              $id=$this->input->post("id");
              $this->db->where('t_id',$id);
              $this->db->delete('order_list_tbl'); 
      }

         public function situation_update()
     {  

          $user_role=$this->session->userdata('user_role');
          $t_id=$this->input->post("t_id");
          $sit=$this->input->post("sit");
          $this->db->where("t_id",$t_id);
          $row=$this->db->get("order_list_tbl")->row_array();
          if ($user_role==1) 
          {
            $data = array(
                'situation' => $sit , 
                );
              $this->db->where("t_id",$t_id);
              $this->db->update("order_list_tbl",$data);
          }
          else{
              if ($row["situation"]==1) {
                $data = array(
                'pending' => "P ->" ,
                'pending_sit'=> $this->main_model->situation($sit) 
                      );            
                $update = array(
                'situation' => 4 , 
                'pending_sit'=> $sit
                ); 
                $this->db->where("t_id",$t_id);
                $this->db->update("order_list_tbl",$update);
                echo json_encode($data); 
              }
              else{
              $data = array(
                'situation' => $sit , 
                );
              $this->db->where("t_id",$t_id);
              $this->db->update("order_list_tbl",$data);
              }
        }
     }

      public function confirm_sit()
      {
        $data['change']=$this->input->post("change");
        $data['pending']=$this->input->post("pending");
        $this->load->view("admin/confirm_sit",$data);
      }



  
   

   



}