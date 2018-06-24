<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
        $data['pesan'] = '';
        $this->load->view('login', $data);
    }
    
	public function register(){
        $data['pesan'] = '';
        $this->load->view('register', $data);
    }
    
	public function lostpassword(){
        $data['pesan'] = 'Please enter your username or email address. You will receive a link to create a new password via email.';
        $this->load->view('lostpassword', $data);
    }

    public function logout(){
        $array_items = array('signin', 'userid', 'username');
        $this->session->unset_userdata($array_items);
        redirect('auth');
    }

    public function signin(){
        $user = $this->input->post('username');
        $username = preg_replace('/\s+/', '', $user);
        $password = md5($this->input->post('password'));
        $result = $this->auths->getData($username, $password);
        if($result){
            $this->session->set_userdata('signin', true);
            $this->session->set_userdata('userid', $result->ID);
            $this->session->set_userdata('username', $result->display_name);
            redirect('user/profile');
        } else{
            $data['pesan'] = 'Wrong username or password, please try again.';
            $this->load->view('login', $data);
        }
    }

    public function signup(){
        $unikid = uniqid();
        $user = $this->input->post('username');
        $username = preg_replace('/\s+/', '', $user);
        $email = $this->input->post('email');
        $this->auths->regBasic($unikid, $username, $email);
        $this->email->from('postmaster@localhost', 'Tedir Ghazali');
        $this->email->to($email);
        $this->email->subject('Verification Account CodeIgniter 3');
        $this->email->message('Please verification with click this link {unwrap}http://localhost/login-with-codeigniter-3/index.php/auth/verification/'.$unikid.'/'.$username.'{/unwrap}');
        $this->email->send();
        $data['pesan'] = 'Verification has been sent to your email.';
        $this->load->view('register', $data);
    }

    public function forgotpassword(){
        $unikid = uniqid();
        $email = $this->input->post('email');
        $data = array(
			'user_activation_key' => $unikid,
			'user_pass' => ''
        );
        $this->db->where('user_email', $email);
        $this->db->update('users', $data);
        $result = $this->db->get_where('users', array('user_email' => $email))->row();
        $username = $result->user_login;
        $this->email->from('postmaster@localhost', 'Tedir Ghazali');
        $this->email->to($email);
        $this->email->subject('Get New Password CodeIgniter 3');
        $this->email->message('Create your password with click this link {unwrap}http://localhost/login-with-codeigniter-3/index.php/auth/verification/'.$unikid.'/'.$username.'{/unwrap}');
        $this->email->send();
        $data['pesan'] = 'Create new password link has been sent to your email.';
        $this->load->view('lostpassword', $data);
    }

    public function verification(){
        $seg1 = $this->uri->segment(3, 0);
        $seg2 = $this->uri->segment(4, 0);
        if($seg1 == null && $seg2 == null){
			redirect('auth');
        }
        $data['unikid'] = $seg1;
        $data['username'] = $seg2;
        $data['pesan'] = '';
        $this->load->view('newpassword', $data);
    }

    public function createpassword(){
        if($this->input->post('new') == $this->input->post('confirm')){
            $this->auths->regPassword();
            redirect('auth');
        } else{
            $data['unikid'] = $this->input->post('unikid');
            $data['username'] = $this->input->post('username');
            $data['pesan'] = 'Wrong password, your password not same';
            $this->load->view('newpassword', $data);
        }
    }
}