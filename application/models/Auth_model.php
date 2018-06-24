<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function getData($name, $pass){
		
        $result = $this->db->get_where('users', array('user_login' => $name, 'user_pass' => $pass, 'user_activation_key' => ''))->row();
		
		return $result;
    }

    function regBasic($unikid, $username, $email){
        $data = array(
            'user_login' => $username,
            'user_nicename' => $username,
            'display_name' => $username,
			'user_email' => $email,
            'user_registered' => date('Y-m-d H:i:s'),
            'user_activation_key' => $unikid
		);
		$this->db->insert('users', $data);
    }

    function regPassword(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('new'));
        $data = array(
			'user_pass' => $password,
            'user_activation_key' => ''
        );
        $this->db->where('user_login', $username);
		$this->db->update('users', $data);
    }

}