<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library(array('upload','image_lib'));
	}
	
	public function index()
	{
		$data = array();
		$data['error'] = '';
		$data['output'] = '';
		
		if(isset($_FILES['userfile']))
		{
			$this->upload->initialize(array(
				'upload_path' => './asset/produk/thumbnail/',
				'allowed_types' => 'png|jpg|gif',
				'max_size' => '5000',
				'max_width' => '3000',
				'max_height' => '3000'
			)); 
			
			$userfile    = $_FILES['userfile']['name'];

			if($this->upload->do_upload())
			{
				$data_upload = $this->upload->data();
				$this->image_lib->initialize(array(
					'image_library' => 'gd2',
					'source_image' => './asset/produk/thumbnail/'. $data_upload['file_name'],
					'maintain_ratio' => false,
					'create_thumb' => true,
					'quality' => '100%',
					'width' => 60,
					'height' => 100
				));
				

				


				if($this->image_lib->resize())
				{

					$datax=array(
				                        'nama_produk'=> "a",
				                        'kode_produk'=> "a",
				                        'id_kategori'=> "a",
				                        'harga'		 => "a",
				                        'stok'		 => "a",
				                        'deskripsi'  => "a",
				                        'tipe_produk'=> "a",
				                        'gbr_besar'  => $userfile,
				                    );    
										$this->load->model('mproduk','produk',TRUE);
										$this->produk->insertproduk($datax);

					$output = '<h4>Thumb - hasil Resize</h4>';
					$output .= img('./asset/produk/thumbnail/'.$data_upload['raw_name'].'_thumb'.$data_upload['file_ext']);
					$output .= '<h4 style="margin-top: 30px">Gambar Original</h4>';
					$output .= img('./asset/produk/thumbnail/'.$data_upload['file_name']);
					
					$data['output'] = $output;
				}
				else
				{
					$data['error'] = $this->image_lib->display_errors();
				}
				
			}
			else
			{
				$data['error'] = $this->upload->display_errors();
			}
		}
		
		$this->load->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */