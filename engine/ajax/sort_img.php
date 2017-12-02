<?php

	require_once('../../api/Engine.php');
	$engine = new Engine();
	
	$product_id = $engine->request->get('id', 'integer');
	$old = $engine->request->get('old', 'integer');
	$new = $engine->request->get('new', 'integer');
	
	if($images = $engine->products->get_images(array('product_id'=>$product_id)))
	{
		$new_order = array();
		$s_img = 0;
		
	 	$z = 0;
		foreach($images as $i)
		{
			$engine->products->update_image($i->id, array('position'=>$z));
			$z++;
		}
		
		$z = 0;
		foreach($images as $i)
		{
			if($z == $old){
				$s_img = $i->id;
				$new_order[$i->id] = $new;
				break;
			}
			$z++;
		}
		
		$z = 0;
		foreach($images as $i)
		{
			if($i->id == $s_img){
				continue;
			}elseif($z == $new){
				$new_order[$i->id] = ++$z;
				$z++;
			}elseif($z == $old){
				$new_order[$i->id] = $z;
				$z++;
			}else{
				$new_order[$i->id] = $z;
				$z++;
			}
		}
		foreach($new_order as $id => $position)
		{
			$engine->products->update_image($id, array('position'=>$position));
		}
		
	}

