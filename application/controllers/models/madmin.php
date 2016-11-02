<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class madmin extends CI_Model {

    public $db_tabel 	 = 'tbl_admin';
	public $db_tabel_usr = 'tbl_user';

    public function load_form_rules()
    {
        $form_rules = array(
                            array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required'
                            ),
        );
        return $form_rules;
    }

    public function admValidasi()
    {
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form); 	
        if ($this->form_validation->run()) 	
        {
            return 1; 
        }
        else
        {
            return 0;	
        }
    }

    
    public function cekAdmUser()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $level      = $this->input->post('level');	
		//$password = md5($this->input->post('password'));
		
		if ( $level ==='admin' or $level ==='comp' ) {
				$query = $this->db->where('username', $username)
								  ->where('password', $password)
								  ->where('level', $level)
								  ->limit(1)
								  ->get($this->db_tabel);
				
				if ($query->num_rows() == 1)
				{
					$data = array(
									'username' => $username,
									'pass' => $password,  
									'level' =>  $level, 
									'login' => TRUE
								);
					$this->session->set_userdata($data);
					return $data;
				}
				else
				{
					return FALSE;
				}
							  
		}
		
		if ( $level ==='user') {
				$query = $this->db->where('user_name', $username)
                              ->where('password', $password)
                              ->limit(1)
                              ->get($this->db_tabel_usr);
				
				if ($query->num_rows() == 1)
				{
					$data = array(
									'username' => $username,
									'pass' => $password,  
									'level' =>  $level, 
									'login' => TRUE
								);
					$this->session->set_userdata($data);
					return $data;
				}
				else
				{
					return FALSE;
				}
		
		}
		
		
        
    }
	
	
	public function cekPublicUser()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
		$level      = $this->input->post('level'); 
		
        // $query = $this->db->where('user_name', $username)
                          // ->where('password', $password)
                          // ->limit(1)
                          // ->get($this->db_tabel_usr);
		$sql = "SELECT user_name,password from tbl_user where user_name= '$username' AND password ='$password' ";
		print_r( $sql ); die;
		
		
		$this->db->last_query(); die;
		echo "<pre>";
		print_r($sql); die;
		
		//$sqlx = $this->db->query($sql);
		
        // if ($query->num_rows() == 1)
        // {
            // $data = array(
                            // 'username' => $username,
                            // 'pass' => $password,  
							// 'level' => 'user', 
                            // 'login' => TRUE
                        // );
            // $this->session->set_userdata($data);
            // return TRUE;
        // }
        // else
        // {
            // return FALSE;
        // }
    }
	
	
    public function logout()  {
        
        $this->session->unset_userdata(array('username' => '', 'login' => FALSE));
        $this->session->unset_userdata('pass');
        $this->session->unset_userdata('level');
     
        $this->session->sess_destroy();
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */