<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$data['title'] = "<span class='oi' data-glyph='people'></span> Users";
		$this->load->view('header', $data);
		$data['query'] = $this->users->userView();
		$data['status1'] = $this->users->countView('all');
		$data['status2'] = $this->users->countView('0');
		$data['status3'] = $this->users->countView('1');
		$data['status4'] = $this->users->countView('2');
		$data['status5'] = $this->users->countView('3');
		$data['status6'] = $this->users->countView('4');
		$this->load->view('all_user', $data);
		$this->load->view('footer');
	}

	public function status(){
		$data['title'] = "<span class='oi' data-glyph='people'></span> Users";
		$this->load->view('header', $data);
		$userstatus = $this->uri->segment(3, 0);
		if($userstatus == true){
			$data['query'] = $this->users->userStatus($userstatus);
		} else{
			$data['query'] = $this->users->userView();
		}
		$data['status1'] = $this->users->countView('all');
		$data['status2'] = $this->users->countView('0');
		$data['status3'] = $this->users->countView('1');
		$data['status4'] = $this->users->countView('2');
		$data['status5'] = $this->users->countView('3');
		$data['status6'] = $this->users->countView('4');
		$this->load->view('all_user', $data);
		$this->load->view('footer');
	}

	public function delete(){
		$del = $this->uri->segment(3);
		$this->users->deleteUser($del);
		redirect('user','refresh');
	}

	public function todelete(){
		$checkid = $this->input->post('checkid');
		foreach($checkid as $key => $value) {
			$this->users->deleteUser($checkid[$key]);
		}
		redirect('user','refresh');
	}

	public function adduser(){
		$data['title'] = "<span class='oi' data-glyph='people'></span> Users";
		$max1 = $this->users->maxUser();
		$data['userid'] = $max1->maxid + 1;
		$data['edit'] = "new";
		$this->load->view('header', $data);
		$this->load->view('form_user', $data);
		$this->load->view('footer');
	}
	
	public function save(){
		if($this->input->post('username')){
			$this->users->addUser();
			redirect('user');
		} else{
			redirect('user/adduser','refresh');
		}
	}
	
	public function edit(){
		$seg= $this->uri->segment(3);
		if($seg == null){
			redirect('user');
		}
		$data['title'] = "<span class='oi' data-glyph='people'></span> Users";
		$row = $this->users->editUser($seg);
		$data['userid'] = $row->ID;
		$data['userlogin'] = $row->user_login;
		$data['usernicename'] = $row->user_nicename;
		$data['useremail'] = $row->user_email;
		$data['userurl'] = $row->user_url;
		$data['displayname'] = $row->display_name;
		$data['edit'] = "edit";
		$this->load->view('header', $data);
		$this->load->view('form_user', $data);
		$this->load->view('footer');
	}

	public function profile(){
		$seg= $this->session->userdata('userid');
		if($seg == null){
			redirect('user');
		}
		$data['title'] = "<span class='oi' data-glyph='people'></span> Users";
		$row = $this->users->editUser($seg);
		$data['userid'] = $row->ID;
		$data['userlogin'] = $row->user_login;
		$data['usernicename'] = $row->user_nicename;
		$data['useremail'] = $row->user_email;
		$data['userurl'] = $row->user_url;
		$data['displayname'] = $row->display_name;
		$data['edit'] = "edit";
		$this->load->view('header', $data);
		$this->load->view('form_user', $data);
		$this->load->view('footer');
	}

	public function update(){
		$id = $this->input->post('userid');
		$this->users->updateUser($id);
		redirect('user');
	}

}
