<?php

class Locationmodel extends MY_Model
{
	/**
	 * @var string
	 */
	public $state;

	/**
	 * @var string
	 */
	public $district;

	/**
	 * @var string
	 */
	public $city;

	public function __construct()
	{
		parent::__construct();
		$this->state = "ns_state";
		$this->district = "ns_district";
		$this->city = "ns_city";
	}

	public function getModule($module = "")
	{
		$this->db->select("*");
		$this->db->from($module);

		return $this->db->get()->result();
	}

	public function getModuleBycolumn($module = "", $whereColumn = "", $whereVal = 0)
	{
		$this->db->select("*");
		$this->db->from($module);
		$this->db->where($module . '.'.$whereColumn, $whereVal);

		return $this->db->get()->result_array();
	}
}
