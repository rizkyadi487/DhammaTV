<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemesanan extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_user'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pemesanan($GLOBALS['site_limit_medium'],$uri);
			$this->session->unset_userdata('kode_user');
			$this->session->unset_userdata('id_jenis_acara');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('naskah');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_user'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['no_nota'] = $this->app_load_data_model->getMaxKodePesanan();
			$d['user'] = $this->db->get("dhammadb_user");
			$d['acara'] = $this->db->get("dhammadb_acara");
			$d['jenis_cetakan'] = $this->db->get("dhammadb_nama_crew");
			$d['tgl_pesan'] = $this->session->userdata("tgl_pesan");
			$d['tgl_selesai'] = $this->session->userdata("tgl_selesai");
			$d['naskah'] = $this->session->userdata("naskah");
			$d['alamat_shooting'] = $this->session->userdata("alamat_shooting");
			$d['presenter_shooting'] = $this->session->userdata("presenter_shooting");
			$d['narasumber_shooting'] = $this->session->userdata("narasumber_shooting");
			$d['jumlah_harga'] = $this->session->userdata("jumlah_harga");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah_item()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['jenis_cetakan'] = $this->db->get("dhammadb_nama_crew");
			
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_input_item",$d);
		}
		else
		{
			redirect("login");
		}
	}

	function tambah_barang_pesanan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$data = array(
				'id'      => $this->input->post('kode_jenis_cetakan'),
				'qty'     => $this->input->post('jumlah'),
				'price'   => $this->input->post('harga'),
				'name'    => $this->input->post('nama_cetakan'),
                'options' => array('Satuan' => $this->input->post('satuan')));
			$this->cart->insert($data);
			?>
				<script>
					window.parent.location.reload(true);
				</script>
			<?php
		}
		else
		{
			redirect("login");
		}
	}


	function hapus_pesanan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$kode = $_GET['kode'];
			$data = array(
				'rowid' => $kode,
				'qty'   => 0);
			$this->cart->update($data);
		}
		else
		{
			redirect("login");
		}
	}

	function ambil_data_bahan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$kd = $_GET["kode_jenis_cetakan"];
			$q = $this->db->query("select * from dhammadb_nama_crew a left join dhammadb_jenis_kerjaan b on a.id_jenis_satuan=b.id_jenis_satuan where a.kode_jenis_cetakan='".$kd."'");
			foreach($q->result() as $d)
			{
			?>
			<table cellpadding="0" cellspacing="0" border="0">
			<tr><td width="160">Kode Crew</td><td width="20">:</td><td><input type="text" value="<?php echo $d->kode_jenis_cetakan; ?>" class="input-read-only"
			 style="width:350px;" name="kode_jenis_cetakan" readonly="readonly" /></td></tr>
			<tr><td>Nama Crew</td><td>:</td><td><input type="text" value="<?php echo $d->nama_cetakan; ?>" class="input-read-only" style="width:350px;" name=
			"nama_cetakan" readonly="readonly" /></td></tr>
			<tr><td>Harga</td><td>:</td><td><input type="text" value="<?php echo $d->harga; ?>" class="input-read-only" name=
			"harga" id="harga" readonly="readonly" /></tr>
			<tr><td>Kerjaan</td><td>:</td><td><input type="text" value="<?php echo $d->satuan; ?>" class="input-read-only" name=
			"satuan" id="satuan" readonly="readonly" /> </td></tr>
			<tr><td>Jumlah</td><td>:</td><td><input type="text" value="1" class="input-read-only" name=
			"jumlah" id="jumlah" readonly="readonly" /> </td></tr>
			</table>
			<?php
			}
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['no_nota'] = $id_param;
			$get_head = $this->db->get_where("dhammadb_pemesanan",array("kode_pemesanan"=>$id_param))->row();
			if($this->session->userdata("kode_user")=="")
			{
				$set_sess_head['kode_user'] = $get_head->kode_user;
				$this->session->set_userdata($set_sess_head);
			}
			
			if($this->session->userdata("id_jenis_acara")=="")
			{
				$set_sess_head['id_jenis_acara'] = $get_head->id_jenis_acara;
				$this->session->set_userdata($set_sess_head);
			}
			
			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['tgl_selesai'] = $get_head->tgl_selesai;
			$d['naskah'] = $get_head->naskah;
			$d['jumlah_harga'] = $get_head->jumlah_harga;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			$d['uang_muka'] = $get_head->uang_muka;
			$d['alamat_shooting'] = $get_head->alamat_shooting;
			$d['narasumber_shooting'] = $get_head->narasumber_shooting;
			$d['presenter_shooting'] = $get_head->presenter_shooting;
			
			$get_detail = $this->db->query("select a.kode_jenis_cetakan, a.jumlah, b.nama_cetakan, b.harga, b.satuan from dhammadb_pemesanan_detail a left join 
			(select x.nama_cetakan, y.satuan, x.kode_jenis_cetakan, x.harga from dhammadb_nama_crew x left join dhammadb_jenis_kerjaan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_jenis_cetakan=b.kode_jenis_cetakan where a.kode_pemesanan='".$id_param."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_jenis_cetakan,
				'qty'     => $dpd->jumlah,
				'price'   => $dpd->harga,
				'name'    => $dpd->nama_cetakan,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$d['user'] = $this->db->get("dhammadb_user");
			$d['acara'] = $this->db->get("dhammadb_acara");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_input_edit");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function cetak($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "active";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$cek = $this->db->get_where("dhammadb_pembayaran",array("kode_pemesanan"=>$id_param))->num_rows();
			if($cek>0)
			{
				redirect("dashboard/pembayaran/cetak/".$id_param."");
			}
			
			$d['kode_pembayaran'] = $this->app_load_data_model->getMaxKodePembayaran();
			$d['no_nota'] = $id_param;
			$get_head = $this->db->get_where("dhammadb_pemesanan",array("kode_pemesanan"=>$id_param))->row();
			if($this->session->userdata("kode_user")=="")
			{
				$set_sess_head['kode_user'] = $get_head->kode_user;
				$this->session->set_userdata($set_sess_head);
			}
			if($this->session->userdata("id_jenis_acara")=="")
			{
				$set_sess_head['id_jenis_acara'] = $get_head->id_jenis_acara;
				$this->session->set_userdata($set_sess_head);
			}
			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['tgl_selesai'] = $get_head->tgl_selesai;
			$d['naskah'] = $get_head->naskah;
			$d['uang_muka'] = $get_head->uang_muka;
			$d['alamat_shooting'] = $get_head->alamat_shooting;
			$d['narasumber_shooting'] = $get_head->narasumber_shooting;
			$d['presenter_shooting'] = $get_head->presenter_shooting;
			$d['jumlah_total'] = $get_head->jumlah_harga;
			$d['jumlah_harga'] = $get_head->jumlah_harga-$get_head->uang_muka;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			
			$get_detail = $this->db->query("select a.kode_jenis_cetakan, a.jumlah, b.harga, b.nama_cetakan, b.satuan from dhammadb_pemesanan_detail a left join 
			(select x.nama_cetakan, y.satuan, x.kode_jenis_cetakan, x.harga from dhammadb_nama_crew x left join dhammadb_jenis_kerjaan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_jenis_cetakan=b.kode_jenis_cetakan where a.kode_pemesanan='".$id_param."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_jenis_cetakan,
				'qty'     => $dpd->jumlah,
				'price'   => $dpd->harga,
				'name'    => $dpd->nama_cetakan,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$d['user'] = $this->db->get("dhammadb_user");
			$d['acara'] = $this->db->get("dhammadb_acara");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pemesanan/bg_set_kwitansi");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d_header['kode_pemesanan'] = $this->app_load_data_model->getMaxKodePesanan();
			$temp = $d_header['kode_pemesanan'];
			$d_header['tgl_pesan'] = $this->input->post('tgl_pesan');
			$d_header['tgl_selesai'] = $this->input->post('tgl_selesai');
			$d_header['kode_user'] = $this->input->post('kode_user');
			$d_header['id_jenis_acara'] = $this->input->post('id_jenis_acara');
			$d_header['jumlah_harga'] = 1;
			$d_header['uang_muka'] = 1;
			$d_header['alamat_shooting'] = $this->input->post('alamat_shooting');
			$d_header['narasumber_shooting'] = $this->input->post('narasumber_shooting');
			$d_header['presenter_shooting'] = $this->input->post('presenter_shooting');
			$config['naskah'] = $this->input->post('naskah');
			/*if($d_header['uang_muka']>=$d_header['jumlah_harga'])
			{
				$d_header['status_pembayaran'] = "Pasca Produksi";
			}*/
			
			$config['upload_path']          = './berkas/naskah/';
			$config['allowed_types']        = 'pdf|doc|docx|txt';
			
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('naskah')){
			}else{
			$upload_data = $this->upload->data();
			$d_header['naskah']=$upload_data['file_name'];
			}
			
			$this->db->insert("dhammadb_pemesanan",$d_header);
			foreach($this->cart->contents() as $items)
			{
				$d_detail['kode_pemesanan'] = $temp;
				$d_detail['kode_jenis_cetakan'] = $items['id'];
				$d_detail['jumlah'] = $items['qty'];
				$this->db->insert("dhammadb_pemesanan_detail",$d_detail);
			}
			$this->session->unset_userdata('kode_user');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			redirect("dashboard/pemesanan/edit/".$temp."");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan_pembayaran()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d_header['kode_pembayaran'] = $this->app_load_data_model->getMaxKodePembayaran();
			$temp = $d_header['kode_pembayaran'];
			$d_header['kode_pemesanan'] = $this->input->post('no_nota');
			$d_header['tgl_bayar'] = $this->input->post('tgl_bayar');
			$d_header['bayar'] = 1;
			
			$jumlah_harga = $this->input->post('jumlah_harga');
			if($d_header['bayar']>=$jumlah_harga)
			{
				$up['status_pembayaran'] = "Pasca Produksi";
				$this->db->update("dhammadb_pemesanan",$up,array("kode_pemesanan" => $d_header['kode_pemesanan']));
			}
			
			
			$this->db->insert("dhammadb_pembayaran",$d_header);
			$this->session->unset_userdata('kode_user');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('naskah');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('naskah');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			redirect("dashboard/pembayaran/edit/".$temp."/".$d_header['kode_pemesanan']."");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan_update()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id_up['kode_pemesanan'] = $this->input->post('no_nota');
			$temp = $id_up['kode_pemesanan'];
			$d_header['tgl_pesan'] = $this->input->post('tgl_pesan');
			$d_header['tgl_selesai'] = $this->input->post('tgl_selesai');
			$d_header['naskah'] = $this->input->post('naskah');
			$d_header['alamat_shooting'] = $this->input->post('alamat_shooting');
			$d_header['presenter_shooting'] = $this->input->post('presenter_shooting');
			$d_header['narasumber_shooting'] = $this->input->post('narasumber_shooting');
			$d_header['kode_user'] = $this->input->post('kode_user');
			$d_header['id_jenis_acara'] = $this->input->post('id_jenis_acara');
			$d_header['jumlah_harga'] = $this->input->post('jumlah_harga');
			$d_header['uang_muka'] = $this->input->post('uang_muka');
			
			/*if($d_header['uang_muka']>=$d_header['jumlah_harga'])
			{
				$d_header['status_pembayaran'] = "Pasca Produksi";
			}*/
			
			$this->db->update("dhammadb_pemesanan",$d_header,$id_up);
			$this->db->delete("dhammadb_pemesanan_detail",$id_up);
			foreach($this->cart->contents() as $items)
			{
				$d_detail['kode_pemesanan'] = $temp;
				$d_detail['kode_jenis_cetakan'] = $items['id'];
				$d_detail['jumlah'] = $items['qty'];
				$this->db->insert("dhammadb_pemesanan_detail",$d_detail);
			}
			$this->session->unset_userdata('kode_user');
			$this->session->unset_userdata('id_jenis_acara');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('naskah');
			$this->session->unset_userdata('alamat_shooting');
			$this->session->unset_userdata('narasumber_shooting');
			$this->session->unset_userdata('presenter_shooting');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			redirect("dashboard/pemesanan");
		}
		else
		{
			redirect("login");
		}
	}

	function set_kd_user()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_user'] = $_GET['kode_user'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}
	
	function set_id_jenis_acara()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['id_jenis_acara'] = $_GET['id_jenis_acara'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set_tgl_pesanan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['tgl_pesan'] = $_GET['tgl_pesan'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set_tgl_selesai()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['tgl_selesai'] = $_GET['tgl_selesai'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}
	
	function set_naskah()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['naskah'] = $_GET['naskah'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set_jumlah_harga()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['jumlah_harga'] = $_GET['jumlah_harga'];
			$this->session->set_userdata($id);
		}
		else
		{
			redirect("login");
		}
	}

	function set()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$set['key'] = $_POST['key'];
			$set['key_search'] = $_POST['key_search'];
			$this->session->set_userdata($set);
			redirect("dashboard/pemesanan");
		}
		else
		{
			redirect("login");
		}
	}

	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_pemesanan'] = $id_param;
			$this->db->delete("dhammadb_pemesanan",$id);
			$this->db->delete("dhammadb_pemesanan_detail",$id);
			redirect("dashboard/pemesanan");
		}
		else
		{
			redirect("login");
		}
	}
	function lakukan_download($naskah){
		$this->load->helper('download');		
		$this->load->helper('path');		
		$file = 'berkas/naskah/'.$naskah;
		force_download($file,null);
		
		echo set_realpath($file); // Prints '/etc/php5/apache2/php.ini'
		
	}
}
