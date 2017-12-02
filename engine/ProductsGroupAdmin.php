<?php

require_once('api/Engine.php');

class ProductsGroupAdmin extends Engine
{
	public function fetch()
	{
		$group_products = array();
				
		if($this->request->method('post') && !empty($_POST))
		{
			$group = new stdClass;
			$group->id = $this->request->post('id', 'integer');
			$group->group_code = $this->request->post('group_code');
			$group->visible = 1; /* $this->request->post('visible', 'boolean') */
			
			if(empty($group->id))
			{
				$group->id = $this->products->add_group($group);
				$group = $this->products->get_group($group->id);
				if(empty($group->group_code)){
					$group->group_code = 'custom_'.$group->id;
					$this->products->update_group($group->id, $group);
					$group = $this->products->get_group($group->id);
				}
				/* header('Location: index.php?module=ProductsGroupAdmin&id='.$group->id.'&message_success=added');
				exit(); */
				$this->templates->assign('message_success', 'added');
				
			}
			else
			{
				$this->products->update_group($group->id, $group);
				$group = $this->products->get_group($group->id);
				/* header('Location: index.php?module=ProductsGroupAdmin&id='.$group->id.'&message_success=updated');
				exit(); */
				$this->templates->assign('message_success', 'updated');
			}
			
			if(is_array($this->request->post('group_products')))
			{
				foreach($this->request->post('group_products') as $p)
				{
					$gp[$p] = new stdClass;
					$gp[$p]->product_id = $p;
				}
				$group_products = $gp;
			}
			
			if($group)
			{
				$this->products->delete_group_products($group->id);
				if(is_array($group_products))
				{
					$pos = 0;
					foreach($group_products  as $i=>$group_product){
						if($prod_in_group = $this->products->get_group_product($group_product->product_id))
							continue;
						$this->products->add_group_product($group_product->product_id, $group->id, $pos++);
					}
				}
				$group_products = $this->products->get_group_products($group->id);
			}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			$group = $this->products->get_group(intval($id));
			
			if($group)
			{
				$group_products = $this->products->get_group_products($group->id);
			}
			else
			{
				// Сразу активен
				$group = new stdClass;
				$group->visible = 1;
			}
			
			$message_success = $this->request->get('message_success');
			if($message_success)
				$this->templates->assign('message_success', $message_success);
		}
		
		if(!empty($group_products))
		{
			foreach($group_products as &$r_p)
				$r_products[$r_p->product_id] = &$r_p;
			$temp_products = $this->products->get_products(array('id'=>array_keys($r_products)));
			foreach($temp_products as $temp_product)
				$r_products[$temp_product->id] = $temp_product;
		
			$related_products_images = $this->products->get_images(array('product_id'=>array_keys($r_products)));
			foreach($related_products_images as $image)
			{
				$r_products[$image->product_id]->images[] = $image;
			}
		}
		
			
		$this->templates->assign('group', $group);
		$this->templates->assign('group_products', $group_products);		

 	  	return $this->templates->fetch('products/products_group.tpl');
	}
}