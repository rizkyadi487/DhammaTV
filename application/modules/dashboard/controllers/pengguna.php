<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengguna extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "active";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pengguna($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah()
	{
//		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "active";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['id_param'] = "";
			$d['nama_user'] = "";
			$d['username'] = "";
			$d['st'] = "tambah";
			$d['level'] = "";
			$d['alamat_user'] = "";
			$d['email_user'] = "";
			$d['telepon_user'] = "";
			$d['foto']="";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
//		else
//		{
//			redirect("login");
//		}
	}

	function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "active";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = ""; 
			$d['mark_acara'] = "";
			$d['mark_belum_lunas'] = "";
			
			$id['kode_user'] = $id_param;
			$get = $this->db->get_where("dhammadb_user",$id)->row();
			$d['id_param'] = $get->kode_user;
			$d['username'] = $get->username;
			$d['nama_user'] = $get->nama_user;
			$d['level'] = $get->level;
			$d['alamat_user'] = $get->alamat_user;
			$d['email_user'] = $get->email_user;
			$d['telepon_user'] = $get->telepon_user;
			$d['foto'] = $get->foto;
			$d['st'] = "edit";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_input");
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
			$id['kode_user'] = $_POST['id_param'];
			$dt['username'] = $_POST['username'];
			$dt['nama_user'] = $_POST['nama_user'];
			$dt['level'] = $_POST['level'];
			$dt['alamat_user'] = $_POST['alamat_user'];
			$dt['email_user'] = $_POST['email_user'];
			$dt['telepon_user'] = $_POST['telepon_user'];
			$config = $_POST['foto'];
			$st = $_POST['st'];
			
			
			$config['upload_path']          = './foto/';
			$config['allowed_types']        = 'doc|jpg|png';
		

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
			}else{
			$upload_data = $this->upload->data();
			$dt['foto']=$upload_data['file_name'];
			}
			
			if($st=="tambah")
			{
				$dt['password'] = md5($_POST['password'].$GLOBALS['key_login']);
				$this->db->insert("dhammadb_user",$dt);
				redirect("dashboard/pengguna");
			}
			else if($st=="edit")
			{
				if(empty($_POST['password']))
				{
					$this->db->update("dhammadb_user",$dt,$id);
				}
				else
				{
					$dt['password'] = md5($_POST['password'].$GLOBALS['key_login']);
					$this->db->update("dhammadb_user",$dt,$id);
				}
			}
			redirect("dashboard/pengguna");
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
			$this->session->set_userdata($set);
			redirect("dashboard/pengguna");
		}
		else
		{
			redirect("login");
		}
	}

	function hapus()
	{
             $id_param =  $this->uri->segment(4);
             $foto =  $this->uri->segment(5);
             $path_to_file = 'foto/'.$foto;
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_user'] = $id_param;
			$get = $this->db->delete("dhammadb_user",$id);
			
                        if(unlink($path_to_file)) {
                             echo 'deleted successfully';
                        }
                        else {
                             echo 'errors occured';
                        }
                        
                        redirect("dashboard/pengguna");
		}
		else
		{
			redirect("login");
		}
	}
}