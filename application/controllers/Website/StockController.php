<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StockController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('security');		
	}
	public function stock_cars()
	{
		$category_select = $this->_List('tbl_category');
		$style_select = $this->_List('tbl_car_style');
		$car_select = $this->_ProductList1();
		$this->load->view('website/stock-cars',compact('category_select','style_select','car_select'));
	}	
	public function car_detail()
	{
		$cat_id = $this->uri->segment(2);
		$car_select = $this->_ProductList2($cat_id);
		$id_style = $this->_recordChecker($cat_id,'tbl_product');
		$Simlar_select = $this->_ProductList3($id_style->style_id);
		$exterior_select = $this->_ExteriortList($cat_id,'tbl_product_images','exterior');
     	$interior_select = $this->_ExteriortList($cat_id,'tbl_product_images','interior');    		
     	$this->load->view('website/car-detail',compact('car_select','Simlar_select','exterior_select','interior_select'));
	}
	public function Request_A_Call()
	{
          $name =$this->security->xss_clean($this->input->POST('name'));
          $email =$this->security->xss_clean($this->input->POST('email'));
          $phone =$this->security->xss_clean($this->input->POST('telphone'));
          $msg =$this->security->xss_clean($this->input->POST('message'));
          $subject =$this->security->xss_clean($this->input->POST('subject'));
          $url =$this->security->xss_clean($this->input->POST('url'));
          $Brand =$this->security->xss_clean($this->input->POST('Brand'));
          $request_name =$this->security->xss_clean($this->input->POST('request_name'));
          date_default_timezone_set("Asia/Kolkata");          
          			
              	
          		 $message='
          		 <div style="background-color:#0b4e90; width:auto; font-weight: bold; line-height:30px; height: auto;" >
    					<img src="https://luxurycarsemporio.com/img/empro1.png" height="80">
  						<table width="600" border="0" cellpadding="0" cellspacing="0" style=" line-height:30px; color:#fff; margin-bottom:10px">

								  <tr>
								    <td width="200" >&nbsp;Subject
								    </td>
								    <td width="400" >&nbsp;'.$subject.'('.date("Y-m-d H:i:s").')
								    </td>
								  </tr>
								  <tr>
								    <td width="200"  >&nbsp;Name
								    </td>
								    <td width="400" >&nbsp;'.$name.'
								    </td>
								  </tr>
								  <tr>
								    <td width="200"  >&nbsp;Email
								    </td>
								    <td width="400" >&nbsp;'.$email.'
								    </td>
								  </tr>
								  <tr>
								    <td width="200"  >&nbsp;Phone
								    </td>
								    <td width="400" >&nbsp;'.$phone.'
								    </td>
								  </tr>
								  <tr>
								    <td width="200"  >&nbsp; Pages url
								    </td>
								    <td width="400" >&nbsp;'.$url.'
								    </td>
								  </tr>
								  <tr>
								    <td width="200"  >&nbsp;Message
								    </td>
								    <td width="400" >&nbsp;'.$msg.'
								    </td>
								  </tr>
							</table> 
							<div style="font-size:12px; line-height: 2px; margin-top: 20px; color: #fff; margin-left: 200px; margin-bottom:10px; padding-bottom: 2px;">
						    <h3>Date & Time</h3>
						    <h3> 10/13/2021</h3>  
						    </div>
							</div>
					 	';
              	$proooo = ' Your Request Has beed Send successfully in Admin:
                    Subject: ".$subject."."\r\n".
                    Name: ".$name." <br><br>
                    Email: ".$email." <br><br>
                    Phone: ".$phone." <br><br>
                    Url: ".$url." <br><br>
                    Msg: ".$msg." <br><br>';
              	$succes_msg = "<div class='alert alert-success'>".$subject." has been added Successfully.</div>";
					$this->email->from($email, 'Luxury Car Semporio');
					$this->email->set_header('Content-Type', 'text/html');
					$this->email->to('abhayorrish@gmail.com');
					$this->email->cc('as271070@gmail.com');
					$this->email->bcc('as1134569@gmail.com');
					$this->email->subject($subject);
					
					$this->email->message($message);
					if($this->email->send())
					{
						$data = array(
					                'name' => $name,
					                'subject' => $subject,
					                'email' => $email,
					                'phone' =>$phone,
					                'url'=>$url,
					                'send_mail'=>1,
					                'msg'=>$msg,
					                'request_time'=>date("Y-m-d H:i:s")
					             );
          			$insert = $this->db->insert('tbl_enquery', $data);
          			echo "mail send";
					}
					else
					{
						$data = array(
					                'name' => $name,
					                'subject' => $subject,
					                'email' => $email,
					                'phone' =>$phone,
					                'url'=>$url,
					                'send_mail'=>0,
					                'msg'=>$msg,
					                'request_time'=>date("Y-m-d H:i:s")
					             );
          			$insert = $this->db->insert('tbl_enquery', $data);
          			echo "con't send";
					}




             //   $mail = new PHPMailer();
             //   $mail->SMTPOptions = array(
             //        'ssl' => array(
             //        'verify_peer' => false,
             //        'verify_peer_name' => false,
             //        'allow_self_signed' => true,
             //    ),
             //    );
              
             //    error_reporting(-1);
             //    $mail->isSMTP(); // Set mailer to use SMTP
             //    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
             //    $mail->SMTPAuth = true; 
             //    $subject = "Hello  ".$subject;
             //    $mail->SMTDebug=2;
             //    $email = $email; //this email is user email
             //    $from_label = "Request Creation";
             //    $mail->Username = 'abhayorrish@gmail.com'; // SMTP username
             //    $mail->Password = '@123abhay'; // SMTP password
             //    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
             //    $mail->Port = 587;
             //    $mail->setFrom($from_label);
             //    $mail->addAddress($email, 'Bookly Admin');
             //    $mail->isHTML(true);
             //    $mail->Subject = $subject;
             //    $mail->Body = $message;
             //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             // if($mail->send()){
             // 		echo "mail send";
             //      }


	}


	 private function _ProductList1(){
        return $this->db->from('tbl_product')
				->Select('tbl_category.c_name,tbl_car_style.s_name,tbl_product.*')
				->where_in('tbl_product.status', 1)
				->order_by('tbl_product.id','desc')
        		->join('tbl_category','tbl_product.cat_id=tbl_category.id','left')
				->join('tbl_car_style','tbl_product.style_id=tbl_car_style.id','left')
				->get()->result_array();
								}
	 private function _ProductList2($idd){
        return $this->db->from('tbl_product')
				->Select('tbl_category.c_name,tbl_car_style.s_name,tbl_product.*')
				->where_in('tbl_product.id', $idd)
				->where_in('tbl_product.status', 1)
				->order_by('tbl_product.id','desc')
        		->join('tbl_category','tbl_product.cat_id=tbl_category.id','left')
				->join('tbl_car_style','tbl_product.style_id=tbl_car_style.id','left')
				->get()->row();
								}
	private function _ProductList3($idd){
        return $this->db->from('tbl_product')
				->Select('tbl_category.c_name,tbl_car_style.s_name,tbl_product.*')
				->where_in('tbl_product.style_id', $idd)
				->where_in('tbl_product.status', 1)
				->order_by('tbl_product.id','desc')
        		->join('tbl_category','tbl_product.cat_id=tbl_category.id','left')
				->join('tbl_car_style','tbl_product.style_id=tbl_car_style.id','left')
				->get()->result_array();
								}


	private function _List($table){
        return $this->db->from($table)->order_by('id','desc')->get()->result_array();
    }
    protected function _recordChecker($id,$table){
        return $this->db->where('id',$id)->from($table)->get()->row();
    }
     private function _ExteriortList($prensent_id,$table,$type){
        return $this->db->where('prensent_id',$prensent_id)->where('type',$type)->from($table)->order_by('id','desc')->get()->result_array();
    }
   
}