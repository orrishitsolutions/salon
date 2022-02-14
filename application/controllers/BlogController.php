<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Categoriesmodel"); //
	}

	/**
	 *
	 */
	public function index()
	{

		$this->load->model("Pagesmodel");
		$this->load->model("Pageinfomodel");
		$this->load->model("Servicesmodel");
		$slug = substr($this->uri->segment(1), 0,-4);
		
		$page = $this->Pagesmodel->getPageByBlogSlug($slug);
		$pageInfo = !empty($page->id) ? $this->Pageinfomodel->pageInfoByPageId($page->id) : "";
		$service = !empty($page->id) ? $this->Servicesmodel->pageServicesByPageId($page->id) : "";

		// $this->load->view('website/page',
		// 	[
		// 		"topHeader" => $this->topHeader,
		// 		"topNavigationCategories" => $this->topNavigation, //
		// 		"controller" => $this, //
		// 		"page" => $page,
		// 		"pageInfo" => $pageInfo,
		// 		"service" => $service
		// 	]
		// );

		$blog_details = $this->db->where('slug',$slug)->from('ns_blog')->get()->row();
		

		$this->load->view('website/blog-details',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"page" => $page,
				"pageInfo" => $pageInfo,
				"service" => $service,
				"blog_details" => $blog_details
			]);
	}


	public function blog_view()
	{
		$this->load->model("Pagesmodel");
		$this->load->model("Pageinfomodel");
		$this->load->model("Servicesmodel");
		$slug = substr($this->uri->segment(1), 0,-5);
		$page = $this->Pagesmodel->getPageBySlug($slug);
		$pageInfo = !empty($page->id) ? $this->Pageinfomodel->pageInfoByPageId($page->id) : "";
		$service = !empty($page->id) ? $this->Servicesmodel->pageServicesByPageId($page->id) : "";

		$BlogAll = $this->db->from('ns_blog')->order_by('id','desc')->get()->result_array();

	
		$this->load->view('website/blog',
			[
				"topHeader" => $this->topHeader,
				"topNavigationCategories" => $this->topNavigation, //
				"controller" => $this, //
				"page" => $page,
				"pageInfo" => $pageInfo,
				"service" => $service,
				"BlogAll" => $BlogAll
			]);
	}

	public function blog_details_view()
	{

		echo 'ddd';
		die();
		// $blog_id = $this->uri->segment(2);

		// $this->load->model("Pagesmodel");
		// $this->load->model("Pageinfomodel");
		// $this->load->model("Servicesmodel");

		// $slug = substr($this->uri->segment(1), 0,-5);
		// $page = $this->Pagesmodel->getPageBySlug($slug);
		// $pageInfo = !empty($page->id) ? $this->Pageinfomodel->pageInfoByPageId($page->id) : "";
		// $service = !empty($page->id) ? $this->Servicesmodel->pageServicesByPageId($page->id) : "";

		// $blog_details = $this->db->where('id',$blog_id)->from('ns_blog')->get()->row();
		

		// $this->load->view('website/blog-details',
		// 	[
		// 		"topHeader" => $this->topHeader,
		// 		"topNavigationCategories" => $this->topNavigation, //
		// 		"controller" => $this, //
		// 		"page" => $page,
		// 		"pageInfo" => $pageInfo,
		// 		"service" => $service,
		// 		"blog_details" => $blog_details
		// 	]);
	}
}
