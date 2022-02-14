<?php

class PageInfo extends MY_Model
{
	/**
	 * @var string
	 */
	private $pageInfo;

	public function __construct()
	{
		parent::__construct();
		$this->pageInfo = "ns_page_info";
	}

	/**
	 * @param int $pageId
	 * @return mixed
	 */
	function pageInfoByPageId($pageId = 0)
	{
		$this->db->select(['title', 'content']);
		$this->db->from($this->pageInfo);
		$this->db->where($this->pageInfo . '.page_id', $pageId);
		$this->db->where($this->pageInfo . '.status', 1);

		return $this->db->get()->result();
	}
}
