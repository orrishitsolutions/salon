<?php

class Services extends MY_Model
{
	/**
	 * @var string
	 */
	private $service;

	public function __construct()
	{
		parent::__construct();
		$this->service = "ns_services";
	}

	/**
	 * @param int $pageId
	 * @return mixed
	 */
	function pageServicesByPageId($pageId = 0)
	{
		$this->db->select(['title', 'content']);
		$this->db->from($this->service);
		$this->db->where($this->service . '.page_id', $pageId);
		$this->db->where($this->service . '.status', 1);

		return $this->db->get()->result();
	}
}
