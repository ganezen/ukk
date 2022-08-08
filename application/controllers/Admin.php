<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->helper('tgl_indo');
			if (empty($this->session->userdata('username')) AND empty($this->session->userdata('password'))) {
				redirect('Login/index');
			}else{
		
				$namalengkap=$this->session->userdata('nama_user');
			}
		}
		public function index()
		{
			$data['level']=$this->db->get('level')->num_rows();
			$data['masakan']=$this->db->get('masakan')->num_rows();
			$data['user']=$this->db->get('user')->num_rows();
			$data['transaksi']=$this->db->get('transaksi')->num_rows();
			$this->load->view('beranda',$data);
		}
	
		// Awal Level
	public function level()
			{
				$data['tlevel']=$this->admin_model->tampildata('level','id_level');
				$this->load->view('level/tampil_level',$data);
			}

	public function formlevel()
		{
			
			$this->load->view('level/formlevel');
		}
	public function simpanlevel()
		{
			$this->form_validation->set_rules('nama_level','Nama Level','required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('level/formlevel');
			}else{
				$data= array('nama_level' => $this->input->post('nama_level'));
			$query=$this->admin_model->simpandata('level',$data);
				if($query){
					$this->session->set_flashdata('info','Level berhasil disimpan');
					redirect('Admin/level');
				}else{
					$this->session->set_flashdata('info','Ada sintak yang belum lengkap');
					redirect('Admin/level');
				}
			}
				
		}
		public function hapuslevel($id)
		{
			$this->admin_model->hapusdata('level',$id,'id_level');
			if ($this->db->affected_rows())
			{
				$this->session->set_flashdata('info','Berhasil terhapus');
				redirect('Admin/level');
			}else{
				$this->session->set_flashdata('info','Gagal terhapus');
				redirect('Admin/level');
			}
		}
	public function formeditlevel($id)
		{
			$data['editlevel']=$this->admin_model->formeditdata('level','id_level',$id);
			$this->load->view('level/formeditlevel',$data);
		}
	public function editlevel()
		{
				$data= array('nama_level' => $this->input->post('nama_level'));
				$id=$this->input->post('id_level');
				$this->admin_model->editdata('level','id_level',$id,$data);
				if ($this->db->affected_rows())
				{
					$this->session->set_flashdata('info','Berhasil terhapus');
					redirect('Admin/level');
				}else{
					$this->session->set_flashdata('info','Gagal terhapus');
					redirect('Admin/level');
			}
		}
		//akhir level	
		// Awal masakan
		public function masakan()
		{
		$data['tmasakan']=$this->admin_model->tampildata('masakan','id_masakan');
		$this->load->view('masakan/tampil_masakan',$data);
		}

		public function formmasakan()
		{
			
			$this->load->view('masakan/formmasakan');
		}
		public function simpanmasakan()
		{
		$this->form_validation->set_rules('nama_masakan','Nama masakan','required');
		$this->form_validation->set_rules('harga_masakan','Harga Masakan','required|numeric');
		$this->form_validation->set_rules('status_masakan','status masakan','required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('masakan/formmasakan');
			}else{
				$data= array('nama_masakan' => $this->input->post('nama_masakan'),
							'harga'=>$this->input->post('harga_masakan'),
							'status_masakan'=>$this->input->post('status_masakan'));
				$query=$this->admin_model->simpandata('masakan',$data);
				if($query){
					$this->session->set_flashdata('info','masakan berhasil disimpan');
					redirect('Admin/masakan');
				}else{
					$this->session->set_flashdata('info','Ada sintak yang belum lengkap');
					redirect('Admin/masakan');
				}
			}
				
		}
		public function hapusmasakan($id)
		{
			$this->admin_model->hapusdata('masakan',$id,'id_masakan');
			if ($this->db->affected_rows())
			{
				$this->session->set_flashdata('info','Berhasil terhapus');
				redirect('Admin/masakan');
			}else{
				$this->session->set_flashdata('info','Gagal terhapus');
				redirect('Admin/masakan');
			}
		}
	public function formeditmasakan($id)
		{
			$data['editmasakan']=$this->admin_model->formeditdata('masakan','id_masakan',$id);
			$this->load->view('masakan/formeditmasakan',$data);
		}
	public function editmasakan()
		{
			$data= array('nama_masakan' => $this->input->post('nama_masakan'),
						'harga'=>$this->input->post('harga_masakan'),
						'status_masakan'=>$this->input->post('status_masakan'));
				$id=$this->input->post('id_masakan');
				$this->admin_model->editdata('masakan','id_masakan',$id,$data);
				if ($this->db->affected_rows())
				{
					$this->session->set_flashdata('info','Berhasil Teredit');
					redirect('Admin/masakan');
				}else{
					$this->session->set_flashdata('info','Gagal teredit');
					redirect('Admin/masakan');
			}
		}
		//akhir masakan

		// Awal user
		public function user()
		{
		$data['tuser']=$this->admin_model->tampildata('user','id_user');
		$this->load->view('user/tampil_user',$data);
		}

		public function formuser()
		{
	$data['combo']=$this->admin_model->combobox('level','id_level','-- Pilih Level--','nama_level');
			$this->load->view('user/formuser',$data);
		}
		public function simpanuser()
		{
		$this->form_validation->set_rules('nama_user','Nama user','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('username','USername','required');
		$this->form_validation->set_rules('level','Level','required');
			if ($this->form_validation->run() == FALSE){
				$data['combo']=$this->admin_model->combobox('level','id_level','-- Pilih Level--','nama_level');
				$this->load->view('user/formuser',$data);
			}else{

				$data= array('nama_user' => $this->input->post('nama_user'),
							'password'=>md5($this->input->post('password')),
							'username'=>$this->input->post('username'),
							'id_level'=>$this->input->post('level'));
				$query=$this->admin_model->simpandata('user',$data);
				if($query){
					$this->session->set_flashdata('info','user berhasil disimpan');
					redirect('Admin/user');
				}else{
					$this->session->set_flashdata('info','Ada sintak yang belum lengkap');
					redirect('Admin/user');
				}
			}
				
		}
		public function hapususer($id)
		{
			$this->admin_model->hapusdata('user',$id,'id_user');
			if ($this->db->affected_rows())
			{
				$this->session->set_flashdata('info','Berhasil terhapus');
				redirect('Admin/user');
			}else{
				$this->session->set_flashdata('info','Gagal terhapus');
				redirect('Admin/user');
			}
		}
	public function formedituser($id)
		{
			$data['edituser']=$this->admin_model->formeditdata('user','id_user',$id);
			$data['combo']=$this->admin_model->combobox('level','id_level','-- Pilih Level--','nama_level');
			$this->load->view('user/formedituser',$data);
		}
	public function edituser()
		{
			
			if (!empty($this->input->post('password'))) {
				$data= array('nama_user' => $this->input->post('nama_user'),
							'password'=>md5($this->input->post('password')),
							'username'=>$this->input->post('username'),
							'id_level'=>$this->input->post('level'));
				$id=$this->input->post('id_user');
				$this->admin_model->editdata('user','id_user',$id,$data);
				if ($this->db->affected_rows())
				{
					$this->session->set_flashdata('info','Berhasil terhapus');
					redirect('Admin/user');
				}else{
					$this->session->set_flashdata('info','Gagal terhapus');
					redirect('Admin/user');
				}
			} else {
				$data= array('nama_user' => $this->input->post('nama_user'),
							'username'=>$this->input->post('username'),
							'id_level'=>$this->input->post('level'));
				$id=$this->input->post('id_user');
				$this->admin_model->editdata('user','id_user',$id,$data);
				if ($this->db->affected_rows())
				{
					$this->session->set_flashdata('info','Berhasil terhapus');
					redirect('Admin/user');
				}else{
					$this->session->set_flashdata('info','Gagal terhapus');
					redirect('Admin/user');
			}
			}
			
			


		}
		public function transaksi(){
			$data['tmasakan']=$this->admin_model->tampildata('masakan','id_masakan');
			$data['orders']=$this->admin_model->no_invoice();
			$this->load->view('transaksi/transaksi',$data);
		}
		public function simpan_keranjang(){ //fungsi tambah keranjang
			$data = array(
				'id' => $this->input->post('id_masakan'), 
				'name' => $this->input->post('nama_masakan'), 
				'price' => $this->input->post('harga_masakan'), 
				'qty' => '1',
				'coupon' => $this->input->post('status_masakan'), 
				 
			);
			$this->cart->insert($data); // cara simpan menggunakan cart
			echo $this->tampil_keranjang(); //tampilkan cart setelah ditambah
		}
		public function load_keranjang(){ //tampil data keranjang
			echo $this->tampil_keranjang();
		}
		public function tampil_keranjang(){ //Fungsi untuk menampilkan Cart
			$output = '';
			$no = 0;
			foreach ($this->cart->contents() as $items) {
				$no++;
				$output .=
				'<tr>
						<td><input type=hidden value="'.$items['id'].'" name="id_masakan[]">'.$items['name'] .'</td>
						<td>'.number_format($items['price']).'</td>
						<td><input type=hidden value="'.$items['qty'].'" name="qty[]">'.$items['qty'].'</td>
						<td><input type=hidden value="'.$items['coupon'].'" name="status_masakan[]">'.$items['coupon'].'</td>
						<td>'.number_format($items['subtotal']).'</td>
						<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Hapus</button></td>
					</tr>
				';
			}
			$output .= '
				<tr>
					<th colspan="4">Total</th>
					<th colspan="2"><input type=hidden value="'.$this->cart->total().'" name="total">'.'Rp '.number_format($this->cart->total()).'</th>
				</tr>';
			
			return $output;
		}
		public function hapus_cart(){ //fungsi untuk menghapus item cart
			$data = array(
				'rowid' => $this->input->post('row_id'), 
				'qty' => 0, 
			);
			$this->cart->update($data);
			echo $this->tampil_keranjang();
		}

		public function simpantransaksi()
		{	
			$data= array('id_orders' => $this->input->post('no_orders'),
							'no_meja'=> $this->input->post('no_meja'),
							'tanggal'=> date('Y-m-d'),
							'id_user'=> $this->input->post('id_user'),
							'keterangan'=> $this->input->post('keterangan'),
							'status_orders'=> $this->input->post('status_order')
						);
			$query=$this->admin_model->simpandata('orders', $data);
			$datatransaksi= array('id_user'=>$this->input->post('id_user'),							
									'id_orders' => $this->input->post('no_orders'),
									'tanggal'=>date('Y-m-d'),
									'total_bayar'=>$this->input->post('total'));
			$query=$this->admin_model->simpandata('transaksi',$datatransaksi);

				$id_orders=$this->input->post('no_orders');
				$id=$this->input->post('id_masakan');
				$datadetail=array();
					foreach ($id as $key => $value) {
						$datadetail[]= array('id_orders' => $id_orders,
											 'id_masakan' => $_POST['id_masakan'][$key],
											 'keterangan' => $_POST['qty'][$key],
											 'status_detail_orders' => $_POST['status_masakan'][$key]) ;
					}
				$query=$this->admin_model->simpan_multi('detail_orders',$datadetail);
				if($query){
					$this->session->set_flashdata('info','Transaksi berhasil disimpan');
					$this->cart->destroy();
					redirect('Admin/transaksi');
				}else{
					$this->session->set_flashdata('info','Transaksi gagal disimpan');
				
					redirect('Admin/transaksi');
				}
				
		}
		public function laporan()
		{
			$data['tlaporan']=$this->admin_model->tampiljoin('transaksi','user','id_user','id_transaksi');
			$this->load->view('laporan/laporan',$data);
		}

		public function laporantransaksi($id)
		{
			$data['tcetaklaporan']=$this->admin_model->tampiljoin_where('detail_orders','masakan','id_masakan','id_detail_orders',$id);
			$data['transaksi']=$this->admin_model->formeditdata('transaksi','id_orders',$id);
					ob_start();
					$this->load->view('laporan/cetaklaporan', $data);
					$html = ob_get_contents();
					ob_end_clean();

					require_once('./asset/html2pdf/html2pdf.class.php');
					$pdf = new HTML2PDF('P','A4','en');
					$pdf->WriteHTML($html);
					$pdf->Output('Data Transaksi.pdf', 'D');
		}
		//akhir user
		

		
}
