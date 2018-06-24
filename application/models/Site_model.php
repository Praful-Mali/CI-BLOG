<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	function posts($limit, $start){
		$ambil = $this->db->query("SELECT * FROM posts ORDER BY ID DESC LIMIT $limit OFFSET $start");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function categories($view, $limit, $start){
		$ambil = $this->db->query("SELECT * FROM posts a, terms b, term_taxonomy c, term_relationships d WHERE b.term_id=c.term_id AND c.term_taxonomy_id=d.term_taxonomy_id AND d.object_id=a.ID AND b.slug='$view' AND c.taxonomy='category' ORDER BY a.ID DESC LIMIT $limit OFFSET $start");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function tags($view, $limit, $start){
		$ambil = $this->db->query("SELECT * FROM posts a, terms b, term_taxonomy c, term_relationships d WHERE b.term_id=c.term_id AND c.term_taxonomy_id=d.term_taxonomy_id AND d.object_id=a.ID AND b.slug='$view' AND c.taxonomy='post_tag' GROUP BY a.post_title ORDER BY a.ID DESC LIMIT $limit OFFSET $start");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function searchs($view){
		$ambil = $this->db->query("SELECT * FROM posts WHERE post_title like '%$view%' or post_content like '%$view%' ORDER BY ID DESC LIMIT 6");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function onepost($postname){
		$result = $this->db->get_where('posts', array('post_name' => $postname))->row();
		return $result;
	}
	
	function postauthor($userid){
		$result = $this->db->get_where('users', array('ID' => $userid))->row();
		return $result;
	}

	function postrelated(){
		$ambil = $this->db->query("SELECT * FROM posts ORDER BY RAND() LIMIT 3");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function posttag($postid){
		$ambil = $this->db->query("SELECT * FROM terms a, term_taxonomy b, term_relationships c WHERE a.term_id=b.term_id AND b.term_taxonomy_id=c.term_taxonomy_id AND c.object_id='$postid' AND b.taxonomy='post_tag' GROUP BY a.name");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function postcategory($postid){
		$ambil = $this->db->query("SELECT * FROM terms a, term_taxonomy b, term_relationships c WHERE a.term_id=b.term_id AND b.term_taxonomy_id=c.term_taxonomy_id AND c.object_id='$postid' AND b.taxonomy='category'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function footerPost(){
		$ambil = $this->db->query("SELECT * FROM posts LIMIT 2");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function footerTags(){
		$ambil = $this->db->query("SELECT * FROM terms a, term_taxonomy b WHERE a.term_id=b.term_id AND b.taxonomy='post_tag' GROUP BY a.name");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function headerCategories(){
		$ambil = $this->db->query("SELECT * FROM terms a, term_taxonomy b WHERE a.term_id=b.term_id AND b.taxonomy='category' AND a.name!='Uncategorized'");
		if($ambil->num_rows()>0){
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function countPost(){
		$ambil = $this->db->query("SELECT * FROM posts");
		return $ambil->num_rows();
	}
	
	function countCategory($view){
		$ambil = $this->db->query("SELECT * FROM posts a, terms b, term_taxonomy c, term_relationships d WHERE b.term_id=c.term_id AND c.term_taxonomy_id=d.term_taxonomy_id AND d.object_id=a.ID AND b.slug='$view' AND c.taxonomy='category'");
		return $ambil->num_rows();
	}
	
	function countTag($view){
		$ambil = $this->db->query("SELECT * FROM posts a, terms b, term_taxonomy c, term_relationships d WHERE b.term_id=c.term_id AND c.term_taxonomy_id=d.term_taxonomy_id AND d.object_id=a.ID AND b.slug='$view' AND c.taxonomy='post_tag'");
		return $ambil->num_rows();
	}
	
	function countSearch($view){
		$ambil = $this->db->query("SELECT * FROM posts WHERE post_title like '%$view%' or post_content like '%$view%'");
		return $ambil->num_rows();
	}
	
}