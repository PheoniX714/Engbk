<?PHP
require_once('api/Engine.php');

class NewsCategoryAdmin extends Engine
{
	public function fetch()
	{
		$language_id = $this->request->get('language_id', 'integer');
		
		if(empty($language_id))
			$language = $this->languages->get_main_language();
		else
			$language = $this->languages->get_language(intval($language_id));
		
		$main_language = $this->languages->get_main_language();
		
		if($this->request->method('post'))
		{
			$category = new stdClass;
			$translation = new stdClass;
		
			$category->id = $this->request->post('id', 'integer');
			$category->parent_id = $this->request->post('parent_id', 'integer');
			$category->visible = $this->request->post('visible', 'boolean');
			
			$translation->name = $this->request->post('name');
			$translation->url = trim($this->request->post('url', 'string'));
			$translation->meta_title = $this->request->post('meta_title');
			$translation->meta_keywords = $this->request->post('meta_keywords');
			$translation->meta_description = $this->request->post('meta_description');
			$translation->text = $this->request->post('text');
			
			if(empty($translation->url))
				$translation->url = $this->request->translit($translation->name);
			else
				$translation->url = $this->request->translit($translation->url);
			
			if(empty($translation->meta_title))
				$translation->meta_title = $translation->name;
			if(empty($translation->meta_keywords))
				$translation->meta_keywords = $translation->name;
			
			// Не допустить одинаковые URL разделов.
			if(($t = $this->news->get_category_translation($category->id, $translation->id)) && $t->category_id!=$category->id)
			{			
				$this->templates->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($category->id))
				{
					$category->id = $this->news->add_category($category);
					$this->templates->assign('message_success', 'added');
				}else{
					$this->news->update_category($category->id, $category);
					$this->templates->assign('message_success', 'updated');
				}
				$category = $this->news->get_category(intval($category->id));
			}
			
			if(!empty($category->id)){
				$translation->category_id = $category->id;
				$translation->language_id = $language->id;
				
				if($this->news->delete_category_translation($translation->category_id, $translation->language_id))
					$this->news->add_category_translation($translation);
				
				$translation = $this->news->get_category_translation(intval($category->id), intval($language->id));
			}
			$category = (object)array_merge((array)$category, (array)$translation);
		}
		else
		{
			if(!empty($id = $this->request->get('id', 'integer'))){
				$category = $this->news->get_category($id);
				$translation = $this->news->get_category_translation(intval($category->id), intval($language->id));
				
				$category = (object)array_merge((array)$category, (array)$translation);
			}
		}
		
		if(empty($category)){			
			$category = new stdClass;
			$category->visible = 1;
		}		
		
		$languages = $this->languages->get_languages();
		$categories = $this->news->get_categories_tree();
		
		$this->templates->assign('language', $language);
		$this->templates->assign('main_language', $main_language);
		$this->templates->assign('languages', $languages);
		$this->templates->assign('category', $category);
		$this->templates->assign('categories', $categories);
 	  	return $this->templates->fetch('news/news-category.tpl');
	}
}