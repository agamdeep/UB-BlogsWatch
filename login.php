<?php

	class Login extends CI_Controller{


		public function index(){
			
			$this->load->view('admin/blogger_login');
		}

		public function login_blogger(){
			
			// $this->form_validation->set_rules('username', 'Username', 'required|alpha|min_length[2]');
			// $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			if($this->form_validation->run('login_validation') ){
				
				$username=$this->input->post('username');
				$password= $this->input->post('password');
				
				$this->load->model('loginmodel');
				$login_id=$this->loginmodel->user_login($username, $password);
				if($login_id){
					$this->session->set_userdata('user_id', $login_id);
					return redirect('users/blog_list');
				}else{
					$this->session->set_flashdata('login_failed', 'Incorrect Username/Password combination');
					return redirect('login');
				}
			}
			else{
				$this->load->view('admin/blogger_login');	
			}
	}

	public function logout() {
		
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}
?>
