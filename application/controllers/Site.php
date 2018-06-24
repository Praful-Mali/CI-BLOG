<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		$data['title'] = "MY Blog Project";
		$config['base_url'] = base_url('blog/page');
		$config['total_rows'] = $this->sites->countPost();
		$config["uri_segment"] = 3;
		$config['per_page'] = 6;
		$config['full_tag_open'] = '<div class="w3-center w3-padding-32"><div class="w3-bar">';
		$config['full_tag_close'] = '</div></div>';
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['first_tag_close'] = '</div>';
		$config['first_url'] = '';
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="w3-bar-item w3-teal w3-button">';
		$config['cur_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['num_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['query'] = $this->sites->posts($config["per_page"], $page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('theme/basic/header', $data);
		$this->load->view('theme/basic/index', $data);
		$this->load->view('theme/basic/footer');
	}

	public function post(){
		$postid = $this->uri->segment(3, 0);
		if($postid == false){
			redirect(base_url());
		}
		$postname = str_replace(".html","",$postid);
		$data['title'] = "MY Blog Project";
		$one = $this->sites->onepost($postname);
		$data['pid'] = $one->ID;
		$data['ptitle'] = $one->post_title;
		$data['pcontent'] = $one->post_content;
		$data['pdate'] = $one->post_date;
		$data['pauthor'] = $one->post_author;
		$this->load->view('theme/basic/header', $data);
		$this->load->view('theme/basic/content_site', $data);
		$this->load->view('comment_site', $data);
		$this->load->view('theme/basic/footer');
	}

	public function category(){
		$catslug = $this->uri->segment(3, 0);
		if($catslug == false){
			redirect(base_url());
		}
		$data['title'] = "MY Blog Project";
		$config['base_url'] = base_url('blog/category/'.$catslug);
		$config['total_rows'] = $this->sites->countCategory($catslug);
		$config["uri_segment"] = 4;
		$config['per_page'] = 6;
		$config['full_tag_open'] = '<div class="w3-center w3-padding-32"><div class="w3-bar">';
		$config['full_tag_close'] = '</div></div>';
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['first_tag_close'] = '</div>';
		$config['first_url'] = '';
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="w3-bar-item w3-teal w3-button">';
		$config['cur_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['num_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['query'] = $this->sites->categories($catslug, $config["per_page"], $page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('theme/basic/header', $data);
		$this->load->view('theme/basic/index', $data);
		$this->load->view('theme/basic/footer');
	}

	public function tag(){
		$tagslug = $this->uri->segment(3, 0);
		if($tagslug == false){
			redirect(base_url());
		}
		$data['title'] = "MY Blog Project";
		$config['base_url'] = base_url('blog/tag/'.$tagslug);
		$config['total_rows'] = $this->sites->countTag($tagslug);
		$config["uri_segment"] = 4;
		$config['per_page'] = 6;
		$config['full_tag_open'] = '<div class="w3-center w3-padding-32"><div class="w3-bar">';
		$config['full_tag_close'] = '</div></div>';
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['first_tag_close'] = '</div>';
		$config['first_url'] = '';
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="w3-bar-item w3-teal w3-button">';
		$config['cur_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="w3-bar-item w3-button w3-hover-teal">';
		$config['num_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['query'] = $this->sites->tags($tagslug, $config["per_page"], $page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('theme/basic/header', $data);
		$this->load->view('theme/basic/index', $data);
		$this->load->view('theme/basic/footer');
	}

	public function search(){
		$q = $this->input->get('search');
		if($q == false){
			redirect(base_url());
		}
		$data['title'] = "MY Blog Project";
		$data['query'] = $this->sites->searchs($q);
		$this->load->view('theme/basic/header', $data);
		$this->load->view('theme/basic/content_search', $data);
		$this->load->view('theme/basic/footer');
	}

}
