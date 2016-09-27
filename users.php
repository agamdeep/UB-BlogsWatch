<?php

	class Users extends CI_Controller{

		public function blog_list(){


			$this->load->model('bloglistmodel');
				//starting the pagination
			
			$config = [
				'base_url' =>'http://[::1]/xampp/codeigniter/index.php/users/blog_list',
				'per_page' => 5,
				'total_rows' =>$this->bloglistmodel->numb_rows(),
				'full_tag_open' => "<ul class='pagination'>",
				'full_tag_close' => '</ul>',
				'next_tag_open'=> '<li>',
				'first_tag_open'=> '<li>',
				'first_tag_close' => '</li>',
				'last_tag_open'=> '<li>',
				'last_tag_close' => '</li>',
				'next_tag_close' => '</li>',
				'prev_tag_open' => '<li>',
				'prev_tag_close' => '</li>',
				'num_tag_open' => '<li>',
				'num_tag_close' => '</li>',
				'cur_tag_open' => "<li class='active'><a>",
				'cur_tag_close' => '</a></li>',

			];

			$this->pagination->initialize($config);
			$articles=$this->bloglistmodel->article_list($config['per_page'], $this->uri->segment(3));
			$this->load->view('users/blog_list',['article'=>$articles]);
		}

		public function add_article() {
			$this->load->view('users/add_article');
		}

		public function submit_article(){
			if( $this->form_validation->run('add_articles') ) {
				$post=$this->input->post();
				unset($post['submit']);
				$this->load->model('bloglistmodel');
				if($this->bloglistmodel->add_article($post)){
					$this->session->set_flashdata("feedback","Article added successfully!");
					$this->session->set_flashdata("feedback_class","alert-success");
				}else{
					$this->session->set_flashdata("feedback","Article could not be added successfully! Please try again!!!");
					$this->session->set_flashdata("feedback_class","alert-danger");
				}
				return redirect('users/blog_list');
			}else{
				$this->load->view('users/add_article');
			}
		}

		public function edit_article($article_id){
			$this->load->model('bloglistmodel');
			$article= $this->bloglistmodel->fetch_article($article_id);
			$this->load->view('users/edit_article',['art'=>$article]);
			}

		public function update_article($article_id){
			if($this->form_validation->run('add_articles')) {
				$post= $this->input->post();
				unset($post['submit']);
				$this->load->model('bloglistmodel');
				if( $this->bloglistmodel->update_article($article_id,$post)){
					$this->session->set_flashdata('feedback','Article has been edited successfully!');
					$this->session->set_flashdata('feedback_class','alert-success');
				}else{
					$this->session->set_flashdata('feedback','Article could not be edited successfully! Please try again!!!');
					$this->session->set_flashdata('feedback_class','alert-danger');
				}
				return redirect('users/blog_list');
			}else{
				$this->load->view('users/edit_article');
			}
		}

		public function delete_article($article_id){
			$this->load->model('bloglistmodel');
			$this->bloglistmodel->delete_article($article_id);
			return redirect('users/blog_list');
		}
}

?>
