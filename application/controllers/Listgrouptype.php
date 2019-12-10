<?php


class Listgrouptype extends CI_Controller {

	public function index(){
		$data = array(
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> 'list_group_type',
			'message'	=> '',
			'object'	=> $this->Addon_model->getContent()
		);
		return $this->load->view('list_group_type',$data);
	}

	public function create(){
		$total = count($this->Addon_model->getContent());
		$data = array(
			'addon_id'		=> md5($total.random_string('alnum',8)),
			'addon_title'	=> $_POST['name']
		);
		$this->db->insert('addon',$data);
		redirect(site_url('/list_group_type'));
	}

	public function edit(){
		$id = $this->uri->segment(3);
		$data = array(
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> 'list_group_type',
			'message'	=> '',
			'id'		=> $id,
			'name'		=> $this->db->where('addon_id',$id)->from('addon')->get()->row()->addon_title
		);
		return $this->load->view('list_group_type-edit',$data);
	}

	public function update(){
		$id = $this->uri->segment(3);
		$data = array(
			'addon_title'	=> $_POST['name']
		);
		$this->db->where('addon_id',$id)->update('addon',$data);
		redirect(site_url('/list_group_type'));
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$this->db->where('addon_id',$id)->delete('addon');
		redirect(site_url('/list_group_type'));
	}

}
