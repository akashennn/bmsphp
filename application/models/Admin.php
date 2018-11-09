<?php
class Admin extends CI_Model
{
	function validate()
	{
		$arr['username'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		return $this->db->get_where('users',$arr)->row();
	}
}