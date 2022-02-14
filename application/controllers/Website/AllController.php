<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');		
	}
	public function about_us()
	{
		$this->load->view('website/about-us');
	}
	public function stock_cars()
	{
		$this->load->view('website/stock-cars');
	}
	public function insurance()
	{die('hello');
		$this->load->view('website/insurance');
	}
	public function showroom()
	{
		$this->load->view('website/showroom');
	}
	public function wallpaper()
	{
		$this->load->view('website/wallpaper');
	}
	public function sell_cars()
	{
		$this->load->view('website/sell-cars');
	}
	public function car_service()
	{
		$this->load->view('website/car-service');
	}
	public function blogs()
	{
		$this->load->view('website/blogs');
	}
	public function contact_us()
	{
		$this->load->view('website/contact-us');
	}
	



}
