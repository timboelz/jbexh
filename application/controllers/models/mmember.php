<?php 

class mmember extends CI_Model {

    public $db_tabel = 'tbl_user';

    public function load_form_rules()
    {
        $form_rules = array(
                            array(
                                'field' => 'email',
                                'label' => 'Email',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'pass_user',
                                'label' => 'Password',
                                'rules' => 'required'
                            ),

        );
        return $form_rules;
    }

    public function validasi()
    {
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

	public function cekemail()       
	{
	$email       = $this->input->post('email');
	$querycek = $this->db->query("select email from tbl_user where email='$email'");
		 
         if ($querycek->num_rows() == 0)
          {
           return FALSE;
          }
		  else 
		  {
		   return TRUE;
		  }
	}
    
    public function cekuser()       
    {
        $email       = $this->input->post('email');
        $pass_user   = $this->input->post('pass_user');
        $level       = "member";
       
		$query = $this->db->query("select * from tbl_user 
									where email='$email' 
									and pass_user='$pass_user' 
									and level='member'
									");
			  if ($query->num_rows() == 1)
				{
				  $data = array(
									 'username_user' => $query->row("username_user"),  //$username_user,
									 'email' => $email,
									 'pass_user' => $pass_user,  
									 'level' => $level, 
									 'login' => TRUE
								 );
					 $this->session->set_userdata($data);
					 return TRUE;
				}
				else 
				{
				return FALSE;
				}
    }
    
    
    
     function getprofil($email='')
            {
                $query=$this->db->query("select * from tbl_user where email='$email'");
                return $query->row();
            }   
    
     
	function listmember($kode_user='') {
		$q = $this->db->query("SELECT * from tbl_user where kode_user='$kode_user'");
		return $q;
	}
    
    public function logout()  {
        
        $this->session->unset_userdata(array('username_user' => '', 'login' => FALSE));
        $this->session->unset_userdata('pass_user');

        $this->session->sess_destroy();
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */