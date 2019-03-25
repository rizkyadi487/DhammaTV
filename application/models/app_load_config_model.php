<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_config_model extends CI_Model {

	/**
	 * @author : Rizky Adi Prasetyo
	 * @web : http://rizkyadi487.com
	 * @keterangan : Model untuk melakukan konfigurasi sistem
	 **/
	 
	public function __construct()
	{
		$dt = $this->db->get("dhammadb_setting");
		foreach($dt->result() as $d)
		{
			$GLOBALS[$d->tipe] = $d->content_setting;
		}
	}
}

/* End of file app_load_config_model.php */
/* Location: ./application/models/app_load_config_model.php */