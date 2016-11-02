<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uploadcek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html','url')); 
	}
	
	public function index()
	{
		$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        //$this->load->view('admin/pages/add_produk',$data);
				        $this->load->view('admin/pages/view_upload');
	}
	
	public function upload()	{

		if(isset($_FILES['image'])) {
		    $config['upload_path'] = './asset/produk';
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$image_data = $this->upload->data();

					$kode_produk = $this->input->post('kodeproduk');
					$id_kategori = $this->input->post('id_kategori');
					$nama_produk = $this->input->post('nama_produk');
					$harga 		 = $this->input->post('harga');
					$stok 		 = $this->input->post('stok');
					$deskripsi 	 = $this->input->post('deskripsi');
					$tipe_produk = $this->input->post('tipe_produk');
					$userfile    = $_FILES['image']['name'];

				$data=array(
	                        'nama_produk'=> $nama_produk,
	                        'kode_produk'=> $kode_produk,
	                        'id_kategori'=> $id_kategori,
	                        'harga'		 => $harga,
	                        'stok'		 => $stok,
	                        'deskripsi'  => $deskripsi,
	                        'tipe_produk'=> $tipe_produk,
	                        'gbr_besar'  => $userfile,
	                    );    
							$this->load->model('mproduk','produk',TRUE);
							$this->produk->insertproduk($data);

							echo img(array(
								'src'=>site_url("asset/images/source/$image_data[file_name]"),
								'width'=>200,
								'style'=>'margin-top:10px; padding:10px; background:#bbb'
							)); 
						}
				
				redirect("produk");
			}
		//}	
		else 
	echo "gagal";
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */