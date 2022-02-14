<?php

class Adminmodel extends MY_Model
{
	/**
	 * @var string
	 */
	private $admin;

	/**
	 * @var string
	 */
	private $category;

	/**
	 * @var string
	 */
	private $product;

	/**
	 * @var string
	 */
	private $productCategory;

	/**
	 * @var string
	 */
	public $productImage;

	/**
	 * @var string
	 */
	private $usersProduct;

	/**
	 * @var string
	 */
	private $users;

	/**
	 * @var string
	 */
	private $categoryPages;

	/**
	 * @var string
	 */
	private $pagesCategory;

	/**
	 * @var string
	 */
	private $pages;

	/**
	 * @var string
	 */
	private $services;

	/**
	 * @var string
	 */
	private $staticBlocks;

	/**
	 * @var string
	 */
	private $attributeSet;

	/**
	 * @var string
	 */
	private $productType;

	/**
	 * @var string
	 */
	private $productProductType;

	/**
	 * @var string
	 */
	private $productAttributesSku;

	/**
	 * @var string
	 */
	private $state;

	/**
	 * @var string
	 */
	private $district;

	/**
	 * @var string
	 */
	private $city;

	public function __construct()
	{
		parent::__construct();
		$this->admin = "sa_admin";
		$this->category = "sa_category";
		$this->product = "sa_products";
		$this->productImage = "sa_product_image";
		$this->usersProduct = "sa_users_products";
		$this->users = "sa_users";
		$this->categoryPages = "sa_category_pages";
		$this->pagesCategory = "sa_pages_category";
		$this->pages = "sa_pages";
		$this->services = "sa_services";
		$this->staticBlocks = "sa_static_blocks";
		$this->productCategory = "sa_product_category";
		$this->attributeSet = "sa_product_attributes_set";
		$this->productType = "sa_product_type";
		$this->productProductType = "sa_product_product_type";
		$this->productAttributesSku = "sa_product_attributes_sku";
		$this->state = "sa_state";
		$this->district = "sa_district";
		$this->city = "sa_city";
	}

	/**
	 * @param $email
	 * @param $password
	 * @return false | object
	 */
	public function checkLogin($email, $password)
	{
		$this->db->select(['id', 'name', 'email']);
		$this->db->from($this->admin);
		$this->db->where($this->admin . '.email', $email);
		$this->db->where($this->admin . '.password', md5($password));

		return $this->db->get()->row();
	}

	public function getCategories()
	{
		$this->db->select("*");
		$this->db->from($this->category);

		return $this->db->get()->result();
	}

	public function getCategoryPages()
	{
		$this->db->select("*");
		$this->db->from($this->categoryPages);

		return $this->db->get()->result();
	}

	public function checkModuleTable($module = "")
	{
		switch ($module) {
			case "product":
				$module = $this->product;
				break;
			case "pages":
				$module = $this->pages;
				break;
			case "category-pages":
				$module = $this->categoryPages;
				break;
			case "pages-category":
				$module = $this->pagesCategory;
				break;
			case "static-blocks":
				$module = $this->staticBlocks;
				break;
			case "product-category":
				$module = $this->productCategory;
				break;
			case "product-attributes-set":
				$module = $this->attributeSet;
				break;
			case "product-type":
				$module = $this->productType;
				break;
			case "users-products":
				$module = $this->usersProduct;
				break;
			case "product-product-type":
				$module = $this->productProductType;
				break;
			case "product-attributes-sku":
				$module = $this->productAttributesSku;
				break;
			case "product-image":
				$module = $this->productImage;
				break;
			default:
				$module = "sa_" . $module;
		}

		return $module;
	}

	public function changeStatus($module, $id)
	{
		$module = $this->checkModuleTable($module);
		if (!empty($module) && !empty($id)) {
			$this->db->select("status");
			$this->db->from($module);
			$this->db->where($module . '.id', $id);
			$data = $this->db->get()->row_array();
			$status = !empty($data['status']) ? 0 : 1;

			$this->db->set('status', $status);
			$this->db->where('id', $id);
			$this->db->update($module);
		}
	}

	public function delete($module, $id)
	{
		$module = $this->checkModuleTable($module);
		if (!empty($module) && !empty($id)) {
			;
			$this->db->where('id', $id);
			$this->db->delete($module);
		}
	}

