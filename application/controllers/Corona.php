<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') or exit('No direct script access allowed');

class Corona extends CI_Controller
{
	public function index()
	{
		$data['indo'] 	= json_decode(file_get_contents('https://api.kawalcorona.com/indonesia'));
		$data['prov']	= json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi'));
		$data['global'] = json_decode(file_get_contents('https://api.kawalcorona.com/'));
		$this->load->view('v_index', $data);
	}
	public function update()
	{
		$now			= date('Y-m-d H:i:s');
		//Indonesia
		$indo			= json_decode(file_get_contents('https://api.kawalcorona.com/indonesia'));
		$db_indo		= array(
			'time'		=> $now,
			'positif'	=> str_replace(",", "", $indo[0]->positif),
			'sembuh'	=> str_replace(",", "", $indo[0]->sembuh),
			'meninggal' => str_replace(",", "", $indo[0]->meninggal)
		);
		$this->db->insert('indo', $db_indo);
		echo "INDO DONE";
		//Provinsi
		$prov			= json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi'));
		$prov_2			= $prov[0];
		print_r($prov_2);
		/*foreach ($prov_2 as $p) {
			$db_prov	= array(
				'time'		=> $now,
				'nama_prov' => $p->Provinsi,
				'positif'	=> $p->Kasus_posi,
				'sembuh'	=> $p->Kasus_semb,
				'meninggal'	=> $p->Kasus_meni
			);
			$this->db->insert('prov', $db_prov);
		}*/
		echo "PROV DONE";
	}
}
