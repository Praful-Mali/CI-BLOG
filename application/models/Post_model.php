<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	function postView(){
		$ambil = $this->db->query("SELECT * FROM posts WHERE post_type='post' AND post_status!='inherit' AND post_status!='trash' ORDER BY ID DESC");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function postViewStatus($view){
		$ambil = $this->db->query("SELECT * FROM posts WHERE post_type='post' AND post_status='$view' ORDER BY ID DESC");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function postViewFilter($filter, $view){
		if($filter == "category"){
			$ambil = $this->db->query("SELECT * FROM posts a, terms b, term_relationships c, term_taxonomy d WHERE a.post_type='post' AND a.ID=c.object_id AND b.term_id=d.term_id AND c.term_taxonomy_id=d.term_taxonomy_id AND d.taxonomy='category' AND b.term_id='$view'");
			if($ambil->num_rows()>0){
				foreach ($ambil->result() as $data) {
					$hasil[] = $data;
				}
				return $hasil;
			}
		} else if($filter == "tag"){
			$ambil = $this->db->query("SELECT * FROM posts a, terms b, term_relationships c, term_taxonomy d WHERE a.post_type='post' AND a.ID=c.object_id AND b.term_id=d.term_id AND c.term_taxonomy_id=d.term_taxonomy_id AND d.taxonomy='post_tag' AND b.term_id='$view'");
			if($ambil->num_rows()>0){
				foreach ($ambil->result() as $data) {
					$hasil[] = $data;
				}
				return $hasil;
			}
		} else{
			$year = $this->uri->segment(5, 0);
			$ambil = $this->db->query("SELECT * FROM posts WHERE post_type='post' AND MONTH(post_date)='$view' AND YEAR(post_date)='$year'");
			if($ambil->num_rows()>0){
				foreach ($ambil->result() as $data) {
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
	}
	
	function countView($status){
		if($status == 'all'){
			$ambil = $this->db->query("SELECT * FROM posts WHERE post_type='post' AND post_status!='inherit' AND post_status!='trash'");
			return $ambil->num_rows();
		} else{
			$ambil = $this->db->query("SELECT * FROM posts WHERE post_type='post' AND post_status='$status'");
			return $ambil->num_rows();
		}
	}
	
	function postCategory($post_id){
		$ambil = $this->db->query("SELECT * FROM terms a, term_relationships b, term_taxonomy c WHERE b.object_id='$post_id' AND a.term_id=c.term_id AND b.term_taxonomy_id=c.term_taxonomy_id AND c.taxonomy='category'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function postTag($post_id){
		$ambil = $this->db->query("SELECT * FROM terms a, term_relationships b, term_taxonomy c WHERE b.object_id='$post_id' AND a.term_id=c.term_id AND b.term_taxonomy_id=c.term_taxonomy_id AND c.taxonomy='post_tag'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function postCategories(){
		$ambil = $this->db->query("SELECT * FROM terms a, term_taxonomy b WHERE a.term_id=b.term_id AND b.taxonomy='category'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function postTags(){
		$ambil = $this->db->query("SELECT * FROM terms a, term_taxonomy b WHERE a.term_id=b.term_id AND b.taxonomy='post_tag'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function postDates(){
		$ambil = $this->db->query("SELECT MONTH(post_date) as mno, MONTHNAME(post_date) as mon, YEAR(post_date) as yr FROM posts GROUP BY MONTHNAME(post_date), YEAR(post_date)");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function postTrash($id){
		$data = array(
			'post_status' => 'trash'
		);
		$this->db->where('ID', $id);
		$this->db->update('posts', $data);
	}

	function postRestore($id){
		$data = array(
			'post_status' => 'publish'
		);
		$this->db->where('ID', $id);
		$this->db->update('posts', $data);
	}

	function addPost(){
		$postid = $this->input->post('postid');
		$termid = $this->input->post('termid');
		$taxid = $this->input->post('taxid');
		$relid = $this->input->post('relid');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$status = $this->input->post('status');
		$category = $this->input->post('category');
		$tags = $this->input->post('tags');
		$data = array(
			'ID' => $postid,
			'post_title' => $title,
			'post_content' => $content,
			'post_author' => '1',
			'post_date' => date('Y-m-d H:i:s'),
			'post_date_gmt' => date('Y-m-d H:i:s'),
			'post_status' => $status,
			'post_name' => str_replace(" ", "-", $title),
			'post_type' => 'post',
			'post_modified' => date('Y-m-d H:i:s'),
			'post_modified_gmt' => date('Y-m-d H:i:s')
		);
		$this->db->insert('posts', $data);
		$datacat = array(
			'object_id' => $postid,
			'term_taxonomy_id' => $category
		);
		$this->db->insert('term_relationships', $datacat);
		$arrtag = explode(",", $tags);
		foreach($arrtag as $key => $value){
			$datatag1 = array(
				'term_id' => $termid + $key,
				'name' => ucfirst($arrtag[$key]),
				'slug' => str_replace(" ", "-", strtolower($arrtag[$key]))
			);
			$this->db->insert('terms', $datatag1);
			$datatag2 = array(
				'term_taxonomy_id' => $taxid + $key,
				'term_id' => $termid + $key,
				'taxonomy' => 'post_tag'
			);
			$this->db->insert('term_taxonomy', $datatag2);
			$datatag3 = array(
				'object_id' => $postid,
				'term_taxonomy_id' => $taxid + $key
			);
			$this->db->insert('term_relationships', $datatag3);
		}
	}

	function maxPost($view){
		if($view == 'post'){
			$result = $this->db->query('SELECT MAX(ID) as maxid FROM posts')->row();
			return $result;
		} else if($view == 'terms'){
			$result = $this->db->query('SELECT MAX(term_id) as maxterm FROM terms')->row();
			return $result;
		} else if($view == 'taxonomy'){
			$result = $this->db->query('SELECT MAX(term_taxonomy_id) as maxtax FROM term_taxonomy')->row();
			return $result;
		} else{
			$result = $this->db->query('SELECT MAX(object_id) as maxrel FROM term_relationships')->row();
			return $result;
		}
	}

	function editPost($postID){
		$result = $this->db->get_where('posts', array('ID' => $postID))->row();
		return $result;
	}

	function updatePost($postID){
		$termid = $this->input->post('termid');
		$taxid = $this->input->post('taxid');
		$relid = $this->input->post('relid');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$status = $this->input->post('status');
		$category = $this->input->post('category');
		$tags = $this->input->post('tags');
		$terms = $this->input->post('terms');
		$termtax = $this->input->post('termtax');
		$termcat = $this->input->post('termcat');
		$data = array(
			'post_title' => $title,
			'post_content' => $content,
			'post_status' => $status,
			'post_name' => str_replace(" ", "-", $title),
			'post_type' => 'post',
			'post_modified' => date('Y-m-d H:i:s'),
			'post_modified_gmt' => date('Y-m-d H:i:s')
		);
		$this->db->where('ID', $postID);
		$this->db->update('posts', $data);
		$arrtermcat = explode(",", $termcat);
		foreach($arrtermcat as $key => $value){
			$this->db->delete('term_relationships', array('object_id' => $postID, 'term_taxonomy_id' => $arrtermcat[$key]));
		}
		$datacat = array(
			'object_id' => $postID,
			'term_taxonomy_id' => $category
		);
		$this->db->insert('term_relationships', $datacat);
		$arrterms = explode(",", $terms);
		foreach($arrterms as $key => $value){
			$this->db->delete('terms', array('term_id' => $arrterms[$key]));
			$arrtermtax = explode(",", $termtax);
			foreach($arrtermtax as $key2 => $value2){
				$this->db->delete('term_taxonomy', array('term_taxonomy_id' => $arrtermtax[$key2], 'term_id' => $arrterms[$key]));
				$this->db->delete('term_relationships', array('object_id' => $postID, 'term_taxonomy_id' => $arrtermtax[$key2]));
			}
		}
		$arrtag = explode(",", $tags);
		foreach($arrtag as $key => $value){
			$datatag1 = array(
				'term_id' => $termid + $key,
				'name' => ucfirst($arrtag[$key]),
				'slug' => str_replace(" ", "-", strtolower($arrtag[$key]))
			);
			$this->db->insert('terms', $datatag1);
			$datatag2 = array(
				'term_taxonomy_id' => $taxid + $key,
				'term_id' => $termid + $key,
				'taxonomy' => 'post_tag'
			);
			$this->db->insert('term_taxonomy', $datatag2);
			$datatag3 = array(
				'object_id' => $postID,
				'term_taxonomy_id' => $taxid + $key
			);
			$this->db->insert('term_relationships', $datatag3);
		}
	}

	function deletePost($postID){
		$this->db->delete('posts', array('ID' => $postID));
		return;
	}
}