<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	public function index()
	{
		 // $this->load->view('website/index');
		$this->load->view('login/login');
	}
	public function view_cart()
	{
		 $this->load->view('cart');
	}
	//Tesing Admin Pages Run 
	public function basic_elements()
	{
		$this->load->view('admin-orrish/basic-elements');
	}
	public function advanced_elements()
	{
		$this->load->view('admin-orrish/advanced-elements');
	}
	public function editors()
	{
		$this->load->view('admin-orrish/editors');
	}
	public function wizard()
	{
		$this->load->view('admin-orrish/wizard');
	}
	public function basic_table()
	{
		$this->load->view('admin-orrish/basic-table');
	}
	public function data_table()
	{
		$this->load->view('admin-orrish/data-table');
	}





	//End Of Test

	public function shop_product()
		{
			$data_product = $this->_ProductList();
			$this->load->view('product',compact('data_product'));       
		}
		private function _ProductList(){
			return $this->db->from('product')
							->order_by('product.id','desc')
							->join('categories','product.cat_id=categories.id','right')
							->select('product.id,product.name,product.price,product.off_price,product.image,categories.c_name')
							->get()->result_array();
	
		}

		public function add_card()
		{
			if($this->cart->insert($_POST))
			{
				echo json_encode(['ok'=>'added successfully.','count'=>count($this->cart->contents())]);
			}
			else{
				echo json_encode(['er'=>'something went wrong']);
			}
		}

		public function update_cart(){
			if(count($_POST) > 0){
				for ($i=0; $i < count($_POST['rowid']); $i++) { 
					$data = array(
						'rowid' => $_POST['rowid'][$i],
						'qty'   => $_POST['qty'][$i]
				);
				
				$this->cart->update($data);
				}
				$this->session->set_flashdata(['status'=>'Not Add card']);
                redirect(base_url('cart'));
			}
		}

		public function remove_cart(){
			$data = array('rowid'=>$_POST['id'],'qty'=>'0');
			$this->cart->update($data);
			$this->session->set_flashdata(['status'=>'Not Add card']);
            redirect(base_url('cart'));
		}

		public function view_checkout()
		{
			$this->load->view('checkout');
		}
	public function blog_function()
	{
		$this->load->view('blog');
	}
	public function user_login()
	{
		$this->load->view('user-login');
	}	
}
