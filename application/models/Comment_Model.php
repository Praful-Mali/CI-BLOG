<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {
    
    function viewData($id){
        $ambil = $this->db->query("SELECT * FROM comments WHERE comment_post_ID='$id' AND comment_parent='0' ORDER BY comment_ID DESC");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
    }
    
    function viewDataReply($id){
		$ambil = $this->db->query("SELECT * FROM comments WHERE comment_parent='$id'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
    }
    
    function saveData(){
        $postid = $this->input->post('pid');
		$userid = $this->input->post('uid');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		$content = $this->input->post('content');
		$ip = $this->input->post('ip');
		$date = date('Y-m-d H:i:s');
		$data = array(
			'comment_post_ID' => $postid,
			'comment_author' => $name,
			'comment_author_email' => $email,
			'comment_author_url' => $website,
			'comment_author_IP' => $ip,
			'comment_date' => date('Y-m-d H:i:s'),
			'comment_date_gmt' => date('Y-m-d H:i:s'),
			'comment_content' => $content,
			'user_id' => $userid
		);
		$this->db->insert('comments', $data);
    }

    function saveReplay(){
        $parentid = $this->input->post('parentid');
        $postid = $this->input->post('pid');
		$userid = $this->input->post('uid');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		$content = $this->input->post('content');
		$ip = $this->input->post('ip');
		$date = date('Y-m-d H:i:s');
		$data = array(
			'comment_post_ID' => $postid,
			'comment_author' => $name,
			'comment_author_email' => $email,
			'comment_author_url' => $website,
			'comment_author_IP' => $ip,
			'comment_date' => date('Y-m-d H:i:s'),
			'comment_date_gmt' => date('Y-m-d H:i:s'),
			'comment_content' => $content,
			'user_id' => $userid,
			'comment_parent' => $parentid
		);
		$this->db->insert('comments', $data);
    }

    function updateData(){
        $id = $this->input->post('id');
		$content = $this->input->post('content');
		$data = array(
			'comment_content' => $content
		);
		$this->db->where('comment_ID', $id);
		$this->db->update('comments', $data);
    }
    
    function deleteData(){
		$id = $this->input->post('id');
        $this->db->delete('comments', array('comment_ID' => $id));
		return;
    }
}