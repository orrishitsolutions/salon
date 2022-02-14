<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Categoriesmodel"); //
		$this->load->model("Pagesmodel"); //
		$this->load->model("Signupmodel", "login");
		$this->load->library(['form_validation']);
		if ($this->session->userdata('logged_in')) {
			redirect(base_url('profile'));
		}
	}

	public function index()
	{
		$redirect = $this->input->get('redirect', TRUE);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>');
		$this->form_validation->set_rules('login_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('login_password', 'Password', 'trim|required');

		$inputs = [
			'login_email',
			'login_password'
		];
		$post = $this->input->post($inputs);
		$submit = $this->input->post(['login']);
		$data['login'] = $post;
		$data['redirect'] = !empty($redirect) ? "?redirect=".$redirect : "";
		if ($this->form_validation->run() == FALSE) {
			$data['login']['error'] = validation_errors();
		} else {
			try {
				$login = $this->login->checkLogin($post['login_email'], $post['login_password']);
				if (!empty($login)) {
					$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Success!</strong> ' . "You've successfully logged In." . '</div>');
					$user = [
						'id' => $login->id,
						'email' => $login->email,
						'user_type' => $login->user_type,
						'logged_in' => TRUE
					];
					$this->session->set_userdata($user);
					if (!empty($redirect)) {
						redirect(base_url($redirect));
					} else {
						redirect(base_url('profile'));
					}
				} else {
					$data['login']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . "Invalid login credentials." . '</div>';
				}
			} catch (\Exception $e) {
				$data['login']['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> ' . $e->getMessage() . '</div>';
			}
		}

		$this->load->view(
			'website/signup',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"login" => $data['login'],
				"data" => $data
			]
		);
	}

}
