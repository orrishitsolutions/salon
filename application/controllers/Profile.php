<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
	/**
	 * @var array
	 */
	public $profile;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Categoriesmodel"); //
		$this->load->model("Pagesmodel"); //
		$this->load->model("Signupmodel", "login");
		$this->load->library(['form_validation']);
		$methodName = $this->router->fetch_method();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('login'));
		}
		$this->currentUser = $this->session->userdata();
		$this->profile = (array)$this->login->getUserById($this->currentUser['id']);
	}

	public function index()
	{
		$this->load->model("Productsmodel", "product");
		$donatedProducts = $this->product->getProductsByUser($this->currentUser['id']);
		$collectedProducts = $this->product->getProductsCollectedByUser($this->currentUser['id']);

		$this->load->view(
			'website/profile',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"login" => $this->profile,
				"donatedProducts" => $donatedProducts,
				"collectedProducts" => $collectedProducts
			]
		);
	}

	public function volunteer()
	{
		$this->form_validation->set_error_delimiters('<div style="width: 100%" class="alert alert-danger"><strong>Danger!</strong> ', '</div><br/>');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$inputs = [
			'name',
			'mobile',
			'email'
		];
		$post = $this->input->post($inputs);
		$data['volunteer'] = $post;
		$load = 0;
		if ($this->form_validation->run() == FALSE) {
			$load = 1;
			$data['volunteer']['error'] = validation_errors();
		} else {
			$parts = explode(' ', $data['volunteer']['name']);
			unset($data['volunteer']['name']);
			$data['volunteer']['password'] = $this->generateRandomString(8);
			$data['volunteer']['user_type'] = 4;
			$data['volunteer']['first_name'] = array_shift($parts);
			$data['volunteer']['last_name'] = array_pop($parts);
			$data['volunteer']['middle_name'] = trim(implode(' ', $parts));
			try {
				$this->login->saveData($data['volunteer']);
				$dbError = $this->db->error();
				if (!empty($dbError['message'])) {
					$data['volunteer']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
				}
			} catch (\Exception $e) {
				$data['volunteer']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
			}
		}
		if (!empty($data['volunteer']['error']) xor $load) {
			$data['volunteer']['users'] = $this->login->getUserByParentUser($this->profile['id']);
			$this->load->view(
				'website/volunteer',
				[
					"topHeader" => $this->topHeader,
					"topNavigationCategories" => $this->topNavigation, //
					"controller" => $this, //
					"volunteer" => $data['volunteer']
				]
			);
		} else {
			$this->session->set_flashdata('success', '<div style="width: 100%" class="alert alert-success"><strong>Success!</strong> Volunteer created successfully.</div>');
			redirect(base_url('profile/volunteer'));
		}
	}

	public function edit()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div><br/>');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$inputs = [
			'name',
			'intro',
			'mobile',
			'email'
		];
		$post = $this->input->post($inputs);
		$data['login'] = $post;
		if ($this->form_validation->run() == FALSE) {
			$data['login']['error'] = validation_errors();
			$this->load->view(
				'website/profile-edit',
				[
					"topHeader" => $this->topHeader,
					"topNavigationCategories" => $this->topNavigation, //
					"controller" => $this, //
					"login" => !empty($data['login']['email']) ? $data['login'] : $this->profile
				]
			);
		} else {
			$parts = explode(' ', $data['login']['name']);
			unset($data['login']['name']);
			$data['login']['first_name'] = array_shift($parts);
			$data['login']['last_name'] = array_pop($parts);
			$data['login']['middle_name'] = trim(implode(' ', $parts));
			$data['login']['id'] = $this->profile['id'];
			$this->login->updateData($data['login']);
			$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Your profile has been updated.</div>');
			redirect(base_url('profile'));
		}
	}

	public function donate()
	{
		if ($this->profile['user_type'] != 2) {
			redirect(base_url('profile'));
		}

		//
		$this->load->model("admin/Adminmodel", 'admin');
		$param = "";
		$this->form_validation->set_error_delimiters('<div style="width: 100%" class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('product_type_id', 'Type Name', 'trim|required');
		$this->form_validation->set_rules('users_id', 'Users', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		//$this->form_validation->set_rules('sku', 'sku', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$addPage = "add-products";
		$page = "products";

		$inputs = [
			'category',
			'product_type_id',
			'attributes_set_id',
			'users_id',
			'title',
			'meta_title',
			'meta_keyword',
			'meta_description',
			'slug',
			'sku',
			'quantity',
			'content',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['data'] = $post;
		if (!empty($param)) {
			$data['data'] = $this->admin->getModuleById($page, $param);
			$data['data']['param'] = $param;
			$data['data']['category'] = $this->admin->getModuleBycolumn("product-category", ["category_id"], "product_id", $param);
		}
		$data['data']['users'] = $this->admin->getModule("users");
		$data['data']['attribute_set'] = $this->admin->getModule("product-attributes-set");
		$data['data']['product_type'] = $this->admin->getModule("product-type");
		$data['controller'] = $this;

		$data['topHeader'] = $this->topHeader;
		$data['topNavigationCategories'] = $this->topNavigation;
		$data['login'] = $this->profile;

		$data['attributeSet'] = $this->admin->getModule("product-attributes-set");
		$data['productType'] = $this->admin->getModule("product-type");
		$this->load->model("Locationmodel", "location");
		$data['state'] = $state = $this->location->getModule($this->location->state);

		if ($this->form_validation->run() == FALSE) {
			$data['data']['error'] = validation_errors();
			$data['data']['success'] = $this->session->flashdata('success');
			$this->load->view('website/donate', $data);
		} else {
			$post['slug'] = $this->slugify($post['title']);
			$post['meta_title'] = $post['title'];
			$post['meta_keyword'] = $post['title'];
			$post['meta_description'] = $post['title'];
			$post['sku'] = md5($this->generateRandomString(10) . time());
			$post['status'] = 1;
			if (!empty($_FILES['menu_icon_image']['name'])) {
				$image = $this->upload("menu_icon_image");
				$post['menu_icon_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['banner_image']['name'])) {
				$image = $this->upload("banner_image");
				$post['banner_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['side_image']['name'])) {
				$image = $this->upload("side_image");
				$post['side_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error'])) {
				try {
					$categoryPage['category'] = $post['category'];
					unset($post['category']);
					unset($post['users']);
					unset($post['attribute_set']);
					unset($post['product_type']);
					if (!empty($param)) {
						$post['id'] = $param;
						$post['unique_id'] = md5($param . $post['users_id']);
						$update = $this->admin->updateModule($page, $post);
					} else {
						$insert = $this->admin->saveModule($page, $post);
					}
					$dbError = $this->db->error();
					if (!empty($dbError['message'])) {
						$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
					} else {
						$mapId = !empty($param) ? $param : $insert;
						if (!empty($mapId)) {
							$update['id'] = $mapId;
							$update['unique_id'] = md5($insert . $post['users_id']);
							$this->admin->updateModule($page, $update);
							$files = $_FILES;
							if (!empty($files['file']['name'])) {
								for ($i = 0; $i < count($files['file']['name']); $i++) {
									$_FILES = array();
									foreach ($files['file'] as $k => $v) {
										$_FILES['file'][$k] = $v[$i];
									}
									$image = $this->upload("file");
									$productImage['is_main_image'] = ($i == 0) ? 1 : 0;
									$productImage['product_id'] = $insert;
									$productImage['image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
									$imageModule = $this->admin->productImage;
									$this->admin->saveModule('product-image', $productImage);
									$dbError = $this->db->error();
									if (!empty($dbError['message'])) {
										$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
									}
								}
							}
						}
						$arr = [];
						$this->admin->deleteModuleMapping("product-category", "product_id", $mapId);
						$this->admin->deleteModuleMapping("users-products", "product_id", $mapId);
						$this->admin->deleteModuleMapping("product-product-type", "product_id", $mapId);
						$this->admin->deleteModuleMapping("product-attributes-sku", "product_id", $mapId);
						foreach ($categoryPage['category'] as $cVal) {
							$arr['product_id'] = $mapId;
							$arr['category_id'] = $cVal;
							$this->admin->updateModuleMapping("product-category", $mapId, $arr);
						}
						$userArr['product_id'] = $mapId;
						$userArr['users_id'] = $data['data']['users_id'];
						$this->admin->updateModuleMapping("users-products", $mapId, $userArr);
						$productTypeMapping['product_id'] = $mapId;
						$productTypeMapping['product_type_id'] = $data['data']['product_type_id'];
						$this->admin->updateModuleMapping("product-product-type", $mapId, $productTypeMapping);
						if ($data['data']['product_type_id'] == 2) {
							$productId = $mapId;
							$qty = $post['quantity'];
							$attributeSetId = $data['data']['attributes_set_id'];
							$productToAttribute = $this->admin->assignProductToAttribute($productId, $qty, $attributeSetId);
							foreach ($productToAttribute as $ptaVal) {
								$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['data']['slug'])));
								$ptaMapping['product_id'] = $productId;
								$ptaMapping['product_attributes_value_id'] = $ptaVal->product_attributes_value_id;
								$ptaMapping['sku'] = $ptaVal->sku . "-" . $slug;
								$ptaMapping['price'] = $ptaVal->price;
								$ptaMapping['quantity'] = $ptaVal->quantity;
								$this->admin->updateModuleMapping("product-attributes-sku", $productId, $ptaMapping);
							}
						}
					}
				} catch (\Exception $e) {
					$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
				}
			} else {
				$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $image['error'] . '</div>';
			}
			//echo "<pre>";print_r($data);die;
			if ($data['data']['error']) {
				$this->load->view("website/donate", $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> You\'ve successfully donated a products, thanks for your contribution.</div>');
				redirect(base_url('profile/donate'));
			}
		}

	}


	public function collect()
	{
		if ($this->profile['user_type'] != 1) {
			redirect(base_url('profile'));
		}
		$this->load->model("admin/Adminmodel", 'admin');
		$this->load->model("Locationmodel", "location");
		$state = $this->location->getModule($this->location->state);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div><br/>');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$inputs = [
			'name',
			'intro',
			'mobile',
			'email'
		];
		$post = $this->input->post($inputs);
		$data['login'] = $post;
		$profile['attributeSet'] = $this->admin->getModule("product-attributes-set");
		$profile['productType'] = $this->admin->getModule("product-type");
		$profile['state'] = $state;
		if ($this->form_validation->run() == FALSE) {
			$data['login']['error'] = validation_errors();
			$profile['topHeader'] = $this->topHeader;
			$profile['topNavigationCategories'] = $this->topNavigation;
			$profile['controller'] = $this;
			$profile['login'] = !empty($data['login']['email']) ? $data['login'] : $this->profile;
			$this->load->view('website/collect', $profile);
		} else {
			$parts = explode(' ', $data['login']['name']);
			unset($data['login']['name']);
			$data['login']['first_name'] = array_shift($parts);
			$data['login']['last_name'] = array_pop($parts);
			$data['login']['middle_name'] = trim(implode(' ', $parts));
			$data['login']['id'] = $this->profile['id'];
			$this->login->updateData($data['login']);
			$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Your profile has been updated.</div>');
			redirect(base_url('profile'));
		}
	}

	public function district()
	{
		if (!$this->input->is_ajax_request()) {
			die('No direct script access allowed');
		}
		$this->load->model("Locationmodel", "location");
		$inputs = [
			'state'
		];
		$post = $this->input->post($inputs);
		$state = $this->location->getModuleBycolumn($this->location->district, "state_id", $post['state']);
		$result = '<select class="form-control" name="district" id="district"><option value="">------Select District------</option>';
		foreach ($state as $val) {
			$result .= '<option value="' . $val['districtid'] . '">' . $val['district_title'] . '</option>';
		}
		$result .= '</select>';
		$data['result'] = $result;
		$data['csrfHash'] = $this->security->get_csrf_hash();

		echo json_encode($data);
	}

	public function city()
	{
		if (!$this->input->is_ajax_request()) {
			die('No direct script access allowed');
		}
		$this->load->model("Locationmodel", "location");
		$inputs = [
			'district'
		];
		$post = $this->input->post($inputs);
		$city = $this->location->getModuleBycolumn($this->location->city, "districtid", $post['district']);
		$result = '<select class="form-control" name="city" id="city"><option value="">------Select City------</option>';
		foreach ($city as $val) {
			$result .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
		}
		$result .= '</select>';
		$data['result'] = $result;
		$data['csrfHash'] = $this->security->get_csrf_hash();

		echo json_encode($data);
	}

	public function show_product()
	{
		if (!$this->input->is_ajax_request()) {
			die('No direct script access allowed');
		}
		$this->load->model("Productsmodel", "product");
		$inputs = [
			'state',
			'district',
			'city'
		];
		$post = $this->input->post($inputs);
		$products = $this->product->getProductsByLocation($post['state'], $post['district'], $post['city']);
		$result = [];
		$i = 0;
		foreach ($products as $val) {
			$product['id'] = $val->id;
			$product['unique_id'] = $val->unique_id;
			$product['title'] = $val->title;
			$product['slug'] = $val->slug;
			$product['image'] = !empty($val->image) ? base_url($val->image) : base_url('assets/frontend/upload/images/no-image.jpg');
			$result[$i] = $product;
			$i++;
		}
		$data['result'] = $result;
		$data['csrfHash'] = $this->security->get_csrf_hash();

		echo json_encode($data);
	}

	public function collect_product()
	{
		if (!$this->input->is_ajax_request()) {
			die('No direct script access allowed');
		}
		$this->load->model("Productsmodel", "product");
		$inputs = [
			'id'
		];
		$post = $this->input->post($inputs);
		$post['collected_by'] = $this->profile['id'];
		$this->product->updateById($post);
		$data['csrfHash'] = $this->security->get_csrf_hash();

		echo json_encode($data);
	}

	public function chat()
	{
		$toUserId = $this->uri->segment(3);
		$productId = $this->uri->segment(4);
		$toUserId = !empty($toUserId) ? base64_decode(hex2bin($toUserId)) : 0;
		$productId = !empty($productId) ? base64_decode(hex2bin($productId)) : 0;

		$this->load->model("Productsmodel", "product");
		$this->load->model("Messagemodel", "chat");
		$chatUsers = ($this->currentUser['user_type'] == 2) ? $this->chat->donorChatUsers($this->currentUser['id'], 1) : $this->chat->chatUsers($this->currentUser['id'], 1);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		$inputs = [
			'message'
		];
		$post = $this->input->post($inputs);
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
		} else {
			if (!empty($productId) && !empty($toUserId) && !empty($this->profile['id'])) {
				$post['product_id'] = $productId;
				$post['from_users_id'] = $this->profile['id'];
				$post['to_users_id'] = $toUserId;
				$insert = $this->chat->save($post);
			}
		}
		$messages = (!empty($toUserId) && !empty($productId)) ? $this->chat->donorChatUsers($this->currentUser['id'], 0, $toUserId, $productId) : [];

		$this->load->view(
			'website/chat',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"login" => $this->profile,
				"chatUsers" => $chatUsers,
				"messages" => $messages
			]
		);
	}

	/**
	 * @param $datetime
	 * @param false $full
	 * @return string
	 * @throws Exception
	 */
	function time_elapsed_string($datetime, $full = false)
	{
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	public function add_products()
	{
		$this->load->model("admin/Adminmodel", 'admin');
		$param = "add-products";
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('product_type_id', 'Type Name', 'trim|required');
		$this->form_validation->set_rules('users_id', 'Users', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('sku', 'sku', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$addPage = "add-products";
		$page = "products";

		$inputs = [
			'category',
			'product_type_id',
			'attributes_set_id',
			'users_id',
			'title',
			'meta_title',
			'meta_keyword',
			'meta_description',
			'slug',
			'sku',
			'quantity',
			'content',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['data'] = $post;
		if (!empty($param)) {
			$data['data'] = $this->admin->getModuleById($page, $param);
			$data['data']['param'] = $param;
			$data['data']['category'] = $this->admin->getModuleBycolumn("product-category", ["category_id"], "product_id", $param);
		}
		$data['data']['users'] = $this->admin->getModule("users");
		$data['data']['attribute_set'] = $this->admin->getModule("product-attributes-set");
		$data['data']['product_type'] = $this->admin->getModule("product-type");
		$data['controller'] = $this;
		if ($this->form_validation->run() == FALSE) {
			$data['data']['error'] = validation_errors();
			$data['data']['success'] = $this->session->flashdata('success');
			$this->load->view('website/donate', $data);
		} else {
			$post['slug'] = $this->slugify($post['title']);
			if (!empty($_FILES['menu_icon_image']['name'])) {
				$image = $this->upload("menu_icon_image");
				$post['menu_icon_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['banner_image']['name'])) {
				$image = $this->upload("banner_image");
				$post['banner_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['side_image']['name'])) {
				$image = $this->upload("side_image");
				$post['side_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error'])) {
				try {
					$categoryPage['category'] = $post['category'];
					unset($post['category']);
					unset($post['users']);
					unset($post['attribute_set']);
					unset($post['product_type']);
					if (!empty($param)) {
						$post['id'] = $param;
						$post['unique_id'] = md5($param . $post['users_id']);
						$update = $this->admin->updateModule($page, $post);
					} else {
						$insert = $this->admin->saveModule($page, $post);
					}
					$dbError = $this->db->error();
					if (!empty($dbError['message'])) {
						$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
					} else {
						$mapId = !empty($param) ? $param : $insert;
						if (!empty($mapId)) {
							$update['id'] = $mapId;
							$update['unique_id'] = md5($insert . $post['users_id']);
							$this->admin->updateModule($page, $update);
						}
						$arr = [];
						$this->admin->deleteModuleMapping("product-category", "product_id", $mapId);
						$this->admin->deleteModuleMapping("users-products", "product_id", $mapId);
						$this->admin->deleteModuleMapping("product-product-type", "product_id", $mapId);
						$this->admin->deleteModuleMapping("product-attributes-sku", "product_id", $mapId);
						foreach ($categoryPage['category'] as $cVal) {
							$arr['product_id'] = $mapId;
							$arr['category_id'] = $cVal;
							$this->admin->updateModuleMapping("product-category", $mapId, $arr);
						}
						$userArr['product_id'] = $mapId;
						$userArr['users_id'] = $data['data']['users_id'];
						$this->admin->updateModuleMapping("users-products", $mapId, $userArr);
						$productTypeMapping['product_id'] = $mapId;
						$productTypeMapping['product_type_id'] = $data['data']['product_type_id'];
						$this->admin->updateModuleMapping("product-product-type", $mapId, $productTypeMapping);
						if ($data['data']['product_type_id'] == 2) {
							$productId = $mapId;
							$qty = $post['quantity'];
							$attributeSetId = $data['data']['attributes_set_id'];
							$productToAttribute = $this->admin->assignProductToAttribute($productId, $qty, $attributeSetId);
							foreach ($productToAttribute as $ptaVal) {
								$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['data']['slug'])));
								$ptaMapping['product_id'] = $productId;
								$ptaMapping['product_attributes_value_id'] = $ptaVal->product_attributes_value_id;
								$ptaMapping['sku'] = $ptaVal->sku . "-" . $slug;
								$ptaMapping['price'] = $ptaVal->price;
								$ptaMapping['quantity'] = $ptaVal->quantity;
								$this->admin->updateModuleMapping("product-attributes-sku", $productId, $ptaMapping);
							}
						}
					}
				} catch (\Exception $e) {
					$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
				}
			} else {
				$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $image['error'] . '</div>';
			}
			if ($data['data']['error']) {
				$this->load->view("website/donate", $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> You\'ve successfully donated a products, thanks for your contribution.</div>');
				redirect(base_url('profile/donate'));
			}
		}
	}

	public function publish_product()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'required|max_length[70]');
		$this->form_validation->set_rules('state', 'state Code', 'required');
		$this->form_validation->set_rules('district', 'district Code', 'required');
		$this->form_validation->set_rules('city', 'city Code', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata(['error' => 'Oops! please check form carefully.']);
			redirect(base_url('profile/donate'));
			exit();
		} else {
			$product_type_id = $this->input->POST('product_type_id');
			$attributes_set_id = $this->input->POST('attributes_set_id');
			$title = $this->input->POST('title');
			$content = $this->input->POST('content');
			$state = $this->input->POST('state');
			$district = $this->input->POST('district');
			$city = $this->input->POST('city');
			$users_id = $this->input->POST('users_id');
			$unique_id = md5($this->input->POST('users_id'));

			if (isset($_FILES['file']['name'])) {
				$config['upload_path'] = 'assets/frontend/upload/product-image/';
				$config['allowed_types'] = 'jpg|png|jpeg|svg';
				$config['max_size'] = 1024;
				$config['detect_mime'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$config['remove_spaces'] = TRUE;
				$config['max_filename'] = 0;

				$cpt = count($_FILES['file']['name']);
				$this->load->library('upload', $config);
				$dataName = array();
				$files = $_FILES;
				for ($i = 0; $i < $cpt; $i++) {

					if (!empty($files['file']['name'][$i])) {
						$_FILES['file']['name'] = $files['file']['name'][$i];
						$_FILES['file']['type'] = $files['file']['type'][$i];
						$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
						$_FILES['file']['error'] = $files['file']['error'][$i];
						$_FILES['file']['size'] = $files['file']['size'][$i];

						$this->upload->initialize($config);
						$this->upload->do_upload('file');
						$data = $this->upload->data();
						$dataName[] = $data['file_name'];

					}
				}

				$Insert = [
					'users_id' => $users_id,
					'product_type_id' => $product_type_id,
					'attributes_set_id' => $attributes_set_id,
					'unique_id' => $unique_id,
					'title' => $title,
					'content' => $content,
					'state' => $state,
					'district' => $district,
					'city' => $city,
					'image' => json_encode($dataName)
				];

				$this->session->set_flashdata(['status' => "You've successfully donated a product."]);
				$this->db->insert('ns_products', $Insert);
				redirect('profile/donate');
			} else {
				$Insert = [
					'users_id' => $users_id,
					'product_type_id' => $product_type_id,
					'attributes_set_id' => $attributes_set_id,
					'unique_id' => $unique_id,
					'title' => $title,
					'content' => $content,
					'state' => $state,
					'district' => $district,
					'city' => $city
				];

				$this->session->set_flashdata(['status' => "You've successfully donated a product."]);
				$this->db->insert('ns_products', $Insert);
				redirect('profile/donate');
			}
		}
	}

	public function logout()
	{
		$user = [
			'id',
			'email',
			'user_type',
			'logged_in'
		];
		$this->session->unset_userdata($user);
		redirect(base_url());
	}

}
