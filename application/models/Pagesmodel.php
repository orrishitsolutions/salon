<?php

class Pagesmodel extends MY_Model
{

	/**
	 * @var string
	 */
	private $pages;

	/**
	 * @var string
	 */
	private $staticBlocks;

	/**
	 * @var string
	 */
	private $categoryPage;

	/**
	 * @var string
	 */
	private $pageCategory;

	public function __construct()
	{
		parent::__construct();
		$this->pages = "ns_pages";
		$this->blog = "ns_blog";
		$this->categoryPage = "ns_category_pages";
		$this->pageCategory = "ns_pages_category";
		$this->staticBlocks = "ns_static_blocks";
	}

	/**
	 * @param string $slug
	 * @param array $data
	 * @param int $isHome
	 * @return array|mixed|string|string[]
	 */
	public function getPageBySlug($slug = "", $data = [], $isHome = 0)
	{
		$this->db->select("*");
		$this->db->from($this->pages);
		if (!empty($slug)) {
			$this->db->where($this->pages . '.slug', $slug);
		}
		if (!empty($isHome)) {
			$this->db->where($this->pages . '.is_home', 1);
		}
		$this->db->where($this->pages . '.status', 1);
		$result = $this->db->get()->row();

		if (!empty($result) && $isHome) {
			return $this->pageContent($result->content, $data);
		} else {
			return $result;
		}
	}

	public function getPageByBlogSlug($slug = "", $data = [], $isHome = 0)
	{
		$this->db->select("*");
		$this->db->from($this->blog);
		if (!empty($slug)) {
			$this->db->where($this->blog . '.slug', $slug);
		}
		if (!empty($isHome)) {
			$this->db->where($this->ibase_blob_get(blob_handle, len) . '.is_home', 1);
		}
		$this->db->where($this->blog . '.status', 1);
		
		$result = $this->db->get()->row();
		if (!empty($result) && $isHome) {
			return $this->pageContent($result->content, $data);
		} else {
			return $result;
		}
	}

	/**
	 * @param string $string
	 * @return string
	 */
	public function removeSpecialChar($string = "")
	{
		$string = str_replace('block block_id=', "", $string);
		$string = str_replace('"', "", $string);
		$string = str_replace("'", "", $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));

