<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		// $this->load->helper(array('form', 'url', 'html'));
		// $this->load->library(array('upload','image_lib'));
	}
	
	public function index()
	{
		
		  // $db_obj = $this->database->load('test',TRUE);
		  // $connected = $db_obj->initialize();
		  // if (!$connected) {
		  // $db_obj = $this->database->load('test',TRUE);
		  
		  $dsn = 'mysql://takaful:atk1234@localhost/takaful';
 
// Load database and dbutil
		$this->load->database($dsn);
		$this->load->dbutil();

		// check connection details
		if(! $this->dbutil->database_exists('database'))
		{
		// if connection details incorrect show error
		echo 'Incorrect database information provided';
		}
		  
		  // $this->database->_error_message(); (mysql_error equivalent)
		  // $this->database->_error_number(); (mysql_errno equivalent)
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */