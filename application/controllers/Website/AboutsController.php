<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AboutsController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');		
	}
	public function about_us()
	{
		$directors_select = $this->_directorsList(1,'directors');

		$experience_select = $this->_directorsList(1,'experience');
		
		$team_select = $this->_directorsList(1,'team');
		$testimonials_select = $this->_directorsList(1,'testimonials');
		$deal_select = $this->_directorsList(1,'deal');
    	$this->load->view('website/about-us',compact('directors_select','experience_select','team_select','testimonials_select','deal_select'));
	}
	private function _directorsList($wc,$tname){
        return $this->db->from('tbl_about_us')->order_by('id','desc')->where('type',$tname)->where('status',$wc)->get()->result_array();
    }
}
