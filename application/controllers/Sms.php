<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Sms extends CI_Controller {

		function __construct() {
			parent::__construct();
		}

	function index() {

		$userkey = "Masukkan userkey";
		$passkey = "Masukkan passkey";

		$url = "https://reguler.zenziva.net/apps/smsapibalance.php";
		$curlHandle2 = curl_init();
		curl_setopt($curlHandle2, CURLOPT_URL, $url);
		curl_setopt($curlHandle2, CURLOPT_POSTFIELDS,'userkey='.$userkey.'&passkey='.$passkey);
		curl_setopt($curlHandle2, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle2, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle2, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle2, CURLOPT_POST, 1);
		$results = curl_exec($curlHandle2);
		curl_close($curlHandle2);
		$xmldata = simplexml_load_string($results);
		$status =  $xmldata->message[0]->text;

		$data['credit'] = explode(" ", $results);
		$data['m_aktif'] = $status;


		$this->load->view("form_sms", $data);
	}

	function kirim_sms() {

	   $mobile = $this->input->post('mobile');
	   $message = $this->input->post('message');

	   $numbers = array();
	    foreach ($mobile as $key => $value) {
	      if ($value != '') {
	        array_push($numbers, $value);
	      }
	    }

	    $number = strlen($numbers[0]);

	    if (strlen($numbers[0]) >= 11 OR strlen($numbers[1]) >= 11) {
	    	if ($number < 2) {
	    
			 $data  = $this->input->post();
		     unset($data['submit']);
		     $msgencode = urlencode($message);
		     $userkey = "Masukkan userkey";
			 $passkey = "Masukkan passkey";
		     $router = "";

		     $postdata = array(
		         'authkey' => $userkey,
		         'mobile' => $numbers[0],
		         'message' => $msgencode,
		         'router' => $router
		     );

		     $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$numbers[0]&pesan=$msgencode";

		     $ch = curl_init();
		     curl_setopt_array($ch, array(
		         CURLOPT_URL => $url,
		         CURLOPT_RETURNTRANSFER => TRUE,
		         CURLOPT_POST => TRUE,
		         CURLOPT_POSTFIELDS => $postdata
		     ));

		     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		     $output = curl_exec($ch);

		     if (curl_errno($ch)) {
		         echo "ERROR".curl_error($ch);
		     }
		     curl_close($ch);
		  
		     $this->session->set_flashdata('msg', 	'<div class="alert alert-success">
								                    			<h4>Selamat...!</h4>
								                    			<p>Satu SMS berhasil dikirim</p>
											              	</div>');
			redirect(site_url('sms'));

			} else {

				$data  = $this->input->post();
			     unset($data['submit']);
			     $msgencode = urlencode($message);
			     $userkey = "l4suef";
			     $passkey = "iotfgom9n8";
			     $router = "";

			     $postdata = array(
			         'authkey' => $userkey,
			         'mobile' => $numbers[0],
			         'message' => $msgencode,
			         'router' => $router
			     );

			     $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$numbers[0]&pesan=$msgencode";

			     $ch = curl_init();
			     curl_setopt_array($ch, array(
			         CURLOPT_URL => $url,
			         CURLOPT_RETURNTRANSFER => TRUE,
			         CURLOPT_POST => TRUE,
			         CURLOPT_POSTFIELDS => $postdata
			     ));

			     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			     $output = curl_exec($ch);

			     if (curl_errno($ch)) {
			         echo "error".curl_error($ch);
			     }
			     curl_close($ch);


			     $data  = $this->input->post();
			     unset($data['submit']);
			     $msgencode = urlencode($message);
			     $userkey = "Masukkan userkey";
			     $passkey = "Masukkan passkey";
			     $router = "";

			     $postdata = array(
			         'authkey' => $userkey,
			         'mobile' => $numbers[1],
			         'message' => $msgencode,
			         'router' => $router
			     );

			     $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$numbers[1]&pesan=$msgencode";

			     $ch = curl_init();
			     curl_setopt_array($ch, array(
			         CURLOPT_URL => $url,
			         CURLOPT_RETURNTRANSFER => TRUE,
			         CURLOPT_POST => TRUE,
			         CURLOPT_POSTFIELDS => $postdata
			     ));

			     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			     $output = curl_exec($ch);

			     if (curl_errno($ch)) {
			         echo "ERROR".curl_error($ch);
			     }
			     curl_close($ch);
			  
			     $this->session->set_flashdata('msg', 	'<div class="alert alert-success">
									                    			<h4>Selamat...!</h4>
									                    			<p>Dua SMS berhasil dikirim</p>
												              	</div>');
				redirect(site_url('sms'));
			}

	    } else {

	    	 $this->session->set_flashdata('msg', '<div class="alert alert-danger">
			 											<h4>Maaf...!</h4>
									                    <p>Nomor Telepon Yang Anda Masukkan Tidak Sampai 11 Digit</p>
						              				</div>');
						 redirect('sms');
	    }
	}
}