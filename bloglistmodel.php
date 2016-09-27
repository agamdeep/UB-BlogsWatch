<?php

class Bloglistmodel extends CI_Model{

	public function article_list($limit, $offset){
		$user_id= $this->session->userdata('user_id');
		$query= $this->db
						->select(['id','title','body'])
						->where('user_id',$user_id)
						->limit($limit, $offset)
						->get('articles');

		return $query->result();
	}

	public function numb_rows(){
		$user_id= $this->session->userdata('user_id');
		$query= $this->db
						->select(['id','title','body'])
						->where('user_id',$user_id)
						->get('articles');

		return $query->num_rows();	

	}


	public function add_article($article){
		return $this->db->insert('articles', $article);
	}

	public function fetch_article($article_id) {
		$q=$this->db->select(['id','title','body'])
					->where('id',$article_id)
					->get('articles');
		return $q->row();
	}

	public function update_article($article_id, Array $article){
		return $this->db
						->where('id', $article_id)
				 		->update('articles', $article);
		
	}
	public function delete_article($article_id){
		return $this->db
						->where('id',$article_id)
						->delete('articles');
	}
}

?>