<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	private $bannerCategories;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->view(
			'website/index',
			[
			]
		);
	}

	public function enquiry()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
		$this->form_validation->set_rules('piece', 'Piece/pieces', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = ['message', 'quantity', 'piece'];
			$post = $this->input->post($data);
			$this->session->set_flashdata('quotation', $post);
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url());
		} else {
			$this->session->set_flashdata('success', '<div class="success">Your request has been sent.</div>');
			redirect(base_url());
		}
	}


}
