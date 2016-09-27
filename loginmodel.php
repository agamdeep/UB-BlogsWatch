<?php

class loginmodel extends CI_Model{


	public function user_login($username, $password){
		$q=$this->db->get_where('users', array('username'=>$username, 'password'=>$password));
		if($q->num_rows()){
			return ($q->row()->id);

		}
		else{
			return false;
		}
		
	}
}


?>
