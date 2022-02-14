<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/Adminmodel", 'login');
		$this->load->helper(array('form', 'url', 'email'));
		$this->load->library(['form_validation']);
		$methodName = $this->router->fetch_method();
		if ($this->session->userdata('logged_in') && $methodName === "index") {
			redirect(base_url('admin/dashboard'));
		} elseif (!$this->session->userdata('logged_in') && $methodName !== "index") {
			redirect(base_url('admin'));
		}
	}

	public function index()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$inputs = ['email', 'password'];
		$post = $this->input->post($inputs);
		$data['login'] = $post;
		if ($this->form_validation->run() == FALSE) {
			$data['login']['error'] = validation_errors();
			$this->load->view('admin/admin', $data);
		} else {
			$login = $this->login->checkLogin($post['email'], $post['password']);
			if (!empty($login)) {
				$user = [
					'id' => $login->id,
					'name' => $login->name,
					'email' => $login->email,
					'logged_in' => TRUE
				];
				$this->session->set_userdata($user);
				redirect(base_url('admin/dashboard'));
			} else {
				$data['login']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong>  Invalid login credentials.</div>';
				$this->load->view('admin/admin', $data);
			}
		}
	}

	public function dashboard()
	{
		$social_media = $this->db->query("SELECT * FROM `sa_social_media` WHERE `id`=1")->row();
		$admin_info = $this->db->query("SELECT * FROM `sa_company_info` WHERE `id`=1")->row();
		$this->load->view('admin/dashboard', compact('social_media', 'admin_info'));
	}

	public function Update_social()
	{
		$facebook = $this->security->xss_clean($this->input->POST('facebook'));
		$linkedin = $this->security->xss_clean($this->input->POST('linkedin'));
		$instagram = $this->security->xss_clean($this->input->POST('instagram'));
		$twitter = $this->security->xss_clean($this->input->POST('twitter'));
		$data_social = array(
			'facebook' => $facebook,
			'linkedin' => $linkedin,
			'instagram' => $instagram,
			'twitter' => $twitter,
		);
		$this->db->where('id', 1)->set($data_social)->update('sa_social_media');
		$this->session->set_flashdata(['status_social_media' => 'Hurray! Social Media has been Update successfully!']);
		redirect(base_url('admin/dashboard'));
	}

	public function Update_address()
	{

		$admin_add = $this->security->xss_clean($this->input->POST('admin_add'));
		$admin_email = $this->security->xss_clean($this->input->POST('admin_email'));
		$admin_phone = $this->security->xss_clean($this->input->POST('admin_phone'));
		$admin_mobile = $this->security->xss_clean($this->input->POST('admin_mobile'));
		$data_admin_info = array(
			'admin_add' => $admin_add,
			'admin_email' => $admin_email,
			'admin_phone' => $admin_phone,
			'admin_mobile' => $admin_mobile
		);
		$this->db->where('id', 1)->set($data_admin_info)->update('sa_company_info');
		$this->session->set_flashdata(['status_admin_info' => 'Hurray! Contact Us has been Update successfully!']);
		redirect(base_url('admin/dashboard'));
	}

	public function category()
	{
		$category = $this->login->getCategories();
		$this->load->view('admin/category', ['category' => $category]);
	}

	public function change_status($module = "")
	{
		$param = $this->uri->segment(4);
		$this->login->changeStatus($module, $param);
		$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Status has been changed successfully.</div>');
		redirect(base_url('admin/' . $module));
	}

	public function delete($module = "")
	{
		$param = $this->uri->segment(4);
		$this->login->delete($module, $param);
		$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been deleted successfully.</div>');
		redirect(base_url('admin/' . $module));
	}

	public function add_category()
	{
		$param = $this->uri->segment(3);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');

		$inputs = [
			'title',
			'meta_title',
			'meta_keyword',
			'meta_description',
			'slug',
			'content',
			'tabs_text',
			'is_top_header',
			'is_top_navigation',
			'is_banner_part',
			'top_header_order',
			'top_navigation_order',
			'banner_part_order',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['category'] = $post;
		if (!empty($param)) {
			$data['category'] = $this->login->getCategoriesById($param);
			$data['category']['param'] = $param;
		}
		$data['category']['category'] = $this->login->getModule("category");
		if ($this->form_validation->run() == FALSE) {
			$data['category']['error'] = validation_errors();
			$data['category']['success'] = $this->session->flashdata('success');
			$this->load->view('admin/add-category', $data);
		} else {
			if (!empty($_FILES['category_image']['name'])) {
				$image = $this->upload("category_image", 325, 225);
				$post['category_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['top_header_image']['name'])) {
				$image = $this->upload("top_header_image", 100, 100);
				$post['top_header_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['top_navigation_image']['name'])) {
				$image = $this->upload("top_navigation_image", 500, 500);
				$post['top_navigation_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['banner_part_image']['name'])) {
				$image = $this->upload("banner_part_image", 64, 64);
				$post['banner_part_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error']) && !empty($_FILES['tabs_image']['name'])) {
				$image = $this->upload("tabs_image", 200, 270);
				$post['tabs_image'] = !empty($image['success']['file_name']) ? UPLOAD_URL . $image['success']['file_name'] : "";
			}
			if (empty($image['error'])) {
				try {
					if (!empty($param)) {
						$post['id'] = $param;
						$update = $this->login->updateModule("category", $post);
					} else {
						$insert = $this->login->saveModule("category", $post);
					}
					$dbError = $this->db->error();
					if (!empty($dbError['message'])) {
						$data['category']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
					}
				} catch (\Exception $e) {
					$data['category']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
				}
			} else {
				$data['category']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $image['error'] . '</div>';
			}
			if ($data['category']['error']) {
				$this->load->view("admin/add-category", $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been saved successfully.</div>');
				redirect(base_url('admin/category'));
			}

		}

	}

	public function category_pages()
	{
		$category = $this->login->getCategoryPages();

		$this->load->view('admin/category-pages', ['category' => $category]);
	}

	public function pages()
	{
		$module = __FUNCTION__;
		$data = $this->login->getModule($module);

		$this->load->view('admin/' . $module, ['data' => $data]);
	}

	public function static_blocks()
	{
		$module = __FUNCTION__;
		$data = $this->login->getModule($module);

		$this->load->view('admin/' . $module, ['data' => $data]);
	}

	public function services()
	{
		$module = __FUNCTION__;
		$data = $this->login->getModule($module);

		$this->load->view('admin/' . $module, ['data' => $data]);
	}

	public function add_static_blocks()
	{
		$param = $this->uri->segment(3);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('block_id', 'Block ID', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		$page = "static-blocks";
		$addPage = "add-" . $page;

		$inputs = [
			'title',
			'block_id',
			'content',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['data'] = $post;
		if (!empty($param)) {
			$data['data'] = $this->login->getModuleById($page, $param);
			$data['data']['param'] = $param;
		}
		if ($this->form_validation->run() == FALSE) {
			$data['data']['error'] = validation_errors();
			$data['data']['success'] = $this->session->flashdata('success');
			$this->load->view('admin/' . $addPage, $data);
		} else {
			try {
				if (!empty($param)) {
					$post['id'] = $param;
					$update = $this->login->updateModule($page, $post);
				} else {
					$insert = $this->login->saveModule($page, $post);
				}
				$dbError = $this->db->error();
				if (!empty($dbError['message'])) {
					$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
				}
			} catch (\Exception $e) {
				$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
			}
			if ($data['data']['error']) {
				$this->load->view("admin/" . $addPage, $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been saved successfully.</div>');
				redirect(base_url('admin/' . $page));
			}
		}
	}

	public function add_services()
	{
		$param = $this->uri->segment(3);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		$page = "services";
		$addPage = "add-" . $page;

		$inputs = [
			'page_id',
			'title',
			'content',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['data'] = $post;
		if (!empty($param)) {
			$data['data'] = $this->login->getModuleById($page, $param);
			$data['data']['param'] = $param;
		}
		$data['data']['pages'] = $this->login->getModule("pages");
		if ($this->form_validation->run() == FALSE) {
			$data['data']['error'] = validation_errors();
			$data['data']['success'] = $this->session->flashdata('success');
			$this->load->view('admin/' . $addPage, $data);
		} else {
			try {
				if (!empty($param)) {
					$post['id'] = $param;
					$update = $this->login->updateModule($page, $post);
				} else {
					$insert = $this->login->saveModule($page, $post);
				}
				$dbError = $this->db->error();
				if (!empty($dbError['message'])) {
					$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
				}
			} catch (\Exception $e) {
				$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
			}
			if ($data['data']['error']) {
				$this->load->view("admin/" . $addPage, $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been saved successfully.</div>');
				redirect(base_url('admin/' . $page));
			}
		}
	}

	public function add_pages()
	{
		$param = $this->uri->segment(3);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$addPage = "add-pages";
		$page = "pages";

		$inputs = [
			'category',
			'title',
			'meta_title',
			'meta_keyword',
			'meta_description',
			'slug',
			'content',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['data'] = $post;
		$data['controller'] = $this;
		if (!empty($param)) {
			$data['data'] = $this->login->getModuleById($page, $param);
			$data['data']['param'] = $param;
			$data['data']['category'] = $this->login->getModuleBycolumn("pages-category", ["pages_category_id"], "pages_id", $param);
		}
		if ($this->form_validation->run() == FALSE) {
			$data['data']['error'] = validation_errors();
			$data['data']['success'] = $this->session->flashdata('success');
			$this->load->view('admin/' . $addPage, $data);
		} else {
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
					if (!empty($param)) {
						$post['id'] = $param;
						$update = $this->login->updateModule($page, $post);
					} else {
						$insert = $this->login->saveModule($page, $post);
					}
					$dbError = $this->db->error();
					if (!empty($dbError['message'])) {
						$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
					} else {
						$mapId = !empty($param) ? $param : $insert;
						$arr = [];
						$this->login->deleteModuleMapping("pages-category", "pages_id", $mapId);
						foreach ($categoryPage['category'] as $cVal) {
							$arr['pages_id'] = $mapId;
							$arr['pages_category_id'] = $cVal;
							$this->login->updateModuleMapping("pages-category", $mapId, $arr);
						}
					}
				} catch (\Exception $e) {
					$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
				}
			} else {
				$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $image['error'] . '</div>';
			}
			if ($data['data']['error']) {
				$this->load->view("admin/" . $addPage, $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been saved successfully.</div>');
				redirect(base_url('admin/' . $page));
			}
		}
	}

	public function add_category_pages()
	{
		$param = $this->uri->segment(3);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$addPage = "add-category-pages";
		$page = "category-pages";

		$inputs = [
			'name',
			'status'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['category'] = $post;
		if (!empty($param)) {
			$data['category'] = $this->login->getModuleById($page, $param);
			$data['category']['param'] = $param;
		}
		if ($this->form_validation->run() == FALSE) {
			$data['category']['error'] = validation_errors();
			$data['category']['success'] = $this->session->flashdata('success');
			$this->load->view('admin/' . $addPage, $data);
		} else {
			try {
				if (!empty($param)) {
					$post['id'] = $param;
					$update = $this->login->updateModule($page, $post);
				} else {
					$insert = $this->login->saveModule($page, $post);
				}
				$dbError = $this->db->error();
				if (!empty($dbError['message'])) {
					$data['category']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
				}
			} catch (\Exception $e) {
				$data['category']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
			}
			if ($data['category']['error']) {
				$this->load->view("admin/" . $addPage, $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been saved successfully.</div>');
				redirect(base_url('admin/' . $page));
			}
		}
	}

	public function products()
	{
		$products = $this->login->getProducts();
		$this->load->view('admin/products', ['products' => $products]);
	}

	public function add_products()
	{
		$param = $this->uri->segment(3);
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
			$data['data'] = $this->login->getModuleById($page, $param);
			$data['data']['param'] = $param;
			$data['data']['category'] = $this->login->getModuleBycolumn("product-category", ["category_id"], "product_id", $param);
		}
		$data['data']['users'] = $this->login->getModule("users");
		$data['data']['attribute_set'] = $this->login->getModule("product-attributes-set");
		$data['data']['product_type'] = $this->login->getModule("product-type");
		$data['controller'] = $this;
		if ($this->form_validation->run() == FALSE) {
			$data['data']['error'] = validation_errors();
			$data['data']['success'] = $this->session->flashdata('success');
			$this->load->view('admin/' . $addPage, $data);
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
						$update = $this->login->updateModule($page, $post);
					} else {
						$insert = $this->login->saveModule($page, $post);
					}
					$dbError = $this->db->error();
					if (!empty($dbError['message'])) {
						$data['data']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
					} else {
						$mapId = !empty($param) ? $param : $insert;
						if (!empty($mapId)) {
							$update['id'] = $mapId;
							$update['unique_id'] = md5($insert . $post['users_id']);
							$this->login->updateModule($page, $update);
						}
						$arr = [];
						$this->login->deleteModuleMapping("product-category", "product_id", $mapId);
						$this->login->deleteModuleMapping("users-products", "product_id", $mapId);
						$this->login->deleteModuleMapping("product-product-type", "product_id", $mapId);
						$this->login->deleteModuleMapping("product-attributes-sku", "product_id", $mapId);
						foreach ($categoryPage['category'] as $cVal) {
							$arr['product_id'] = $mapId;
							$arr['category_id'] = $cVal;
							$this->login->updateModuleMapping("product-category", $mapId, $arr);
						}
						$userArr['product_id'] = $mapId;
						$userArr['users_id'] = $data['data']['users_id'];
						$this->login->updateModuleMapping("users-products", $mapId, $userArr);
						$productTypeMapping['product_id'] = $mapId;
						$productTypeMapping['product_type_id'] = $data['data']['product_type_id'];
						$this->login->updateModuleMapping("product-product-type", $mapId, $productTypeMapping);
						if ($data['data']['product_type_id'] == 2) {
							$productId = $mapId;
							$qty = $post['quantity'];
							$attributeSetId = $data['data']['attributes_set_id'];
							$productToAttribute = $this->login->assignProductToAttribute($productId, $qty, $attributeSetId);
							foreach ($productToAttribute as $ptaVal) {
								$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['data']['slug'])));
								$ptaMapping['product_id'] = $productId;
								$ptaMapping['product_attributes_value_id'] = $ptaVal->product_attributes_value_id;
								$ptaMapping['sku'] = $ptaVal->sku . "-" . $slug;
								$ptaMapping['price'] = $ptaVal->price;
								$ptaMapping['quantity'] = $ptaVal->quantity;
								$this->login->updateModuleMapping("product-attributes-sku", $productId, $ptaMapping);
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
				$this->load->view("admin/" . $addPage, $data);
			} else {
				$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> Data has been saved successfully.</div>');
				redirect(base_url('admin/' . $page));
			}
		}
	}


	public function blog()
	{
		//$category = $this->login->getCategories();
		$blog_details = $this->db->from('sa_blog')->order_by('id', 'desc')->get()->result_array();
		$this->load->view('admin/blog', compact('blog_details'));
		// echo "<pre>";
		// print_r($blog_details);
		//$this->load->view('admin/blog', ['category' => $category]);
	}

	public function add_Blog()
	{
		$this->load->view('admin/add-blog');
	}

	public function insertBlog()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Blog Title ', 'required|max_length[150]');
		$title = $this->security->xss_clean($this->input->POST('title'));

		$publish_date = $this->input->POST('publish_date');
		//$publish_date = str_replace('/', '-', $var_date);


		$comment = $this->security->xss_clean($this->input->POST('comment'));
		$tags_data = $this->security->xss_clean($this->input->POST('tags_data'));
		$status = $this->security->xss_clean($this->input->POST('status'));
		$description = $this->security->xss_clean($this->input->POST('description'));
		$short_description = $this->security->xss_clean($this->input->POST('short_description'));
		$meta_title = $this->security->xss_clean($this->input->POST('meta_title'));
		$meta_description = $this->security->xss_clean($this->input->POST('meta_description'));
		$meta_keywords = $this->security->xss_clean($this->input->POST('meta_keywords'));

		$slug = strtolower(preg_replace("![^a-z0-9]+!i", "-", $title));


		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata(['error' => 'Oops! please check form carefully.']);
			redirect(base_url('admin/add_blog'));
			exit();
		} else {
			date_default_timezone_set("Asia/Kolkata");
			$config['upload_path'] = 'assets\frontend\upload/blog-image/';
			$config['allowed_types'] = 'jpg|png|jpeg|svg';
			$config['max_size'] = 15000;
			$config['detect_mime'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['max_filename'] = 0;

			$this->load->library('upload', $config);
			$this->upload->do_upload('file');
			$data = array(
				'file' => $this->upload->data()
			);
			$file = $data['file']['file_name'];
			$data = array(
				'title' => $title,
				'comment' => $comment,
				'tags_data' => $tags_data,
				'status' => $status,
				'description' => $description,
				'publish_date' => $publish_date,
				'meta_title' => $meta_title,
				'meta_description' => $meta_description,
				'meta_keywords' => $meta_keywords,
				'slug' => $slug,
				'file' => $file,
				'short_description' => $short_description,
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('sa_blog', $data);
			$this->session->set_flashdata(['status' => 'Hurray! Blog has been added successfully!']);
			redirect(base_url('admin/add_blog'));
		}
	}

	public function edit_blog()
	{
		$blog_id = $this->uri->segment(3);
		$blog_details = $this->_recordChecker($blog_id, 'sa_blog');
		$this->load->view('admin/add-blog', compact('blog_details'));
	}

	public function UpdateBlog()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Blog Title ', 'required|max_length[120]');
		$title = $this->security->xss_clean($this->input->POST('title'));
		$publish_date = $this->input->POST('publish_date');
		//$publish_date = str_replace('/', '-', $var_date);
		$comment = $this->security->xss_clean($this->input->POST('comment'));
		$tags_data = $this->security->xss_clean($this->input->POST('tags_data'));
		$status = $this->security->xss_clean($this->input->POST('status'));
		$description = $this->security->xss_clean($this->input->POST('description'));
		$short_description = $this->security->xss_clean($this->input->POST('short_description'));
		$meta_title = $this->security->xss_clean($this->input->POST('meta_title'));
		$meta_description = $this->security->xss_clean($this->input->POST('meta_description'));
		$meta_keywords = $this->security->xss_clean($this->input->POST('meta_keywords'));


		$upId = $this->input->POST('id');
		$up_details = $this->_recordChecker($upId, 'sa_blog');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata(['error' => 'Oops! please check form carefully.']);
			redirect(base_url('admin/edit_blog/' . $upId));
			exit();
		} else {
			if ($_FILES['file']['name']) {
				$config['upload_path'] = 'assets\frontend\upload/blog-image/';
				$config['allowed_types'] = 'jpg|png|jpeg|svg';
				$config['max_size'] = 1024;
				$config['detect_mime'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$config['remove_spaces'] = TRUE;
				$config['max_filename'] = 0;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					echo $this->upload->display_errors();
					redirect(base_url('admin/edit_blog/' . $upId));
				} else {
					$blog_update = [
						'title' => $title,
						'comment' => $comment,
						'tags_data' => $tags_data,
						'status' => $status,
						'description' => $description,
						'publish_date' => $publish_date,
						'meta_title' => $meta_title,
						'meta_description' => $meta_description,
						'meta_keywords' => $meta_keywords,
						'short_description' => $short_description,
						'file' => $this->upload->data()['file_name'],
						'updated_at' => date("Y-m-d H:i:s")
					];

					if ($up_details->file && file_exists('assets\frontend\upload/blog-image/' . $up_details->file)) {
						unlink("assets/frontend/upload/blog-image/" . $up_details->file);
					}
					$this->session->set_flashdata(['status' => 'Hurray! Blog has been Update successfully!']);
					$this->db->where('id', $upId)->set($blog_update)->update('sa_blog');
					redirect(base_url('admin/edit_blog/' . $upId));
				}
			} else {
				$blog_update = [
					'title' => $title,
					'comment' => $comment,
					'tags_data' => $tags_data,
					'status' => $status,
					'description' => $description,
					'publish_date' => $publish_date,
					'meta_title' => $meta_title,
					'meta_description' => $meta_description,
					'meta_keywords' => $meta_keywords,
					'short_description' => $short_description,
					'updated_at' => date("Y-m-d H:i:s")
				];
				$this->session->set_flashdata(['status' => 'Hurray! Blog has been Update successfully!']);
				$this->db->where('id', $upId)->set($blog_update)->update('sa_blog');
				redirect(base_url('admin/edit_blog/' . $upId));
			}
		}

	}

	public function delete_blog()
	{
		$del_id = $this->uri->segment(3);
		if ($del_id == "") {
			redirect(base_url('admin/blog'));
		} else {
			$img = $this->_recordChecker($del_id, 'sa_blog');

			if ($img->file && file_exists('assets\frontend\upload/blog-image/' . $img->file)) {

				unlink("assets/frontend/upload/blog-image/" . $img->file);
			}
			$this->session->set_flashdata(['error' => 'Hurray! Blog has been Delect successfully!']);
			$this->_recordDelect($del_id, 'sa_blog');
			redirect(base_url('admin/blog'));
		}
	}

	public function home_status_blog()
	{
		$blog_id = $this->uri->segment(3);
		if ($blog_id !== "") {
			$status = $this->_recordChecker($blog_id, 'sa_blog');
			if ($status->status == 1) {
				$this->db->where('id', $blog_id)->set('status', '0')->update('sa_blog');
				redirect(base_url('admin/blog'));
			} else {
				$this->db->where('id', $blog_id)->set('status', '1')->update('sa_blog');
				redirect(base_url('admin/blog'));
			}
		} else {
			redirect(base_url('admin/blog'));
		}
	}

	protected function _recordDelect($id, $table)
	{
		return $this->db->where('id', $id)->from($table)->delete();
	}

	protected function _recordChecker($id, $table)
	{
		return $this->db->where('id', $id)->from($table)->get()->row();
	}

	public function logout()
	{
		$user = [
			'id',
			'name',
			'email',
			'logged_in'
		];
		$this->session->unset_userdata($user);
		redirect(base_url('admin'));
	}


}
