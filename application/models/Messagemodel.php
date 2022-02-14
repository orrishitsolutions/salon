<?php

class Messagemodel extends CI_Model
{
	/**
	 * @var string
	 */
	private $message;

	/**
	 * @var string
	 */
	private $users;

	/**
	 * @var string
	 */
	private $product;

	public function __construct()
	{
		parent::__construct();
		$this->message = "ns_message";
		$this->users = "ns_users";
		$this->product = "ns_products";
	}

	/**
	 * @param array $data
	 * @return mixed
	 */
	public function save($data = [])
	{
		$this->db->insert($this->message, $data);

		return $this->db->insert_id();
	}


	public function chatUsers($id = 0, $usersOnly = 0, $toUsersId = 0, $productId = 0)
	{
		$this->db->select($this->message.".*, CONCAT($this->users.first_name,' ',$this->users.last_name) as name, $this->product.title");
		$this->db->from($this->message);
		$this->db->join($this->users, $this->message . '.to_users_id = ' . $this->users . '.id', "inner");
		$this->db->join($this->product, $this->message . '.product_id = ' . $this->product . '.id', "left");
		$this->db->where($this->message . '.from_users_id', $id);
		$this->db->where($this->message . '.status', 1);
		if ($toUsersId) {
			$this->db->where($this->message . '.to_users_id', $toUsersId);
		}
		if ($productId) {
			$this->db->where($this->message . '.product_id', $productId);
		}
		if ($usersOnly) {
			$this->db->group_by($this->message . '.to_users_id');
		}
		$this->db->order_by($this->message . '.id', 'ASC');
		//echo $this->db->get_compiled_select();die;

		return $this->db->get()->result();
	}

	public function donorChatUsers($id = 0, $usersOnly = 0, $fromUserId = 0, $productId = 0)
	{
		$where = "WHERE";
		$group = "";
		if ($id && $usersOnly) {
			$where .= " (`to_users_id`=$id) AND ";
		} elseif ($id) {
			$where .= " ((`from_users_id`=$id AND `to_users_id`=$fromUserId) OR ";
			$where .= " (`from_users_id`=$fromUserId AND `to_users_id`=$id)) AND ";
		}
		if ($productId) {
			$where .= " m.`product_id`=$productId AND ";
		}
		$where = substr($where, 0, strlen($where)-5);
		if ($usersOnly) {
			$group .= " GROUP BY m.from_users_id ";
		}

		$query = $this->db->query("SELECT m.*, concat(u.first_name,' ',u.last_name) as from_name, concat(tu.first_name,' ',tu.last_name) as to_name, p.title FROM `ns_message` as m
		JOIN ns_users as u ON m.from_users_id=u.id JOIN ns_users as tu ON m.to_users_id=tu.id JOIN ns_products as p ON m.product_id=p.id $where $group ORDER BY m.id ASC");

		return $query->result();
	}
}
