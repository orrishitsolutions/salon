<?php

class Productsmodel extends CI_Model
{

	/**
	 * @var string
	 */
	private $product;

	/**
	 * @var string
	 */
	private $category;

	/**
	 * @var string
	 */
	private $productCategory;

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
	private $productImage;

	/**
	 * @var string
	 */
	private $productAttributesSku;

	/**
	 * @var string
	 */
	private $productAttributesValue;

	/**
	 * @var string
	 */
	private $productAttributes;

	/**
	 * @var string
	 */
	private $usersAddress;

	public function __construct()
	{
		parent::__construct();
		$this->product = "ns_products";
		$this->category = "ns_category";
		$this->productCategory = "ns_product_category";
		$this->productImage = "ns_product_image";
		$this->usersProduct = "ns_users_products";
		$this->users = "ns_users";
		$this->productAttributesSku = "ns_product_attributes_sku";
		$this->productAttributesValue = "ns_product_attributes_value";
		$this->productAttributes = "ns_product_attributes";
		$this->usersAddress = "ns_users_address";
	}

	/**
	 * @param int $categoryId
	 * @return mixed
	 */
	public function getProductsByCategory($categoryId = 0)
	{
		$this->db->select($this->category . ".title as category_title, " . $this->product . ".title, " . $this->product . ".slug, " . $this->product . ".unique_id, " . $this->category . ".category_image, (SELECT " . $this->productImage . ".`image` from " . $this->productImage . " WHERE " . $this->productImage . ".`is_main_image` = 1 AND " . $this->productImage . ".`product_id`=`ns_products`.`id`) as image");
		$this->db->from($this->product);
		$this->db->join($this->productCategory, $this->productCategory . '.product_id = ' . $this->product . '.id', "inner");
		$this->db->join($this->category, $this->category . '.id = ' . $this->productCategory . '.category_id', "inner");
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id', "left");
		$this->db->where($this->category . '.id', $categoryId);
		//$this->db->where($this->productImage . '.is_main_image', 1);
		$this->db->where($this->product . '.status', 1);
		$this->db->group_by($this->product . '.id');

		return $this->db->get()->result();
	}


	public function getProductsByAttribute($categoryId = 0, $filter = "")
	{
		$filters = explode("&", $filter);
		$query = "SELECT $this->category.`title` as `category_title`, $this->product.`title`, $this->product.`slug`, $this->product.`unique_id`, $this->category.`category_image`, $this->productImage.`image` 
			FROM $this->productAttributes 
           INNER JOIN $this->productAttributesValue ON $this->productAttributes.`id` = $this->productAttributesValue.`product_attributes_id` 
           INNER JOIN $this->productAttributesSku ON $this->productAttributesValue.`id` = $this->productAttributesSku.`product_attributes_value_id` 
           INNER JOIN $this->product ON $this->productAttributesSku.`product_id` = $this->product.`id` 
           INNER JOIN $this->productCategory ON $this->productCategory.`product_id` = $this->product.`id` 
           INNER JOIN $this->category ON $this->category.`id` = $this->productCategory.`category_id` 
           LEFT JOIN $this->productImage ON $this->product.`id` = $this->productImage.`product_id` ";
		$query .= " WHERE ($this->category.id = $categoryId AND $this->product.status = 1) AND (";
		foreach ($filters as $val) {
			if (!empty($val)) {
				$attribute = substr($val, 0, strpos($val, "-"));
				$attributeValue = substr($val, strpos($val, "=") + 1);
				$query .= "($this->productAttributes.slug='" . $attribute . "' AND $this->productAttributesValue.name='" . $attributeValue . "') OR ";
			}
		}
		$query = substr($query, 0, strlen($query) - 4) . ") GROUP BY $this->product.id ORDER BY $this->product.title ASC";
		$query = $this->db->query($query);

		return $query->result();
	}

	/**
	 * @param int $categoryId
	 * @return mixed
	 */
	public function getAttributesByCategory($categoryId = 0)
	{
		$this->db->select($this->productAttributes . ".id, " . $this->productAttributes . ".slug, " . $this->productAttributes . ".name");
		$this->db->from($this->productAttributes);
		$this->db->join($this->productAttributesValue, $this->productAttributes . '.id = ' . $this->productAttributesValue . '.product_attributes_id', "inner");
		$this->db->join($this->productAttributesSku, $this->productAttributesValue . '.id = ' . $this->productAttributesSku . '.product_attributes_value_id', "inner");
		$this->db->join($this->product, $this->productAttributesSku . '.product_id = ' . $this->product . '.id', "inner");
		$this->db->join($this->productCategory, $this->productCategory . '.product_id = ' . $this->product . '.id', "inner");
		$this->db->join($this->category, $this->category . '.id = ' . $this->productCategory . '.category_id', "inner");
		$this->db->where($this->category . '.id', $categoryId);
		$this->db->where($this->product . '.status', 1);
		$this->db->group_by($this->productAttributes . ".name");
		$this->db->order_by($this->productAttributes . '.ordering', 'asc');

		return $this->db->get()->result();
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function getAttributesValueByAttributeId($id = 0)
	{
		$this->db->select($this->productAttributesValue . ".id, " . $this->productAttributesValue . ".name");
		$this->db->from($this->productAttributes);
		$this->db->join($this->productAttributesValue, $this->productAttributes . '.id = ' . $this->productAttributesValue . '.product_attributes_id', "inner");
		$this->db->join($this->productAttributesSku, $this->productAttributesValue . '.id = ' . $this->productAttributesSku . '.product_attributes_value_id', "inner");
		$this->db->where($this->productAttributesValue . '.product_attributes_id', $id);
		$this->db->group_by($this->productAttributesValue . ".name");
		$this->db->order_by($this->productAttributesValue . '.ordering', 'asc');

		return $this->db->get()->result();
	}

	/**
	 * @param string $slug
	 * @return mixed
	 */
	public function getProductBySlug($slug = "")
	{
		$this->db->select("*");
		$this->db->from($this->product);
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id', "left");
		$this->db->join($this->usersProduct, $this->product . '.id = ' . $this->usersProduct . '.product_id', "left");
		$this->db->join($this->users, $this->usersProduct . '.users_id = ' . $this->users . '.id', "left");
		$this->db->join($this->usersAddress, $this->users . '.id = ' . $this->usersAddress . '.users_id', "left");
		$this->db->where($this->product . '.slug', $slug);
		$this->db->where($this->product . '.status', 1);
		$this->db->group_by($this->product . '.id');

		return $this->db->get()->result();
	}

	/**
	 * @param string $slug
	 * @return mixed
	 */
	public function getProductByUniqueId($id = "")
	{
		$this->db->select("$this->product.*, `first_name`, `middle_name`, `last_name`, `registered_at`, `address`, `image`, `is_main_image`");
		$this->db->from($this->product);
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id', "left");
		$this->db->join($this->usersProduct, $this->product . '.id = ' . $this->usersProduct . '.product_id', "left");
		$this->db->join($this->users, $this->usersProduct . '.users_id = ' . $this->users . '.id', "left");
		$this->db->join($this->usersAddress, $this->users . '.id = ' . $this->usersAddress . '.users_id', "left");
		$this->db->where($this->product . '.unique_id', $id);
		$this->db->where($this->product . '.status', 1);
		$this->db->group_by($this->product . '.id');
		//echo $this->db->get_compiled_select();die;

		return $this->db->get()->result();
	}

	/**
	 * @param int $userId
	 * @return mixed
	 */
	public function getProductsByUser($userId = 0)
	{
		$this->db->select("*");
		$this->db->from($this->product);
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id', "left");
		$this->db->join($this->usersProduct, $this->product . '.id = ' . $this->usersProduct . '.product_id', "left");
		$this->db->join($this->users, $this->usersProduct . '.users_id = ' . $this->users . '.id', "left");
		$this->db->join($this->usersAddress, $this->users . '.id = ' . $this->usersAddress . '.users_id', "left");
		$this->db->where($this->users . '.id', $userId);
		$this->db->where($this->product . '.status', 1);
		$this->db->group_by($this->product . '.id');

		return $this->db->get()->result();
	}

	/**
	 * @param int $userId
	 * @return mixed
	 */
	public function getProductsCollectedByUser($userId = 0)
	{
		$this->db->select("*");
		$this->db->from($this->product);
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id', "left");
		$this->db->join($this->usersProduct, $this->product . '.id = ' . $this->usersProduct . '.product_id', "left");
		$this->db->join($this->users, $this->usersProduct . '.users_id = ' . $this->users . '.id', "left");
		$this->db->join($this->usersAddress, $this->users . '.id = ' . $this->usersAddress . '.users_id', "left");
		$this->db->where($this->product . '.collected_by', $userId);
		$this->db->where($this->product . '.status', 1);
		$this->db->group_by($this->product . '.id');

		return $this->db->get()->result();
	}


	public function getProductsByLocation($state = 0, $district = 0, $city = 0)
	{
		$this->db->select("$this->product.*, $this->productImage.image");
		$this->db->from($this->product);
		$this->db->join($this->productImage, $this->product . '.id = ' . $this->productImage . '.product_id', "left");
		$this->db->join($this->usersProduct, $this->product . '.id = ' . $this->usersProduct . '.product_id', "left");
		$this->db->join($this->users, $this->usersProduct . '.users_id = ' . $this->users . '.id', "left");
		$this->db->join($this->usersAddress, $this->users . '.id = ' . $this->usersAddress . '.users_id', "left");
		$this->db->where($this->product . '.state', $state);
		$this->db->where($this->product . '.district', $district);
		$this->db->where($this->product . '.city', $city);
		$this->db->where($this->product . '.status', 1);
		$this->db->where($this->product . '.collected_by', 0);
		$this->db->group_by($this->product . '.id');

		return $this->db->get()->result();
	}

	public function updateById($data = [])
	{
		$this->db->where('id', $data['id']);
		$this->db->update($this->product, $data);
	}

}
