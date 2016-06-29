<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main_model extends CI_Model{

		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	        $this->form_validation->set_message ('required','*');
	        $this->form_validation->set_message ('numeric','*');
	        $this->form_validation->set_message ('matches','*');
	        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

	        function gender($value)
	        {
	        	$input = $value;
	        	$gender = array('Male','Female');
	        	$digit = array(1,2);
	        	return str_replace($digit,$gender,$input);
	        }

	        function marital($value)
	        {
	        	$input = $value;
	        	$marital = array('Single','Married');
	        	$digit = array(1,2);
	        	return str_replace($digit,$marital,$input);
	        }

	        	        function situation($value)
	        {
	        	$input = $value;
	        	$marital = array('Voucher','Already Sent','Already Called','Can`t Call','Cancel','No Status');
	        	$digit = array(0,1,2,3,4,9);
	        	return str_replace($digit,$marital,$input);
	        }


	       	function degree_lvl($value)
	        {
	        	$input = $value;
	        	$degree_lvl = array('Bachelor (BSc/BA)','Master (MSc/MA)','Doctorate (PhD)','MBA','Other');
	        	$digit = array(1,2,3,4,5);
	        	return str_replace($digit,$degree_lvl,$input);
	        }

	       	function it_type($value)
	        {
	        	$input = $value;
	        	$it_type = array('Windows & Office tools','Web programming & development','Non-web programming languages','Operating systems, Networking & Hardware');
	        	$digit = array(1,2,3,4,5);
	        	return str_replace($digit,$it_type,$input);
	        }


	       	function it_skill_lvl($value)
	        {
	        	$input = $value;
	        	$it_skill_lvl = array('Basic','Intermediate','Advanced','Expert');
	        	$digit = array(1,2,3,4,5);
	        	return str_replace($digit,$it_skill_lvl,$input);
	        }


	       	function lang($value)
	        {
	        	$input = $value;
	        	$lang = array('English','Chinese');
	        	$digit = array(1,2);
	        	return str_replace($digit,$lang,$input);
	        }

	       	function lang_skill($value)
	        {
	        	$input = $value;
	        	$lang_skill = array('Basic','Working knowledge','Fluent','Native');
	        	$digit = array(1,2,3,4);
	        	return str_replace($digit,$lang_skill,$input);
	        }


	        function name_of_month($value)
	        {
	        	switch ($value)
	        	{
	        		case 1:
	        			return 'January';
	        			break;
	        		case 2:
	        			return 'February';
	        			break;
	        		case 3:
	        			return 'March';
	        			break;
	        		case 4:
	        			return 'April';
	        			break;
	        		case 5:
	        			return 'May';
	        			break;
	        		case 6:
	        			return 'June';
	        			break;
	        		case 7:
	        			return 'July';
	        			break;
	        		case 8:
	        			return 'August';
	        			break;
	        		case 9:
	        			return 'September';
	        			break;
	        		case 10:
	        			return 'October';
	        			break;
	        		case 11:
	        			return 'November';
	        			break;
	        		default:
	        			return 'December';
	        			break;
	        	}
	        }

	        function date_time($value)
	        {
	        	date_default_timezone_set("Asia/Rangoon");
	        	$date_time=date('d-m-Y H:i:s',$value);
	        	return $date_time;
	        }

	       	function sim_date($value)
	        {
	        	date_default_timezone_set("Asia/Rangoon");
	        	$date_time=date('d-m-Y',$value);
	        	return $date_time;
	        }

	        function age($val)
	        {
	        	$birthDate = sim_date($val);
              //explode the date to get month, day and year
              $birthDate = explode("-", $birthDate);
              //get age from date or birthdate
              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                ? ((date("Y") - $birthDate[2]) - 1)
                : (date("Y") - $birthDate[2]));
              return $age;
	        }
	        
	    }

	   

		public function loginValidate()
		{
			$this->form_validation->set_rules('loginName','','required');
			$this->form_validation->set_rules('loginPassword','','required');

			if ($this->form_validation->run()==FALSE)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		 	public   function situation($value)
	        {
	        	$input = $value;
	        	$marital = array('Already Sent','Already Called','Can`t Call');
	        	$digit = array(1,2,3);
	        	return str_replace($digit,$marital,$input);
	        }

		public function gender($value)
	        {
	        	$input = $value;
	        	$gender = array('Male','Female');
	        	$digit = array(1,2);
	        	return str_replace($digit,$gender,$input);
	        }

	    public function marital($value)
	        {
	        	$input = $value;
	        	$marital = array('Single','Married');
	        	$digit = array(1,2);
	        	return str_replace($digit,$marital,$input);
	        }

	    public function country($value)
	    {
	    	$this->db->where('t_id',$value);
	    	$val=$this->db->get('country_tbl')->row_array();
	    	return $val['d_name'];
	    }

		public function loginState($username,$password)
		{
			$result='';
			$query = $this->db->query('SELECT * FROM users_tbl');
			if (!$query) 
			{
				die ('Error:'.mysql_error());
				
			}
				else 
				{
					foreach ($query->result() as $row)
					{
						if ($row->username == $username)
						{
							if ($row->password == md5($password))
							{
								$this->session->set_userdata('login_state','true');
								$this->session->set_userdata('username',$username);
								$this->session->set_userdata('user_role',$row->user_role);
								$this->session->set_userdata('user_id',$row->user_id);
								$this->session->set_userdata('real_name',$row->first_name.' '.$row->last_name);
								$result = 'true';
								break;
							}
							else 
							{
									$result = 'false';
							}
						}
							else {
								$result = 'false';
							}
							
					}

					if ($result == 'true')
					{
						return true;
					}
						else 
						{
							return false;
						}
				} 

		}



		// ------------------------ Upload Image Function --------------------------

	function upload_img($userfile)
	{
		$file = $_FILES[$userfile]['name'];

			$config['upload_path'] = 'upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '5000';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';

			$this->load->library('upload',$config);

			if ($this->upload->do_upload())
			{
				return $file;
			}
				else
				{
					return false;
				}

	}

	function userCreate_formValidate()
	{
		$this->form_validation->set_rules('dep','','required');
		$this->form_validation->set_rules('position','','required');
		$this->form_validation->set_rules('name','','required');
		$this->form_validation->set_rules('username','','required');
		$this->form_validation->set_rules('password','','required');
		$this->form_validation->set_rules('rePassword','','required|matches[password]');
		$this->form_validation->set_rules('role','','required');

		if ($this->form_validation->run()==FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}





	}