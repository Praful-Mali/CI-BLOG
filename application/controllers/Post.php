<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function index(){
		$data['title'] = "<span class='oi' data-glyph='pin'></span> Posts";
		$this->load->view('header', $data);
		$data['query'] = $this->posting->postView();
		$data['status1'] = $this->posting->countView('all');
		$data['status2'] = $this->posting->countView('publish');
		$data['status3'] = $this->posting->countView('draft');
		$data['status4'] = $this->posting->countView('pending');
		$data['status5'] = $this->posting->countView('trash');
		$this->load->view('all_post', $data);
		$this->load->view('footer');
	}

	public function status(){
		$data['title'] = "<span class='oi' data-glyph='pin'></span> Posts";
		$this->load->view('header', $data);
		$poststatus = $this->uri->segment(3, 0);
		if($poststatus == true){
			$data['query'] = $this->posting->postViewStatus($poststatus);
		} else{
			$data['query'] = $this->posting->postView();
		}
		$data['status1'] = $this->posting->countView('all');
		$data['status2'] = $this->posting->countView('publish');
		$data['status3'] = $this->posting->countView('draft');
		$data['status4'] = $this->posting->countView('pending');
		$data['status5'] = $this->posting->countView('trash');
		$this->load->view('all_post', $data);
		$this->load->view('footer');
	}

	public function filter(){
		$data['title'] = "<span class='oi' data-glyph='pin'></span> Posts";
		$this->load->view('header', $data);
		$postfilter = $this->uri->segment(3, 0);
		$postfilterView = $this->uri->segment(4, 0);
		if($postfilter == true){
			$data['query'] = $this->posting->postViewFilter($postfilter, $postfilterView);
		} else{
			$data['query'] = $this->posting->postView();
		}
		$data['status1'] = $this->posting->countView('all');
		$data['status2'] = $this->posting->countView('publish');
		$data['status3'] = $this->posting->countView('draft');
		$data['status4'] = $this->posting->countView('pending');
		$data['status5'] = $this->posting->countView('trash');
		$this->load->view('all_post', $data);
		$this->load->view('footer');
	}

	public function recycle(){
		$re = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if($re == 'trash'){
			$this->posting->postTrash($id);
			redirect('post', 'refresh');
		} else if($re == 'restore'){
			$this->posting->postRestore($id);
			redirect('post/status/trash', 'refresh');
		} else{
			redirect('post', 'refresh');
		}
	}

	public function delete(){
		$del = $this->uri->segment(3);
		$this->posting->deletePost($del);
		redirect('post/status/trash','refresh');
	}

	public function totrash(){
		$checkid = $this->input->post('checkid');
		foreach($checkid as $key => $value) {
			$this->posting->postTrash($checkid[$key]);
		}
		redirect('post','refresh');
	}

	public function torestore(){
		$checkid = $this->input->post('checkid');
		foreach($checkid as $key => $value) {
			$this->posting->postRestore($checkid[$key]);
		}
		redirect('post/status/trash','refresh');
	}

	public function todelete(){
		$checkid = $this->input->post('checkid');
		foreach($checkid as $key => $value) {
			$this->posting->deletePost($checkid[$key]);
		}
		redirect('post/status/trash','refresh');
	}

	public function add(){
		$data['title'] = "<span class='oi' data-glyph='pin'></span> Posts";
		$max1 = $this->posting->maxPost('post');
		$data['postid'] = $max1->maxid + 1;
		$max2 = $this->posting->maxPost('terms');
		$data['termid'] = $max2->maxterm + 1;
		$max3 = $this->posting->maxPost('taxonomy');
		$data['taxid'] = $max3->maxtax + 1;
		$max4 = $this->posting->maxPost('relationships');
		$data['relid'] = $max4->maxrel + 1;
		$data['edit'] = "new";
		$this->load->view('header', $data);
		$this->load->view('form_post', $data);
		$this->load->view('footer');
	}
	
	public function publish(){
		if($this->input->post('title')){
			$this->posting->addPost();
			$max1 = $this->posting->maxPost('post');
			$maxid = $max1->maxid;
			redirect('post/edit/'.$maxid, 'refresh');
		} else{
			redirect('post/add','refresh');
		}
	}
	
	public function edit(){
		$seg= $this->uri->segment(3);
		if($seg == null){
			redirect('post');
		}
		$data['title'] = "<span class='oi' data-glyph='pin'></span> Posts";
		$max2 = $this->posting->maxPost('terms');
		$data['termid'] = $max2->maxterm + 1;
		$max3 = $this->posting->maxPost('taxonomy');
		$data['taxid'] = $max3->maxtax + 1;
		$max4 = $this->posting->maxPost('relationships');
		$data['relid'] = $max4->maxrel + 1;
		$row = $this->posting->editPost($seg);
		$data['postid'] = $row->ID;
		$data['posttitle'] = $row->post_title;
		$data['postcontent'] = $row->post_content;
		$data['poststatus'] = $row->post_status;
		$data['edit'] = "edit";
		$this->load->view('header', $data);
		$this->load->view('form_post', $data);
		$this->load->view('footer');
	}

	public function update(){
		$id = $this->input->post('postid');
		$this->posting->updatePost($id);
		redirect('post/edit/'.$id, 'refresh');
	}

}
