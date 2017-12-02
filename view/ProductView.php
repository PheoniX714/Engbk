<?PHP

require_once('View.php');

class ProductView extends View
{

	function fetch()
	{   
		$product_url = $this->request->get('product_url', 'string');
		
		if(empty($product_url))
			return false;

		// Выбираем товар из базы
		$product = $this->products->get_product((string)$product_url);
		if(empty($product) || (!$product->visible && empty($_SESSION['admin'])))
			return false;
		
		$product->images = $this->products->get_images(array('product_id'=>$product->id));
		$product->image = reset($product->images);

		$variants = array();
		foreach($this->variants->get_variants(array('product_id'=>$product->id, 'in_stock'=>true)) as $v)
			$variants[$v->id] = $v;
		
		$product->variants = $variants;
		
		// Вариант по умолчанию
		if(($v_id = $this->request->get('variant', 'integer'))>0 && isset($variants[$v_id]))
			$product->variant = $variants[$v_id];
		else
			$product->variant = reset($variants);
					
		$product->features = $this->features->get_product_options(array('product_id'=>$product->id));

		// Автозаполнение имени для формы комментария
		if(!empty($this->user))
			$this->templates->assign('comment_name', $this->user->name);

		// Принимаем комментарий
		if ($this->request->method('post') && $this->request->post('comment'))
		{
			$comment = new stdClass;
			$comment->name = $this->request->post('name');
			$comment->text = $this->request->post('text');
			$captcha_code =  $this->request->post('captcha_code', 'string');
			
			// Передадим комментарий обратно в шаблон - при ошибке нужно будет заполнить форму
			$this->templates->assign('comment_text', $comment->text);
			$this->templates->assign('comment_name', $comment->name);
			
			// Проверяем капчу и заполнение формы
			if ($_SESSION['captcha_code'] != $captcha_code || empty($captcha_code))
			{
				$this->templates->assign('error', 'captcha');
			}
			elseif (empty($comment->name))
			{
				$this->templates->assign('error', 'empty_name');
			}
			elseif (empty($comment->text))
			{
				$this->templates->assign('error', 'empty_comment');
			}
			else
			{
				// Создаем комментарий
				$comment->object_id = $product->id;
				$comment->type      = 'product';
				$comment->ip        = $_SERVER['REMOTE_ADDR'];
				
				$comment->approved = 1;
				
				// Добавляем комментарий в базу
				$comment_id = $this->comments->add_comment($comment);
				
				// Отправляем email
				$this->notify->email_comment_admin($comment_id);				
				
				// Приберем сохраненную капчу, иначе можно отключить загрузку рисунков и постить старую
				unset($_SESSION['captcha_code']);
				header('location: '.$_SERVER['REQUEST_URI'].'#comment_'.$comment_id);
			}			
		}
		
		// Группа товаров
		$product_group = $this->products->get_group_product(intval($product->id));
		
		if($product_group){
			$group_products_ids = array();
			$group_products = array();
			foreach($this->products->get_group_products($product_group->group_id) as $p)
			{
				$group_products_ids[] = $p->product_id;
				$group_products[$p->product_id] = null;
			}
			
			if(!empty($group_products_ids))
			{
				foreach($this->products->get_products(array('id'=>$group_products_ids, 'category_id'=>'', 'visible'=>1)) as $p)
					$group_products[$p->id] = $p;
					
				$this->templates->assign('group_products', $group_products);
			}
		}
				
		// Связанные товары
		$related_ids = array();
		$related_products = array();
		foreach($this->products->get_related_products($product->id) as $p)
		{
			$related_ids[] = $p->related_id;
			$related_products[$p->related_id] = null;
		}
		if(!empty($related_ids))
		{
			foreach($this->products->get_products(array('id'=>$related_ids,  'visible'=>1)) as $p)
				$related_products[$p->id] = $p;
			
			$related_products_images = $this->products->get_images(array('product_id'=>array_keys($related_products)));
			foreach($related_products_images as $related_product_image)
				if(isset($related_products[$related_product_image->product_id]))
					$related_products[$related_product_image->product_id]->images[] = $related_product_image;
			$related_products_variants = $this->variants->get_variants(array('product_id'=>array_keys($related_products), 'in_stock'=>1));
			foreach($related_products_variants as $related_product_variant)
			{
				if(isset($related_products[$related_product_variant->product_id]))
				{
					$related_products[$related_product_variant->product_id]->variants[] = $related_product_variant;
				}
			}
			foreach($related_products as $id=>$r)
			{
				if(is_object($r))
				{
					$r->image = &$r->images[0];
					$r->variant = &$r->variants[0];
				}
				else
				{
					unset($related_products[$id]);
				}
			}
			$this->templates->assign('related_products', $related_products);
		}

		#$comments = $this->comments->get_comments(array('type'=>'product', 'object_id'=>$product->id, 'approved'=>1, 'ip'=>$_SERVER['REMOTE_ADDR']));
		
		//Перевод товара
		$language_id = $_SESSION['lang']->id;
						
		if($language_id > 1){
			$translation = $this->products->get_product_translation(intval($product->id), intval($language_id));
			
			if(empty($translation)){
				$translation = new stdClass;
				$translation->name = '';
				$translation->visible_name = '';
				$translation->meta_title = '';
				$translation->meta_keywords = '';
				$translation->meta_description = '';
				$translation->body = '';
				$translation->annotation = '';
			}
			
			if($translation){
				$product->name = $translation->name;
				$product->visible_name = $translation->visible_name;
				$product->meta_title = $translation->meta_title;
				$product->meta_keywords = $translation->meta_keywords;
				$product->meta_description = $translation->meta_description;
				$product->annotation = $translation->annotation;
				$product->body = $translation->body;
			}
		}
		
		// И передаем его в шаблон
		$this->templates->assign('product', $product);
		$this->templates->assign('comments', $comments);
		
		// Категория и бренд товара
		$product->categories = $this->categories->get_categories(array('product_id'=>$product->id));
		#$this->templates->assign('brand', $this->brands->get_brand(intval($product->brand_id)));		
		$this->templates->assign('category', reset($product->categories));		

		// Добавление в историю просмотров товаров
		$max_visited_products = 100; // Максимальное число хранимых товаров в истории
		$expire = time()+60*60*24*30; // Время жизни - 30 дней
		if(!empty($_COOKIE['browsed_products']))
		{
			$browsed_products = explode(',', $_COOKIE['browsed_products']);
			// Удалим текущий товар, если он был
			if(($exists = array_search($product->id, $browsed_products)) !== false)
				unset($browsed_products[$exists]);
		}
		// Добавим текущий товар
		$browsed_products[] = $product->id;
		$cookie_val = implode(',', array_slice($browsed_products, -$max_visited_products, $max_visited_products));
		setcookie("browsed_products", $cookie_val, $expire, "/");
		
		$this->templates->assign('meta_title', $product->meta_title);
		$this->templates->assign('meta_keywords', $product->meta_keywords);
		$this->templates->assign('meta_description', $product->meta_description);
		
		return $this->templates->fetch('product.tpl');
	}
	


}