		return $string;
	}

	/**
	 * @param string $string
	 * @return string
	 */
	public function findSiteUrl($string = "")
	{
		$string = str_replace('store url=', "", $string);
		$string = str_replace('"', "", $string);
		$string = str_replace("'", "", $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));

		return $string;
	}

	/**
	 * @param string $blockId
	 * @return mixed
	 */
	public function staticBlockByBlockId($blockId = "")
	{
		$this->db->select(['content'])->from($this->staticBlocks);
		$this->db->or_where("block_id", $blockId);
		$query = $this->db->get();

		return $query->row();
	}

	/**
	 * @param string $blockId
	 * @param string $type
	 * @return mixed
	 */
	function showCategoryByStaticBlockId($blockId = "", $type = "")
	{
		$content = $this->staticBlockByBlockId($blockId);
		$content = !empty($content->content) ? $content->content : "";
		$content = str_replace($type . "-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $val) {
			$categoryIds = explode(",", $val);
		}

		return $this->allCategoryByIds($categoryIds);
	}

	/**
	 * @param string $content
	 * @param array $data
	 * @return array|mixed|string|string[]
	 */
	function pageContent($content = "", $data = [])
	{
		$mainContent = $content;
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$i = 0;
		//echo "<pre>";print_r($matches);die;
		foreach ($matches[1] as $val) {
			$this->db->select(['content'])->from($this->staticBlocks);
			$val = $this->removeSpecialChar($val);
			$this->db->or_where("block_id", $val);
			$query = $this->db->get()->row();
			$replace = "";
			if (!empty($query)) {
				if (strpos($query->content, 'carousel') !== false) {
					$replace = $this->createCarousel($query->content);
				}
				if (strpos($query->content, 'big-carousel') !== false) {
					$replace = $this->createBigCarousel($query->content);
				}
				if (strpos($query->content, 'toggletabs') !== false) {
					$replace = $this->toggleTabs($query->content);
				}
				if (strpos($query->content, 'categories-bigbox') !== false) {
					$replace = $this->bigCategory($query->content);
				}
				if (strpos($query->content, 'categories-deals') !== false) {
					$replace = $this->categoryDeals($query->content);
				}
				if (strpos($query->content, 'categories-box') !== false) {
					$replace = $this->categoriesBox($query->content);
				}
				if (strpos($query->content, 'enquiry-form') !== false) {
					$replace = $this->enquiryForm($query->content, $data);
				}
				$mainContent = str_replace($matches[0][$i], $replace, $mainContent);
			} else {
				if (strpos($content, 'store url') !== false) {
					$siteUrl = base_url($this->findSiteUrl($val));
					$replace = $siteUrl;
				}
				$mainContent = str_replace($matches[0][$i], $replace, $mainContent);
			}
			$i++;
		}

		return $mainContent;
	}

	/**
	 * @param string $content
	 * @param array $data
	 * @return string
	 */
	public function enquiryForm($content = "", $data = [])
	{
		$formName = "enquiry-form";

		$messageInput = [
			'type' => 'text',
			'class' => 'form',
			'name' => 'message',
			'placeholder' => 'What are You Looking for... ',
			'value' => !empty($data['quotation']['message']) ? $data['quotation']['message'] : ""
		];
		$quantityInput = [
			'type' => 'text',
			'class' => 'piece-quantity',
			'name' => 'quantity',
			'placeholder' => 'Quantity',
			'value' => !empty($data['quotation']['quantity']) ? $data['quotation']['quantity'] : ""
		];
		$pieceInput = [
			'type' => 'text',
			'class' => 'piece-quantity',
			'name' => 'piece',
			'placeholder' => 'Piece/pieces',
			'value' => !empty($data['quotation']['piece']) ? $data['quotation']['piece'] : ""
		];
		$submitInput = [
			'class' => 'btn req-quot-btn',
			'type' => 'submit',
			'value' => 'Request For Quotation'
		];
		$str = form_open('enquiry', '');
		$error = !empty($data['quotation']['error']) ? $data['quotation']['error'] . '<script> $("html, body").animate({ scrollTop: $("#quotation").offset().top }, 1000); </script>' : "";
		$success = !empty($data['quotation']['success']) ? $data['quotation']['success'] . '<script> $("html, body").animate({ scrollTop: $("#quotation").offset().top }, 1000); </script>' : "";
		$str .= '<div class="row">' . $error . $success . '</div>';
		$str .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding-left:0px;">';
		$str .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">' . validation_errors() . '</div>';
		$str .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">' . form_input($messageInput) . '</div>';
		$str .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">' . form_input($quantityInput) . '</div>';
		$str .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">' . form_input($pieceInput) . '</div>';
		$str .= '</div>';
		$str .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding-left: 0">' . form_input($submitInput) . '</div>';
		$str .= form_close();
		$content = str_replace('{{' . $formName . '}}', $str, $content);

		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	public function categoriesBox($content = "")
	{
		$content = str_replace("categories-box-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $matchVal) {
			$categoryIds = explode(",", $matchVal);

			$categories = $this->allCategoryByIds($categoryIds);
			$str = '<div class="row ">';
			foreach ($categories as $val) {
				$str .= '<div class="col-lg-5c col-md-5c col-sm-5c col-xs-12 mt-3"><div class="box-colams clothe1"><img src="' . base_url($val->category_image) . '"><div class="text-center "><h5>' . $val->title . '</h5><a href="' . base_url("category/" . $val->slug) . '" class="btn clothe-btn ">view more</a></div></div></div>';
			}
			$str .= '</div>';
			$content = str_replace('{{' . $matchVal . '}}', $str, $content);
		}

		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	public function categoryDeals($content = "")
	{
		$content = str_replace("categories-deals-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $matchVal) {
			$categoryIds = explode(",", $matchVal);
			$categories = $this->allCategoryByIds($categoryIds);
			$str = '<div class="row ">';
			foreach ($categories as $val) {
				$str .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class=" col-img-mid cll cll1 "><img class="img-responsive " src="' . base_url($val->category_image) . '" alt="bbookk.jpg "><div><a href="' . base_url("category/" . $val->slug) . '"><p class="price text-center ">' . $val->title . '</p><a href="' . base_url("category/" . $val->slug) . '" class="btn clothe-btn " style="  margin: 10px auto 0px; display: block;">view more</a></a></div></div></div>';
			}
			$str .= '</div>';
			$content = str_replace('{{' . $matchVal . '}}', $str, $content);
		}

		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	public function bigCategory($content = "")
	{
		$content = str_replace("categories-bigbox-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $matchVal) {
			$categoryIds = explode(",", $matchVal);

			$categories = $this->allCategoryByIds($categoryIds);
			$id = $this->generateRandomString(6);
			$str = '<div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 "><div class="row " >';
			foreach ($categories as $val) {
				$str .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-3"><div class=" category "><div class=" common-view-3 "><h4 class="headings45">Categories</h4><p class="pros1pre ">' . $val->title . '</p><a href="' . base_url("category/" . $val->slug) . '" class="btn clothe-btn ">view more</a></div><div class=" category-img "><img class="img-responsive " src="' . base_url($val->category_image) . '"></div></div></div>';
			}
			$str .= '</div></div>';
			$content = str_replace('{{' . $matchVal . '}}', $str, $content);
		}

		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	public function createCarousel($content = "")
	{
		$content = str_replace("carousel-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $matchVal) {
			$categoryIds = explode(",", $matchVal);

			$categories = $this->allCategoryByIds($categoryIds);
			$id = $this->generateRandomString(6);
			$str = '<ul id="' . $id . '" class="owl-carousel">';
			foreach ($categories as $val) {
				$str .= '<li><a href="' . base_url("category/" . $val->slug) . '">' . '<img src="' . base_url($val->banner_part_image) . '" alt=""><p>' . $val->title . '</p></a></li>';
			}
			$str .= '</ul>';
			$str .= '<script>$("#' . $id . '").owlCarousel({ loop:true, autoplay:false, margin:20, dots:false, nav:false, responsive:{ 0:{ items:1 }, 600:{ items:3 }, 1000:{ items:8 } } });</script>';
			$content = str_replace('{{' . $matchVal . '}}', $str, $content);
		}

		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	public function createBigCarousel($content = "")
	{
		$content = str_replace("big-carousel-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $matchVal) {
			$categoryIds = explode(",", $matchVal);

			$categories = $this->allCategoryByIds($categoryIds);
			$id = $this->generateRandomString(6);
			$str = '<div id="' . $id . '" class="owl-carousel owl-theme">';
			foreach ($categories as $val) {
				$str .= '<div class="item"><div class="asdfg"><div class="box-colams clothe1"><img src="' . base_url($val->category_image) . '"><div class="text-center "><h5>' . $val->title . '</h5><a href="' . base_url("category/" . $val->slug) . '" class="btn clothe-btn ">view more</a></div></div></div></div>';
			}
			$str .= '</div>';
			$str .= '<style>#' . $id . ' .box-colams.clothe1 img { height: 300px; }</style>';
			$str .= '<script>$("#' . $id . '").owlCarousel({ loop:true, autoplay:false, margin:20, dots:false, nav:false, responsive:{ 0:{ items:1 }, 600:{ items:3 }, 1000:{ items:4 } } });</script>';
			$content = str_replace('{{' . $matchVal . '}}', $str, $content);
		}

		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	public function toggleTabs($content = "")
	{
		$content = str_replace("toggletabs-", "", $content);
		$regex = "/\{{([^}]+)\}}/";
		preg_match_all($regex, $content, $matches);
		$categoryIds = [];
		foreach ($matches[1] as $matchVal) {
			$categoryIds = explode(",", $matchVal);

			$id = $this->generateRandomString(6);
			$i = 0;
			$str = '<div class="mb-8000"><div class="position-relative position-md-static px-md-6"><ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">';
			foreach ($categoryIds as $valTab) {
				$category = $this->categoryById($valTab);
				$activeClass = ($i == 0) ? 'active' : "";
				$str .= '<li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2"><a class="nav-link ' . $activeClass . '" id="' . $id . $i . '-tab" data-toggle="pill" href="#' . $id . $i . '" role="tab" aria-controls="' . $id . $i . '" aria-selected="true">' . $category->title . '</a></li>';
				$i++;
			}
			$str .= '</ul></div><div class="borders-radius-17"><div class="tab-content" id="Jpills-tabContent">';
			$i = 0;
			foreach ($categoryIds as $valDesc) {
				$category = $this->categoryById($valDesc);
				$activeClass = ($i == 0) ? 'active show' : "";
				$str .= '<div class="tab-pane fade ' . $activeClass . '" id="' . $id . $i . '" role="tabpanel" aria-labelledby="' . $id . $i . '-tab"><div class="panels"><div class="row "><div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 "><div class="product"><img class="img-responsive " src="' . base_url('assets/frontend/img/backgroundbanners23.png') . '"><div class="text-center partlefts"><h4 class="headings45">' . $category->tabs_text . '</h4><img src="' . base_url($category->tabs_image) . '"></div></div></div><div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 "><div class="row " >';
				$subCategories = $this->getCategoriesByParent($valDesc);
				foreach ($subCategories as $subVal) {
					$str .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12  mt-3"><div class="box-colams clothe1"><img src="' . base_url($subVal->category_image) . '"><div class="text-center "><h5>' . $subVal->title . '</h5><a href="' . base_url('category/' . $subVal->slug) . '" class="btn clothe-btn " style="margin: 10px 0px;">view more</a></div></div></div>';
				}
				$str .= '</div></div>';
				$str .= '</div></div></div>';
				$i++;
			}
			$str .= '</div></div></div>';
			$content = str_replace('{{' . $matchVal . '}}', $str, $content);
		}

		return $content;
	}



	/**
	 * @return mixed
	 */
	function pageCategory()
	{
		$this->db->select(['id', 'name']);
		$this->db->from($this->categoryPage);
		$this->db->where($this->categoryPage . '.status', 1);
		$this->db->where($this->categoryPage . '.name!=', 'blog'); //modifyed code by Abhay
		$result = $this->db->get()->result();

		return $result;
	}

	/**
	 * @param int $categoryId
	 * @return mixed
	 */
	function getPagesByCategoryId($categoryId = 0)
	{
		$this->db->select($this->pages . ".title, " . $this->pages . ".slug, " . $this->pages . ".menu_icon_image");
		$this->db->from($this->pages);
		$this->db->join($this->pageCategory, $this->pageCategory . '.pages_id = ' . $this->pages . '.id', "inner");
		$this->db->join($this->categoryPage, $this->categoryPage . '.id = ' . $this->pageCategory . '.pages_category_id', "inner");
		$this->db->where($this->categoryPage . '.id', $categoryId);
		$this->db->where($this->pages . '.status', 1);

		return $this->db->get()->result();
	}
}
