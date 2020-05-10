<?php
session_start();
require_once('Engine.php');

class Managers extends Engine
{	
	private $manager_salt = '8e86a279d6e182b3c811c559e6b15484';
	private $cookie_salt  = 'rn524u55sibb84fjp30ew6ji5grdd10q';
	
	public $permissions_list = array(
		array('code'=>'products', 'title'=>'Товары'),
		array('code'=>'categories', 'title'=>'Категории товаров'),
		array('code'=>'gallery', 'title'=>'Галерея'),
		array('code'=>'brands', 'title'=>'Бренды'),
		array('code'=>'features', 'title'=>'Свойства'),
		array('code'=>'orders', 'title'=>'Заказы'),
		array('code'=>'labels', 'title'=>'Метки заказов'),
		array('code'=>'users', 'title'=>'Покупатели'),
		array('code'=>'groups', 'title'=>'Группы покупателей'),
		array('code'=>'coupons', 'title'=>'Купоны'),
		array('code'=>'pages', 'title'=>'Страницы'),
		array('code'=>'news', 'title'=>'Новости'),
		array('code'=>'slider', 'title'=>'Слайдер'),
		array('code'=>'comments', 'title'=>'Комментарии'),
		array('code'=>'feedbacks', 'title'=>'Обратная связь'),
		array('code'=>'import', 'title'=>'Импорт товаров'),
		array('code'=>'export', 'title'=>'Экспорт'),
		array('code'=>'backup', 'title'=>'Бекап'),
		array('code'=>'stats', 'title'=>'Статистика'),
		array('code'=>'templates', 'title'=>'Дизайн'),
		array('code'=>'settings', 'title'=>'Настройки'),
		array('code'=>'languages', 'title'=>'Мультиязычность'),
		array('code'=>'currency', 'title'=>'Валюты'),
		array('code'=>'delivery', 'title'=>'Способы доставки'),
		array('code'=>'payments', 'title'=>'Способы оплаты'),
		array('code'=>'managers', 'title'=>'Менеджеры')
	);

	public function __construct()
	{
		// Для совсестимости с режимом CGI
		if (isset($_SERVER['REDIRECT_REMOTE_USER']) && empty($_SERVER['PHP_AUTH_USER']))
		{
		    $_SERVER['PHP_AUTH_USER'] = $_SERVER['REDIRECT_REMOTE_USER'];
		}	
		elseif(empty($_SERVER['PHP_AUTH_USER']) && !empty($_SERVER["REMOTE_USER"]))
		{
		    $_SERVER['PHP_AUTH_USER'] = $_SERVER["REMOTE_USER"];
		}
	}

	public function get_managers()
	{
		$query = $this->db->placehold("SELECT m.id, m.login, m.password, m.email, m.permissions, m.last_ip, m.last_login, m.bad_attempts, m.last_attempt FROM __managers m ORDER BY m.id");
		$this->db->query($query);
		$managers = $this->db->results();
		
		foreach($managers as $m)
		{
			$permissions = explode(",",$m->permissions);
			$m->permissions = $permissions;
		}
		
		return $managers;
	}
		
	public function count_managers($filter = array())
	{
		return count($this->get_managers());
	}
		
	public function get_manager($id)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold(' WHERE m.login=? ', $id);
		else
			$where = $this->db->placehold(' WHERE m.id=? ', intval($id));
		
		// Выбираем менеджера
		$query = $this->db->placehold("SELECT m.id, m.login, m.email, m.permissions, m.last_ip, m.last_login, m.bad_attempts, m.last_attempt FROM __managers m $where LIMIT 1");
		$this->db->query($query);
		$manager = $this->db->result();
				
		if(empty($manager))
			return false;
		
		if($manager->id == 1)
			$manager->permissions = array_column($this->permissions_list, 'code');
		else
			$manager->permissions = explode(",",$manager->permissions);
		
		return $manager;
	}
	
	public function add_manager($manager)
	{
		$manager = (array)$manager;
		if(isset($manager['password']))
			$manager['password'] = md5($this->manager_salt.$manager['password'].md5($manager['password'].$manager['login']));
		
		if(isset($manager['permissions']))
			$manager['permissions'] = implode(",", $manager['permissions']);
		else
			return false;
			
		$query = $this->db->placehold("SELECT count(*) as count FROM __managers WHERE login=?", $manager['password']['login']);
		$this->db->query($query);
		
		if($this->db->result('count') > 0)
			return false;
		
		$query = $this->db->placehold("INSERT INTO __managers SET ?%", $manager);
		$this->db->query($query);
		return $this->db->insert_id();
	}
		
	public function update_manager($id, $manager)
	{		
		$manager = (array)$manager;
		
		if(isset($manager['password']))
			$manager['password'] = md5($this->manager_salt.$manager['password'].md5($manager['password'].$manager['login']));
		
		if(isset($manager['permissions']))
			$manager['permissions'] = implode(",", $manager['permissions']);
		else
			return false;

		$query = $this->db->placehold("UPDATE __managers SET ?% WHERE id=? LIMIT 1", $manager, intval($id));
		$this->db->query($query);
		return $id;
	}
	
	public function delete_manager($id)
	{
		if(!empty($id) and $id != 1)
		{
			$query = $this->db->placehold("DELETE FROM __managers WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}

	public function access($module)
	{
		$manager = $this->get_manager(intval($_SESSION['admin_id']));
		if(is_array($manager->permissions))
			return in_array($module, $manager->permissions);
		else
			return false;
	}
	
	public function check_password($login, $password)
	{
		$encpassword = md5($this->manager_salt.$password.md5($password.$login));
		$query = $this->db->placehold("SELECT id FROM __managers WHERE login=? AND password=? LIMIT 1", $login, $encpassword);
		$this->db->query($query);
		if($id = $this->db->result('id')){
			$ip = $_SERVER['REMOTE_ADDR'];
			$query = $this->db->placehold("UPDATE __managers SET last_login=now(), bad_attempts=0, last_attempt=now(), last_ip=? WHERE id=? LIMIT 1", $ip, $id);
			$this->db->query($query);
			return $id;
		}
		return false;
	}
	
	public function generate_token($manager_id){
		$where = $this->db->placehold(' WHERE m.id=? ', intval($manager_id));

		$query = $this->db->placehold("SELECT m.id, m.last_login FROM __managers m $where LIMIT 1");
		$this->db->query($query);
		$manager = $this->db->result();
		
		if($manager){
			$manager = (array)$manager;
			$token = md5($this->cookie_salt.$manager['id'].md5($this->cookie_salt.$manager['last_login']));
			
			$query = $this->db->placehold("UPDATE __managers SET token=? WHERE id=? LIMIT 1", $token, $manager_id);
			$this->db->query($query);
			
			return $token;
		}
		return false;
	}
	public function check_token($token){
		$where = $this->db->placehold(' WHERE m.token=? ', $token);

		$query = $this->db->placehold("SELECT m.id, m.login, m.email, m.permissions, m.last_ip, m.last_login, m.bad_attempts, m.last_attempt FROM __managers m $where LIMIT 1");
		$this->db->query($query);
		$manager = $this->db->result();
		
		if($manager){
			return $manager;
		}
		return false;
	}
	public function logout($id){

		$query = $this->db->placehold("UPDATE __managers SET token=NULL WHERE id=? LIMIT 1", intval($id));
		$this->db->query($query);
		
		return true;
	}
}