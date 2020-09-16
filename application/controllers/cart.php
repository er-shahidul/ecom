<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}
	
	public function index()
	{
		$product = array();
		$cart = $this->session->userdata( "cart" );
		if( $cart == "" || count( $cart ) <= 0 ) redirect( "home" );
		
		foreach( $cart as $val ) $id_product[] = $val['id'];
		
		$ids = implode( ", ", $id_product );
		$this->db->select( "*" );
		$this->db->from( "product" );
		$this->db->where( "id IN ( $ids )" );
		$query = $this->db->get();
		if( $query->num_rows() > 0 ) foreach( $query->result() as $row ) $product[$row->id] = $row;
		
		//echo "<pre>"; print_r( $cart ); exit();
		
		$data['cart'] = $cart;
		$data['product'] = $product;
		$data['category'] = $this->core_model->get_rows_id_name( "category", "category_name" );
		$data['subcategory'] = $this->core_model->get_rows_id_name( "subcategory", "subcategory_name" );
		
		$this->load->view('header', $data);
		$this->load->view('cart/index_view');
		$this->load->view('footer');
	}
	
	public function checkout( $view = '' )
	{
		$product = array();
		$cart = $this->session->userdata( "cart" );
		if( $cart == "" || count( $cart ) <= 0 ) redirect( "home" );
		
		foreach( $cart as $val ) $id_product[] = $val['id'];
		
		$ids = implode( ", ", $id_product );
		$this->db->select( "*" );
		$this->db->from( "product" );
		$this->db->where( "id IN ( $ids )" );
		$query = $this->db->get();
		if( $query->num_rows() > 0 ) foreach( $query->result() as $row ) $product[$row->id] = $row;
		
		//echo "<pre>"; print_r( $cart ); exit();
		
		$data['cart'] = $cart;
		$data['product'] = $product;
		$data['category'] = $this->core_model->get_rows_id_name( "category", "category_name" );
		$data['subcategory'] = $this->core_model->get_rows_id_name( "subcategory", "subcategory_name" );
		
		$data['user'] = $this->session->userdata( "user" );
		$data['email'] = $this->session->userdata( "email" );
		$data['delivery'] = $this->session->userdata( "delivery" );
		$data['payment'] = $this->session->userdata( "payment" );
		
		if( $view != "" ) $data['view'] = $view;
		else if( $data['email'] == '' ) $data['view'] = "email";
		else if( $data['delivery'] == '' ) $data['view'] = "delivery";
		else $data['view'] = "payment";
		
		$data['setting'] = $this->core_model->get_row_info( "setting", "id", "1", "*" );
		$this->load->view('header', $data);
		$this->load->view('cart/checkout_view');
		$this->load->view('footer');
	}
	
	public function payment( $type = '' )
	{
		$cart = $this->session->userdata( "cart" );
		if( $cart == "" ) redirect( "home" );
		if( $type != '' ) {
			$payment = "check";			
			$pay_code = "";
			$site = $this->core_model->get_row_info( "setting", "id", "1", "*" );			
			$total = $this->session->userdata( "total" );
			
			if( $type == "cash" ) $payment = "pending";
			else if( $type == "credit" ) {
				
			}
			else if( $type == "debit" ) {
				
			}
			else if( $type == "bkash" ) {
				$check_code_exists = $this->core_model->get_rows( "payment", "pay_code", $_REQUEST['trxid'], "id", "", "", "", "pay_by", "bkash" );
				if( isset( $check_code_exists[0] )) {
					$this->session->set_userdata( array( "error" => "Invalid trxid code. Retry with valid transaction no..", "payment" => "bkash" ));
					redirect( "cart/checkout/payment" );
				}
				else {
					if( $site->testmode == "Yes" ) $array->amount = $total;
					else {
						$link = "$site->bkash_url/merchant/trxcheck/sendmsg?user=$site->bkash_username&pass=$site->bkash_password&msisdn=$site->bkash_mobile&trxid=$_REQUEST[trxid]";
						$baksh_return = $this->file_get_by_curl( $link );
						$json = json_decode( $baksh_return );
						$array = $json->transaction;
					}
					if( isset( $array->amount ) && $array->amount == $total ) {
						$payment = "paid";
						$pay_code = "$_REQUEST[trxid]";
					}
					else {
						$this->session->set_userdata( array( "error" => "Invalid trxid code. Retry with valid transaction no..", "payment" => "bkash" ));
						redirect( "cart/checkout/payment" );
					}
				}
			}
			
			if( $payment == "check" ) {
				$this->session->set_userdata( array( "error" => "payment not paid, please pay by bkash..", "payment" => "bkash" ));
				redirect( "cart/checkout/payment" );
			}
			else {
				$user_id = $this->session->userdata( "user" );
				$user_email = $this->session->userdata( "email" );
				$user_id == "" ? 0 : $user_id;
				$delivery = "Home Delivery";
				$sold = $payment == "paid" ? "Sold" : "Pending";
				$id_product = array();
				foreach( $cart as $val ) $id_product[] = $val['id'];
				
				if( $user_id == 0 ) {
					$this->db->insert( "user", array( "email" => $user_email, "pay_amount" => $total, "ip_address" => $_SERVER['REMOTE_ADDR'] ));
					$user_id = $this->db->insert_id();
					$this->session->set_userdata( array( "user" => $user_id ));
				}
				else {
					$this->db->where( "id", $user_id );
					$this->db->update( "user", array( "pay_amount" => "pay_amount + $total", "ip_address" => $_SERVER['REMOTE_ADDR'] ));
				}
				
				$pay_data = array(
					"id_user"			=> $user_id,
					"date_time"			=> time(),
					"price"				=> $total,
					"delivery_cost"		=> 0,
					"payment_cost"		=> 0,
					"total_price"		=> $total,
					"pay_amount"		=> $total,
					"pay_by"			=> $type,
					"pay_code"			=> $pay_code,
					"payment"			=> $payment
				);
				$this->db->insert( "payment", $pay_data );
				$payment_id = $this->db->insert_id();
				
				$salse_data = array(
					"id_user"		=> $user_id,
					"id_payment"	=> $payment_id,
					"date_time"		=> time(),
					"price"			=> $total,
					"id_product"	=> count( $id_product ) > 0 ? implode( ",", $id_product ) : "",
					"sales"			=> $sold
				);
				$this->db->insert( "sales", $salse_data );
				$sales_id = $this->db->insert_id();
				
				$delivery_info = $this->session->userdata( "delivery" );
				$delivery_data = array(
					"id_user"			=> $user_id,
					"id_payment"		=> $payment_id,
					"id_sales"			=> $sales_id,
					"name"				=> $delivery_info['name'],
					"email"				=> $user_email,
					"phone"				=> $delivery_info['phone'],
					"address"			=> $delivery_info['address'],
					"area"				=> $delivery_info['landmark'],
					"city"				=> $delivery_info['city'],
					"state"				=> $delivery_info['state'],
					"coutry"			=> "Bangladesh",
					"zip"				=> $delivery_info['postcode'],
					"create_date"		=> time(),
					"delivery_date"		=> strtotime( "+7 days" )
				);
				$this->db->insert( "delivery", $delivery_data );
				
				
				$mail_message = "<div>
									<br /><br /><h4>Thank you for your order!</h4>
									<br />
									<table width='50%' cellpadding='2' cellspacing='0' border='0'>
										<tr>
											<td colspan='4' style=\"background:#888; color: white;\">Order Information</td>
										</tr>
										<tr>
											<td width='20%'>Merchant:</td>
											<td>G-Series</td>
											<td> </td>
											<td> </td>
										</tr>
										<tr>
											<td>Invoice Number:</td>
											<td>" . ( $sales_id + 2547896 ) . "</td>
											<td> </td>
											<td> </td>
										</tr>
										<tr>
											<td>Customer ID:</td>
											<td>" . ( $user_id + 1024578 ) . "</td>
											<td> </td>
											<td> </td>
										</tr>
										<tr>
											<td colspan='4'><hr /></td>
										</tr>
										<tr>
											<td colspan='2' valign='top'>
												<b>Delivery Information</b><br />
												$delivery_info[address], $delivery_info[landmark]<br />
												$delivery_info[city]-$delivery_info[postcode], $delivery_info[state],<br />
												$delivery_info[country].<br />
												Cell: $delivery_info[phone],<br />
												Email: $user_email
											</td>
											<td colspan='2' valign='top'>
												<b>Billing Information</b><br />
											</td>
										</tr>
										<tr>
											<td colspan='4'><hr /></td>
										</tr>
										<tr>
											<th colspan='4' align='right'>BDT $total<br /><br /></th>
										</tr>
										<tr>
											<td colspan='4' style=\"background:#888; color: white;\">
												" . ( $type == "cash" ? "Cash On Delivery" : $type ) . "
											</td>
										</tr>
										<tr>
											<td>Date/Time:</td>
											<td>" . date( "d-M-Y h:i:s T" ) . "</td>
											<td> </td>
											<td> </td>
										</tr>
										<tr>
											<td>Trasaction ID:</td>
											<td>" . ( $payment_id + 3548717 ) . "</td>
											<td> </td>
											<td> </td>
										</tr>
									</table>
								</div>";
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "From: info@gseriesbd.net\n";
				@mail( $user_email, "Gseries Order Details", $mail_message, $headers );
				
				if( $delivery == "delivery" ) {
					
					$mail_messages = "<div>
										<br /><br /><h4>One Order Place!</h4>
										<br />
										<table width='50%' cellpadding='2' cellspacing='0' border='0'>
											<tr>
												<td colspan='4' style=\"background:#888; color: white;\">Order Information</td>
											</tr>
											<tr>
												<td width='20%'>Merchant:</td>
												<td>G-Series</td>
												<td> </td>
												<td> </td>
											</tr>
											<tr>
												<td>Invoice Number:</td>
												<td>" . ( $sales_id + 2547896 ) . "</td>
												<td> </td>
												<td> </td>
											</tr>
											<tr>
												<td>Customer ID:</td>
												<td>" . ( $user_id + 1024578 ) . "</td>
												<td> </td>
												<td> </td>
											</tr>
											<tr>
												<td colspan='4'><hr /></td>
											</tr>
											<tr>
												<td colspan='2' valign='top'>
													<b>Delivery Information</b><br />
													$delivery_info[address], $delivery_info[landmark]<br />
													$delivery_info[city]-$delivery_info[postcode], $delivery_info[state],<br />
													$delivery_info[country].<br />
													Cell: $delivery_info[phone],<br />
													Email: $user_email
												</td>
												<td colspan='2' valign='top'>
													<b>Billing Information</b><br />
												</td>
											</tr>
											<tr>
												<td colspan='4'><hr /></td>
											</tr>
											<tr>
												<th colspan='4' align='right'>BDT $total<br /><br /></th>
											</tr>
											<tr>
												<td colspan='4' style=\"background:#888; color: white;\">
													" . ( $type == "cash" ? "Cash On Delivery" : $type ) . "
												</td>
											</tr>
											<tr>
												<td>Date/Time:</td>
												<td>" . date( "d-M-Y h:i:s T" ) . "</td>
												<td> </td>
												<td> </td>
											</tr>
											<tr>
												<td>Trasaction ID:</td>
												<td>" . ( $payment_id + 3548717 ) . "</td>
												<td> </td>
												<td> </td>
											</tr>
										</table>
									</div>";
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From: delivary@gseriesbd.net\n";
					
					@mail( $site->emails, "Delivary Order Place", $mail_messages, $headers );
					
				}
				$this->session->sess_destroy();
				redirect( "cart/paid/$payment_id/$sales_id" );
			}
		}
		else {
			redirect( "cart/checkout" );
		}
	}
	
	public function paid( $payment_id = 0, $sales_id = 0 )
	{
		if( $payment_id == 0 && $sales_id == 0 ) redirect( "cart/index" );
		$data['setting'] = $this->core_model->get_row_info( "setting", "id", "1", "*" );
		$data['sales'] = $this->core_model->get_row_info( "sales", "id", $sales_id, "*" );
		$data['payment'] = $this->core_model->get_row_info( "payment", "id", $payment_id, "*" );
		$data['sales_info'] = $this->core_model->get_row_info( "delivery", "id_sales", $sales_id, "*" );
		
		$this->load->view('header', $data);
		$this->load->view('cart/paid_view');
		$this->load->view('footer');
	}
	
	public function login()
	{
		extract( $_REQUEST );
		if( $email != "" ) {
			$check = $this->core_model->get_row_info( "user", "email", $email, "*" );
			if( $status == "no" ) {
				$this->session->set_userdata( array( "email" => $email ));
				if( $check != "" ) $this->session->set_userdata( array( "user" => $check->id ));
			}
			else {
				if( $password != "" && strlen( $password ) > 5 ) {

					if( $check != "" && $check->password == md5( $password )) {
						$this->session->set_userdata( array( "email" => $email, "user" => $check->id ));
					}
					else {
						$this->session->set_userdata( array( "error" => "Email or password not match" ));
						$this->session->unset_userdata( "email" );
					}
				}
				else {
					$this->session->set_userdata( array( "error" => "Password should be more than 5 charecter" ));
					$this->session->unset_userdata( "email" );
				}
			}
		}
		else {
			$this->session->set_userdata( array( "error" => "Email is required" ));
			$this->session->unset_userdata( "email" );
		}
		redirect( "cart/checkout" );
	}
	
	public function delivery()
	{
		extract( $_REQUEST );
		if( $name != "" && $phone != "" && $mobile != "" && $postcode != "" && $address != "" && $city != "" && $state != "" ) {
			$delivery = array(
				"name"		=> $name,
				"phone"		=> $phone,
				"mobile"	=> $mobile,
				"country"	=> $country,
				"state"		=> $state,
				"city"		=> $city,
				"landmark"	=> $landmark,
				"postcode"	=> $postcode,
				"address"	=> $address
			);
			$this->session->set_userdata( array( "delivery" => $delivery ));
		}
		else {
			$this->session->set_userdata( array( "error" => "All fields are required.." ));
			$this->session->unset_userdata( "email" );
		}
		redirect( "cart/checkout" );
	}
	
	public function add_item( $id = 0 )
	{
		if( $id > 0 ) {
			$set = true;
			$cart = $this->session->userdata( "cart" );
			if( $cart != '' && count( $cart ) > 0 ) {
				foreach( $cart as $i => $val ) {
					if( $val['id'] == $id ) {
						$cart[$i]['qty']++;
						$set = false;
						break;
					}
				}
			}
			if( $set == true ) $cart[] = array( "id" => $id, "qty" => 1 );
			$this->session->set_userdata( "cart", $cart );
		}
		redirect( "cart" );
	}
	
	public function remove_item( $id = 0, $qty = "all" )
	{
		if( $id > 0 ) {
			$new_cart = array();
			$cart = $this->session->userdata( "cart" );
			if( $cart != '' && count( $cart ) > 0 ) {
				foreach( $cart as $val ) {
					if( $val['id'] == $id ) {
						$val['qty']--;
						if( $val['qty'] > 0 && $qty != "all" ) $new_cart[] = $val;
					}
					else $new_cart[] = $val;
				}
				if( $new_cart != '' && count( $new_cart ) > 0 ) $this->session->set_userdata( "cart", $new_cart );
				else $this->session->unset_userdata( "cart" );
			}
		}
		redirect( "cart" );
	}
	
	public function remove_all()
	{
		$this->session->unset_userdata( "cart" );
		redirect( "home" );
	}
	
	public function file_get_by_curl( $link )
	{	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $link);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
		$return = curl_exec($ch);
		curl_close($ch);
		return $return;
	}
	
}