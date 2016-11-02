<?php
Class mproduk extends CI_Model {

		var $gallerypath;
		var $gallery_path_url;
	function __constuct() {
		parent::__constuct();  // Call the Model constructor 
		//loader::database();    // Connect to current database setting.
		

		$this->gallerypath = realpath(APPPATH . 'gambar');
		$this->gallery_path_url = base_url().'gambar/';
	}

	function countproduk($id=''){
            $jumlah='';
            $query=$this->db->query("select count(1) as jumlah from tbl_produk ");
                 if ($query->num_rows() > 0) {
                    foreach ($query->result() as $data) {
                    $jumlah=$data->jumlah;
                    }
                    return $jumlah;
                }
        }
	
	function countmember($id=''){
            $jumlah='';
            $query=$this->db->query("select count(1) as jumlah from tbl_user");
                 if ($query->num_rows() > 0) {
                    foreach ($query->result() as $data) {
                    $jumlah=$data->jumlah;
                    }
                    return $jumlah;
                }
        }
    
    function countpesanan($id=''){
            $jumlah='';
            $query=$this->db->query("select count(1) as jumlah from tbl_transaksi_header");
                 if ($query->num_rows() > 0) {
                    foreach ($query->result() as $data) {
                    $jumlah=$data->jumlah;
                    }
                    return $jumlah;
                }
        }
    
	public function countlistkonfirmasi($id='') {
        $jumlah=0;
        $query=$this->db->query("SELECT COUNT(1) AS jumlah FROM tbl_konfirmasi");
            if ($query->num_rows() > 0) {
            foreach ($query->result() as $data)
                $jumlah=$data->jumlah;
            }
        return $jumlah;
    
        }
    
	
	function listproduk($limit=0,$offset=0) {
		$q = $this->db->query("SELECT 
                                a.kode_produk,
                                a.id_kategori,
                                a.nama_produk,
                                a.harga,
                                a.stok,
                                a.gbr_besar,
                                a.deskripsi
                             FROM tbl_produk AS a 
                             LEFT JOIN tbl_kategori AS b 
				 ON a.id_kategori=b.id_kategori ORDER BY a.kode_produk ASC LIMIT $limit ,$offset ");
		return $q;
	}
	function listkategori($limit=0,$offset=0,$kat) {
		$q = $this->db->query("SELECT 
                                a.kode_produk,
                                a.id_kategori,
								b.nama_kategori,
                                a.nama_produk,
                                a.harga,
                                a.stok,
                                a.gbr_besar,
                                a.deskripsi
                             FROM tbl_produk AS a 
                             LEFT JOIN tbl_kategori AS b 
				 ON a.id_kategori=b.id_kategori where a.id_kategori='$kat'
				 ORDER BY a.kode_produk ASC LIMIT $limit ,$offset ");
		return $q;
	}
    public function listprodukdetail($kode_produk)  {
		$q = $this->db->query("SELECT 
                                a.kode_produk,
                                a.id_kategori,
                                a.nama_produk,
                                a.harga,
                                a.stok,
                                a.gbr_besar,
                                a.deskripsi
                             FROM tbl_produk AS a 
                             LEFT JOIN tbl_kategori AS b 
				 ON a.id_kategori=b.id_kategori
				 where a.kode_produk='$kode_produk'");
		return $q;
	}
    function listmember($limit=0,$offset=0) {
		$q = $this->db->query("SELECT * FROM tbl_user ASCENDING LIMIT $limit ,$offset ");
		return $q;
	}
    
    function listpesanan($kode_user) {
		$q = $this->db->query("SELECT DISTINCT
                                    kode_user,
                                    tgl_jual,
                                    kode_transaksi,
                                    CASE STATUS
                                    WHEN  '1' THEN 'SUDAH MELAKUKAN PEMBAYARAN' ELSE 'BELUM MELAKUKAN PEMBAYARAN' END AS status,
                                    jumlah,
                                    kode_produk,
                                    nama_produk,
                                    harga,
                                    (harga * jumlah) AS ttl,
                                    nama,
                                    email

                                       FROM (
                                        SELECT DISTINCT
                                            th.kode_user,
                                            th.tgl_jual,
                                            th.kode_transaksi,
                                            th.status,
                                            td.jumlah,
                                            td.kode_produk,
                                            tp.nama_produk,
                                            tp.harga,
                                            tu.nama,
                                            tu.email

                                    FROM tbl_transaksi_header AS th
                                    INNER JOIN tbl_transaksi_detail AS td ON th.kode_transaksi=td.kode_transaksi
                                    INNER JOIN tbl_produk AS tp ON td.kode_produk=tp.kode_produk
                                    INNER JOIN tbl_user AS tu ON th.kode_user=tu.kode_user
                                     WHERE th.kode_user='$kode_user') a");
      return $q;
	}
    
	
	function listprodukterlaris($limit) 
        {
            $q = $this->db->query("SELECT 
                        a.kode_produk,
                        a.id_kategori,
                        a.nama_produk,
                        a.harga,
                        a.stok,
                        a.gbr_besar,
                        a.deskripsi
                     FROM tbl_produk AS a 
                     LEFT JOIN tbl_kategori AS b 
                     ON a.id_kategori=b.id_kategori 
                     where a.dibeli >= 3 ORDER BY a.kode_produk
                     ASC LIMIT $limit");
            return $q;
        }

    
    public function listkonfirmasi($limit=0,$offset=0)
        {
            $q= $this->db->query("SELECT 
                             kode_transaksi,
                             nama_pengirim,
                             CASE STATUS
                             WHEN  '0' THEN 'SUDAH MELAKUKAN KONFIRMASI PEMBAYARAN' ELSE 'SUDAH MELAKUKAN KONFIRMASI PEMBAYARAN' END AS STATUS
                                FROM (
                                    SELECT DISTINCT
                                    tk.kode_transaksi,
                                    tk.nama_pengirim,
                                    th.status
                                    FROM tbl_konfirmasi AS tk
                                    INNER JOIN tbl_transaksi_header AS th ON tk.kode_transaksi=th.kode_transaksi LIMIT $limit,$offset ) a");
            return $q;
        }
	
	
	//public function listcetakan($start,$end)
	public function listcetakan($start,$end)
	
			{
				$q = $this->db->query("SELECT 
										th.tgl_jual,
										th.kode_transaksi,
										th.kode_user,
										tu.nama,
										CASE th.status
										WHEN '0' THEN 'BELUM TRANSFER'
										ELSE 'SUDAH TRANSFER' END AS status,
										tp.nama_produk
									FROM tbl_transaksi_header  th 
									INNER JOIN tbl_transaksi_detail td ON th.kode_transaksi=td.kode_transaksi
									INNER JOIN tbl_user tu ON th.kode_user=tu.kode_user
									INNER JOIN tbl_produk tp ON td.kode_produk=tp.kode_produk
									WHERE th.tgl_jual >= '$start' <= '$end'") ;
				//return $q;
				
				if ($q->num_rows() > 0) {
                foreach ($q->result() as $data) {
                    $datac[]=$data;
                    }
                return $datac;
                }
			}
	
	 function generatekodeproduk(){
        $q = $this->db->query("select max(right(kode_produk,4)) as kd_max from tbl_produk");
        $kd = "";
        if($q->num_rows()>0)	{
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return "B-".$kd;
    	}


    
    function insertmember($data){
        $query = $this->db->insert('tbl_user',$data);
        return $query;
    }

    function insertproduk($data){
        $query = $this->db->insert('tbl_produk',$data);
        return $query;
    }

    function insertdata($table,$data) {
        $this->db->insert($table,$data);
    }
    
    function update($kode_user,$data){
        $this->db->where('kode_user',$kode_user);
        $update = $this->db->update('tbl_user',$data);
        return $update;
    }
    
    function updatedata($table,$data,$field_key) {
        $this->db->update($table,$data,$field_key);
    }
    
    function updateproduk($kode_produk,$data) {
        $this->db->where('kode_produk',$kode_produk);
        $update = $this->db->update('tbl_produk',$data);
        return $update;
    }
    
    function updatemember($kode_user,$data){
        $this->db->where('kode_user',$kode_user);
        $update = $this->db->update('tbl_user',$data);
        return $update;
    }
    
    function updatestatus($kode_transaksi,$data){
        $this->db->where('kode_transaksi',$kode_transaksi);
        $update = $this->db->update('tbl_transaksi_header',$data);
        return $update;
    }
    
    
    
    function deleteproduk($kode_produk)
        {
        $delete = $this->db->query("delete from tbl_produk where kode_produk='$kode_produk'");
        return $delete;
        }
    
    function deletemember($kode_user)
        {
        $delete = $this->db->query("delete from tbl_user where kode_user='$kode_user'");
        return $delete;
        }
    
    function getkurangstok($kode_produk,$kurangi) {
        $q = $this->db->query("select stok from tbl_produk where kode_produk='".$kode_produk."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok - $kurangi;
        }
        return $stok;
    }
        
    function getproduk($kode_produk) {
        $query = $this->db->query("select * from tbl_produk where kode_produk='$kode_produk'");
        return $query->row();
    }
    
     function getmember($kode_user) {
        $query = $this->db->query("select * from tbl_user where kode_user ='$kode_user'");
        return $query->row();
    }
        
    function editnongambar($kode_produk)  {

            $id_kategori = $this->input->post('kategori');
            $nama_produk = $this->input->post('nama_produk');
            $harga 		 = $this->input->post('harga');
            $stok 		 = $this->input->post('stok');
            $deskripsi 	 = $this->input->post('deskripsi');

            $this->db->set('id_kategori', $id_kategori);
            $this->db->set('nama_produk', $nama_produk);
            $this->db->set('harga', $harga);
            $this->db->set('stok', $stok);
            $this->db->set('deskripsi', $deskripsi);

            $this->db->where('kode_produk', $kode_produk);
            $this->db->update('tbl_produk');
	}
        
    
    function getprint($kode_transaksi) {   
        $query=$this->db->query(" SELECT 
                                    kode_transaksi,
                                    tgl_jual,
                                    total,
                                    kode_produk,
                                    jumlah,
                                    nama_produk,
									harga,
                                    ttlharga
                        FROM (
				            SELECT 
                                    th.kode_transaksi,
                                    th.tgl_jual,
                                    th.total,
                                    td.kode_produk,
                                    td.jumlah,
                                    tp.nama_produk,
									tp.harga,
				                    (tp.harga * td.jumlah) AS ttlharga
                                    FROM tbl_transaksi_header AS th
                                    INNER JOIN tbl_transaksi_detail AS td ON th.kode_transaksi=td.kode_transaksi
                                    INNER JOIN tbl_produk AS tp ON td.kode_produk = tp.kode_produk
									where th.kode_transaksi='".$kode_transaksi."'
                                    )a");

           if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) {
                    $datac[]=$data;
                    }
                return $datac;
                }
        }       


    function do_upload() {
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' => $this->gallerypath
		);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
	
		$konfigurasi = array(
			'source_image' => $datafile['full_path'],
			'new_image' => $this->gallerypath . '/thumbnails',
			'maintain_ration' => true,
			'width' => 160,
			'height' =>120
		);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = date('Y-m-d');
		$userfile = $_FILES['picture']['name'];
		$data = array(
	                        //'kd_produk'=> $this->mmasterbarang->getkodebarang(),
	                        'nama_produk'=>$this->input->post('nm_produk'),
	                        'kode_produk'=>$this->input->post('kodeproduk'),
	                        'id_kategori'=>$this->input->post('id_kategori'),
	                        'harga'=>$this->input->post('harga'),
	                        'stok'=>$this->input->post('stok'),
	                        'deskripsi'=>$this->input->post('deskripsi'),
	                        'gbr_besar'      =>$userfile
	                    );      
		$this->produk->insertproduk($data);
	                    redirect("produk");
		//$this->db->insert('produk', $data);
	}
	
	function verifyemailaddress($verificationcode)
		{  
			  $sql = "update tbl_user set level='member' WHERE kode_verifikasi=?";
			  $this->db->query($sql, array($verificationcode));
			  return $this->db->affected_rows(); 
		}
	
	function emailcheck($email)
		{			
		    $wherecondition 					= $array = array('email' => $email);
		    $this->db->where($wherecondition); 
		    $query 								= $this->db->get('tbl_user');			
		 return $query->result();		
		}
}
 
?>
