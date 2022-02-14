<?php

class Signupmodel extends MY_Model
{
	/**
	 * @var string
	 */
	private $signup;

	public function __construct()
	{
		parent::__construct();
		$this->signup = "ns_users";
	}

	public function saveData($data = [])
	{
		if (!empty($data['password'])) {
			$data['password'] = md5($data['password']);
		}
		$checkExists = $this->checkEmailExists($data['email']);
		if (empty($checkExists)) {
			$this->db->insert($this->signup, $data);
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}

	public function updateData($data = [])
	{
		$this->db->where('id', $data['id']);
		$this->db->update($this->signup, $data);
	}

	public function checkLogin($email, $password)
	{
		$this->db->select(['id','email', 'user_type']);
		$this->db->from($this->signup);
		$this->db->where($this->signup . '.email', $email);
		$this->db->where($this->signup . '.password', md5($password));

		return $this->db->get()->row();
	}

	public function checkEmailExists($email)
	{
		$this->db->select(['email']);
		$this->db->from($this->signup);
		$this->db->where($this->signup . '.email', $email);

		return $this->db->get()->row();
	}

	public function getUserById($id)
	{
		$this->db->select("*");
		$this->db->from($this->signup);
		$this->db->where($this->signup . '.id', $id);

		return $this->db->get()->row();
	}

	public function getUserByParentUser($id)
	{
		$this->db->select("*");
		$this->db->from($this->signup);
		$this->db->where($this->signup . '.parent_user', $id);

		return $this->db->get()->result();
	}
}
