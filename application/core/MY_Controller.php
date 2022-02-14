<?php 
class MY_Controller extends CI_Controller{

	/**
	 * @var $currentUser[]
	 */
	public $currentUser;

	/**
	 * @var $topHeader
	 */
	protected $topHeader;

	/**
	 * @var $topNavigation
	 */
	protected $topNavigation;

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model("MY_Model", "category");
		$this->currentUser = $this->session->userdata();
	}

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function slugify($text, $divider = '-')
	{
		// replace non letter or digits by divider
		$text = preg_replace('~[^\pL\d]+~u', $divider, $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, $divider);

		// remove duplicate divider
		$text = preg_replace('~-+~', $divider, $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	public function upload($input, $width = 0, $height = 0)
	{
		$config['upload_path'] = UPLOAD_DIR;
		$config['allowed_types'] = 'gif|jpg|jpeg|bmp|png';
		$config['max_size'] = 2048;
		if (!empty($width)) {
			$config['max_width'] = $width;
		}
		if (!empty($height)) {
			$config['max_height'] = $height;
		}
		$config['file_name'] = $this->login->generateRandomString(12) . time();

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($input)) {
			$data = ['error' => $this->upload->display_errors()];
		} else {
			$data = ['success' => $this->upload->data()];
		}

		return $data;
	}
}
