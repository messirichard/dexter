<?php
class CreditCard extends CFormModel
{
	public static function sendData($data)
	{

		$transaction_details = array(
			'order_id' 			=> $data['model']->nota,
			'gross_amount' 	=> $data['model']->total + $data['model']->delivery_price
		);

		// Populate items
		$items = array();
		foreach ($data['order'] as $key => $value) {
			$items[] = array(
				'id' 				=> 'item-'.$value->product_id,
				'price' 		=> $value->price,
				'quantity' 	=> $value->qty,
				'name' 			=> substr($value->name, 0, 50)
			);
		}
			$items[] = array(
				'id' 				=> 'shipping',
				'price' 		=> $data['model']->delivery_price,
				'quantity' 	=> 1,
				'name' 			=> substr("SHIPPING TO ".$data['model']->delivery_to, 0, 50)
			);


		// Populate customer's billing address
		$billing_address = array(
			'first_name' 		=> $data['model']->first_name,
			'last_name' 		=> $data['model']->last_name,
			'address' 			=> $data['model']->address,
			'city' 					=> $data['model']->city,
			'postal_code' 	=> $data['model']->postcode,
			'phone' 				=> $data['model']->hp,
			'country_code'	=> 'IDN'
			);

		// Populate customer's shipping address
		$shipping_address = array(
			'first_name' 		=> $data['model']->first_name,
			'last_name' 		=> $data['model']->last_name,
			'address' 			=> $data['model']->address,
			'city' 					=> $data['model']->city,
			'postal_code' 	=> $data['model']->postcode,
			'phone' 				=> $data['model']->hp,
			'country_code'=> 'IDN'
		);

		// Populate customer's Info
		$customer_details = array(
			'first_name' 		=> $data['model']->first_name,
			'last_name' 		=> $data['model']->last_name,
			'email' 					=> $data['model']->email,
			'phone' 					=> $data['model']->hp,
			'billing_address' => $billing_address,
			'shipping_address'=> $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		// Uncomment 'credit_card_3d_secure' => true jika transaksi ingin diproses dengan 3DSecure.
		$transaction_data = array(
			'payment_type' 			=> 'vtweb', 
			'vtweb' 						=> array(
				'enabled_payments' 	=> array('credit_card'),
				'credit_card_3d_secure' => true
			),
			'transaction_details'=> $transaction_details,
			'item_details' 			 => $items,
			'customer_details' 	 => $customer_details
		);

		$json_transaction_data = json_encode($transaction_data);

		// Mengirimkan request dengan menggunakan CURL
		// HTTP METHOD : POST
		// Header:
		//	Content-Type : application/json
		//	Accept: application/json
		// 	Basic Auth using server_key
		$request = curl_init("https://api.veritrans.co.id/v2/charge");
		curl_setopt($request, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($request, CURLOPT_POSTFIELDS, $json_transaction_data);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$auth = sprintf('Authorization: Basic %s', base64_encode("2507d2f0-a0c4-4e80-b23f-a0ab0f590323".':'));
		curl_setopt($request, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
			'Accept: application/json',
			$auth 
			)
		);
		// Excute request and parse the response
		$response = json_decode(curl_exec($request));

		// Check Response
		if($response->status_code == "201")
		{
			//success
			//redirect to vtweb payment page
			header("Location: ".$response->redirect_url);
		}
		else
		{
			//error
			echo "Terjadi kesalahan pada data transaksi yang dikirim.<br />";
			echo "Status message: [".$response->status_code."] ".$response->status_message;

			echo "<h3>Response:</h3>";
			var_dump($response);
		}
		// return
		// ?order_id=ADR-20140704-1666&status_code=201&transaction_status=capture

	}
}