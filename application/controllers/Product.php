<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model("Categoriesmodel"); //
		$this->load->model("Pagesmodel"); //
	}

	public function index()
	{
		$slug = $this->uri->segment(2);
		$pid = $this->input->get('pid', TRUE);
		$this->load->model("Productsmodel", "product");
		$product = $this->product->getProductByUniqueId($pid);
		$donerDescription = $this->product->getProductBySlug($slug);
		$leftNavigation = $this->category->categoryTreeByColumn(['parent_id' => 0]);
		//echo "<pre>";print_r($product);die;

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		$inputs = [
			"message"
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post('submit');
		$data['pid'] = $pid;
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
		} else {
			try {
				$this->load->model("Messagemodel", "message");
				$post['from_users_id'] = $this->session->userdata("id");
				$post['to_users_id'] = $product[0]->users_id;
				$post['product_id'] = $product[0]->id;
				$saved = $this->message->save($post);
				if ($saved) {
					$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> ' . "You've successfully sent message to " . $product[0]->first_name . " " . $product[0]->middle_name . " " . $product[0]->last_name . '</div>');
					$data['success'] = $this->session->flashdata('success');
				}
				$dbError = $this->db->error();
				if (!empty($dbError['message'])) {
					$data['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $dbError['message'] . '</div>';
				}
			} catch (\Exception $e) {
				$data['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
			}
		}


		$this->load->view('website/product',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"product" => $product,
				"leftNavigation" => $leftNavigation,
				"donerDescription" => $donerDescription,
				"data" => $data
			]
		);
	}


}
