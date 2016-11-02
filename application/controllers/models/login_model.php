<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

    public $db_tabel = 'tbl_user';

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

    // cek status user, login atau tidak?
    public function cek_user()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $level      = $this->input->post('level');
        //$password = md5($this->input->post('password'));

        $query = $this->db->where('username_user', $username)
                          ->where('pass_user', $password)
                          ->where('level', $level)
                          ->limit(1)
                          ->get($this->db_tabel);

        if ($query->num_rows() == 1)
        {
            $data = array(
                            'username' => $username,
                            'pass' => $password,  
                            'level' => $level, 
                            'islogin' => TRUE
                        );
            // buat data session jika login benar
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function member($kode)
    {
        $query=$this->db->query("select * from tbl_user where kode_user='$kode'");
        return $query;
    }

    public function logout()  {
        
        $this->session->unset_userdata(array('username' => '', 'login' => FALSE));
        $this->session->unset_userdata('pass');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('kduser');

        $this->session->sess_destroy();
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */