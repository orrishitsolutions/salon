<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Categoriesmodel"); //
		$this->load->model("Pagesmodel"); //
	}

	public function index()
	{
		$slug = $this->uri->segment(2);
		$this->load->model("Categoriesmodel", "subcategory");
		$category = $this->subcategory->getCategoryBySlug($slug);
		$parentId = !empty($category->id) ? $category->id : 0;
		$subCategory = !empty($parentId) ? $this->subcategory->getCategory($parentId) : "";
		$this->load->model("Productsmodel", "products");
		$qs = $this->input->server('QUERY_STRING');
		$products = !empty($category->id) ? (!empty($qs) ? $this->products->getProductsByAttribute($category->id, $this->input->server('QUERY_STRING')) : $this->products->getProductsByCategory($category->id)) : [];
		$attributes = !empty($category->id) ? $this->products->getAttributesByCategory($category->id) : [];
		$filter = [];
		$i = 0;
		foreach ($attributes as $val) {
			$filter[$i]['id'] = $val->id;
			$filter[$i]['name'] = $val->name;
			$filter[$i]['slug'] = $val->slug;
			$filter[$i]['attributes'] = $this->products->getAttributesValueByAttributeId($val->id);
			$i++;
		}
		$leftNavigation = $this->category->categoryTreeByColumn(['parent_id' => 0]);

		$this->load->view(
			'website/category',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"category" => $category,
				"subCategory" => $subCategory,
				"products" => $products,
				"leftNavigation" => $leftNavigation,
				"filter" => $filter
			]
		);
	}


}
