<?PHP

require_once('api/Engine.php');


class PaymentModule extends Engine
{
 
	public function checkout_form()
	{
		$form = '<input type=submit value="Оплатить">';	
		return $form;
	}
	public function settings()
	{
		$form = '<input type=submit value="Оплатить">';	
		return $form;
	}
}
