<?php
/**
* 
*/
class Cart extends CFormModel
{
	
	/**
	 * Add Cart
	 */
	public function addCart($id, $qty, $price, $option = '', $optional = '')
	{
		$session=new CHttpSession;
		$session->open();
		
		$cart = $session['cart'];
		if (isset($cart[$id])){
			if ($qty AND $option == '') {
				unset($cart[$id]);
				$cart[$id] = array(
					'id'=>$id,
					'qty'=>$qty,
					'price'=>$price,
					'option'=>$option,
					'optional'=>$optional,
				);
			}elseif($option){
				unset($cart[$id]);
				$cart[$id] = array(
					'id'=>$id,
					'qty'=>$qty,
					'price'=>$price,
					'option'=>$option,
					'optional'=>$optional,
				);
			}
			if ($qty==0) {
				unset($cart[$id]);
			}
		}else{
			$cart[$id] = array(
				'id'=>$id,
				'qty'=>$qty,
				'price'=>$price,
				'option'=>$option,
				'optional'=>$optional,
			);
		}
		$session['cart']=$cart;
	}
	public function viewCart($language_id)
	{
		$session=new CHttpSession;
		$session->open();
		
		$cart = $session['cart'];

		$data =array();

		if (count($cart)>0) {
		foreach ($cart as $key => $value) {

			$dataProduct = PrdProduct::model()->with('description')->find('language_id = :language_id AND t.id = :id', array(':language_id' => $language_id, ':id' => $value['id']));

			$data[$key] = array(
				'id'=>$value['id'],
				'qty'=>$value['qty'],
				'price'=>$value['price'],
				'option'=>$value['option'],
				'optional'=>$value['optional'],

				'image'=>$dataProduct->image,
				'name'=>$dataProduct->description->name,
			);
		}
		}
		return $data;
	}
	public function destroyCart()
	{
		$session=new CHttpSession;
		$session->open();
		
		unset($session['cart']);
	}
	public function getTotalCart()
	{
		$session=new CHttpSession;
		$session->open();
		
		$cart = $session['cart'];
		$total = 0;
		if (count($cart) > 0) {
			foreach ($cart as $key => $value) {
				$total = $total + $value['price']*$value['qty'];
			}
		}
		return $total;
	}
	public function getTotalCartItem()
	{
		$session=new CHttpSession;
		$session->open();
		
		$cart = $session['cart'];

		return count($cart);
	}
	public static function money($price)
	{
		if ($price == '')
			$price = 0;
		return 'IDR '.number_format($price, 0, '.', ',');
	}
	public static function gramToKg($weight)
	{
		return ceil(number_format($weight / 1000, 2));
	}
	public function addCompare($id)
	{
		$session=new CHttpSession;
		$session->open();
		
		$compare = $session['compare'];
		if ($id != '' AND count($compare) < 2) { // di batasi 2 item yang di compare
			$compare[] = $id;
		}
		$session['compare']=$compare;
	}
	public function jmlCompare()
	{
		$session=new CHttpSession;
		$session->open();
		
		return count($session['compare']);
	}
	public function deleteCompare()
	{
		$session=new CHttpSession;
		$session->open();
		unset($session['compare']);
	}
	public function viewCompare()
	{
		$session=new CHttpSession;
		$session->open();
		return $session['compare'];
	}
}