	public function getCategoriesById($id = 0)
	{
		$this->db->select("*");
		$this->db->from($this->category);
		$this->db->where($this->category . '.id', $id);

		return $this->db->get()->row_array();
	}

	public function getModule($module = "")
	{
		$module = $this->checkModuleTable($module);
		$this->db->select("*");
		$this->db->from($module);

		return $this->db->get()->result();
	}

	public function getModuleById($module = "", $id = 0)
	{
		$module = $this->checkModuleTable($module);
		$this->db->select("*");
		$this->db->from($module);
		$this->db->where($module . '.id', $id);

		return $this->db->get()->row_array();
	}

	public function getModuleBycolumn($module = "", $column = [], $whereColumn = "", $id = 0)
	{
		$module = $this->checkModuleTable($module);
		$this->db->select($column);
		$this->db->from($module);
		$this->db->where($module . '.'.$whereColumn, $id);

		return $this->db->get()->result_array();
	}

	public function saveModule($module = '', $data = [])
	{
		$module = $this->checkModuleTable($module);
		$this->db->insert($module, $data);

		return $this->db->insert_id();
	}

	public function updateModule($module = '', $data = [])
	{
		$module = $this->checkModuleTable($module);
		$this->db->where('id', $data['id']);
		$this->db->update($module, $data);
	}

	public function updateModuleMapping($module = '', $id = 0, $data = [])
	{
		$module = $this->checkModuleTable($module);
		$this->db->insert($module, $data);
	}

	public function deleteModuleMapping($module = '', $column, $id = 0)
	{
		$module = $this->checkModuleTable($module);
		$this->db->where($column, $id);
		$this->db->delete($module);
	}

	public function getProducts()
	{
		$this->db->select($this->product . ".*, " . $this->productImage . ".image, " . $this->users . ".email, " . $this->usersProduct . ".users_id");
		$this->db->from($this->product);
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id AND ' . $this->productImage . '.is_main_image=1', "left");
		$this->db->join($this->usersProduct, $this->product . '.id = ' . $this->usersProduct . '.product_id', "left");
		$this->db->join($this->users, $this->usersProduct . '.users_id = ' . $this->users . '.id', "left");
		$this->db->group_by($this->product . ".id", "asc");

		return $this->db->get()->result();
	}

	public function assignProductToAttribute($productId, $qty, $attributeSetId)
	{
		$query = $this->db->query("SELECT ".$productId." as product_id, pav.id as product_attributes_value_id, 
		LOWER(CONCAT(pa.slug,'-',pav.name)) as sku, 0 as price, ".$qty." as quantity FROM 
		`sa_product_attributes_value` as pav 
		JOIN sa_product_attributes as pa ON pav.product_attributes_id = pa.id 
		JOIN sa_product_attributes_set as pas ON pa.attributes_set_id = pas.id 
		where pas.id = ".$attributeSetId);

		return $query->result();
	}

	function categoryTree($parentId = 0, &$subMark = '', $ids = [])
	{
		$query = $this->db->query("SELECT * FROM " . $this->category . " WHERE parent_id = $parentId ORDER BY title ASC");
		if ($query->num_rows() > 0) {
			$rows = $query->result();
			foreach ($rows as $row) {
				$isChecked = $this->md_in_array($ids, "category_id", $row->id) ? 'checked="checked"' : "";
				$subMark .= '<input '.$isChecked.' title="' . $row->title . '" parent_id="' . $parentId . '" type="checkbox" name="category[]" value="' . $row->id . '">' . '(' . $row->id . ') ' . $row->title . '<br>';
				$this->categoryTree($row->id, $subMark, $ids);
			}
		}

		return $subMark;
	}

	function pageCategoryTree($ids = [])
	{
		$subMark = '';
		$query = $this->db->query("SELECT * FROM " . $this->categoryPages);
		if ($query->num_rows() > 0) {
			$rows = $query->result();
			foreach ($rows as $row) {
				$isChecked = $this->md_in_array($ids, "pages_category_id", $row->id) ? 'checked="checked"' : "";
				$subMark .= '<input '.$isChecked.' type="checkbox" name="category[]" value="' . $row->id . '">' . ' (' . $row->id . ') ' . $row->name . '<br>';
			}
		}

		return $subMark;
	}

	function md_in_array($array, $key, $val) {
		foreach ($array as $item)
			if (isset($item[$key]) && $item[$key] == $val)
				return true;
		return false;
	}
}
