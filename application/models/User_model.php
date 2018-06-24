<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function userView(){
		$ambil = $this->db->query("SELECT * FROM users ORDER BY ID DESC");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function userStatus($view){
		$ambil = $this->db->query("SELECT * FROM users WHERE user_status='$view' ORDER BY ID DESC");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function countView($status){
		if($status == 'all'){
			$ambil = $this->db->query("SELECT * FROM users");
			return $ambil->num_rows();
		} else{
			$ambil = $this->db->query("SELECT * FROM users WHERE user_status='$status'");
			return $ambil->num_rows();
		}
	}
	
	function addUser(){
		$userid = $this->input->post('userid');
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		$displayname = $this->input->post('displayname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'ID' => $userid,
			'user_login' => $username,
			'user_nicename' => $fullname,
			'display_name' => $displayname,
			'user_email' => $email,
			'user_registered' => date('Y-m-d H:i:s'),
			'user_url' => $website,
			'user_pass' => md5($password)
		);
		$this->db->insert('users', $data);
	}

	function maxUser(){
		$result = $this->db->query('SELECT MAX(ID) as maxid FROM users')->row();
		return $result;
	}

	function editUser($userID){
		$result = $this->db->get_where('users', array('ID' => $userID))->row();
		return $result;
	}

	function updateUser($userID){
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		$displayname = $this->input->post('displayname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'user_login' => $username,
			'user_nicename' => $fullname,
			'display_name' => $displayname,
			'user_email' => $email,
			'user_url' => $website
		);
		$this->db->where('ID', $userID);
		$this->db->update('users', $data);
		if($password != null){
			$datapass = array(
				'user_pass' => md5($password)
			);
			$this->db->where('ID', $userID);
			$this->db->update('users', $datapass);
		}
		
	}

	function deleteUser($userID){
		$this->db->delete('users', array('ID' => $userID));
		return;
	}
}